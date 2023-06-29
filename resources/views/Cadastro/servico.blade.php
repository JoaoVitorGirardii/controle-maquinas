@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/cadastros.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Cadatro de Serviços')

@section('conteudo')
    @include('layouts.navbar', ['isHome' => false])

    <div class="centraliza-vertical mt-5">
        <div class="container centraliza-card">
            
            <div class="d-flex justify-content-center align-items-center text-center">
                
                @if (session('camposNaoPreenchidos'))
                    @include('layouts.msg',['tipoMsg' => 'warning-insert'])
                @endif
                
                @if (session('erroNaGravacao'))
                    @include('layouts.msg',['tipoMsg' => 'danger-insert'])
                @endif
    
                @if (session('cadastroRealizado'))
                    @include('layouts.msg',['tipoMsg' => 'success-insert'])
                @endif

            </div>
            
            <div class="card card-cadastro-usuario">

                <div class="card-header"> CADASTRO DE SERVIÇOS </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/cadastro/servico') }}" id="form-login" >
        
                        @csrf
                       
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Descrição <span class="aterisco-text">*</span></label>
                                    <input name="descricao" type="text" class="form-control input-cadastro" id="Input-descricao" value="{{ old('descricao') }}">
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col-6 mt-4">
                                <div>
                                    <label class="form-label">Endereço <span class="aterisco-text">*</span></label>
                                    <input name="endereco" type="text" class="form-control input-cadastro" id="Input-endereco" value="{{ old('endereco') }}">
                                </div>    
                            </div>
                            <div class="col-2 mt-4">
                                <div>
                                    <label class="form-label">Número</label>
                                    <input name="numero" type="number" class="form-control input-cadastro" id="Input-numero" value="{{ old('numero') }}">
                                </div>
                            </div>     
                        </div>
                        
                        <div class="row"> 
                            <div class="col-6 mt-4">
                                <div>
                                    <label class="form-label">Nome cliente <span class="aterisco-text">*</span></label>
                                    <input name="cliente" type="text" class="form-control input-cadastro" id="Input-cliente" value="{{ old('cliente') }}">
                                </div>
                            </div>    
                        </div>
                        
                        <div class="row">
                            <div class="col-3 mt-4">
                                <div>
                                    <label class="form-label">Data de inicio <span class="aterisco-text">*</span></label>
                                    <input name="data_inicio" type="text" class="form-control input-cadastro" id="Input-data-inicio" placeholder="00/00/0000" value="{{ old('data_inicio') }}">
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <div>
                                    <label class="form-label">Previção de conclusão </label>
                                    <input name="data_previsao_fim" type="text" class="form-control input-cadastro" id="Input-data-fim" placeholder="00/00/0000" value="{{ old('data_previsao_fim') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2 mt-4">
                                <div>
                                    <label class="form-label">Tipo de serviço <span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-marca-maquina" name="tipo_servico">
                                        <option value="0" {{ old('tipo_servico') == '0' ? 'selected' : '' }}>Selecione...</option>
                                        <option value="1" {{ old('tipo_servico') == '1' ? 'selected' : '' }}>Terra Planagem</option>
                                        <option value="2" {{ old('tipo_servico') == '2' ? 'selected' : '' }}>Lagoa</option>
                                        <option value="3" {{ old('tipo_servico') == '3' ? 'selected' : '' }}>Aterro</option>
                                        <option value="4" {{ old('tipo_servico') == '4' ? 'selected' : '' }}>Escavação</option>
                                        <option value="5" {{ old('tipo_servico') == '5' ? 'selected' : '' }}>Outros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 mt-4">
                                <div>
                                    <label class="form-label">Máquina<span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-marca-maquina" name="maquina">

                                        <option value="" {{ old('maquina') == ' ' ? 'selected' : '' }}>Selecione...</option>
                                        @foreach ($maquinas as $item)
                                            <option value="{{ $item->id }}" {{ old('maquina') == ' ' ? 'selected' : '' }}>{{ $item->nome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mt-4">
                                <div>
                                    <label class="form-label">Valor hora(R$)<span class="aterisco-text">*</span></label>
                                    <input name="valor_hora" type="text" class="form-control input-cadastro" id="Input-valor-hora" value="{{ old('valor_hora') }}">
                                </div>
                            </div>
                            <div class="col-4 mt-4">
                                <div>
                                    <label class="form-label">Funcionário <span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-marca-maquina" name="funcionario">

                                        <option value="" {{ old('funcionario') == ' ' ? 'selected' : '' }}>Selecione...</option>
                                        @foreach ($funcionarios as $item)
                                            <option value="{{ $item->id }}" {{ old('funcionario') == ' ' ? 'selected' : '' }}>{{ $item->nome }}</option>
                                        @endforeach

                                    </select>
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