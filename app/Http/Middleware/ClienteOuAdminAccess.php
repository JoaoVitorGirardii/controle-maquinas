<?php

namespace App\Http\Middleware;

use App\Models\Tbprivilegios_usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteOuAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            $privegio = new Tbprivilegios_usuarios;
            // "1" é administrador "2" é cliente
            if ($privegio->validaPrivilegio( 1 ) || $privegio->validaPrivilegio( 2 )){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/login');
        }
    }
}
