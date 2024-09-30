<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    // edit note function

    public function editNote($id) 
    {   

        $id = $this->decryptId($id); // usa o metodo privado que foi passado para poder pegar o id

        echo "I'm editing note with id = $id";


    }
    public function deleteNote($id) 
    {   

        $id = $this->decryptId($id); // usa o metodo privado que foi passado para poder pegar o id

        echo "I'm deleting note with id = $id";

    }

    // metodo disponivel para qualquer área do controlador, função sera utilizada nas funções acima 
    // para ao inves de verificarmos duas vezes as mesmas.

    private function decryptId($id)
    {
        // no bloco try vai tentar descriptografar o id, se não for possivel redireciona para o home

        try {

            $id = Crypt::decrypt($id); // vai descriptografar o id passado por url

        } catch (DecryptException $e) {
            
            return redirect()->route('home');

        }

        return $id;
    }

}