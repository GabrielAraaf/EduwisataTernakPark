<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan halaman pembayaran berdasarkan tiket yang dipilih.
     */
    public function show($slug)
    {
        // Data ini seharusnya berasal dari Model, tapi untuk sekarang kita duplikasi dari TiketController
        $all_tickets_data = [
             [
                'slug' => 'anak-reguler', 'nama' => 'Tiket Masuk Reguler', 'tipe' => 'Anak-anak', 'harga_raw' => 10000
            ],
            [
                'slug' => 'dewasa-reguler', 'nama' => 'Tiket Masuk Reguler', 'tipe' => 'Dewasa', 'harga_raw' => 20000,
            ],
            [
                'slug' => 'terusan-all-in', 'nama' => 'Tiket Terusan (All-in)', 'tipe' => 'Semua Usia', 'harga_raw' => 50000, 'is_rekomendasi' => true
            ]
        ];

        // Cari tiket yang cocok berdasarkan slug
        $selected_ticket = collect($all_tickets_data)->firstWhere('slug', $slug);

        // Jika tidak ditemukan, arahkan ke halaman 404
        if (!$selected_ticket) {
            abort(404, 'Jenis tiket tidak ditemukan.');
        }

        return view('payment', ['tiket' => $selected_ticket]);
    }
}
