@component('mail::message')
# E-Tiket Anda

Terima kasih telah melakukan pembelian tiket. Berikut adalah detail pesanan Anda:

- **Invoice:** {{ $transaction->invoice }}
- **Nama:** {{ $transaction->nama_lengkap }}
- **Jumlah Tiket:** {{ $transaction->jumlah_tiket }}
- **Total Pembayaran:** Rp {{ number_format($transaction->total_pembayaran, 0, ',', '.') }}
- **Tanggal Kunjungan:** {{ $transaction->tanggal_kunjungan }}

Silakan tunjukkan email ini saat kunjungan Anda.

@component('mail::button', ['url' => url('/')])
Kunjungi Website Kami
@endcomponent

Terima kasih,  
Ternak Park Wonosalam
@endcomponent
