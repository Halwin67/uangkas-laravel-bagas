<?php

use App\Http\Controllers\KasController;
use Illuminate\Support\Facades\Route;

Route::get('/kas', [KasController::class, 'index'])->name('kas.index'); 