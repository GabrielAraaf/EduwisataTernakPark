<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Aktivitas;

class AktivitasController extends Controller
{
    /**
     * Menampilkan halaman detail untuk sebuah aktivitas.
     */
    public function show($slug)
    {
        // Cari aktivitas di database yang slug-nya cocok.
        // firstOrFail() akan otomatis menampilkan halaman 404 jika tidak ditemukan.
        $aktivitas = Aktivitas::where('slug', $slug)->firstOrFail();

        // Ambil 4 aktivitas lain secara acak, kecuali yang sedang ditampilkan.
        $aktivitas_lainnya = Aktivitas::where('slug', '!=', $slug)
                                      ->inRandomOrder()
                                      ->take(4)
                                      ->get();

        return view('detail-aktivitas', [
            'aktivitas' => $aktivitas,
            'aktivitas_lainnya' => $aktivitas_lainnya,
        ]);
    }
}
