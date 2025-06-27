@extends('layouts.app')

@section('title', 'Halaman Pembayaran')

@section('content')

<section class="container" id="payment-page" data-price="{{ $tiket['harga_raw'] }}">
    <div class="section-header">
        <h2>Formulir Pemesanan Tiket</h2>
        <p>Selesaikan pesanan Anda dengan mengisi form di bawah ini.</p>
    </div>

    <div class="payment-layout">
        <!-- Kolom Kiri: Detail Pesanan -->
        <div class="order-summary">
            <h3>Ringkasan Pesanan</h3>
            <div class="order-item">
                <span class="item-label">Jenis Tiket:</span>
                <span class="item-value">{{ $tiket['nama'] }} ({{ $tiket['tipe'] }})</span>
            </div>
            <div class="order-item">
                <span class="item-label">Harga per Tiket:</span>
                <span class="item-value">Rp {{ number_format($tiket['harga_raw'], 0, ',', '.') }}</span>
            </div>
            <hr>
            <div class="order-item">
                <span class="item-label">Tanggal Kunjungan:</span>
                <input type="date" id="tanggal_kunjungan" class="form-control">
            </div>
            <div class="order-item">
                <span class="item-label">Jumlah Tiket:</span>
                <div class="quantity-selector">
                    <button id="btn-minus">-</button>
                    <input type="number" id="jumlah_tiket" value="1" min="1" class="form-control quantity-input">
                    <button id="btn-plus">+</button>
                </div>
            </div>
            <div class="total-summary">
                <span class="total-label">Total Pembayaran</span>
                <span class="total-value" id="total_pembayaran">Rp {{ number_format($tiket['harga_raw'], 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Kolom Kanan: Form Data Diri & Pembayaran -->
        <div class="payment-form">
            <h3>Detail Pengunjung</h3>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" class="form-control" placeholder="Masukkan nama Anda">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" class="form-control" placeholder="cth: email@anda.com">
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon (WhatsApp)</label>
                <input type="tel" id="no_telepon" class="form-control" placeholder="cth: 08123456789">
            </div>
            
            <h3>Metode Pembayaran</h3>
            <div class="payment-methods">
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="qris" checked>
                    <img src="/images/qris.png" alt="QRIS">
                    <span>QRIS (Semua e-wallet & m-banking)</span>
                </label>
                <label class="payment-option">
                    <input type="radio" name="payment_method" value="va">
                    <img src="/images/va.jpg" alt="Virtual Account">
                    <span>Virtual Account (BCA, Mandiri, BNI, dll)</span>
                </label>
            </div>
            <button class="cta-button">Bayar Sekarang</button>
        </div>
    </div>
</section>

@endsection
