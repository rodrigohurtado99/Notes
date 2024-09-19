<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route; // faz referencia a classe routes para conseguimos utilizar, funcionalidades da mesma

// auths routes
Route::get('/login', [AuthController::class, 'login']);
// rota para validar login
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
Route::get('/logout', [AuthController::class, 'logout']);

