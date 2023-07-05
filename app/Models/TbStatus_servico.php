<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbStatus_servico extends Model
{
    use HasFactory;

    protected $table = 'tbstatus_servico';
     
    public function GetStatus($id = null){
        if($id != null){
            return $this->select(['id', 'tipo', 'descricao'])->where('id', '=', $id)->get();
        }else{
            return $this->select(['id', 'tipo', 'descricao'])->orderBy('id')->get();
        }
    }
}
