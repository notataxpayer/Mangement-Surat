<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sedang login dan memiliki level admin
        if (Auth::check() && Auth::user()->level === 1) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman lain atau kembalikan error
        return redirect('/dashboard')->withErrors('Anda tidak memiliki akses sebagai admin.');
    }
}
