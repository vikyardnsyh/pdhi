<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autentikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $routeIfNotAuth = 'login';

        // Periksa apakan sudah pengguna sudah login atau belum
        if (!Auth::check()) {
            return redirect()->route($routeIfNotAuth);
        }

        // Periksa role pengguna jika diperlukan
        if(!is_null($role)) {
            $pengguna = Auth::user();
            
            if ($pengguna->id_kelas_pengguna != $role) {
                Auth::logout();
                return redirect()->route($routeIfNotAuth);
            }
        }

        return $next($request);
    }
}
