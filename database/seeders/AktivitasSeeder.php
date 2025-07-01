<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikasi saat seeding ulang
        DB::table('aktivitas')->truncate();

        DB::table('aktivitas')->insert([
            [
                'slug' => 'memberi-makan-ternak',
                'nama' => 'Memberi Makan Ternak',
                'gambar' => '/images/berimakan.jpg', // Path untuk gambar di slider
                'deskripsi_singkat' => 'Rasakan pengalaman memberi makan domba, kelinci, dan sapi secara langsung.',
                'deskripsi_panjang' => 'Aktivitas memberi makan ternak adalah salah satu favorit pengunjung kami, terutama anak-anak. Anda akan diberikan pakan khusus yang aman dan bergizi. Di bawah pengawasan pemandu kami, Anda dapat berinteraksi langsung, mengelus, dan memberi makan hewan-hewan jinak seperti domba Merino yang lucu, kelinci yang menggemaskan, dan sapi perah yang ramah. Ini adalah kesempatan emas untuk mengajarkan anak tentang kasih sayang terhadap binatang.',
                'jadwal' => 'Setiap hari, 09:00 - 16:00 WIB',
                'durasi' => 'Sekitar 15-20 menit',
                'tips' => 'Pegang pakan dengan telapak tangan terbuka agar tidak tergigit secara tidak sengaja. Selalu cuci tangan setelah berinteraksi dengan hewan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'memerah-susu-domba',
                'nama' => 'Memerah Susu Domba',
                'gambar' => '/images/memerahsusu.jpeg',
                'deskripsi_singkat' => 'Belajar cara memerah susu domba dengan teknik yang benar bersama pemandu kami.',
                'deskripsi_panjang' => 'Ingin tahu dari mana datangnya susu segar? Ikuti sesi edukatif memerah susu domba kami! Pemandu ahli akan mendemonstrasikan cara membersihkan ambing, teknik memerah yang efisien dan higienis, hingga cara menyimpan susu agar tetap segar. Pengunjung yang berani juga diperbolehkan untuk mencoba langsung dengan bimbingan penuh. Ini adalah pengalaman otentik yang tidak akan Anda temukan di tempat lain.',
                'jadwal' => 'Sesi khusus: 10:00 & 14:00 WIB',
                'durasi' => 'Sekitar 30 menit',
                'tips' => 'Dengarkan arahan pemandu dengan saksama. Jangan membuat gerakan tiba-tiba agar domba tidak kaget.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'worksop-olah-daging-susu',
                'nama' => 'Workshop Olahan Daging dan Susu',
                'gambar' => '/images/olahdaging.jpg',
                'deskripsi_singkat' => 'Pahami proses pengolahan daging hewan ternak menjadi sebuah makanan yang nikmat.',
                'deskripsi_panjang' => 'Dalam workshop eksklusif ini, Anda akan belajar dari chef kami cara mengolah daging dan susu segar dari peternakan menjadi hidangan lezat seperti sosis, bakso, dan es krim homemade. Pelajari teknik-teknik dasar, pemilihan bahan, hingga penyajian akhir. Sangat cocok untuk Anda yang hobi memasak!',
                'jadwal' => 'Setiap Sabtu & Minggu, 11:00 WIB',
                'durasi' => 'Sekitar 60 menit',
                'tips' => 'Daftarkan diri Anda terlebih dahulu karena tempat terbatas. Datang dengan perut kosong!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'foto-bersama-hewan-ternak',
                'nama' => 'Foto bersama Hewan Ternak',
                'gambar' => '/images/fotbar.jpeg',
                'deskripsi_singkat' => 'Nikmati pemandangan asri Ternak Park dengan berfoto bersama hewan ternak.',
                'deskripsi_panjang' => 'Abadikan momen ceria Anda di Ternak Park! Kami memiliki banyak spot foto instagramable dengan latar belakang alam Wonosalam yang indah. Anda juga bisa berfoto dari dekat bersama hewan-hewan kami yang paling fotogenik. Pemandu kami akan dengan senang hati membantu mengambilkan foto terbaik untuk Anda dan keluarga.',
                'jadwal' => 'Setiap hari, selama jam operasional',
                'durasi' => 'Fleksibel',
                'tips' => 'Gunakan mode portrait pada kamera Anda untuk hasil terbaik. Jangan gunakan flash agar hewan tidak kaget.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'parade-domba',
                'nama' => 'Parade Domba',
                'gambar' => '/images/dombahias.jpg',
                'deskripsi_singkat' => 'Parade dan kontes domba hias sebagai atraksi dan hiburan wisatawan.',
                'deskripsi_panjang' => 'Saksikan atraksi utama kami, Parade Domba Hias! Domba-domba terbaik dari peternakan kami akan berjalan di catwalk dengan kostum-kostum unik dan lucu. Ini adalah pertunjukan yang menghibur dan mengedukasi tentang berbagai jenis domba. Jangan lewatkan kesempatan untuk memilih domba favorit Anda!',
                'jadwal' => 'Hanya di hari Minggu & Libur Nasional, 15:00 WIB',
                'durasi' => 'Sekitar 25 menit',
                'tips' => 'Datang lebih awal ke area panggung untuk mendapatkan tempat duduk terbaik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
