<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        // cek apakah role user ada dalam array $roles
        if (!in_array($user->role, $roles)) {
            // kalau role tidak sesuai, arahkan sesuai role
            if ($user->role === 'admin' || $user->role === 'petugas') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
        }

        return $next($request);
    }
}
