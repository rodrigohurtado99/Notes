<?php

use Illuminate\Support\Facades\Route; // faz referencia a classe routes para conseguimos utilizar, funcionalidades da mesma

// rota que nos retorna a view welcome

Route::get('/', function () {
    return view('welcome');
});

// na rota about, da um echo no texto citado
Route::get('/about', function(){
    echo 'About us';
});