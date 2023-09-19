<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/posts',PostController::class)->name('posts.index');
Route::get('/cars', CarController::class)->name('cars.index');
