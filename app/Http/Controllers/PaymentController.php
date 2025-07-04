<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use App\Mail\TiketEmail;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function show($slug)
    {
        // Data tiket yang tersedia
        $all_tickets_data = [
            [
                'slug' => 'anak-reguler',
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Anak-anak',
                'harga_weekday_raw' => 1000,
                'harga_weekend_raw' => 15000
            ],
            [
                'slug' => 'dewasa-reguler',
                'nama' => 'Tiket Masuk Reguler',
                'tipe' => 'Dewasa',
                'harga_weekday_raw' => 20000,
                'harga_weekend_raw' => 25000
            ],
            [
                'slug' => 'terusan-all-in',
                'nama' => 'Tiket Terusan (All-in)',
                'tipe' => 'Semua Usia',
                'harga_weekday_raw' => 50000,
                'harga_weekend_raw' => 60000
            ]
        ];

        $selected_ticket = collect($all_tickets_data)->firstWhere('slug', $slug);

        if (!$selected_ticket) {
            abort(404, 'Jenis tiket tidak ditemukan.');
        }

        return view('payment', ['tiket' => $selected_ticket]);
    }

    public function store(Request $request)
    {
        // Validasi input dari form pembayaran
        $validated = $this->validateTransaction($request);

        $transaction = $this->createTransaction($validated);

        return redirect()->route('payment.instruction', ['invoice' => $transaction->invoice]);
    }

    public function getSnapToken($invoice)
    {
        // Validasi invoice
        $transaction = Transaction::where('invoice', $invoice)->firstOrFail();

        $snapToken = $this->generateSnapToken($transaction);

        $transaction->snap_token = $snapToken;
        $transaction->save();

        return response()->json(['snap_token' => $snapToken]);
    }

    public function processPayment(Request $request)
    {
        // Validasi input dari form pembayaran
        $validated = $this->validateTransaction($request);
        $transaction = $this->createTransaction($validated);

        $snapToken = $this->generateSnapToken($transaction);

        $transaction->snap_token = $snapToken;
        $transaction->save();

        $expirationTime = Carbon::now()->addMinutes(30)->timestamp;

        $orderDetails = [
            'invoice'                  => $transaction->invoice,
            'nama_lengkap'             => $transaction->nama_lengkap,
            'total_pembayaran_format'  => 'Rp ' . number_format($transaction->total_pembayaran, 0, ',', '.'),
            'snap_token'               => $snapToken,
            'expiration_timestamp'     => $expirationTime,
        ];

        session()->flash('orderDetails', $orderDetails);

        return redirect()->route('payment.instruction', ['invoice' => $transaction->invoice]);
    }

    public function instruction($invoice)
    {
        // Validasi invoice
        $transaction = Transaction::where('invoice', $invoice)->first();
        // Jika transaksi tidak ditemukan, redirect ke halaman utama
        if (!$transaction) {
            return redirect()->route('home');
        }
        // Ambil detail order dari session atau buat array kosong jika tidak ada
        $orderDetails = session('orderDetails') ?? [];
        $orderDetails['snap_token'] = $transaction->snap_token;

        return view('instruction', ['details' => $orderDetails]);
    }

    public function retry($invoice)
    {
        // Validasi invoice
        $transaction = Transaction::where('invoice', $invoice)->firstOrFail();
        // Cek apakah transaksi sudah dibayar
        $transaction->update(['status' => 'canceled']);

        // Redirect ke halaman pembayaran dengan pesan
        return redirect()
            ->route('payment.show', ['slug' => $transaction->ticket_slug])
            ->with('message', 'Silakan pilih metode pembayaran ulang.');
    }

    public function handleNotification(Request $request)
    {
        $this->configureMidtrans();

        $notification = new \Midtrans\Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        $transaction = Transaction::where('invoice', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found.'], 404);
        }

        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            if ($transaction->status !== 'paid') {
                $transaction->update(['status' => 'paid']);
                Mail::to($transaction->email)->send(new TiketEmail($transaction));
            }
        } elseif ($transactionStatus === 'pending') {
            $transaction->update(['status' => 'pending']);
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $transaction->update(['status' => 'failed']);
        }

        return response()->json(['message' => 'Notification processed.'], 200);
    }



    // ---------------- FUNCTION TAMBAHAN UNTUK HINDARI DUPLIKASI ---------------- //

    private function validateTransaction(Request $request)
    {
        // Validasi input dari form pembayaran
        return $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'email'             => 'required|email',
            'no_telepon'        => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_tiket'      => 'required|integer|min:1',
            'ticket_slug'       => 'required|string',
            'ticket_price'      => 'required|numeric'
        ]);
    }

    private function createTransaction($validated)
    {
        $total_pembayaran = $validated['jumlah_tiket'] * $validated['ticket_price'];
        $invoice_number   = 'TP-' . strtoupper(Str::random(8));

        $transaction = new Transaction();
        $transaction->invoice = $invoice_number;
        $transaction->nama_lengkap = $validated['nama_lengkap'];
        $transaction->email = $validated['email'];
        $transaction->no_telepon = $validated['no_telepon'];
        $transaction->tanggal_kunjungan = $validated['tanggal_kunjungan'];
        $transaction->jumlah_tiket = $validated['jumlah_tiket'];
        $transaction->total_pembayaran = $total_pembayaran;
        $transaction->ticket_slug = $validated['ticket_slug'];
        $transaction->status = 'pending';
        $transaction->save();

        return $transaction;
    }

    private function configureMidtrans()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }

    private function generateSnapToken(Transaction $transaction)
    {
        $this->configureMidtrans();

        $params = [
            'transaction_details' => [
                'order_id'     => $transaction->invoice,
                'gross_amount' => $transaction->total_pembayaran,
            ],
            'item_details' => [
                [
                    'id'       => $transaction->ticket_slug,
                    'price'    => $transaction->total_pembayaran / $transaction->jumlah_tiket,
                    'quantity' => $transaction->jumlah_tiket,
                    'name'     => 'Tiket ' . ucfirst(str_replace('-', ' ', $transaction->ticket_slug)) .
                        ' - Tgl Kunjungan: ' . date('d/m/Y', strtotime($transaction->tanggal_kunjungan)),
                ]
            ],
            'customer_details' => [
                'first_name' => $transaction->nama_lengkap,
                'email'      => $transaction->email,
                'phone'      => $transaction->no_telepon,
            ],
        ];

        return \Midtrans\Snap::getSnapToken($params);
    }
}
