<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'invoice',
        'nama_lengkap',
        'email',
        'no_telepon',
        'tanggal_kunjungan',
        'jumlah_tiket',
        'total_pembayaran',
        'payment_method',
        'ticket_slug',
        'snap_token',
        'status', // Sudah ditambahkan agar bisa mass assignment
    ];

    /**
     * Optional: Cast tanggal_kunjungan ke tipe date (kalau perlu)
     */
    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];
}
