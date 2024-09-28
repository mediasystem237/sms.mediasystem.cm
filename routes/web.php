<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsMarketingController; // Ajoutez cette ligne

Route::get('/', [SmsMarketingController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
