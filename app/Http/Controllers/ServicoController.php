<?php

namespace App\Http\Controllers;

use App\Models\TbServico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Consultar(){
        $serv = new TbServico;
        $return_serv = $serv->GetServico();

        if (view()->exists('Consultas/servico')){
            return view('Consultas/servico',['servico' => $return_serv]);
        }else{
            return "Página não encontrada";
        }
    }
}
