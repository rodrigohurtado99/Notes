<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() 
    {
        // load user's note
        $id = session('user.id'); // qual o id do usuário logado
        //$user = User::find($id)->toArray();// busca no no model user o id que é igual ao que foi passado(sessão) e trás as informações em um array associativo        
        
        $notes = User::find($id)->notes()->get()->toArray();  // busca as notas do usuário pelo id de notas da um get, e trás num array

        

        // show home view
        return view('home', ['notes' => $notes]); // vai passar as notas que foram trazidas do banco de dados para nossa view
    }

    public function newNote() 
    {
        echo "I'm creating a new note";
    }
}