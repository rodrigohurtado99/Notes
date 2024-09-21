<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 

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
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'Username deve ser um email válido',
                'text_password.required' => 'O password é obrigatório',
                'text_password.min' => 'O password deve ter pelo menos :min caracteres',
                'text_password.max' => 'O password deve ter no máximo :max caracteres',
            ]
        ); 

        // get user input
        $username = $request->input('text-username'); // nome do usuário digitado
        $password = $request->input('text_password'); // senha do usuário digitado

        echo 'OK!';
    }   

    public function logout() {
        echo 'logout';
    }

    
}
