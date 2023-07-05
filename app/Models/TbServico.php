<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbServico extends Model
{
    use HasFactory;
    protected $table = 'tbservico';

    public function GetServico($id = null){
        if($id != null){
            return $this->select(['id', 'descricao', 'tipo', 'status_id', 'cliente', 'local_servico', 'numero', 'data_inicio', 'data_fim', 'funcionario_id'])->where('id', '=', $id)->get();
        }else{
            return $this->select(['id', 'descricao', 'tipo', 'status_id', 'cliente', 'local_servico', 'numero', 'data_inicio', 'data_fim', 'funcionario_id'])->orderBy('id')->get();
        }
    }

}
