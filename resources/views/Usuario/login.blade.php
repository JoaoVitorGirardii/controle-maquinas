@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/login.css'])
@endsection

@section('titulo','Login')

@section('conteudo')


<div class="container centraliza-card">

        <div class="d-flex justify-content-center align-items-center text-center">
            @if (session('SenhaOuUsuarioInvalido'))
                @include('layouts.msg',['tipoMsg' => 'warning-insert', 'msg' => 'Senha ou Usuário incorreto!'])
            @endif
        </div>

        <div class="card card-login">
            <div class="card-body">
                <form method="POST" action="{{url('/login')}}" id="form-login" >

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Usuário</label>
                        <input name="cpf" type="text" class="form-control" id="Inputcpf" aria-describedby="cpfHelp" maxlength="14" autocomplete="username">
                        <div id="cpfHelp" class="form-text">Login com o CPF.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="InputSenha" autocomplete="current-password">
                    </div>
                    
                    <div class="btns-opcoes-form">
                        <div>
                            {{-- só para deixar o botão  na direita --}}
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
