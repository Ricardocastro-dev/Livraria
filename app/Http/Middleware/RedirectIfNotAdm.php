<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdm
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('adm')->check()) {
            return redirect()->route('adm.login'); // Redireciona para o login correto
        }

        return $next($request);
    }
}

