<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
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

        // show new note view
        return view('new_note');
        
    }

    // submit the formulary
    public function newNoteSubmit(Request $request)
    {
        // validade request
        $request->validate( // vai validar as regras do formulário conforme o que for passado dentro das chaves
            [
                'text_title' => 'required|min:3|max:200', // cria um array, e dentro dessa array passa as regras e os campos a seguirem a regra
                'text_note' => 'required|min:3|max:3000'
            ],
            // mensagens erro
            [

                'text_title.required' => 'O título é obrigatório', // required se refere a regra que utilizaremos no ponto
                'text_title.min' => 'O título deve ter pelo menos :min caracteres', // aplica na regra do min caracteres
                'text_title.max' => 'O título deve ter no máximo :max caracteres', // aplica na regra do maximo de caracteres

                'text_note.required' => 'A nota é obrigatória',
                'text_note.min' => 'A nota deve ter pelo menos :min caracteres', // aplica na regra do min caracteres
                'text_note.max' => 'A nota deve ter no máximo :max caracteres', // aplica na regra do maximo de caracteres
               
               
                ]
        ); 


        
        // get user id
        $id = session('user.id'); // pega o id do usuário logado

        // create new note
        $note = new Note(); // cria um novo objeto a partir do modelo orm
        $note->user_id = $id; // informa que o id será o mesmo que o usuário logado
        $note->title = $request->text_title; // o title vai ser o mesmo que o usuário colocou
        $note->text = $request->text_note; // e o texto incita ao mesmo que o usuário escreveu

        $note->save(); // cria uma nova nota então com essas informações

        // redirect to home
        return redirect()->route('home');
    }

    // edit note function

    public function editNote($id) 
    {   

        $id = Operations::decryptId($id); // importamos a função global do services, para desencriptarmos o valor passado

        // load note
        $note = Note::find($id); //procura pela nota que contém este id

        // show edit note view
        return view('edit_note', ['note' => $note]); // retorna a view com os parametro passado na variavel $notes

    }

    public function editNoteSubmit(Request $request)
    {

    // validate request
    $request->validate( // vai validar as regras do formulário conforme o que for passado dentro das chaves
        [
            'text_title' => 'required|min:3|max:200', // cria um array, e dentro dessa array passa as regras e os campos a seguirem a regra
            'text_note' => 'required|min:3|max:3000'
        ],
        // mensagens erro
        [

            'text_title.required' => 'O título é obrigatório', // required se refere a regra que utilizaremos no ponto
            'text_title.min' => 'O título deve ter pelo menos :min caracteres', // aplica na regra do min caracteres
            'text_title.max' => 'O título deve ter no máximo :max caracteres', // aplica na regra do maximo de caracteres

            'text_note.required' => 'A nota é obrigatória',
            'text_note.min' => 'A nota deve ter pelo menos :min caracteres', // aplica na regra do min caracteres
            'text_note.max' => 'A nota deve ter no máximo :max caracteres', // aplica na regra do maximo de caracteres
            
            
            ]
    ); 

        // check if note_id exists
        if($request->note_id == null){
            return redirect()->route('home');
        }

        // decrypt note_id
        $id = Operations::decryptId($request->note_id); // vai desencriptar o id

        // load the note
        $note = Note::find($id); // procura uma nota com o mesmo id

        // update note
        $note->title = $request->text_title; // pega o titulo que foi editado ou não
        $note->text = $request->text_note; // pega a nota que foi editado ou não 
        $note->save(); // grava as informações no banco de dados

        // redirect to home
        return redirect()->route('home');
    }

    public function deleteNote($id) 
    {   

        //$id = $this->decryptId($id); // usa o metodo privado que foi passado para poder pegar o id

        $id = Operations::decryptId($id); // importamos a função global do services, para desencriptarmos o valor passado
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