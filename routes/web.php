<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::post('posts/komentar', [PostsController::class, 'komentar']);
Route::post('blog/komentar', [HomeController::class, 'komentar']);
Route::resource('category', CategoryController::class);
Route::get('posts/hapus', [PostsController::class, 'tampil_hapus']);
Route::get('posts/restore/{id}', [PostsController::class, 'restore']);
Route::delete('posts/kill/{id}', [PostsController::class, 'kill']);
Route::delete('komentar/clean/{id}', [PostsController::class, 'clean']);
Route::delete('komentar/clean/{id}', [HomeController::class, 'clean']);
Route::get('artikel', [HomeController::class, 'artikel']);
Route::get('klien_detail', [HomeController::class, 'detail1']);
Route::get('kategori', [HomeController::class, 'kategori']);
Route::resource('posts', PostsController::class);
Route::resource('users', UserController::class);
Route::resource('home', HomeController::class);
Route::get('admin', [HomeController::class, 'index_a'])->name('admin');
Route::get('client2', [HomeController::class, 'client'])->name('client');
Route::get('klien', [HomeController::class, 'tampil_blog'])->name('client');
Route::get('detail/{slug}', [HomeController::class, 'detail'])->name('detail');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


