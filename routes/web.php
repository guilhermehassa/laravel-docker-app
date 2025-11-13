<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NetflixController;

// Rota principal
Route::get('/', [NetflixController::class, 'index']);

// API endpoints para funcionalidades AJAX
Route::get('/api/search', [NetflixController::class, 'search']);
Route::get('/api/movie/{id}', [NetflixController::class, 'movieDetails']);
