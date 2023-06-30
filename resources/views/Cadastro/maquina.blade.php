@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/cadastros.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Cadatro de Usuario')

@section('conteudo')
    @include('layouts.navbar', ['isHome' => false])

    <div class="centraliza-vertical mt-5">
        <div class="container centraliza-card">
            
            <div class="d-flex justify-content-center align-items-center text-center">
                
                @if (session('camposNaoPreenchidos'))
                    @include('layouts.msg',['tipoMsg' => 'warning-insert'])
                @endif
                
                @if (session('erroNaGravacao'))
                    @include('layouts.msg',['tipoMsg' => 'danger-insert', 'msg' => 'Erro ao cadastrar máquina "'. session('erroNaGravacao')."\""])
                @endif
    
                @if (session('cadastroRealizado'))
                    @include('layouts.msg',['tipoMsg' => 'success-insert'])
                @endif

            </div>
            
            <div class="card card-cadastro-usuario">

                <div class="card-header"> CADASTRO DE MÁQUINAS </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/cadastro/maquina') }}" id="form-login" >
        
                        @csrf
                       
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Nome/Modelo <span class="aterisco-text">*</span></label>
                                    <input name="nome" type="text" class="form-control input-cadastro" id="Input-nome" value="{{ old('nome') }}">
                                </div>    
                            </div>    
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Marca da máquina <span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-marca-maquina" name="marca_id">
                                        <option value="" selected>Selecione...</option>
                                        {{-- pesquisa feita no controller --}}
                                        @foreach ($marcasDisponiveis as $item)
                                            <option value="{{$item->id}}" {{ old('marca_id') == $item->id ? 'selected' : '' }}>{{$item->nome}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="row">
                            <div class="col-3 mt-4">
                                <div>
                                    <label class="form-label"> Data de fabricação </label>
                                    <input name="data_fabricacao" type="text" class="form-control input-cadastro" id="Input-data-fabricacao" placeholder="00/00/0000" value="{{ old('data_fabricacao') }}">
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <div>
                                    <label class="form-label"> Data de aquisição </label>
                                    <input name="data_aquisicao" type="text" class="form-control input-cadastro" id="Input-data-aquisicao" placeholder="00/00/0000" value="{{ old('data_aquisicao') }}">
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <div>
                                    <label class="form-label"> Valor de aquisição </label>
                                    <input name="valor_compra" type="text" class="form-control input-cadastro" id="Input-valor-compra" value="{{ old('valor_compra') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2 mt-4">
                                <div>
                                    <label class="form-label">Peso(kg) <span class="aterisco-text">*</span></label>
                                    <input name="peso" type="text" class="form-control input-cadastro" id="Input-peso" value="{{ old('peso') }}">
                                </div>
                            </div>
                            <div class="col-2 mt-4">
                                <div>
                                    <label class="form-label">Potência(cv) <span class="aterisco-text">*</span></label>
                                    <input name="potencia" type="text" class="form-control input-cadastro" id="Input-potencia" value="{{ old('potencia') }}">
                                </div>
                            </div>
                            <div class="col-4 mt-4">
                                <div>
                                    <label class="form-label">Capacidade de carga(kg)</label>
                                    <input name="capacidade_carga" type="text" class="form-control input-cadastro" id="Input-capacidade-carga" value="{{ old('capacidade_carga') }}">
                                </div>
                            </div>
                            <div class="col-4 mt-4">
                                <div>
                                    <label class="form-label">Capacidade do tanque(litros) <span class="aterisco-text">*</span></label>
                                    <input name="capacidade_tanque" type="text" class="form-control input-cadastro" id="Input-capacidade-tanque" value="{{ old('capacidade_tanque') }}">
                                </div>
                            </div>
                        </div>

                        <div class="btns-opcoes-form mt-4">
                            <div class="msg-asterisco">
                                <div class="aviso-asteristico">Campos com  <span class="aterisco-text">*</span>  são obrigatórios.</div>
                            </div>
                            <div>
                                <button id="btn-cancelar" type="button" class="btn btn-danger btn-form-cadastros">
                                    <a class="a-canelar-form" href="{{ url('/home') }}">Cancelar</a>
                                </button>
                                <button id="btn-submit" type="submit" class="btn btn-success btn-form-cadastros">Cadastrar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection