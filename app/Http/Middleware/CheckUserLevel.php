<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserLevel
{
    public function handle($request, Closure $next, $level)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Periksa level user
        if (Auth::user()->level != $level) {
            return redirect('/dashboard'); // Atau halaman lain sesuai keinginan
        }

        return $next($request);
    }
}
