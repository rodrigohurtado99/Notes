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
        echo 'Logado';
    }   

    public function logout() {
        echo 'logout';
    }

    
}
