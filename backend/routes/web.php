<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('post', PostController::class);
    Route::get('/search', [App\Http\Controllers\PostController::class, 'search'])->name('post.search');

    Route::get('/en_cours', [App\Http\Controllers\PostController::class, 'in_progress'])->name('post.in-progress');

    Route::get('/terminé', [App\Http\Controllers\PostController::class, 'completed'])->name('post.completed');

    Route::get('/A voir', [App\Http\Controllers\PostController::class, 'to_see'])->name('post.to-see');

    Route::get('/profile', [App\Http\Controllers\PostController::class, 'profile'])->name('post.profile');
});
