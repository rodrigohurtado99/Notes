<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route; // faz referencia a classe routes para conseguimos utilizar, funcionalidades da mesma
use App\Http\Controllers\MainController;

// auths routes
Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);