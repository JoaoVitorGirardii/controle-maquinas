<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbServico extends Model
{
    use HasFactory;
    protected $table = 'tbservico';

    
    public function GetServico($id = null, $status_id = null){

        $camposPesquisa = ['id', 'descricao', 'tipo', 'status_id', 'cliente', 'local_servico', 'numero', 'data_inicio', 'data_fim', 'funcionario_id'];

        if($id != null){
            return $this->select($camposPesquisa)->where('id', '=', $id)->get();
        }elseif ($status_id != null){
            return $this->select($camposPesquisa)->where('status_id', '=', $status_id)->get();
        }else{
            return $this->select($camposPesquisa)->orderBy('id')->get();
        }
    }

}
