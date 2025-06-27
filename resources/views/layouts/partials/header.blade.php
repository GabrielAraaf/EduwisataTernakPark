<header class="header">
    <nav class="container navbar">
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logotpwnslm.jpeg') }}" alt="Logo Ternak Park Wonosalam" class="logo-image"></a>
        <div class="nav-links">
            <a href="{{ request()->is('/') ? '#aktivitas' : route('home') . '#aktivitas' }}">Aktivitas</a>
            <a href="{{ request()->is('/') ? '#wahana' : route('home') . '#wahana' }}">Wahana</a>
            <a href="{{ request()->is('/') ? '#galeri' : route('home') . '#galeri' }}">Galeri</a>
            <a href="{{ request()->is('/') ? '#lokasi' : route('home') . '#lokasi' }}">Lokasi</a>
        </div>
        <a href="{{ route('tiket') }}" class="nav-cta">Beli Tiket</a>
    </nav>
</header>