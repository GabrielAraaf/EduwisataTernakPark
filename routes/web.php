<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EduwisataController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\PaymentController;

// Halaman utama
Route::get('/', [EduwisataController::class, 'index'])->name('home');
Route::get('/about', [EduwisataController::class, 'about'])->name('about');
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
Route::get('/aktivitas/{slug}', [AktivitasController::class, 'show'])->name('aktivitas.detail');
Route::get('/wahana/{slug}', [WahanaController::class, 'show'])->name('wahana.detail');

// Pembayaran
Route::get('/pesan/{slug}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/instruction/{invoice}', [PaymentController::class, 'instruction'])->name('payment.instruction');
Route::get('/payment/retry/{invoice}', [PaymentController::class, 'retry'])->name('payment.retry');
Route::get('/payment/snap-token/{invoice}', [PaymentController::class, 'getSnapToken'])->name('payment.getSnapToken');

// Webhook Midtrans
Route::post('/payment/notification', [PaymentController::class, 'handleNotification']);
