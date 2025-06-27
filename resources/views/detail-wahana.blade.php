@extends('layouts.app')

@section('title', $wahana['nama'] . ' - Ternak Park Wonosalam')

@section('content')

<section class="container">
    <div class="detail-header">
        <h1>{{ $wahana['nama'] }}</h1>
        <p>{{ $wahana['deskripsi_singkat'] }}</p>
    </div>

    <div class="detail-layout">
        <div class="detail-image">
            <img src="{{ $wahana['gambar_utama'] }}" alt="{{ $wahana['nama'] }}" 
                 onerror="this.onerror=null;this.src='https://placehold.co/800x600/CCCCCC/FFFFFF?text=Gambar+Tidak+Tersedia';">
        </div>

        <div class="detail-content">
            <h2>Deskripsi Wahana</h2>
            <p>{!! nl2br(e($wahana['deskripsi_panjang'])) !!}</p>
            
            <div class="info-section">
                <h3>Info Tambahan</h3>
                <p><strong>Cocok Untuk Usia:</strong> {{ $wahana['untuk_usia'] }}</p>
                <p><strong>Perkiraan Durasi:</strong> {{ $wahana['durasi'] }}</p>
            </div>
            
            <div class="info-section">
                <h3>Tips Untuk Pengunjung</h3>
                <p>{{ $wahana['tips'] }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container" style="padding-top: 0;">
    <div class="aktivitas-lainnya-header">
        <h2>Coba Wahana Lainnya</h2>
    </div>
    <div class="related-grid">
        @foreach($wahana_lainnya as $item)
            <div class="card">
                <div class="card-image"><img src="{{ $item['gambar_utama'] }}" alt="{{ $item['nama'] }}"
                     onerror="this.onerror=null;this.src='https://placehold.co/400x300/CCCCCC/FFFFFF?text=Gambar';"></div>
                <div class="card-content">
                    <h3>{{ $item['nama'] }}</h3>
                    <p>{{ $item['deskripsi_singkat'] }}</p>
                    <a href="{{ route('wahana.detail', ['slug' => $item['slug']]) }}" class="card-cta">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Di dalam detail-wahana.blade.php --}}

{{-- ... (kode @section('content') Anda) ... --}}
@endsection

{{-- BARU: Timpa footer default dengan footer CTA --}}
@section('footer')
    @include('layouts.partials.footer-cta')
@endsection
