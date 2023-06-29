<?php

namespace App\Http\Controllers;

use App\Models\TbMaquina;
use App\Models\Tbusuario;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    public function Usuarios(Request $request){

        $users = new Tbusuario;
        return view('Consultas.usuario',['cols' => $users->GetCamposExibicao(), 'rows' => $users->GetUsuario()]);

    }

    public function Maquinas(Request $request){

        $maquinas = new TbMaquina;
        return view('Consultas.maquina',['cols' => $maquinas->GetCamposExibicao(), 'rows' => $maquinas->GetMaquina()]);
        
    }
}
