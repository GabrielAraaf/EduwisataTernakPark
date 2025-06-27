{{-- Menggunakan layout utama dari layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Tentang Kami - Ternak Park Wonosalam')

{{-- Mendefinisikan konten utama halaman --}}
@section('content')

    <div class="container">
        <h1>About Eduwisata Ternak Park Wonosalam</h1>
        
        <div class="content-section">
            <h2>Visi & Misi</h2>
            <p>
                Menjadi pusat eduwisata peternakan terintegrasi yang terdepan di Jawa Timur, 
                yang mengedukasi masyarakat tentang pentingnya ketahanan pangan, kesejahteraan hewan, 
                dan agrikultur berkelanjutan sambil memberdayakan komunitas lokal Wonosalam.
            </p>
        </div>

        <div class="content-section">
            <h2>Sejarah Singkat</h2>
            <p>
                Ternak Park Wonosalam lahir dari sebuah ide sederhana startup yang ingin menjembatani 
                kesenjangan antara masyarakat urban dengan dunia peternakan. Kami percaya bahwa dengan 
                mengenal sumber pangan mereka, masyarakat akan lebih menghargai proses dan alam. 
                Didirikan pada tahun 2022, kami terus berinovasi untuk memberikan pengalaman belajar 
                yang menyenangkan bagi semua kalangan.
            </p>
        </div>

        <div class="content-section">
            <h2>Keunikan Wonosalam</h2>
            <p>
                Lokasi kami di Wonosalam bukan tanpa alasan. Dikenal sebagai surga durian dan kopi, 
                Wonosalam menawarkan udara yang sejuk dan pemandangan alam yang asri. Kami ingin 
                Ternak Park menjadi bagian tak terpisahkan dari ekosistem agrowisata yang sudah ada, 
                memberikan pilihan destinasi lengkap bagi para pengunjung.
            </p>
        </div>
    </div>
@endsection