<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAuth
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');  // Redirect ke halaman login jika belum autentikasi
        }

        // Jika roles adalah string, ubah menjadi array
        if (is_string($roles[0])) {
            $roles = explode(',', $roles[0]);
        }

        // Periksa apakah role pengguna ada dalam daftar role yang diizinkan
        if (!in_array($user->role, $roles)) {
            return redirect('/dashboard');  // Redirect ke /dashboard jika role tidak sesuai
        }

        return $next($request);
    }
}
