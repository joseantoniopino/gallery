<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('/posts',PostController::class)->name('posts.index');
Route::get('/cars', CarController::class)->name('cars.index');
Route::get('/authors', AuthorController::class)->name('authors.index');
Route::get('/locations', LocationController::class)->name('locations.index');
