<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket; // Import Model

class TiketController extends Controller
{
    /**
     * Menampilkan halaman daftar harga tiket.
     */
    public function index()
    {
        // Ambil semua data dari tabel 'tikets', urutkan berdasarkan rekomendasi
        $daftar_tiket = Tiket::orderBy('is_rekomendasi', 'desc')->get();

        return view('tiket', ['daftar_tiket' => $daftar_tiket]);
    }
}
