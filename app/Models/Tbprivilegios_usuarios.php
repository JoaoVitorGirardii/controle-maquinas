<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Throw_;

class Tbprivilegios_usuarios extends Model
{
    use HasFactory;

    //precisa passar o nome da tabela pq no postgre ele coloca "tabela" ai se a tabela não estiver com o mesmo nome e com letra
    //maiuscula e minuscula conforme esta no banco da erro
    protected $table = 'tbprivilegios_usuarios';

    
    public function validaPrivilegio(int $privilegio) {
        //$privilegio = [1 = admin, 2 = cliente, 3 = usuario ...]
        
        try{
            if (auth()->check()){
                $id_usuario = auth()->user()->id; 
            }else{
                $id_usuario = 0;
            }

            $resposta = $this->select('tipo_privilegio_id')
            ->join('tbtipos_privilegios', 'tbtipos_privilegios.id', '=', 'tbprivilegios_usuarios.tipo_privilegio_id')
            ->where('tbprivilegios_usuarios.usuario_id','=', $id_usuario)
            ->where('tbprivilegios_usuarios.tipo_privilegio_id','=', $privilegio)
            ->count();

            //se for "1" quer dizer que existe no banco esse usuario cadastrado como o seu privilegio
            return $resposta === 1;
                
        }catch(\Throwable $th){
            return "Erro Model [Tbprivilegios_usuarios]";
        }
    }
}