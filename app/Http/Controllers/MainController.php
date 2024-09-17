<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($value) { // a função recolherá o parametro http que foi passado no route
        return view('main', ['value'=>$value]); // e ira retornar na view main, com o metodo data, que é um array, o primeiro valor é a variavel e o segundo é o que essa variavel irá receber
    }

    public function page2($value){
        return view('page2', ['value'=>$value]);
    }

    public function page3($value){
        return view('page3', ['value'=>$value]);
    }
}
