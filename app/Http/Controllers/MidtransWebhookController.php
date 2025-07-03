<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        $notification = new \Midtrans\Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        $transaction = Transaction::where('invoice', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        switch ($transactionStatus) {
            case 'settlement':
            case 'capture':
                $transaction->status = 'paid';
                break;

            case 'cancel':
            case 'expire':
            case 'failure':
                $transaction->status = 'canceled';
                break;

            default:
                // Status lain bisa ditangani sesuai kebutuhan
                break;
        }

        $transaction->save();

        return response()->json(['message' => 'Notifikasi diproses'], 200);
    }
}
