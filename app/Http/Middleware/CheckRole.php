<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        if ($role == 'admin' && $user->isAdmin()) {
            return $next($request);
        }
        
        if ($role == 'guru' && $user->isGuru()) {
            return $next($request);
        }
        
        if ($role == 'orangtua' && $user->isOrangtua()) {
            return $next($request);
        }
        
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}