@extends('layouts.app')

@section('title', 'Selesaikan Pembayaran')

@section('content')
<div class="container" style="text-align: center; padding: 80px 20px; min-height: 60vh;">
    <h2>Mengalihkan ke Halaman Pembayaran...</h2>
    <p>Silakan tunggu, jangan tutup halaman ini. Popup pembayaran akan segera muncul.</p>
    <div class="loader"></div>
</div>

<style>
.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid var(--primary-color);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite;
    margin: 30px auto;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endsection

@section('footer')
    {{-- Kosongkan footer di halaman ini agar tidak mengganggu --}}
@endsection

@push('scripts')
{{-- Menambahkan script khusus untuk halaman ini --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env ('MIDTRANS_CLIENT_KEY' }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Panggil snap.pay() untuk membuka popup Midtrans
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                /* Pembayaran sukses, arahkan ke halaman terima kasih */
                console.log(result);
                // Ganti dengan halaman "thank you" Anda nanti
                window.location.href = '/'; 
                alert("Pembayaran berhasil!"); 
            },
            onPending: function(result){
                /* Pengguna belum bayar, bisa diarahkan ke halaman status pesanan */
                console.log(result);
                alert("Menunggu pembayaran Anda!");
            },
            onError: function(result){
                /* Terjadi error saat pembayaran */
                console.log(result);
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                /* Pengguna menutup popup tanpa menyelesaikan pembayaran */
                alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
            }
        });
    });
</script>
@endpush
