@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($sinais->id))
            <form action={{ route('sinal.update', $sinais->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('sinal.store') }} method="POST" enctype="multipart/form-data">
                @csrf
        @endif
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            <input type="hidden" name="id" value="{{ $sinais->id ?? '' }}">

            <div class="input-wrapper">
                <select class="custom-input @error('termo_id') is-invalid @enderror" name="termo_id">
                    <option value="">Termo</option>
                    @foreach ($termos as $ter)
                        <option value="{{ $ter->id }}" {{ old('termo_id') == $ter->id || $sinais->termo_id == $ter->id ? 'selected' : '' }}>{{ $ter->termo_port }}</option>
                    @endforeach
                </select>
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('termo_id') ? $errors->first('termo_id') : '' }}
                </span>

            <div class="input-wrapper">
                <input name="midia" class="custom-input @error('midia') is-invalid @enderror" value="{{ $sinais->midia ?? old('midia') }}" type="file" placeholder="Mídia">
                @error('midia')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('midia') ? $errors->first('midia') : '' }}
            </span>

            <div class="input-wrapper">
                <input name="descricao" class="custom-input @error('descricao') is-invalid @enderror" value="{{ $sinais->descricao ?? old('descricao') }}" type="text" placeholder="Descrição">
                @error('descricao')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
            </span>

            <div class="input-wrapper">
                <input name="fonte" class="custom-input @error('fonte') is-invalid @enderror" value="{{ $sinais->nome ?? old('fonte') }}" type="text" placeholder="Fonte">
                @error('fonte')
                    <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                @enderror
            </div>
            <span class="custom-invalid-feedback" role="alert">
                {{ $errors->has('fonte') ? $errors->first('fonte') : '' }}
            </span>

            <button class="btn btn-success" type="submit">ENVIAR</button>
        </form> 
    </div>
@endsection