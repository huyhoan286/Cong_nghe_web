<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts', PostController::class . '@store')->name('posts.store');



Route::get('/posts/{post}/edit', PostController::class . '@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', PostController::class . '@destroy')->name('posts.destroy');