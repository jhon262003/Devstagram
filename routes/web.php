<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'crear'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->middleware('is_admin')->name('post.index');
/* Se le cambio la ruta de /muro por el /{user:username}, para hacerlo mas semejante a un red social
    que por medio de nick o usuario de una persona aparesca su propio perfil con sus datos; el cambio se
    realiza tanto aqui en web.php como en su vista de llegada el deshboard.php
*/

Route::get('/posts/create', [PostController::class, 'create'])->middleware('is_admin')->name('post.create');