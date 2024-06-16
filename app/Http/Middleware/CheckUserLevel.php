<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserLevel
{
    public function handle($request, Closure $next, $level)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check user level
        if (Auth::user()->level != $level) {
            return redirect('/dashboard')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}