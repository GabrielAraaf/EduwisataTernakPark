<?php

namespace App\Http\Controllers;

// Import Model yang akan digunakan
use App\Models\Aktivitas;
use App\Models\Wahana;
// Asumsi Anda memiliki Model Galeri, jika tidak, kita bisa buat nanti
// use App\Models\Galeri; 

use Illuminate\Http\Request;

// Nama class Anda adalah EduwisataController, kita sesuaikan
class EduwisataController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data dari database.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'aktivitas' melalui Model Aktivitas
        $daftar_aktivitas = Aktivitas::all();

        // Ambil semua data dari tabel 'wahanas' melalui Model Wahana
        $daftar_wahana = Wahana::all();

        // Untuk galeri, kita ambil beberapa foto secara acak.
        // Ini masih menggunakan array dummy, bisa diganti dengan Model Galeri nanti.
        $daftar_foto_galeri = [
            ['url' => asset('images/kandang.jpg'), 'alt' => 'Suasana Kandang Ternak Park'],
            ['url' => asset('images/berimakan.jpg'), 'alt' => 'Memberi Makan Ternak'],
            ['url' => asset('images/budidaya.jpeg'), 'alt' => 'Budidaya Tanaman'],
            ['url' => asset('images/atv.jpeg'), 'alt' => 'Wahana ATV'],
            ['url' => asset('images/playground.jpeg'), 'alt' => 'Playground Anak'],
            ['url' => asset('images/kelinci.jpg'), 'alt' => 'Taman Kelinci'],
        ];

        // Kirim data yang sudah diambil dari database ke view
        return view('welcome', [
            'daftar_aktivitas' => $daftar_aktivitas,
            'daftar_wahana' => $daftar_wahana,
            'daftar_foto' => $daftar_foto_galeri
        ]);
    }

    /**
     * Menampilkan halaman "About Us".
     */
    public function about()
    {
        return view('about');
    }
}
