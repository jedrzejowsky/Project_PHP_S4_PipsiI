<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [PostController::class, 'index'])->name('home');

//define a route that will be executed when no other route matches the incoming request
Route::fallback(function () {
    return view('pages.fallback');
});

Route::get('/authors', function () {
    return view('pages/authors');
})->name('authors');

// tworzy routy do wszystkich funkcji w kontrolerze
//Route::resource('posts',\App\Http\Controllers\PostController::class);

//przechodzenie na strone postu
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts/single');

Auth::routes();

//rejestracja
Auth::routes(['register' => false]);
Route::get('/account/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/account/register', [RegisterController::class, 'register']);
Auth::routes(['login' => false]);
//logowanie
Route::get('/account/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/account/login', [LoginController::class, 'login']);
Route::post('/account/login', [LoginController::class, 'login']);
Route::post('/account/logout', [LoginController::class, 'logout'])->name('logout');
