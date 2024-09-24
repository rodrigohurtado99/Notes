<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

// Controller responsável pelo controle de usuário do site
class AuthController extends Controller
{
    public function login(){

        return view('login');

    }

    public function loginSubmit(Request $request){

        // form validation
        $request->validate( // vai validar as regras do formulário conforme o que for passado dentro das chaves
            [
                'text_username' => 'required|email', // cria um array, e dentro dessa array passa as regras e os campos a seguirem a regra
                'text_password' => 'required|min:6|max:16'
            ],
            // mensagem erro
            [
                'text_username.required' => 'O username é obrigatório', // required se refere a regra que utilizaremos no ponto
                'text_username.email' => 'Username deve ser um email válido', // aplica na regra de email
                'text_password.required' => 'O password é obrigatório', // aplica na regra de required
                'text_password.min' => 'O password deve ter pelo menos :min caracteres', // aplica na regra do min caracteres
                'text_password.max' => 'O password deve ter no máximo :max caracteres', // aplica na regra do maximo de caracteres
            ]
        ); 

        // get user input
        $username = $request->input('text-username'); // nome do usuário digitado
        $password = $request->input('text_password'); // senha do usuário digitado

        // teste database connection

        try {
            DB::connection()->getPdo();
            echo "Connection is OK!";
        } catch (\PDOException $e) {
            echo "Connection failed:" . $e->getMessage(); // se ele não encontrar uma conexão retorna um erro
        }

        echo "FIM!";

    }   

    public function logout() {
        echo 'logout';
    }

    
}
