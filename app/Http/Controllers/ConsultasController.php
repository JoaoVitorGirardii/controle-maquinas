<?php

namespace App\Http\Controllers;

use App\Models\TbMaquina;
use App\Models\Tbusuario;
use App\Models\TbServico;
use App\Models\TbStatus_servico;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ConsultasController extends Controller
{
    //consulta de usuários
    public function Usuarios(Request $request){

        $users = new Tbusuario;
        return view('Consultas.usuario',['cols' => $users->GetCamposExibicao(), 'rows' => $users->GetUsuario()]);

    }

    //consulta de máquinas
    public function Maquinas(Request $request){

        $maquinas = new TbMaquina;
        return view('Consultas.maquina',['cols' => $maquinas->GetCamposExibicao(), 'rows' => $maquinas->GetMaquina()]);
        
    }

    //consulta de serviços
    public function Servicos(Request $request){

        $serv = new TbServico;
        $status_serv = new TbStatus_servico;

        // se for null ou -1 então pesquisa tudo se não pesquisa apenas o selecionado
        if (is_null($request->search_status) || $request->search_status == "-1"){
            
            if (view()->exists('Consultas.servico')){
                return view('Consultas.servico',['servico' => $serv->GetServico(), 'status_serv' => $status_serv->GetStatus()]);
            }else{
                return "não existe a view";
            }

        }else{

            if (view()->exists('Consultas.servico')){
                return view('Consultas.servico',['servico' => $serv->GetServico(null,$request->search_status), 'status_serv' => $status_serv->GetStatus()]);
            }else{
                return "não existe a view";
            } 

        }


    }

    //consulta de manutenções
    public function Manutencao(Request $request){

        if (view()->exists('Consultas.manutencao')){
            return view('Consultas.manutencao',[]);
        }else{
            return "não existe a view";
        }

    }
}
