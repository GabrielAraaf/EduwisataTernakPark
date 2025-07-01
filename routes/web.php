<?php

use Illuminate\Support\Facades\Route;
// Import controller kita
use App\Http\Controllers\EduwisataController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\PaymentController;

// Rute untuk Halaman Utama (Homepage)
Route::get('/', [EduwisataController::class, 'index'])->name('home');

// Rute untuk Halaman Tentang Kami
Route::get('/about', [EduwisataController::class, 'about'])->name('about');

// Rute untuk halaman tiket (BARU)
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');

// Rute untuk halaman detail aktivitas (BARU)
// {slug} adalah parameter dinamis
Route::get('/aktivitas/{slug}', [AktivitasController::class, 'show'])->name('aktivitas.detail');

// Rute untuk halaman detail wahana (BARU)
Route::get('/wahana/{slug}', [WahanaController::class, 'show'])->name('wahana.detail');

// Rute untuk halaman pembayaran (BARU)
Route::get('/pesan/{slug}', [PaymentController::class, 'show'])->name('payment.show');

// Rute untuk MEMPROSES data dari form (BARU)
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Rute untuk menampilkan halaman INSTRUKSI pembayaran (BARU)
Route::get('/instruction/{invoice}', [PaymentController::class, 'instruction'])->name('payment.instruction');