<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para login

    public function login()
    {
        #$books = Book::orderByDesc('id')->get();
        ##['books' => $books];

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')

        return view('user.login');
    }

    public function login_logar(Request $request)
    {
        #dd($request->all());
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],

        ]);

        if (Auth::attempt($credentials)) {
            // Redireciona para a página de compras (shop) após o login bem-sucedido
            $request->session()->regenerate();
            return redirect()->route('menucliente.index');
        }

        

        // Se falhar, retorna ao login com uma mensagem de erro
        return back()->with('error', 'Credenciais inválidas!');
    }


    // Método para logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('success','usuario deslogado com sucesso'); // Redireciona para a página de compras
    }
}

