@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/cadastros.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Cadatro de manutenções')

@section('conteudo')

    @include('layouts.navbar', ['isHome' => false])

    <div class="centraliza-vertical mt-5">
        <div class="container centraliza-card">

            <div class="d-flex justify-content-center align-items-center text-center flex-column">
                
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
            
            <div class="card-header"> CADASTRO DE MÁQUINAS </div>
        </div>
        <p style="color:white">Ops!! Nada por aqui por enquanto.. volte mais tarde!</p>
    </div>
@endsection