<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $username = $request->input('text_username'); // nome do usuário digitado
        $password = $request->input('text_password'); // senha do usuário digitado

        // check if user exists
        $user = User::where('username', $username) // vai verificar se o valor da coluna username é igual ao $username 
        ->where('deleted_at', NULL) // a seguinte clausula where verifica se o usuário não foi apagado
        ->first(); // só vai voltar o primeiro resultado

        if(!$user) { // se o user for vazio retorna erro
            return redirect()->back()->withInput()->with('loginError', 'Username or password incorrect!');
            // redireciona para tras, salvando o que foi digitado no input, com o seguinte erro que vai ficar gravado na sessão
        }

        // check if password is correct

        if(!password_verify($password, $user->password)){  // se a senha for falsa ele retorna os seguintes comandos abaixo
            return redirect()->back()->withInput()->with('loginError', 'Username or password incorrect!');
            // redireciona para tras, salvando o que foi digitado no input, com o seguinte erro que vai ficar gravado na sessão
        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user, colocar os dados do usuário na sessão, monta um array associativo para capturar as informações que foram geradas no login
        session([
            'user' => [ // user da sessão 
                'id' => $user->id, // id do user
                'username' => $user->username // nome do usuário
            ]
            ]);

        // redirect to home
        return redirect()->to('/');

    }   

    public function logout() {
        // logout from the application
        session()->forget('user'); // vai limpar a sessão criada
        return redirect()->to('/login');
    }

    
}
