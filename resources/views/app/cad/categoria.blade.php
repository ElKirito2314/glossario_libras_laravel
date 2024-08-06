@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($categorias->id))
            <form action={{ route('categoria.update', $categorias->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('categoria.store') }} method="POST" enctype="multipart/form-data">
                @csrf
        @endif
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            <input type="hidden" name="id" value="{{ $categorias->id ?? '' }}">

            <div class="input-wrapper">
                <input name="nome" class="custom-input @error('nome') is-invalid @enderror" value="{{ $categorias->nome ?? old('nome') }}" type="text" placeholder="Nome">
                @error('nome')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </span>

            <div class="input-wrapper">
                <input name="midia" class="custom-input @error('midia') is-invalid @enderror" value="{{ $categorias->midia ?? old('midia') }}" type="file" placeholder="Mídia">
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('midia') ? $errors->first('midia') : '' }}
            </span>

            <div class="input-wrapper">
                <input name="descricao" class="custom-input @error('descricao') is-invalid @enderror" value="{{ $categorias->descricao ?? old('descricao') }}" type="text" placeholder="Descrição">
                @error('descricao')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
            </span>

            <button class="btn btn-success" type="submit">ENVIAR</button>
        </form> 
    </div>
@endsection