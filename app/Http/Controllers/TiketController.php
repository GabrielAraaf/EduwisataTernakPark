<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $daftar_tiket = [
            [
                'slug' => 'anak-reguler', // ID untuk URL
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Anak-anak (3-12 Tahun)',
                'harga_weekday' => 'Rp 10.000',
                'harga_weekend' => 'Rp 15.000',
                'harga_raw' => 10000, // Harga mentah untuk kalkulasi (ambil harga weekday sebagai default)
                'fasilitas' => [
                    'Akses ke semua area peternakan',
                    'Interaksi dengan hewan',
                    'Spot foto menarik'
                ],
                'is_rekomendasi' => false,
            ],
            [
                'slug' => 'dewasa-reguler',
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Dewasa',
                'harga_weekday' => 'Rp 20.000',
                'harga_weekend' => 'Rp 25.000',
                'harga_raw' => 20000,
                'fasilitas' => [
                    'Akses ke semua area peternakan',
                    'Interaksi dengan hewan',
                    'Spot foto menarik'
                ],
                'is_rekomendasi' => false,
            ],
            [
                'slug' => 'terusan-all-in',
                'nama' => 'Tiket Terusan (All-in)',
                'tipe' => 'Semua Usia',
                'harga_weekday' => 'Rp 50.000',
                'harga_weekend' => 'Rp 60.000',
                'harga_raw' => 50000,
                'fasilitas' => [
                    'Semua fasilitas Tiket Reguler',
                    'Voucher susu domba',
                    'Gratis 1x naik ATV',
                    'Gratis 1x sesi memberi makan hewan'
                ],
                'is_rekomendasi' => true,
            ]
        ];

        return view('tiket', ['daftar_tiket' => $daftar_tiket]);
    }
}
