<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('post/search/{title}', [PostController::class, 'search']);

    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::patch('/post/{id}', [PostController::class, 'update']);

    Route::resource('posts', PostController::class);

    Route::get('/post/{id}', [PostController::class, 'show']);

    Route::get('/post/edit/{id}', [PostController::class, 'show']);



Route::get('/en_cours', [App\Http\Controllers\PostController::class, 'in_progress'])->name('post.in-progress');

Route::get('/terminé', [App\Http\Controllers\PostController::class, 'completed'])->name('post.completed');

Route::get('/A voir', [App\Http\Controllers\PostController::class, 'to_see'])->name('post.to-see');

Route::get('/profile', [App\Http\Controllers\PostController::class, 'profile'])->name('post.profile');
