<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }
        return redirect()->route('login');
    }
    /*
        el middleware sirve para proteger las rutas de usuarios de registrados en BD se debe de configurar las rutas desde web,
        la hooja de trabajo de app.php de boostrap y generes este archivo con "php artisan make:middleware AdminMiddleware"
    */
}
