<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'crear'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/muro', [PostController::class, 'index'])->name('post.index');
