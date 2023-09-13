<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    /*$image = \App\Models\Image::find(1);
    $post = \App\Models\Post::find(1);
    $post->images()->attach($image, ['is_favorite' => true]);
    dd($image->posts->first()->pivot->is_favorite);
    dd($post->images->first()->pivot->is_favorite);*/

    return view('welcome');
});
