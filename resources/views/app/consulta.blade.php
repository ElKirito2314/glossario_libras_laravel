@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="direita-design"></div>
        <div class="titulo-app">
                <b><ins>CONSULTAS</ins></b>
                GLOSSÁRIO
                <b>IFBA</b>
        </div>

            <div class="midia">
                <img src="{{ asset('img/sala_aula.jpg') }}" alt="">
            </div>

            <div class="row mt-5"></div>
            <div class="cadastro-quadro">
                <div class="cadastro">
                    <a href="{{ route('categoria.index') }}"><h4> <i class="bi bi-journal-plus"></i> Categorias</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('termo.index') }}"><h4> <i class="bi bi-journal-plus"></i> Termos</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('sinal.index') }}"><h4> <i class="bi bi-journal-plus"></i> Sinais</h4></a>
                </div>
            </div>
    </div>
@endsection