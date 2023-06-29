@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/servico.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Serviços')

@section('conteudo')
    @include('layouts.navbar', ['isHome' => false])

    <div class="container mt-5">
            
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
        
        <div class="accordion" id="accordionServicos">

            @foreach ($servico as $item)
                
                <div class="accordion-item-personalizado mt-1">
                    <h2 class="accordion-header-personalizado">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                            <div>
                                {{$item->id}} - {{$item->descricao}}
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                </svg>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionServicos">
                        <div class="accordion-body">
                            Tabela com os dias trabalhados...
                        </div>
                    </div>
                </div>

            @endforeach
            
        </div>
    </div>

@endsection