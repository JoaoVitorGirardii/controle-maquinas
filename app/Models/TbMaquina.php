<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbMaquina extends Model
{
    use HasFactory;

    protected $table = 'tbmaquinas';

    public function GetMaquina($id = null){
        if($id != null){
            return $this->select($this->GetCamposTabela())->where('id', '=', $id)->get();
        }else{
            return $this->select($this->GetCamposTabela())->orderBy('id')->get();
        }
    }

    public function UpdateMaquina($id,$valores = []){
        try {
            return $this->where('id', '=', $id)->update($valores);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function GetCamposTabela(){
        return ['id','nome','marca_id','data_fabricacao','data_aquisicao','valor_compra','potencia','capacidade_tanque'];
    }

    public function GetCamposExibicao(){
        return ['Id','Nome','Marca','Data de fabricação','Data de aquisição','Valor de compra','Potência(cv)','Capacidade tanque(L)'];
    }

}
