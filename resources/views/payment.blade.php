@extends('layouts.app')

@section('title', 'Halaman Pembayaran')

@section('content')


<section class="container" id="payment-page"
    data-price-weekday="{{ $tiket['harga_weekday_raw'] }}" 
    data-price-weekend="{{ $tiket['harga_weekend_raw'] }}">

    <div class="section-header">
        <h2>Formulir Pemesanan Tiket</h2>
        <p>Selesaikan pesanan Anda dengan mengisi form di bawah ini.</p>
    </div>

    <form action="{{ route('payment.process') }}" method="POST">
        @csrf 

        {{-- Data tersembunyi tiket --}}
        <input type="hidden" name="ticket_slug" value="{{ $tiket['slug'] }}">
        <input type="hidden" name="ticket_price" id="hidden_ticket_price" value="{{ $tiket['harga_weekday_raw'] }}">

        <div class="payment-layout">
            
            <!-- Kolom Kiri: Ringkasan Pesanan -->
            <div class="order-summary">
                <h3>Ringkasan Pesanan</h3>
                <div class="order-item">
                    <span class="item-label">Jenis Tiket:</span>
                    <span class="item-value">{{ $tiket['nama'] }} ({{ $tiket['tipe'] }})</span>
                </div>
                <div class="order-item">
                    <span class="item-label">Harga per Tiket:</span>
                    <span class="item-value" id="harga_per_tiket_display">
                        Rp {{ number_format($tiket['harga_weekday_raw'], 0, ',', '.') }}
                    </span>
                </div>
                <hr>
                <div class="order-item">
                    <span class="item-label">Tanggal Kunjungan:</span>
                    <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required>
                </div>
                <div class="order-item">
                    <span class="item-label">Jumlah Tiket:</span>
                    <div class="quantity-selector">
                        <!-- <button type="button" id="btn-minus">-</button> -->
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" value="1" min="1" class="form-control" required style="width: 60px;">
                        <!-- <button type="button" id="btn-plus">+</button> -->
                    </div>
                </div>
                <div class="total-summary">
                    <span class="total-label">Total Pembayaran</span>
                    <span class="total-value" id="total_pembayaran">
                        Rp {{ number_format($tiket['harga_weekday_raw'], 0, ',', '.') }}
                    </span>
                </div>
            </div>

            <!-- Kolom Kanan: Form Data Diri & Pembayaran -->
            <div class="payment-form">
                <h3>Detail Pengunjung</h3>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="cth: email@anda.com" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon (WhatsApp)</label>
                    <input type="tel" name="no_telepon" id="no_telepon" class="form-control" placeholder="cth: 08123456789" required>
                </div>
                
                <!-- <h3>Metode Pembayaran</h3>
                <div class="payment-methods">
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="va">
                        <img src="/images/va.jpg" alt="Virtual Account">
                        <span>Virtual Account (BRI, Mandiri, BNI, dll)</span>
                    </label>
                </div> -->

                <button type="submit" class="cta-button">Lanjutkan ke Pembayaran</button>
            </div>

        </div>
    </form>
</section>


<script>
// Update harga otomatis berdasarkan tanggal
document.getElementById('tanggal_kunjungan').addEventListener('change', updateHarga);
document.getElementById('jumlah_tiket').addEventListener('input', updateTotal);

function updateHarga() {
    const weekdayPrice = parseInt(document.getElementById('payment-page').dataset.priceWeekday);
    const weekendPrice = parseInt(document.getElementById('payment-page').dataset.priceWeekend);
    const tanggal = document.getElementById('tanggal_kunjungan').value;
    if (!tanggal) return;

    const selectedDate = new Date(tanggal);
    const day = selectedDate.getDay(); // 0 = Minggu, 6 = Sabtu
    const harga = (day === 0 || day === 6) ? weekendPrice : weekdayPrice;

    document.getElementById('harga_per_tiket_display').innerText = formatRupiah(harga);
    document.getElementById('hidden_ticket_price').value = harga;
    updateTotal();
}

function updateTotal() {
    const harga = parseInt(document.getElementById('hidden_ticket_price').value) || 0;
    const jumlah = parseInt(document.getElementById('jumlah_tiket').value) || 0;
    const total = harga * jumlah;
    document.getElementById('total_pembayaran').innerText = formatRupiah(total);
}

function formatRupiah(angka) {
    return 'Rp ' + angka.toLocaleString('id-ID');
}
</script>

@endsection
