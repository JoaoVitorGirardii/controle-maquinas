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
            return $this->select(['id','descricao','tipo','status','cliente'])->where('id', '=', $id)->get();
        }else{
            return $this->select(['id','descricao','tipo','status','cliente'])->orderBy('id')->get();
        }
    }

}
