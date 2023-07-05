<?php

namespace App\Http\Controllers;

use App\Models\TbMaquina;
use App\Models\TbServico;
use App\Models\Tbusuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditarController extends Controller
{
    private function AjustaCampos($dados=[]){
        $dadosAjustado = [];
        foreach ($dados as $key => $value) {
            if (trim($dados[$key]) === ""){
                $dadosAjustado[$key] = null;
            }elseif ($key == "cpf" || $key == "rg"){
                $dadosAjustado[$key] = str_replace(['.','-'],'',$dados[$key]);
            }elseif (strpos($key,"data") !== false){
                $dadosAjustado[$key] = str_replace('/', '-', stripslashes($dados[$key]));
            }else{
                $dadosAjustado[$key] = $dados[$key];
            }
        }
        return $dadosAjustado;
    }

    public function Editar(Request $request, $tabela, $id){

        $result = false;

        // switch case para fazer update em suas respectivas tabelas;
        switch ($tabela) {
            case 'tbusuarios':

                $user = new Tbusuario;
                $dados = $request->only($user->GetCamposTabela());
                $dadosAjustados = $this->AjustaCampos($dados);
                
                $result = $user->UpdateUsuario($id,$dadosAjustados) == 1;
                break;

            case 'tbmaquinas':
                
                $maquina = new TbMaquina;
                $dados = $request->only($maquina->GetCamposTabela());
                $dadosAjustados = $this->AjustaCampos($dados);

                $result = $maquina->UpdateMaquina($id,$dadosAjustados) == 1;
                break;
                
            case 'tbservico':
                
                $servico = new TbServico;
                if ($request->status_id !== null) {
                    $servico->where('id', '=', $id)->update(['status_id' => $request->status_id]);   
                }

            default:
                // defaul momentaneamente
                break;
        }   

        if ($result){
            return redirect()->back()->with('isSuccess', 'Dados atualizados com sucesso!');
        }else{
            return redirect()->back()->with('isError', 'Erro ao atualizar os dados!');
        }

    }
}
