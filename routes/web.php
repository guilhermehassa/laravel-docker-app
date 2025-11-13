<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NetflixController;

Route::get('/', [NetflixController::class, 'index']);
Route::get('/pesquisa', [NetflixController::class, 'pesquisa'])->name('pesquisa');
