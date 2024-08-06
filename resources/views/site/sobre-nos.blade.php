@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

<div class="titulo-pagina text-center mb-4">
    <h1>Olá, bem-vindo ao Glossário de Libras</h1>
</div>
<div class="conteudo-pagina py-5">
        <div class="container">
            <div class="informacao-pagina text-center">
                <p class="text-muted">Bem-vindo ao Glossário de Libras do IFBA Campus Seabra! Nosso objetivo é criar um recurso abrangente e acessível para estudantes e profissionais da área de informática.
                    Este glossário visa facilitar a inclusão e a comunicação através da Língua Brasileira de Sinais (Libras), promovendo um ambiente mais inclusivo e colaborativo.
                    Explore nosso site para descobrir termos técnicos, vídeos explicativos e muito mais!
                </p>
                <img src="{{ asset('img/player_video.jpg') }}" alt="Ruan vídeo" class="img-fluid rounded">
            </div>
        </div>
</div>

@endsection
