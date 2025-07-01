<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wahana; // Import Model

class WahanaController extends Controller
{
    /**
     * Menampilkan halaman detail untuk sebuah wahana.
     */
    public function show($slug)
    {
        // Cari wahana di database yang slug-nya cocok.
        $wahana = Wahana::where('slug', $slug)->firstOrFail();

        // Ambil 4 wahana lain secara acak.
        $wahana_lainnya = Wahana::where('slug', '!=', $slug)
                                ->inRandomOrder()
                                ->take(4)
                                ->get();

        return view('detail-wahana', [
            'wahana' => $wahana,
            'wahana_lainnya' => $wahana_lainnya,
        ]);
    }
}