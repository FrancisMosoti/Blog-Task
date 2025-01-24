<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [PostController::class, 'store'])->name('create.post');
Route::get('/posts', [PostController::class, 'index'])->name('show.post');
Route::post('/comments', [CommentController::class, 'store'])->name('add.comment');