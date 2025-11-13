<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NetflixController;

Route::get('/', [NetflixController::class, 'index']);
Route::get('/pesquisa', [NetflixController::class, 'pesquisa'])->name('pesquisa');
Route::get('/filme/{id}', [NetflixController::class, 'show'])->name('filme.show');
