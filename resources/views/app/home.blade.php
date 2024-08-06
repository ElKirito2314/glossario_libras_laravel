@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="home-quadro">
            <div class="esquerda"><a href="{{ route('app.cadastro') }}"><img src="{{ asset('img/player_video.jpg')}}" alt=""><h2>CADASTRO</h2><p>Realize aqui os cadastros</p></a></div>
            <div class="centro"><a href="{{ route('site.conteudo') }}"><img src="{{ asset('img/player_video.jpg')}}" alt=""><h2>CONTEÚDOS</h2><p>Veja aqui os conteúdos</p></a></div>
            <div class="direita"><a href="{{ route('app.consulta') }}"><img src="{{ asset('img/player_video.jpg')}}" alt=""><h2>CONSULTAS</h2><p>Realize aqui as consultas</p></a></div>
        </div>
    </div>
@endsection