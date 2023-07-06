{{-- 
* Navbar padrão para ser ultilizada em todas as páginas
* só é exibido o icone de opções no home, para evitar algum possivel problema futuro
* caso o inone sejá exibido em mais alguma lugar deixar informado nesse arquivo
* exibições do incone ("Home")    
--}}

<nav class="navbar navbar-dark navbar-padrao" id="navbar-padrao-sistema">
    <div class="container-fluid container-navbar-padrao">
            {{-- acesso as configurações só se da pela home e para o administrador do sistema --}}
            @if (isset($isHome) && $isHome && isset($tipo_usuario) && in_array($tipo_usuario, ['admin']))
                {{-- btn acesso as configurações --}}
                <div class="col-1">
                    <button class="btn-configuracao" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list icone-configuracoes" viewBox="0 0 14 14">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button> 
                </div>
                {{-- menu lateral Inicio --}}
                <div class="col-2">
                    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Configurações</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="navbar-brand navbar-titulo" href="{{ url('/home') }}">
                        <img class="img-nova" src="{{ asset('img/img_com_texto_sem_fundo.png') }}" alt="MaqControl">
                    </a>
                </div>
                {{-- menu lateral Fim --}}
            @else
                <div class="col-1">
                    {{-- só exite pq não é a página home --}}
                </div>
                <div class="col-2">
                    <a class="navbar-brand navbar-titulo" href="{{ url('/home') }}">
                        <img class="img-nova" src="{{ asset('img/img_com_texto_sem_fundo.png') }}" alt="MaqControl">
                    </a>
                </div>
            @endif

        
        <div class="col-5 alinhamento-opcoes">
            {{-- <a href="#" class="nav-link-navbar" data-bs-toggle="dropdown" aria-expanded="false">Cadastros</a> --}}
            
            @if (isset($tipo_usuario) && in_array($tipo_usuario, ['admin','cliente']))
                <div class="dropdown-center">
                    <button class="btn-opcoes-navbar dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </button>
                    <ul class="dropdown-menu ul-dropdown-navbar">
                        <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/cadastro/usuario') }}">Usuário</a></li>
                        <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/cadastro/maquina') }}">Máquina</a></li>
                        <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/cadastro/servico') }}">Serviços</a></li>
                        <li><a class="dropdown-item a-dropdown-navbar disabled" href="{{ url('/cadastro/manutencao') }}">Manutenções</a></li>
                    </ul>
                </div>
            @endif

            <div class="dropdown-center">
                <button class="btn-opcoes-navbar dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Consultar
                </button>
                <ul class="dropdown-menu ul-dropdown-navbar">
                    <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/consulta/usuario') }}">Usuário</a></li>
                    <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/consulta/maquina') }}">Máquina</a></li>
                </ul>
            </div>   

            <a href="{{ url('/consulta/servico') }}" class="nav-link-navbar">Serviços</a>
            <a href="{{ url('/consulta/manutencao') }}" class="nav-link-navbar">Manutenções</a>   
            <a href="#" class="nav-link-navbar">Relatórios</a>
        </div>
        <div class="col-4 alinhamento-usuario-logado">
            <div>

                <div class="dropdown-center">
                    <a href="#" class="nav-link-usuario-navbar">{{ Auth::user()->nome }}</a>
                    <button class="btn-usuario" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 17 17">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu ul-dropdown-navbar">
                        <li><a class="dropdown-item a-dropdown-navbar disabled-link-navbar" href="#">Contatos</a></li>
                        <li><a class="dropdown-item a-dropdown-navbar disabled-link-navbar" href="#">Perfil</a></li>
                        <li><a class="dropdown-item a-dropdown-navbar" href="{{ url('/loginout') }}">Sair</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>