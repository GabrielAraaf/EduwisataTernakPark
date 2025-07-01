<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap pesanan
            $table->string('invoice_number')->unique(); // Nomor Invoice, misal: TP-ABC123
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('ticket_type'); // Misal: "Tiket Terusan (All-in)"
            $table->integer('quantity');
            $table->bigInteger('total_price');
            $table->date('visit_date');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending'); // pending, success, failed
            $table->string('snap_token')->nullable(); // Token dari Midtrans
            $table->timestamps(); // Kapan pesanan dibuat/diupdate
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
