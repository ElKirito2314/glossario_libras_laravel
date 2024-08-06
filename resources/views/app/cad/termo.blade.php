@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($termos->id))
            <form action={{ route('termo.update', $termos->id) }} method="POST">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('termo.store') }} method="POST">
                @csrf
        @endif
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            <input type="hidden" name="id" value="{{ $termos->id ?? '' }}">

            <div class="input-wrapper">
                <select class="custom-input @error('categoria_id') is-invalid @enderror" name="categoria_id">
                    <option value="">Categoria</option>
                    @foreach ($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id || $termos->categoria_id == $cat->id ? 'selected' : '' }}>{{ $cat->nome }}</option>
                    @endforeach
                </select>
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('categoria_id') ? $errors->first('categoria_id') : '' }}
                </span>

            <div class="input-wrapper">
                <input name="termo_port" class="custom-input @error('termo_port') is-invalid @enderror" value="{{ $termos->termo_port ?? old('termo_port') }}" type="text" placeholder="Termo no português">
                @error('termo_port')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('termo_port') ? $errors->first('termo_port') : '' }}
            </span>

            <div class="input-wrapper">
                <input name="definicao" class="custom-input @error('definicao') is-invalid @enderror" value="{{ $termos->definicao ?? old('definicao') }}" type="text" placeholder="Definição">
                @error('definicao')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('definicao') ? $errors->first('definicao') : '' }}
            </span>

            <button class="btn btn-success" type="submit">ENVIAR</button>
        </form> 
    </div>
@endsection