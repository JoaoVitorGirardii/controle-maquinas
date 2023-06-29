<?php

namespace App\Http\Middleware;

use App\Models\Tbprivilegios_usuarios;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PadraoAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //validação apenas para ver se quem vai acessar a url está logado no sistema
        if (Auth::check()){
            $tipoUser = new Tbprivilegios_usuarios;
     
            if ($tipoUser->validaPrivilegio( 1 )){ //admin
                
                view()->share('tipo_usuario','admin');
                
            } elseif ($tipoUser->validaPrivilegio( 2 )){ //cliente
                
                view()->share('tipo_usuario','cliente');
            
            } elseif ($tipoUser->validaPrivilegio( 3 )){ //usúario
            
                view()->share('tipo_usuario','usuario');
            
            }else{
                view()->share('tipo_usuario','Sem usuario');
            }
            
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
