@extends("Layouts.padrao")

@section('titulo')
    Home
@endsection

@section('tags')
    @vite(['resources/css/home.css'])
@endsection

@section('conteudo')

    {{-- incluindo a navbar --}}
    @include('Layouts.navbar')

    <div class="container container-pricipal mt-3">
        <p>Tipo de usuário: 
        @if (isset($tipo_usuario))
            {{$tipo_usuario}}
        @endif 
        </p>
        <p>Bem vindo a home page do site!!!</p>
        
    </div>

@endsection
      
