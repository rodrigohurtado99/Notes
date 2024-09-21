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
                'text_username' => 'required', // cria um array, e dentro dessa array passa as regras e os campos a seguirem a regra
                'text_password' => 'required'
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
