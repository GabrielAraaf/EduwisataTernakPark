<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduwisataController extends Controller
{
    
    public function index()
    {
      
        $daftar_aktivitas = [
            [
                'slug' => 'memberi-makan-ternak',
                'nama' => 'Memberi Makan Ternak',
                'deskripsi' => 'Rasakan pengalaman memberi makan berbagai jenis domba secara langsung.',
                'gambar' => 'images/gdomba.jpg',
                'url' => '#'
            ],
            [
                'slug' => 'memerah-susu-domba',
                'nama' => 'Memerah Susu Domba',
                'deskripsi' => 'Belajar cara memerah susu domba dengan teknik yang benar bersama pemandu kami.',
                'gambar' => 'images/memerahsusu.jpeg',
                'url' => '#'
            ],
            [
                'slug' => 'worksop-olah-daging-susu',
                'nama' => 'Workshop Olahan Daging dan Susu',
                'deskripsi' => 'Pahami proses pengolahan daging hewan ternak menjadi sebuah makanan yang nikmat.',
                'gambar' => 'images/olahdaging.jpg',
                'url' => '#'
            ],
            [
                'slug' => 'foto-bersama-hewan-ternak',
                'nama' => 'Foto bersama Hewan Ternak',
                'deskripsi' => 'Nikmati pemandangan asri Ternak Park dengan berfoto bersama hewan ternak.',
                'gambar' => 'images/fotbar.jpeg',
                'url' => '#'
            ],
            [
                'slug' => 'parade-domba',
                'nama' => 'Parade Domba',
                'deskripsi' => 'Parade dan kontes domba hias sebagai atraksi dan hiburan wisatawan.',
                'gambar' => 'images/dombahias.jpg',
                'url' => '#'
            ],
        ];

        $daftar_wahana = [
            [
                'slug' => 'atv-adventure',
                'nama' => 'ATV Adventure',
                'deskripsi' => 'Tantang adrenalin Anda dengan menjelajahi trek off-road kami menggunakan ATV.',
                'gambar' => 'images/atv.jpeg',
                'url' => '#'
            ],
            [
                'slug' => 'playground-anak',
                'nama' => 'Playground Anak',
                'deskripsi' => 'Wahana Playground khusus anak yang seru dan menarik.',
                'gambar' => 'images/playground.jpeg',
                'url' => '#'
            ],
            [
                'slug' => 'taman-kelinci',
                'nama' => 'Taman Kelinci',
                'deskripsi' => 'Area bermain khusus di mana anak-anak bisa berinteraksi dengan puluhan kelinci lucu.',
                'gambar' => 'images/kelinci.jpg',
                'url' => '#'
            ],
            [
                'slug' => 'glamping-area',
                'nama' => 'Glamping Area',
                'deskripsi' => 'Area berkemah dengan fasilitas mewah dan kenyamanan yang lebih tinggi daripada berkemah tradisional.',
                'gambar' => 'images/glamping.jpeg',
                'url' => '#'
            ],
            [
                'slug' => 'outbound-area',
                'nama' => 'Outbound Area',
                'deskripsi' => 'kegiatan yang dilakukan di luar ruangan, baik di alam terbuka maupun tertutup, dengan tujuan pengembangan diri dan pembelajaran melalui permainan, simulasi, diskusi, dan petualangan.',
                'gambar' => 'images/outbound.jpg',
                'url' => '#'
            ],
        ];

        $daftar_foto_galeri = [
            ['url' => 'images/kandang.jpg'],
            ['url' => 'images/berimakan.jpg'],
            ['url' => 'images/budidaya.jpeg'],
            ['url' => 'https://placehold.co/600x400/FF9800/FFFFFF?text=Foto+4'],
            ['url' => 'https://placehold.co/600x400/795548/FFFFFF?text=Foto+5'],
            ['url' => 'https://placehold.co/600x400/00BCD4/FFFFFF?text=Foto+6'],
            ['url' => 'https://placehold.co/600x400/FF9800/FFFFFF?text=Foto+7'],
            ['url' => 'https://placehold.co/600x400/795548/FFFFFF?text=Foto+8'],
            ['url' => 'https://placehold.co/600x400/00BCD4/FFFFFF?text=Foto+9'],
            ['url' => 'https://placehold.co/600x400/FF9800/FFFFFF?text=Foto+10'],
            ['url' => 'https://placehold.co/600x400/795548/FFFFFF?text=Foto+11'],
            ['url' => 'https://placehold.co/600x400/00BCD4/FFFFFF?text=Foto+12'],
            ['url' => 'https://placehold.co/600x400/FF9800/FFFFFF?text=Foto+13'],
            ['url' => 'https://placehold.co/600x400/795548/FFFFFF?text=Foto+14'],
            ['url' => 'https://placehold.co/600x400/00BCD4/FFFFFF?text=Foto+15'],
        ];

        return view('welcome', [
            'daftar_aktivitas' => $daftar_aktivitas,
            'daftar_wahana' => $daftar_wahana,
            'daftar_foto' => $daftar_foto_galeri
        ]);
    }

    public function about()
    {
        return view('about');
    }
};