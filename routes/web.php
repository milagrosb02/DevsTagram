<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;



Route::get('/', function () {
    return view('principal');
});

// Rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // este {post} es el id del post


Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store'); // este {post} es el id del post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');


// Like a las fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.like.store');

// Sacar el like a las fotos
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.like.destroy');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
