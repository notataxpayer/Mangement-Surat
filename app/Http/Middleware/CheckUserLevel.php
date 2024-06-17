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
            // Set session warning
            session()->flash('warning', 'Anda tidak memiliki akses ke halaman ini.');

            // Kembalikan ke halaman sebelumnya
            return redirect()->back();
        }


        return $next($request);
    }
}
