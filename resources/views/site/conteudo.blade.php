@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="container-fluid  py-5">
            <div class="row">
                @foreach ($categorias as $cat)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $cat->midia) }}" class="card-img-top" alt="Imagem da Categoria">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $cat->nome }}
                            </h5>
                            <p class="card-text">{{ $cat->descricao }}</p>
                            <div class="text-center">
                                <a href="{{ route('site.sinal', ['categoria_id' => $cat->id]) }}" class="btn btn-primary">Sinais</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection