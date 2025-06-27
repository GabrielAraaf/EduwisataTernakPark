{{-- Menggunakan kerangka dari layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Ternak Park Wonosalam - Eduwisata Seru untuk Keluarga')

{{-- Mendefinisikan konten utama halaman --}}
@section('content')

<!-- ======================= HERO SECTION ======================= -->
<section class="hero">
    <div class="hero-content">
        <h1>Eduwisata Ternakpark</h1>
        <p>Liburan Seru Sambil Belajar di Ternak Park, juga nikmati segarnya udara Wonosalam dan berinteraksi langsung dengan hewan-hewan ternak yang lucu dan menggemaskan.</p>
        <a href="{{ route('about') }}" class="hero-cta">About Us</a>
    </div>
</section>

<!-- ======================= AKTIVITAS SECTION ======================= -->
<section id="aktivitas" class="container">
    <div class="section-header">
        <br>
        <br>
        <br>
        <h2>Aktivitas Ternakpark</h2>
        <p>Kami menyediakan berbagai aktivitas edukatif dan menarik yang cocok untuk semua usia, dari anak-anak hingga dewasa.</p>
    </div>
    <!-- Swiper -->
    <div class="swiper aktivis-slider">
        <div class="swiper-wrapper">
            {{-- Loop data aktivitas dari Controller --}}
            @foreach ($daftar_aktivitas as $aktivitas)
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image"><img src="{{ $aktivitas['gambar'] }}" alt="{{ $aktivitas['nama'] }}"></div>
                    <div class="card-content">
                        <h3>{{ $aktivitas['nama'] }}</h3>
                        <p>{{ $aktivitas['deskripsi'] }}</p>
                        <a href="{{ route('aktivitas.detail', ['slug' => $aktivitas['slug']]) }}" class="card-cta">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- ======================= WAHANA SECTION ======================= -->
<section id="wahana" class="container">
    <div class="section-header">
        <br>
        <br>
        <br>
        <br>
        <h2>Wahana Permainan</h2>
        <p>Selain belajar, lengkapi liburan Anda dengan mencoba berbagai wahana permainan yang menantang.</p>
    </div>
    <!-- Swiper -->
    <div class="swiper wahana-slider">
        <div class="swiper-wrapper">
            {{-- Loop data wahana dari Controller --}}
            @foreach ($daftar_wahana as $wahana)
            <div class="swiper-slide">
                <div class="card">
                    <div class="card-image"><img src="{{ $wahana['gambar'] }}" alt="{{ $wahana['nama'] }}"></div>
                    <div class="card-content">
                        <h3>{{ $wahana['nama'] }}</h3>
                        <p>{{ $wahana['deskripsi'] }}</p>
                        <a href="{{ route('wahana.detail', ['slug' => $wahana['slug']]) }}" class="card-cta">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- ======================= GALERI SECTION ======================= -->
<section id="galeri" class="container">
    <div class="section-header">
        <br>
        <br>
        <br>
        <br>
        <h2>Galeri Ternakpark</h2>
        <p>Lihat momen-momen kebahagiaan para pengunjung di Ternak Park Wonosalam.</p>
    </div>
    <!-- Wadah baru untuk slider dan tombol panah -->
    <div class="galeri-container">
        <div class="swiper galeri-slider">
            <div class="swiper-wrapper">
                {{-- Loop semua data foto dari Controller --}}
                @foreach($daftar_foto as $foto)
                <div class="swiper-slide">
                    <!-- Struktur disederhanakan, <a> sekarang adalah itemnya langsung -->
                    <a href="{{ $foto['url'] }}" class="glightbox galeri-item" data-gallery="ternakpark-gallery">
                        <img src="{{ $foto['url'] }}" alt="Galeri Foto Ternak Park"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400/CCCCCC/FFFFFF?text=Galeri';">
                    </a>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination (Titik-titik di bawah) -->
            <div class="swiper-pagination"></div>
        </div>
        
        <!-- Tombol Navigasi Panah SEKARANG DI LUAR .swiper -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- ======================= LOKASI SECTION ======================= -->
<section id="lokasi" class="container">
    <div class="section-header">
        <br>
        <br>
        <br>
        <br>
        <h2>Lokasi</h2>
        <p>Kunjungi kami di Wonosalam, Jombang, Jawa Timur. Temukan kami dengan mudah melalui peta di bawah ini.</p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3994.9246028296716!2d112.38225317505147!3d-7.711043592306715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7865f06e9a2d5b%3A0x630eedcad8130587!2sTernakpark%20Wonosalam!5e1!3m2!1sid!2sid!4v1750993098482!5m2!1sid!2sid" 
        width="1200" 
        height="500" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

@endsection