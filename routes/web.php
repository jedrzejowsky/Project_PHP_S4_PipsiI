<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

//define a route that will be executed when no other route matches the incoming request
Route::fallback(function () {
    return view('pages.fallback');
});

Route::get('/authors', function () {
    return view('pages/authors');
})->name('authors');
// tworzy routy do wszystkich funkcji w kontrolerze
Route::resource('posts',\App\Http\Controllers\PostController::class);


