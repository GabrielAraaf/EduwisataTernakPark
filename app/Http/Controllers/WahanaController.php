<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WahanaController extends Controller
{
    /**
     * Menampilkan halaman detail untuk sebuah wahana.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $all_wahana = $this->_getWahanaData();
        
        // Cari wahana yang cocok berdasarkan slug
        $wahana = collect($all_wahana)->firstWhere('slug', $slug);

        // Jika wahana tidak ditemukan, tampilkan halaman 404
        if (!$wahana) {
            abort(404);
        }
        
        // Ambil 3 wahana lain secara acak untuk ditampilkan di bagian bawah
        $wahana_lainnya = collect($all_wahana)->where('slug', '!=', $slug)->shuffle()->take(4);

        return view('detail-wahana', [
            'wahana' => $wahana,
            'wahana_lainnya' => $wahana_lainnya,
        ]);
    }

    /**
     * Helper function untuk mensimulasikan data dari database.
     */
    private function _getWahanaData()
    {
        return [
            [
                'slug' => 'atv-adventure',
                'nama' => 'ATV Adventure',
                'gambar_utama' => '/images/atv.jpeg',
                'deskripsi_singkat' => 'Tantang adrenalin Anda dengan menjelajahi trek off-road kami menggunakan ATV.',
                'deskripsi_panjang' => 'Pacu adrenalin Anda di atas ATV (All-Terrain Vehicle) dan taklukkan trek menantang yang telah kami siapkan. Lintasan kami didesain melintasi area perbukitan dengan pemandangan alam yang indah. Cocok bagi Anda yang mencari petualangan seru dan sedikit tantangan. Perlengkapan keamanan seperti helm dan pelindung sudah kami sediakan.',
                'untuk_usia' => '17 tahun ke atas (atau dengan pendamping)',
                'durasi' => '2 putaran (sekitar 15 menit)',
                'tips' => 'Gunakan sepatu yang nyaman dan jangan takut kotor! Ikuti semua instruksi keselamatan dari pemandu.',
            ],
            [
                'slug' => 'playground-anak',
                'nama' => 'Playground Anak',
                'gambar_utama' => '/images/playground.jpeg',
                'deskripsi_singkat' => 'Wahana Playground khusus anak yang seru dan menarik.',
                'deskripsi_panjang' => 'Area bermain yang aman dan menyenangkan khusus untuk buah hati Anda. Dilengkapi dengan berbagai permainan seperti perosotan, ayunan, dan jungkat-jungkit, playground kami didesain untuk merangsang motorik dan imajinasi anak. Lantainya dilapisi bahan yang empuk untuk menjamin keamanan saat mereka bermain.',
                'untuk_usia' => '3 - 10 tahun',
                'durasi' => 'Tanpa batas waktu',
                'tips' => 'Selalu awasi anak Anda saat bermain. Area ini adalah zona bebas asap rokok.',
            ],
            [
                'slug' => 'taman-kelinci',
                'nama' => 'Taman Kelinci',
                'gambar_utama' => '/images/kelinci.jpg',
                'deskripsi_singkat' => 'Area bermain khusus di mana anak-anak bisa berinteraksi dengan puluhan kelinci lucu.',
                'deskripsi_panjang' => 'Masuki dunia dongeng di Taman Kelinci kami! Di sini, puluhan kelinci yang jinak dan lucu bebas berkeliaran. Pengunjung, terutama anak-anak, dapat masuk ke dalam taman, duduk, mengelus, dan memberi makan kelinci-kelinci ini secara langsung. Ini adalah cara yang bagus untuk mengajarkan empati dan interaksi dengan hewan.',
                'untuk_usia' => 'Semua usia',
                'durasi' => 'Tanpa batas waktu',
                'tips' => 'Duduklah dengan tenang dan biarkan kelinci mendekat dengan sendirinya. Hindari mengejar kelinci agar mereka tidak stres.',
            ],
            [
                'slug' => 'glamping-area',
                'nama' => 'Glamping Area',
                'gambar_utama' => '/images/glamping.jpeg',
                'deskripsi_singkat' => 'Area berkemah dengan fasilitas mewah dan kenyamanan lebih.',
                'deskripsi_panjang' => 'Ingin merasakan sensasi menginap di tengah alam tanpa meninggalkan kenyamanan? Coba area Glamping (Glamour Camping) kami. Tenda-tenda mewah kami dilengkapi dengan kasur yang nyaman, listrik, dan fasilitas modern lainnya. Nikmati malam di bawah bintang dengan suasana alam Wonosalam yang sejuk dan tenang.',
                'untuk_usia' => 'Semua usia (Reservasi diperlukan)',
                'durasi' => 'Per malam',
                'tips' => 'Pesan jauh-jauh hari, terutama untuk akhir pekan. Bawa jaket atau pakaian hangat karena udara malam bisa cukup dingin.',
            ],
            [
                'slug' => 'outbound-area',
                'nama' => 'Outbound Area',
                'gambar_utama' => '/images/outbound.jpg',
                'deskripsi_singkat' => 'Kegiatan pengembangan diri melalui permainan dan simulasi di alam terbuka.',
                'deskripsi_panjang' => 'Sangat cocok untuk acara gathering perusahaan, sekolah, atau komunitas. Area outbound kami dilengkapi dengan berbagai permainan team-building seperti flying fox, jembatan tali, dan permainan strategi lainnya. Didampingi oleh fasilitator berpengalaman, kegiatan ini bertujuan untuk membangun kerjasama, kepemimpinan, dan komunikasi.',
                'untuk_usia' => 'Semua Usia (Reservasi diperlukan)',
                'durasi' => 'Paket setengah hari atau sehari penuh',
                'tips' => 'Kenakan pakaian olahraga yang nyaman dan siap untuk beraktivitas fisik.',
            ],
        ];
    }
}
