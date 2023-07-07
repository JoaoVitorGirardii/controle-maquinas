<?php

namespace App\Http\Controllers;

use App\Models\TbMaquina;
use App\Models\TbServico;
use App\Models\Tbusuario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function GerarPDF(){

        $funcionario = new Tbusuario;
        $servico = new TbServico;
        $maquinas = new TbMaquina;

        $total_funcionario = $funcionario->select()
                                        ->join('tbprivilegios_usuarios', 'tbprivilegios_usuarios.usuario_id', '=', 'tbusuarios.id')
                                        ->where('tbprivilegios_usuarios.tipo_privilegio_id', '=' , '3')
                                        ->count();

        $total_servico = $servico->count();
        //1 cadastrado 2 iniciado 3 finalizado 4 parado
        $total_servico_cadastrado = $servico->where('status_id', '=', '1')->count();
        $total_servico_iniciado =   $servico->where('status_id', '=', '2')->count();
        $total_servico_finalizado = $servico->where('status_id', '=', '3')->count();
        $total_servico_parado =     $servico->where('status_id', '=', '4')->count();
        $total_maquinas = $maquinas->count();

        $data = ['qtd_funcionarios'       => $total_funcionario, 
                 'qtd_servico'            => $total_servico, 
                 'qtd_servico_cadastrado' => $total_servico_cadastrado, 
                 'qtd_servico_finalizado' => $total_servico_finalizado,
                 'qtd_servico_parado'     => $total_servico_parado,
                 'qtd_servico_iniciado'   => $total_servico_iniciado,
                 'qtd_maquinas'           => $total_maquinas, 
                ];
                
        $pdf = Pdf::loadView('PDFGeracao.gerar',$data);
        return $pdf->stream('PDFGeracao.gerar');
    }
}
