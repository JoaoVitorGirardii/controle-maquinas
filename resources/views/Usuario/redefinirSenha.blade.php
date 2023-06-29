@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/login.css'])
@endsection

@section('titulo','Login')

@section('conteudo')

<div class="container centraliza-card">
        <div class="msg-informacoes"> 
            
            @if (session('error'))
                @include('layouts.msg',['tipoMsg' => 'msg-erro', 'msg' => session('error')])
            @endif
    
        </div>
        <div class="msg-informacoes">
            @include('layouts.msg',['tipoMsg' => 'warning-insert', 'msg' => 'Para o primeiro acesso é obrigatório a troca da senha!'])
        </div>
        <div class="card card-login">
            <div class="card-body">
                <form method="POST" action="{{url('/consistesenha')}}" id="form-login" >

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="InputSenha" autocomplete="current-password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirmar senha</label>
                        <input name="confirmacao_senha" type="password" class="form-control" id="InputSenha" autocomplete="current-password">
                    </div>
                    
                    <div class="btns-opcoes-form">
                        <div>
                            {{-- so pro btn ficar na direita --}}
                        </div>
                        <div>
                            <button id="btn-submit" type="submit" class="btn btn-confirmar">Confirmar</button>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>

@endsection

@section('scripts')
{{-- <script src="{{url('js/contents.js')}}"></script> --}}
@endsection
