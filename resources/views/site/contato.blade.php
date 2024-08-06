@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

<div class="conteudo-pagina py-5">
    <div class="container">
        <div class="titulo-pagina text-center mb-4">
            <h1>Entre em contato conosco</h1>
        </div>
        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos, 'classe' => 'borda-preta'])
                <p class="text-muted text-center mb-4"><b>A nossa equipe retornará dentro de 72 horas</b></p>
                @endcomponent
            </div>
        </div>
    </div>
</div>

@endsection
