@extends('layouts.app')

@section('title', 'Instruksi Pembayaran')

@section('content')

<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientkey') }}"></script>


<section class="container" id="instruction-page">
    <div class="instruction-box">
        <div class="icon-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h2>Pemesanan Berhasil Dibuat!</h2>
        <p>Selesaikan pembayaran Anda sebelum batas waktu agar e-tiket dapat dikirim.</p>
             


        
        <a href="{{ route('payment.retry', $details['invoice']) }}" class="cta-button-outline">Ganti Metode Pembayaran</a>

        <a href="{{ route('tiket') }}" class="cta-button-outline">Kembali ke Halaman Tiket</a>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.snap.pay("{{ $details['snap_token'] }}", {
            onSuccess: function(result) {
                console.log('Payment Success:', result);
                alert('Pembayaran berhasil!');
                // Di sini bisa diarahkan ke halaman sukses
            },
            onPending: function(result) {
                console.log('Payment Pending:', result);
                alert('Transaksi sedang diproses.');
            },
            onError: function(result) {
                console.log('Payment Error:', result);
                alert('Terjadi kesalahan pembayaran.');
            },
            onClose: function() {
                console.log('Popup ditutup oleh user.');
            }
        });
    });
</script>


<script>
// Countdown Timer
const countdownEl = document.getElementById('countdown-timer');
const expiration = parseInt(countdownEl.dataset.expiration) * 1000;

function updateCountdown() {
    const now = new Date().getTime();
    const distance = expiration - now;

    if (distance <= 0) {
        countdownEl.innerText = "Waktu Habis";
        countdownEl.style.color = 'gray';
        clearInterval(timer);
        return;
    }

    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdownEl.innerText = `${minutes} menit ${seconds} detik`;
}

updateCountdown();
const timer = setInterval(updateCountdown, 1000);
</script>


@endsection
