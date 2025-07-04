<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TiketEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function build()
    {
        return $this->subject('E-Tiket Anda - Invoice ' . $this->transaction->invoice)
                    ->markdown('emails.tiket')
                    ->with([
                        'transaction' => $this->transaction
                    ]);
    }
}
