@switch($tipoMsg)
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{--                    MENSAGENS PARA HORA DE INSERIR REGISTROS                                                                                                   --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @case('danger-insert')

        <div name="msg-aviso" class="alert alert-danger-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle icon-msg" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            @if (isset($msg) && $msg != "")
                {{$msg}}
            @else
                Não foi possível gravar os dados.
            @endif
        </div>

        @break

    @case('warning-insert')
        
        <div name="msg-aviso" class="alert alert-warning-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle icon-msg" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
            </svg>
            @if (isset($msg) && $msg != "")
                {{$msg}}
            @else
                Existem campos obrigatórios não preenchidos.
            @endif
        </div>

        @break

    @case('success-insert')

        <div name="msg-aviso" class="alert alert-success alert-success-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle icon-msg"  viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
            @if (isset($msg) && $msg != "")
                {{$msg}}
            @else
                Cadastro realizado com sucesso.
            @endif    
        </div>

        @break
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{--                    MENSAGENS PARA HORA DE DELETAR/EDITAR REGISTROS                                                                                            --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @case('danger-delete-edit')

        <div name="msg-aviso" class="alert alert-danger-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle icon-msg" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            @if (isset($msg) && $msg !== "")
                {{$msg}}
            @else
                Erro ao deletar/editar o registro.
            @endif
        </div>
        
        @break
    
    @case('success-delete-edit')

        <div name="msg-aviso" class="alert alert-success alert-success-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle icon-msg"  viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
            @if (isset($msg) && $msg !== "")
                {{$msg}}
            @else
                Registro deletado/editado com sucesso.
            @endif    
        </div>

        @break

    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{--                    MENSAGENS PARA HORA DE EDITAR REGISTROS                                                                                            --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @case('warning-edit')

        <div name="msg-aviso" class="alert alert-warning-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle icon-msg" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
            </svg>
            @if (isset($msg) && $msg !== "")
                {{$msg}}
            @else
                Atenção você habilitou a edição de registro!!
            @endif
        </div>
        
        @break

    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{--                    MENSAGENS PARA QUANDO A CONSULTA NÃO RETORNAR NADA                                                                                         --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @case('msg-consulta-sem-registros')

        <div class="alert alert-warning-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle icon-msg" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
            </svg>
            @if (isset($msg) && $msg !== "")
                {{$msg}}
            @else
                Nenhum registro encontrado!
            @endif
        </div>   

        @break

    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    {{--                    MENSAGENS PARA QUANDO DER ALGUM ERRO MUDAR O VALOR DA MSG                                                                                  --}}
    {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    @case('msg-erro')

        <div class="alert alert-warning-personalizado" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle icon-msg" viewBox="0 0 16 16">
                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
            </svg>
            @if (isset($msg) && $msg !== "")
                {{$msg}}
            @else
                
            @endif
        </div>   

        @break

    @default
        
@endswitch