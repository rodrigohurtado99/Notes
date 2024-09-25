<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route; // faz referencia a classe routes para conseguimos utilizar, funcionalidades da mesma
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

/* o middleware abaixo checa se o usuário possui sessão aberta, mas será feito um bloqueio
para não permitir que ele possa acessar a página de login da aplicação */

Route::middleware([CheckIsNotLogged::class])->group(function(){
    // auths routes , OBS: as duas rotas abaixo só aparecerão para o usuário que não está logado
    Route::get('/login', [AuthController::class, 'login']);
    // rota para validar login
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});


/* todas as rotas que estão na função abaixo dentro do middleware, serão feito a verificação 
se tem login ao acessar elas, sendo feito a não repetição de códigos pra checar se em cada uma 
a sessão login está ativa */

Route::middleware([CheckIsLogged::class])->group(function(){
    // rota home do site ao ser feito login ira direcionar para ela
    Route::get('/', [MainController::class, 'index'])->name('home');
    // rota que encaminha para a nova nota a ser criada
    Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
    // faz o logout da aplicação
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});


