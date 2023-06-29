@extends('Layouts.padrao')

@section('tags')
    @vite(['resources/css/consultas.css'])
    @vite(['resources/js/consultas.js'])
    {{-- "moment" usado para formatar datas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> 
@endsection

@section('titulo','Consulta de máquinas')

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
         
        <h3 class="titulo-consultas">Consulta de máquinas</h3>

        {{-- VALIDAÇÃO PAR QUANDO NÃO TIVER REGISTROS NA TABELA --}}
        @if (!$rows->isEmpty())
            
            <div class="table-responsive">
                <table class="table table-striped tabela-personalizada">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            
                                @foreach ($cols as $item)
                                    @if ($item != "Id") {{-- usuário não precisa saber o id --}} 
                                        <th scope="col">{{$item}}</th>
                                    @endif
                                @endforeach
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($rows as $item)
                        {{-- form do icone de confirmar --}}
                        <form action="{{ route('edit.registro', ['tabela' => 'tbmaquinas', 'id' => $item->id]) }}" method="POST" >
                            @csrf @method('PUT')
                            {{-- return ['Id','Nome','Marca','Data de fabricação','Data de aquisição','Valor de compra','Potência(cv)','Capacidade do tanque(L)']; --}}
                            <tr id="{{$item->id}}">
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $item->id }}</td> --}}
                                <td><input type="text" class="inputs-edit" name='nome' value="{{ $item->nome }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='marca' value="{{ $item->marca_id }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='data_fabricacao' value="{{ $item->data_fabricacao }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='data_aquisicao' value="{{ $item->data_aquisicao }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='valor_compra' value="{{ $item->valor_compra }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='potencia' value="{{ $item->potencia }}" readonly></td>
                                <td><input type="text" class="inputs-edit" name='capacidade_tanque' value="{{ $item->capacidade_tanque }}" readonly></td>

                                <td>
                                    <div class="acoes">

                                        {{-- icone editar --}}
                                        <button type="button" class="acao acoes-editar" name="{{$item->id}}" id="edit-{{$item->id}}" data-toggle="tooltip" data-placement="top" title="editar linha">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
                                    
                                        {{-- icone confirmar --}}
                                        <button type="submit" class="acao acoes-editar-confirma" name="{{$item->id}}" id="confirma-{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Salvar alterações" hidden>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                            </svg>
                                        </button>

                                        {{-- button abre modal --}}
                                        <button type="button" class="acao acoes-excluir" data-id="{{$item->id}}" data-descricao="{{$item->nome}}" data-bs-toggle="modal" data-bs-target="#modalConfirmaExclusao">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalConfirmaExclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content modal-confirmacao">
                        {{-- remover o id vai ser passado pelo input e a table atabém pode ser passada pelo input --}}
                        <form action="{{ route('delete',['tabela' => 'tbmaquinas']) }}" method="POST">
                            @csrf @method("DELETE")
                            <input id="id-delete" type="hidden" name="id" value="">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                            </div>
                            <div id="conteudo-campo" class="modal-body body-confirmacao">
                                Deseja excluir realmento o usuario <strong>{{$item->nome}}</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        @else
            @include('layouts.msg',['tipoMsg' => 'msg-consulta-sem-registros'])
        @endif
    </div>
@endsection