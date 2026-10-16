<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

// Dua route ini HARUS di atas apiResource('books')
Route::get('books/stats', [BookController::class, 'stats']);
Route::get('books/low-stock', [BookController::class, 'lowStock']);

Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'store', 'destroy']);