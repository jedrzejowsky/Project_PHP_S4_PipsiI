<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PostCommentsController;
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
//Route::fallback(function () {
//    return view('pages.fallback');
//});

Route::get('/authors', function () {
    return view('pages/authors');
})->name('authors');

// tworzy routy do wszystkich funkcji w kontrolerze
//Route::resource('posts',\App\Http\Controllers\PostController::class);

//przechodzenie na strone postu
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts/single');

Auth::routes(['verify' => true]);

//rejestracja
Auth::routes(['register' => false]);
Route::get('/account/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/account/register', [RegisterController::class, 'register']);
Auth::routes(['login' => false]);
//logowanie
Route::get('/account/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/account/login', [LoginController::class, 'login']);

Route::post('/account/logout', [LoginController::class, 'logout'])->name('logout');

//resetowanie hasła
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//weryfikacja konta
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

//przekierowanie do homepage'a
Route::get('/logout', function(){
    return redirect()->route('home');
});
Route::get('/account/logout', function(){
    return redirect()->route('home');
});

//tworzenie postów
Route::get('/admin/post/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/post/create', [\App\Http\Controllers\Admin\PostController::class, 'store']);
//edycja postów
Route::get('/admin/post/{id}', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
Route::put('/admin/post/{id}', [\App\Http\Controllers\Admin\PostController::class, 'update']);
//usuwanie postów
Route::delete('/admin/post/{id}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.post.delete');

//komentarze
Route::post('/post/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::delete('/post/{post:slug}/comments', [PostCommentsController::class, 'destroy'])->name('comment.delete');
Route::get('/post/{post:slug}/comments', [PostCommentsController::class, 'edit'])->name('comment.edit');
Route::put('/post/{post:slug}/comments', [PostCommentsController::class, 'update']);

//użytkownicy
Route::middleware('can:admin')->group(function() {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
});
//Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.user');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
Route::post('/admin/users/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/users/{id}', [UserController::class, 'update']);
