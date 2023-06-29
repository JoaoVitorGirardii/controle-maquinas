<?php

namespace App\Http\Controllers;

use App\Models\Tbusuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function Login(){
        if (view()->exists('Usuario.login')){
            return view('Usuario.login');
        } else {
            return "pagina não encontrada!!";
        }
    }

    public function ValidaLogin(Request $request){

        $cpf_formatado = str_replace(['.','-'],'',$request->input('cpf'));

        $request->validate([
            'cpf' => ['required'],
            'senha' => ['required'],
        ]);
        
        // $user = User::where('cpf', '=', $cpf_formatado)->first();
        
        // if ($user && Hash::check($request->senha, $user->password)){
        //     return redirect()->route('home',['usuario' => 'teste']);
        // }else{
        //     return redirect()->route('login');
        // }

        $credenciais = ['cpf' => $cpf_formatado, 'password' => $request->senha];

        if (Auth::attempt($credenciais)){
            //primeiro acesso o usuario precisa redefinir sua senha
            if (auth()->user()->redefine_senha){
                return redirect('/senha');
            }else{
                return Redirect('/home');
            }
        }else{
            return back()->with('SenhaOuUsuarioInvalido',True);
        }

    }

    public function RedefinicaoSenha(){
        if (auth()->user()->redefine_senha){
            if (view()->exists('Usuario.redefinirSenha')){
                return view('Usuario.redefinirSenha');
            }
        }
    }

    //redefine a senha do usuario caso e redefinição estiver ativa na hora que o usuario fizer o login
    public function ConfirmaRefedinicaoSenha(Request $request) {
        $request->validate(['senha' => ['required'],
                            'confirmacao_senha' => ['required']
                            ]);
        
        if ($request->senha === $request->confirmacao_senha){
            $return = Tbusuario::where('cpf', auth()->user()->cpf)
                       ->update(['password' => Hash::make($request->senha),
                                 'redefine_senha' => false    
                        ]);

            if ($return > 0){
                return redirect('/home');
            }else{
                return $this->RedefinicaoSenha();
            }
        }else{
            return back()->with('error', 'As senhas não são iguais!');
        }
    }


    public function Loginout(){
        
        Auth::logout();
        // faz o logout do login deslogando ele do sistema 

        if (view()->exists('Usuario.login')){
            return Redirect('/login');
        } else {
            return "pagina não encontrada!!";
        }

    }

}
