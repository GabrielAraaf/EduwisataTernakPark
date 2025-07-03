<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_telepon');
            $table->date('tanggal_kunjungan');
            $table->integer('jumlah_tiket');
            $table->integer('total_pembayaran');
            $table->string('payment_method');
            $table->string('ticket_slug');
            $table->string('snap_token')->nullable();
            $table->string('status')->default('pending'); // pending, paid, expired, etc
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
