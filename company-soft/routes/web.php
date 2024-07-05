<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/forgot', [UserController::class, 'forgot']);
Route::get('/reset', [UserController::class, 'reset']);
Route::post('/saveuser', [UserController::class, 'saveUser'])->name('auth.saveuser');