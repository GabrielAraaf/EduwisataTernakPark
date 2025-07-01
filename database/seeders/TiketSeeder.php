<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tikets')->truncate();

        DB::table('tikets')->insert([
            [
                'slug' => 'anak-reguler',
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Anak-anak (3-12 Tahun)',
                'harga_weekday' => 10000,
                'harga_weekend' => 15000,
                'fasilitas' => json_encode([ // Simpan sebagai JSON
                    'Akses ke semua area peternakan',
                    'Interaksi dengan hewan',
                    'Spot foto menarik'
                ]),
                'is_rekomendasi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'dewasa-reguler',
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Dewasa',
                'harga_weekday' => 20000,
                'harga_weekend' => 25000,
                'fasilitas' => json_encode([
                    'Akses ke semua area peternakan',
                    'Interaksi dengan hewan',
                    'Spot foto menarik'
                ]),
                'is_rekomendasi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'terusan-all-in',
                'nama' => 'Tiket Terusan (All-in)',
                'tipe' => 'Semua Usia',
                'harga_weekday' => 50000,
                'harga_weekend' => 60000,
                'fasilitas' => json_encode([
                    'Semua fasilitas Tiket Reguler',
                    'Voucher susu domba',
                    'Gratis 1x naik ATV',
                    'Gratis 1x sesi memberi makan hewan'
                ]),
                'is_rekomendasi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
