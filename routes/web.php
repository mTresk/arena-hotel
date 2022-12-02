<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room');


Route::post('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
