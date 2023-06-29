<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbusuario extends Model
{
    use HasFactory;
    //usar essa model para fazer as pesquisas do usuario quando for a tabela usuario 
    //assim não vou precisar ficar passando os campos em todos os lugares apenas defino aqui na model o que vai ser
    //visivel ou não
    protected $table = 'tbusuarios';

    public function GetUsuario($id = null){
        if($id != null){
            return $this->select($this->GetCamposTabela())->where('id', '=', $id)->get();
        }else{
            return $this->select($this->GetCamposTabela())->orderBy('nome')->get();
        }
    }

    public function UpdateUsuario($id,$valores = []){
        try {
            return $this->where('id', '=', $id)->update($valores);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function GetCamposTabela(){
        return ['id','nome','sobrenome','cpf','rg','data_nascimento'];
    }

    public function GetCamposExibicao(){
        return ['Id','Nome','Sobrenome','CPF','RG','Data de nascimento'];
    }

    public function GetUsuarioTipo(){
        return $this->select('tbusuarios.id','tbusuarios.nome','tbprivilegios_usuarios.tipo_privilegio_id')
                ->join('tbprivilegios_usuarios', 'tbprivilegios_usuarios.usuario_id', '=', 'tbusuarios.id')
                ->where('tbprivilegios_usuarios.tipo_privilegio_id', '>' , '1')
                ->get();
    }
}
