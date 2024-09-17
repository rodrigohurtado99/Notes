<?php

use Illuminate\Support\Facades\Route; // faz referencia a classe routes para conseguimos utilizar, funcionalidades da mesma
use App\Http\Controllers\MainController;

// rota que nos retorna a view welcome

Route::get('/', function () {
    return view('welcome');
});

// na rota about, da um echo no texto citado
Route::get('/about', function(){
    echo 'About us';
});

// passa a rota main e executa a função dentro do controller
Route::get('/main/{value}', [MainController::class, 'index']);
Route::get('/page2/{value}', [MainController::class, 'page2']);
Route::get('/page3/{value}', [MainController::class, 'page3']);