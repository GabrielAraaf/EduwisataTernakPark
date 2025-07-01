<header class="header">
    <nav class="container navbar">
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/lgtpbrr.png') }}" alt="Logo Ternak Park Wonosalam" class="logo-image"></a>
        <div class="nav-links">
            <a href="{{ request()->is('/') ? '#aktivitas' : route('home') . '#aktivitas' }}">Aktivitas</a>
            <a href="{{ request()->is('/') ? '#wahana' : route('home') . '#wahana' }}">Wahana</a>
            <a href="{{ request()->is('/') ? '#galeri' : route('home') . '#galeri' }}">Galeri</a>
            <a href="{{ request()->is('/') ? '#lokasi' : route('home') . '#lokasi' }}">Lokasi</a>
            <!-- <a href="#aktivitas" class="nav-tab active" data-target="aktivitas">Aktivitas</a>
            <a href="#wahana" class="nav-tab" data-target="wahana">Wahana</a>
            <a href="#galeri" class="nav-tab" data-target="galeri">Galeri</a>
            <a href="#lokasi" class="nav-tab" data-target="lokasi">Lokasi</a> --> 
        </div>
        <a href="{{ route('tiket') }}" class="nav-cta">Beli Tiket</a>
    </nav>
</header>