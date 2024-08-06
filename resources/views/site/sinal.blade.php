@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="container-fluid py-5">
            @foreach ($sinais as $sinal)
            <div class="row mb-4" style="border: 1px solid #ccc; padding: 10px;">
                <div class="col-md-4">
                    <video width="100%" controls>
                        <source src="{{ asset('storage/' . $sinal->midia) }}" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
                </div>
                <div class="col-md-8">
                    <h5>{{ $sinal->termos->termo_port }}</h5>
                    <p>{{ $sinal->termos->definicao }}</p>
                </div>
            </div>
            @endforeach
            <div class="paginacao">
                <div class="pagination justify-content-center">  {{ $sinais->appends($request)->links() }}</div>
                 Exibindo {{ $sinais->count() }} sinai(s) de {{ $sinais->total() }} (de {{ $sinais->firstItem() }} a {{ $sinais->lastItem() }})
             </div>
        </div>
    </div>
@endsection
