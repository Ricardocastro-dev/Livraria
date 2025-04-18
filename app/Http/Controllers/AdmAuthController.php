<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adm;

class AdmAuthController extends Controller
{
    public function adm_login()
    {
        return view('adm.login'); // Certifique-se de que essa view existe
    }

    public function login_logar(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('adm')->attempt($credentials)) {
            $request->session()->regenerate(); // Evita ataques de sessão fixa
            return redirect()->route('menu.index');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(Request $request)
    {
        #dd(route('adm.login'));
        Auth::guard('adm')->logout(); // Faz logout no guard correto
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('adm.login')->with('success','usuario deslogado com sucesso');
    }
    #public function logout(Request $request)
    #{
        #auth()->guard('adm')->logout();
        #return redirect()->route('adm.login'); // Ou qualquer rota que você deseje
    #}
    
}


