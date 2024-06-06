<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 2) {
            return $next($request);
        }

        return redirect('home')->with('error', 'Você não tem permissão para acessar esta área.');
    }
}
