<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/policy', [PolicyController::class, 'index'])->name('policy');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room.show');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('service.show');


Route::post('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
Route::post('/callback', [CallbackController::class, 'callback'])->name('callback');
