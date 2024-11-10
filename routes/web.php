<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'crear'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
