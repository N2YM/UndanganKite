<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Asumsikan ada kolom 'is_admin' di tabel users yang menandai admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        // Jika bukan admin, arahkan ke halaman tertentu atau tampilkan pesan error
        return redirect('/home')->with('error', 'You do not have admin access.');
    }
}