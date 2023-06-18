<?php

use App\Http\Controllers\PostTranslationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
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

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}/edit', [PostController::class, 'edit']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
});

Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'store']);
    Route::get('/{id}/edit', [TagController::class, 'edit']);
    Route::put('/{id}', [TagController::class, 'update']);
    Route::delete('/{id}', [TagController::class, 'destroy']);
});

Route::prefix('post-translations')->group(function () {
    Route::post('/', [PostTranslationController::class, 'store']);
    Route::get('/{id}/edit', [PostTranslationController::class, 'edit']);
    Route::put('/{id}', [PostTranslationController::class, 'update']);
    Route::delete('/{id}', [PostTranslationController::class, 'destroy']);
});

Route::get('/search/', [SearchController::class, 'search']);
