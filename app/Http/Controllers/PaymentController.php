<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function show($slug)
    {
        // Data ini seharusnya berasal dari Model, tapi untuk sekarang kita duplikasi
        $all_tickets_data = [
             [
                'slug' => 'anak-reguler', 'nama' => 'Tiket Masuk Reguler', 'tipe' => 'Anak-anak', 'harga_weekday_raw' => 10000, 'harga_weekend_raw' => 15000
            ],
            [
                'slug' => 'dewasa-reguler', 'nama' => 'Tiket Masuk Reguler', 'tipe' => 'Dewasa', 'harga_weekday_raw' => 20000, 'harga_weekend_raw' => 25000
            ],
            [
                'slug' => 'terusan-all-in', 'nama' => 'Tiket Terusan (All-in)', 'tipe' => 'Semua Usia', 'harga_weekday_raw' => 50000, 'harga_weekend_raw' => 60000
            ]
        ];

        $selected_ticket = collect($all_tickets_data)->firstWhere('slug', $slug);

        if (!$selected_ticket) {
            abort(404, 'Jenis tiket tidak ditemukan.');
        }

        return view('payment', ['tiket' => $selected_ticket]);
    }

    public function processPayment(Request $request)
    {
        // 1. Validasi data input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'ticket_slug' => 'required|string',
            'ticket_price' => 'required|numeric'
        ]);

        // 2. Kalkulasi Total
        $total_pembayaran = $validated['jumlah_tiket'] * $validated['ticket_price'];

        // 3. Buat Nomor Invoice Unik (simulasi)
        $invoice_number = 'TP-' . strtoupper(Str::random(8));

        $expirationTime = Carbon::now()->addMinutes(30)->timestamp;

        // 4. Siapkan detail pesanan untuk halaman instruksi
        $orderDetails = [
            'invoice' => $invoice_number,
            'nama_lengkap' => $validated['nama_lengkap'],
            'total_pembayaran_format' => 'Rp ' . number_format($total_pembayaran, 0, ',', '.'),
            'payment_method' => $validated['payment_method'],
            'expiration_timestamp' => $expirationTime,
        ];

        // 5. Simpan detail di session dan redirect ke halaman instruksi
        session()->flash('orderDetails', $orderDetails);

        return redirect()->route('payment.instruction', ['invoice' => $invoice_number]);
    }

    /**
     * Menampilkan halaman instruksi pembayaran.
     */
    public function instruction($invoice)
    {
        $details = session('orderDetails');

        // Jika pengguna langsung ke URL ini tanpa melalui proses, kembalikan ke home
        if (!$details || $details['invoice'] !== $invoice) {
            return redirect()->route('home');
        }

        return view('instruction', ['details' => $details]);
    }
}
