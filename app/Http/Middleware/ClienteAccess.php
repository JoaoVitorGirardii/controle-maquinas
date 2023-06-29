<?php

namespace App\Http\Middleware;

use App\Models\Tbprivilegios_usuarios;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //valida se a pessoa esta logada no sistema
        if (auth()->check()) {
        
            //"2" é cliente
            $privegio = new Tbprivilegios_usuarios;
            
            if ($privegio->validaPrivilegio( 2 )){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }else{
            //não vai redirecionar para o login e sim para uma tela de erro dissendo que essa página não foi encontrada
            // obs: não pode ir para o login pq aquela rota teoricamente não deveria existir 
            // pois so tem acesso aquela rota quem estiver logado no sistema e quem tivir o privilegio para acessar a mesma
            return redirect('/login');
        }
    }
}
