@extends('layouts.app')

@section('title', $aktivitas['nama'] . ' - Ternak Park Wonosalam')

@section('content')

<section class="container">
    <div class="detail-header">
        <h1>{{ $aktivitas['nama'] }}</h1>
        <p>{{ $aktivitas['deskripsi_singkat'] }}</p>
    </div>

    <div class="detail-layout">
        <div class="detail-image">
           <img src="{{ asset($aktivitas->gambar) }}" alt="{{ $aktivitas->nama }}" 
                 onerror="this.onerror=null;this.src='https://placehold.co/800x600/CCCCCC/FFFFFF?text=Gambar+Tidak+Tersedia';">
        </div>

        <div class="detail-content">
            <h2>Deskripsi Aktivitas</h2>
            <p>{!! nl2br(e($aktivitas['deskripsi_panjang'])) !!}</p>
            
            <div class="info-section">
                <h3>Jadwal & Durasi</h3>
                <p><strong>Jadwal:</strong> {{ $aktivitas['jadwal'] }}</p>
                <p><strong>Perkiraan Durasi:</strong> {{ $aktivitas['durasi'] }}</p>
            </div>
            
            <div class="info-section">
                <h3>Tips Untuk Pengunjung</h3>
                <p>{{ $aktivitas['tips'] }}</p>
            </div>
        </div>
    </div>
</section>

<section class="container" style="padding-top: 0;">
    <div class="aktivitas-lainnya-header">
        <h2>Coba Aktivitas Lainnya</h2>
    </div>
    <div class="related-grid">
        @foreach($aktivitas_lainnya as $item)
            <div class="card">
                <div class="card-image"><img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}"
                     onerror="this.onerror=null;this.src='https://placehold.co/400x300/CCCCCC/FFFFFF?text=Gambar';"></div>
                <div class="card-content">
                    <h3>{{ $item['nama'] }}</h3>
                    <p>{{ $item['deskripsi_singkat'] }}</p>
                    <a href="{{ route('aktivitas.detail', ['slug' => $item['slug']]) }}" class="card-cta">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Di dalam detail-aktivitas.blade.php --}}

{{-- ... (kode @section('content') Anda) ... --}}
@endsection

{{-- BARU: Timpa footer default dengan footer CTA --}}
@section('footer')
    @include('layouts.partials.footer-cta')
@endsection