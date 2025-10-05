<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirection avec message personnalisé
        return redirect()->route('home')->with('error', 'Accès refusé : vous devez être administrateur.');
    }
}

