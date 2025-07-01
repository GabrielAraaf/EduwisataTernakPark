@extends('layouts.app')

@section('title', 'Instruksi Pembayaran')

@section('content')

<section class="container" id="instruction-page">
    <div class="instruction-box">
        <div class="icon-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h2>Pemesanan Berhasil Dibuat!</h2>
        <p>Selesaikan pembayaran Anda sebelum batas waktu untuk mendapatkan e-tiket.</p>

        <div class="invoice-details">
            <div class="detail-row"><span>Nomor Invoice</span><strong>{{ $details['invoice'] }}</strong></div>
            <div class="detail-row"><span>Total Pembayaran</span><strong class="total-price">{{ $details['total_pembayaran_format'] }}</strong></div>
        </div>

        <div class="payment-instruction">
            <h4>Instruksi Pembayaran</h4>
           <p>
                Batas Waktu Pembayaran: 
                <strong id="countdown-timer" data-expiration="{{ $details['expiration_timestamp'] }}" style="color: #d32f2f;">
                    Memuat...
        </strong>
    </p>

            @if($details['payment_method'] == 'qris')
                <div class="qris-section">
                    <p>Silakan pindai (scan) QR Code di bawah ini menggunakan aplikasi e-wallet (GoPay, OVO, Dana, dll) atau m-banking Anda.</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ $details['invoice'] }}" alt="QR Code Pembayaran">
                </div>
            @elseif($details['payment_method'] == 'va')
                <div class="va-section">
                    <p>Silakan transfer ke Nomor Virtual Account berikut:</p>
                    <div class="va-number">8808 1234 5678 9012</div>
                    <p>Bank: <strong>BCA (Contoh)</strong></p>
                </div>
            @endif
        </div>
        <a href="{{ route('tiket') }}" class="cta-button-outline">Kembali</a>
    </div>
</section>

@endsection
