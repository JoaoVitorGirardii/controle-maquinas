<?php

namespace App\Http\Controllers;

use App\Models\TbContato;
use App\Models\TbMaquina;
use App\Models\Tbmarca;
use App\Models\Tbprivilegios_usuarios;
use App\Models\TbServico;
use App\Models\TbUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as Validation;
use PhpParser\Node\Stmt\TryCatch;

class CadastroController extends Controller
{

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  CADASTRO DE USUARIOS                                                                                                                                   //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function CadastrarUsuario(){
        
        if(view()->exists('Cadastro.usuario')){
            return view('Cadastro.usuario');
        }else{
            return "Pagina não encontrada";
        }

    }

    public function GravarUsuario(Request $request){

        try{

            $request->validate([
                'nome'            => 'required',
                'sobrenome'       => 'required',
                'cpf'             => 'required',
                'rg'              => 'required',
                'data_nascimento' => 'required',
                'sexo'            => 'required',
                'tipo_usuario'    => 'required',
                'valor_contato'   => 'required',
            ]);

        }catch(Validation $ex){ // valor que vai retornar para view caso falte preencher algum campo
            return redirect()->back()->withInput()->with('camposNaoPreenchidos', True);
        }

        try{
            $resposta = DB::transaction(function() use($request){ //usado transaction por gravar em mais de uma tabela
                //validar se CPF já estiver cadastrado
                $user = new Tbusuario;
                $user->nome = $request->nome;
                $user->sobrenome = $request->sobrenome;
                $user->cpf = str_replace(['.','-'],'',$request->cpf);
                $user->rg = str_replace(['.'],'',$request->rg);
                $user->data_nascimento = str_replace(['/'],'-',$request->data_nascimento);
                $user->sexo = $request->sexo;
                //$user->endereco_id = 1; //adicionar cadastro de endereco dps que tiver funcionando as tabelas de endereços
                $user->redefine_senha = true;
                $user->password = Hash::make('0000'); //0000 por padrão no primeiro login o usuario vai ter q alterar

                $saveUser = $user->save();
    
                $privilegio = new Tbprivilegios_usuarios;
                $privilegio->usuario_id = $user->id;
                $privilegio->tipo_privilegio_id = $request->tipo_usuario;

                $savePrivilegio = $privilegio->save();

                $contato = new TbContato;
                $contato->usuario_id = $user->id;
                //tipo de contato
                switch ($request->tipo_contato) {
                    case '1':
                        $contato->email = $request->valor_contato;
                        break;
                    case '2':
                        $contato->website = $request->valor_contato;
                        break;
                    case '3':
                        $contato->celular = str_replace(['(',')','-',' '],'',$request->valor_contato);
                        break;
                    case '4':
                        $contato->telefone = str_replace(['(',')','-',' '],'',$request->valor_contato);;
                        break;
                    default:
                        //
                        break;
                }

                $saveContato = $contato->save();

                if ($saveUser && $saveContato && $savePrivilegio){
                    return true;
                }else{
                    return false;
                }

            });
            
        }catch(\Throwable $th){
            if (stripos($th->getMessage(), 'duplicate key')){
                
                if (stripos($th->getMessage(), 'tbusuarios_cpf_unique')){
                    return redirect()->back()->withInput()->with('erroNaGravacao', 'CPF já cadastrado.');
                }else{
                    return redirect()->back()->withInput()->with('erroNaGravacao', True);
                }
            }else{
                return redirect()->back()->withInput()->with('erroNaGravacao', True);
            }
        }


        if ($resposta){
            return redirect('cadastro/usuario')->with('cadastroRealizado', True);
        }else{
            return redirect()->back()->withInput()->with('erroNaGravacao', True);
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  CADASTRO DE MAQUINAS                                                                                                                                   //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CadastrarMaquina(){

        $marcas = new Tbmarca;
        $marcasDisponiveis = $marcas->select(['id','nome'])->get();
        return view('Cadastro.maquina',['marcasDisponiveis' => $marcasDisponiveis]);

    }

    public function GravarMaquina(Request $request){
        
        try{
            $request->validate([
                'nome'              => 'required',
                'marca_id'          => 'required',
                'valor_compra'      => 'nullable|string|numeric',
                'capacidade_carga'  => 'nullable|string|numeric',
                'peso'              => 'required|string|numeric',
                'potencia'          => 'required|string|numeric',
                'capacidade_tanque' => 'required|string|numeric'
            ]);
        }catch(Validation $ex){ // valor que vai retornar para view caso falte preencher algum campo
            if ( stripos($ex->getMessage(),'field must be a number.')){
                if (stripos($ex->getMessage(),'peso')){
                    return back()->withInput()->with('erroNaGravacao', 'Campo peso só pode conter números.');
                }elseif (stripos($ex->getMessage(),'potencia')) {
                    return back()->withInput()->with('erroNaGravacao', 'Campo potência só pode conter números.');
                }elseif (stripos($ex->getMessage(),'capacidade tanque')) {
                    return back()->withInput()->with('erroNaGravacao', 'Campo capacidade do tanque só pode conter números.');
                }elseif (stripos($ex->getMessage(),'valor compra')) {
                    return back()->withInput()->with('erroNaGravacao', 'Campo Valor de aquisição só pode conter números.');
                }elseif (stripos($ex->getMessage(),'capacidade carga')) {
                    return back()->withInput()->with('erroNaGravacao', 'Campo capacidade de carga só pode conter números.');
                }
            }else{
                return back()->withInput()->with('camposNaoPreenchidos', True);
            }
        }

        try{
            $maquina = new TbMaquina;
            $maquina->nome = $request->nome;
            $maquina->marca_id = $request->marca_id; 
            $maquina->peso = $request->peso;
            $maquina->potencia = $request->potencia;
            $maquina->capacidade_tanque = $request->capacidade_tanque;
            $maquina->capacidade = $request->capacidade_carga;
            $maquina->data_fabricacao = $request->data_fabricacao;
            $maquina->data_aquisicao = $request->data_aquisicao;
            $maquina->valor_compra = $request->valor_compra;
            
            if ($maquina->save()){ //retorna para view com sucesso
                return redirect('cadastro/maquina')->with('cadastroRealizado', True);
            }else{ //retorna para a view com erro
                return back()->withInput()->with('erroNaGravacao', True);
            }

        }catch(\Throwable $th){
            //tratar os campos para quando for digitado um texto em um campo numero dar erro
            return back()->withInput()->with('erroNaGravacao', True);
        }
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  CADASTRO DE SERVIÇOS                                                                                                                                   //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function CadastroServico() {

        $maq = new TbMaquina;
        $retunr_maq = $maq->GetMaquina();

        $user = new TbUsuario;
        $return_user = $user->GetUsuarioTipo();
        
        if (view()->exists('Cadastro.servico')){
            return view('Cadastro.servico',['maquinas' => $retunr_maq, 'funcionarios' => $return_user]);
        }
    }

    public function GravarServico(Request $request){

        try {
            $request->validate([
                'descricao'    => 'required',
                'endereco'     => 'required',
                'cliente'      => 'required',
                'data_inicio'  => 'required',
                'tipo_servico' => 'required',
                'maquina'      => 'required',
                'valor_hora'   => 'required',
                'funcionario'  => 'required'
            ]);
        } catch (\Throwable $th) {
            return back()->withInput()->with('camposNaoPreenchidos', True);
        }

        $servico = new TbServico;
        $servico->descricao = $request->descricao;
        $servico->tipo = $request->tipo_servico;
        $servico->status_id = 1; //1 cadastrado 2 iniciado 3 finalizado 4 parado
        $servico->cliente = $request->cliente;
        $servico->local_servico = $request->endereco;
        $servico->numero = $request->numero;
        $servico->data_inicio = $request->data_inicio;
        $servico->previsao_fim = $request->data_previsao_fim;
        $servico->maquina_id = $request->maquina;
        $servico->valor_hora = $request->valor_hora;
        $servico->funcionario_id = $request->funcionario;

        if ($servico->save()){
            return redirect('cadastro/servico')->with('cadastroRealizado', True);
        }
    }

}