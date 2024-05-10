<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::put('/posts/{post}/show',[PostController::class, 'update'])->name('posts.update');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
