@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/servico.css'])
    @vite(['resources/css/consultas.css'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Serviços')

@section('conteudo')
    @include('layouts.navbar', ['isHome' => false])

    <div class="container mt-5">
            
        <div class="d-flex justify-content-center align-items-center text-center flex-column">

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
         
        <h3 class="titulo-consultas">Serviços</h3>

        @if (!$servico->isEmpty())
            <div class="accordion" id="accordionServicos">

                @foreach ($servico as $item)
                    
                    <div class="accordion-item-personalizado mt-1">
                        <h2 class="accordion-header-personalizado">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                <div>
                                    <div class="titulo-servico">
                                        {{$item->id}} - {{$item->cliente}}
                                    </div>
                                    <div class="status-servico-{{$status_serv[$item->status_id-1]['tipo']}}">
                                        {{$status_serv[$item->status_id-1]['tipo']}}
                                    </div>
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
                                <p><span class="span-info">Cliente:</span>  {{$item->cliente}}</p>
                                <p><span class="span-info">Descricao:</span> {{$item->descricao}}</p>
                                <p><span class="span-info">Local do serviço:</span> {{$item->local_servico}}</p>
                                <p><span class="span-info">Número residência:</span> {{$item->numero}}</p>
                                <p><span class="span-info">Data de inicio:</span> {{$item->data_inicio}}</p>
                                <p><span class="span-info">Data de Fim:</span> {{$item->data_fim}}</p>
                                <p><span class="span-info">Status:</span> {{$status_serv[$item->status_id-1]['tipo']}}</p>

                                {{-- Se for finalizado não pode mais alterar o status --}}
                                @if ($item->status_id !== 3)
                                    <div class="div-selecionar-status">
                                        <div>
                                            <label class="form-label">Alterar status</label>
                                            <form class="form-selecionar-status" action="{{ route('edit.registro', ['tabela' => 'tbservico', 'id' => $item->id]) }}" method="POST">
                                                @csrf 
                                                @method('PUT')

                                                <select class="form-select input-status-servico" id="Input-status_id" name="status_id">
                                                
                                                    <option value="-1" selected>Selecione...</option>
                                                
                                                    @foreach ($status_serv as $status)
                                                        {{-- só pode mudar o status para um diferente do atual ou um diferente de cadastrado --}}
                                                        @if ($item->status_id !== $status->id && $status->id !== 1)
                                                            <option value={{$status->id}}>{{$status->tipo}}</option>
                                                        @endif
                                                    @endforeach               
                                                </select>

                                                <button class="btn btn-success" type="submit">OK</button>
                                            </form>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                @endforeach
                
            </div>
        @else
            @include('layouts.msg',['tipoMsg' => 'msg-consulta-sem-registros'])
        @endif
    </div>

@endsection