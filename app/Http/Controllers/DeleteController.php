<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function Delete(Request $request, $tabela){
        //add condição para não deleter o usuario logado
 
        $delete = 0;

        if ($request->_method === "DELETE"){
            if (auth()->user()->id != $request->id ){
                //caso precise deletar mais de uma tabela quando for deletar um usuario por exemplo deletar usando trigger.
                $delete = DB::table($tabela)->where('id','=', $request->id)->delete();
                
            }else{
                return back()->with('isError', 'Erro não é possível deletar o usuário!!');
            }

        }

        if($delete > 0){
            return back()->with('isSuccess', 'Registro deletado com sucesso!!');
        }else{
            return back()->with('isError', 'Erro ao deletar registro!!');
        }
    }
}
