{{-- Menggunakan kerangka dari layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Harga Tiket - Ternak Park Wonosalam')

{{-- Mendefinisikan konten utama halaman --}}
@section('content')

<section id="tiket" class="container">
    <div class="section-header">
        <h2>Daftar Harga Tiket</h2>
        <p>Pilih paket terbaik untuk petualangan tak terlupakan Anda bersama keluarga di Ternak Park Wonosalam.</p>
    </div>

    <div class="pricing-grid" >
        {{-- Loop data tiket dari Controller --}}
        @foreach ($daftar_tiket as $tiket)
        <div class="pricing-card {{ $tiket['is_rekomendasi'] ? 'rekomendasi' : '' }}">
            @if ($tiket['is_rekomendasi'])
                <div class="rekomendasi-badge">Paling Populer</div>
            @endif
            <div class="pricing-header text-center mb-8">
                <h3>{{ $tiket['nama'] }}</h3>
                <p>{{ $tiket['tipe'] }}</p>
            </div>
            <div class="pricing-price" >
                <div class="price-item ">
                    <span>Weekday</span>
                    <h4>{{ $tiket['harga_weekday']}}</h4>
                </div>
                <div class="price-item">
                    <span>Weekend</span>
                    <h4>{{ $tiket['harga_weekend']}}</h4>
                </div>
            </div>
            <div class="pricing-features">
                <p>Termasuk:</p>
                <ul>
                    @foreach ($tiket['fasilitas'] as $fasilitas)
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        {{ $fasilitas }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="pricing-cta">
                <a href="{{ route('payment.show', ['slug' => $tiket['slug']]) }}" class="card-cta">Pesan Sekarang</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="info-box">
        <strong>Catatan Penting:</strong>
        <ul>
            <li>Harga dapat berubah sewaktu-waktu tanpa pemberitahuan.</li>
            <li>Weekend dihitung pada hari Sabtu, dan Minggu.</li>
            <li>Anak di bawah 3 tahun atau tinggi badan di bawah 90cm tidak dikenakan biaya (Gratis).</li>
        </ul>
    </div>
</section>

@endsection