@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/cadastros.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Cadatro de Usuario')

@section('conteudo')
    @include('layouts.navbar',['isHome' => false])

    <div class="centraliza-vertical mt-5">
        <div class="container centraliza-card">

            <div class="d-flex justify-content-center align-items-center text-center flex-column">
                @if (session('camposNaoPreenchidos'))
                    @include('layouts.msg',['tipoMsg' => 'warning-insert', 'msg' => 'Existe campos obrigatorios não preenchidos!'])
                @endif
                
                @if (session('erroNaGravacao'))
                    @include('layouts.msg',['tipoMsg' => 'danger-insert', 'msg' => 'Erro ao cadastrar usuário '. session('erroNaGravacao')])
                @endif

                @if (session('cadastroRealizado'))
                    @include('layouts.msg',['tipoMsg' => 'success-insert'])
                @endif
            </div>
            
            <div class="card card-cadastro-usuario">

                <div class="card-header"> CADASTRO DE USUÁRIOS </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/cadastro/usuario') }}" id="form-login" >
        
                        @csrf
        
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Nome <span class="aterisco-text">*</span></label>
                                    <input name="nome" type="text" class="form-control input-cadastro" id="Input-nome" value="{{ old('nome') }}">
                                    <div id="obrigatorio-nome" class="form-text div-msg-erro">Nome invalido!</div>
                                </div>    
                            </div>    
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Sobrenome <span class="aterisco-text">*</span></label> 
                                    <input name="sobrenome" type="text" class="form-control input-cadastro" id="Input-sobrenome" value="{{ old('sobrenome') }}">
                                    <div id="obrigatorio-sobrenome" class="form-text div-msg-erro">Sobrenome invalido</div>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <label class="form-label">CPF <span class="aterisco-text">*</span></label>
                                    <input name="cpf" type="text" class="form-control input-cadastro" id="Input-cpf" value="{{ old('cpf') }}">
                                    <div id="obrigatorio-cpf" class="form-text div-msg-erro">CPF invalido!</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label class="form-label">RG <span class="aterisco-text">*</span></label>
                                    <input name="rg" type="text" class="form-control input-cadastro" id="Input-rg" value="{{ old('rg') }}">
                                    <div id="obrigatorio-rg" class="form-text div-msg-erro">RG invalido!</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <label class="form-label">Data de nascimento <span class="aterisco-text">*</span></label>
                                    <input name="data_nascimento" type="text" class="form-control input-cadastro" id="Input-datanascimento" value="{{ old('data_nascimento') }}">
                                    <div id="data-invalida" class="form-text div-msg-erro">Data invalida!</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label class="form-label">Sexo <span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-sexo" name="sexo">
                                        <option value=""  {{ old('sexo') == ''  ? 'selected' : '' }}>Selecione...</option>
                                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                    </select>
                                    <div id="obrigatorio-sexo" class="form-text div-msg-erro">Sexo invalido!</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label class="form-label">Tipo de usuário <span class="aterisco-text">*</span></label>
                                    <select class="form-select input-cadastro" id="Input-tipo-usuario" name="tipo_usuario">
                                        <option value="3" {{ old('tipo_usuario') == '3' ? 'selected' : '' }}>Funcionário</option>
                                        <option value="1" {{ old('tipo_usuario') == '1' ? 'selected' : '' }}>Administrador</option>
                                        <option value="2" {{ old('tipo_usuario') == '2' ? 'selected' : '' }}>Cliente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <label class="form-label">Contatos <span class="aterisco-text">*</span></label>

                            <div class="col-4">
                                <div>
                                    <select id="select-tipo-contato" class="form-select-contato" name="tipo_contato">
                                        <option value="1" {{ old('tipo_contato') == '1' ? 'selected' : '' }}>E-mail</option>
                                        <option value="2" {{ old('tipo_contato') == '2' ? 'selected' : '' }}>Website</option>
                                        <option value="3" {{ old('tipo_contato') == '3' ? 'selected' : '' }}>Celular</option>
                                        <option value="4" {{ old('tipo_contato') == '4' ? 'selected' : '' }}>Telefone</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <input id="valor-tipo-contato" name="valor_contato" type="text" class="input-contato" placeholder="email@exemplo.com" value="{{ old('valor_contato') }}">
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