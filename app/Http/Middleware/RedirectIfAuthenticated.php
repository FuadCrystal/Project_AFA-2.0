<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            
            // Pastikan pengecekan peran dilakukan sesuai dengan yang diinginkan
            if ($user->role == 1) {
                return redirect('/admin');  // Redirect admin ke /admin
            } elseif ($user->role == 3) {
                return redirect('/dashboard');  // Redirect user biasa ke /dashboard
            }
        }

        return $next($request);
    }
}
