<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{asset('css/login.css')}}"> --}}
    {{-- links extras como o de css --}}
    @yield('tags')
    {{-- vite acessa a pasta resources por padrao em todas as peginas tem o "contents" para usar as formatações ja feitas para outras views--}}
    @vite(['resources/js/contents.js'])
    @vite(['resources/css/padrao.css'])

    {{-- importa as bibliotecas para usar o mask no jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    {{-- titulo da pagina --}} 
    <title>@yield('titulo')</title>
</head>
<body>
    {{-- conteudo da pagina --}}
    <div class="conteudo-pagina">
        @yield('conteudo')
    </div>

    @yield('scrypts')
    {{-- <script src="{{url('js/contents.js')}}"></script>    --}}
</body>
<footer>
    {{-- Padrão em todas as paginas --}}
    <div class="footer-informacoes">
        <div class="row informacoes">
            <div class="col-4 informacoes-desenvolvimento">Desenvolvido por: João Vitor Girardi</div>
            <div class="col-4 informacoes-nome-marca">MaqControl &reg;</div>
            {{-- controle de versão X.YYY.ZZZ --}}
            {{-- X = versão do sistema caso ele tenha alguma mudança de layout muito grandes mudase a versão X --}}
            {{-- YYY = melhorias que ocorrem durante a ultilização do sistema caso seja criada alguma coisa nova por exemplo uma nova tela de consulta para funcionarios acessar --}}
            {{-- ZZZ = numero da verão do banco de dados caso seja adicionado mais alguma migration se altera a versão ZZZ --}}
            {{-- caso o ZZZ ou YYY passem de 999 se adiciona +1 ao X --}}
            <div class="col-4 informacoes-versao">v1.001.001</div>
        </div>
    </div>
</footer>
</html>