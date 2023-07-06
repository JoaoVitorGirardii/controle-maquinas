@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/consultas.css'])
    @vite(['resources/js/consultas.js'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Consulta de manutenções')


@section('conteudo')
    @include('layouts.navbar')

    <div class="container mt-5">
        {{-- adicionar para ser column os itens e não um ao lado do outro --}}
        <div class="msg-informacoes"> 
            
            @if (session('isSuccess'))
                @include('layouts.msg',['tipoMsg' => 'success-delete-edit', 'msg' => session('isSuccess')])
            @endif
    
            @if (session('isError'))
                @include('layouts.msg',['tipoMsg' => 'danger-delete-edit', 'msg' => session('isError')])
            @endif
           
            <div id="edicaoRegistro" hidden>
                @include('layouts.msg',['tipoMsg' => 'warning-edit'])
            </div>

        </div>
         
        <h3 class="titulo-consultas">Consulta de manutenções</h3>

        <p style="color:white">Ops!! Nada por aqui por enquanto.. volte mais tarde!</p>
    </div>

@endsection