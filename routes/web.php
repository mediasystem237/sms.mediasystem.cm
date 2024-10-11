<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsMarketingController;
use App\Http\Controllers\PaymentController;



Route::post('/pay', [PaymentController::class, 'initializePayment'])->name('pay');
Route::get('/callback', [PaymentController::class, 'verifyPayment'])->name('callback');
Route::get('/confirmation', [PaymentController::class, 'showConfirmation'])->name('confirmation.page');
Route::get('/download-invoice/{transaction}', [PaymentController::class, 'downloadInvoice'])->name('download.invoice');



// Mentions légales et autres pages légales
Route::view('/mentions-legales', 'pages.mentions-legales')->name('mentions-legales');
Route::view('/politique-confidentialite', 'pages.politique-confidentialite')->name('politique-confidentialite');
Route::view('/conditions-generales', 'pages.conditions-generales')->name('conditions-generales');

// Auth routes

Route::get('/', [SmsMarketingController::class, 'index'])->name('home');
