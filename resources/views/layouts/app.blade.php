<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ternak Park Wonosalam')</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Swiper.js CSS (Untuk Semua Slider) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- GLightbox CSS (Untuk Popup Galeri) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <!-- Stylesheet utama kita -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    {{-- Memasukkan header --}}
    @include('layouts.partials.header') 

    <main>
        @yield('content')
    </main>
    
    {{-- Bagian Footer Dinamis --}}
    @section('footer')
        @include('layouts.partials.footer-main')
    @show

    <!-- ============================================= -->
    <!--          URUTAN PEMANGGILAN SCRIPT            -->
    <!-- ============================================= -->
    
    <!-- 1. Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- 2. JS GLightbox -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <!-- 3. JavaScript utama kita (main.js) -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
