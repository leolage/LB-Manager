<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para processar o formulário de login
    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $credentials = $request->only('login', 'password');

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redireciona para a página desejada
            return redirect()->intended('/dashboard');
        }

        // Autenticação falhou, redireciona de volta com uma mensagem de erro
        return redirect()->back()->withInput()->withErrors(['login' => 'Login ou senha inválidos']);
    }
	
	public function logout(Request $request) {
	Auth::logout();
	return redirect('/login');
}
}
