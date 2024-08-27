@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <p>IFBA - Instituto Federal de Educação, Ciência e Tecnologia da Bahia</p>
            <h1 class="inicial">Glossário de Libras</h1>
        <p>Campus Seabra</p>
            <h4><a href="https://www.instagram.com/ifba_seabra/" target="_blank"><i class="bi bi-instagram"></i></a></h4>
            <h4><a href="https://www.youtube.com/@IFBACampusSeabra" target="_blank"><i class="bi bi-youtube"></i></a></h4>
    </div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 ">
            <div class="texto-pagina">
                <h2>O primeiro glossário de Libras voltado para a área de informática do IFBA Campus Seabra</h2>
            </div>
                <video width="100%" controls>
                    <source src="{{ asset('img/boas-vindas.mp4') }}" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                </video>
        </div>
        <div class="col-md-4 flex-column align-items-end">
            <h2 class="mb-4">Conheça o nosso projeto</h2>
            <div class="card" style="width: 18rem; text-align: center;">
                <img src="{{ asset('img/sala_aula.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Conheça o nosso projeto</h5>
                    <p class="card-text justify">Bem-vindo ao Glossário de Libras do IFBA Campus Seabra! Nosso objetivo é fornecer um recurso abrangente e acessível para estudantes
                         e profissionais da área de informática, facilitando a inclusão e a comunicação através da Língua Brasileira de Sinais (Libras).</p>
                    <a href="{{ route('site.conteudo') }}" class="btn btn-success text-center">Conhecer</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
<footer class="bg-light text-dark py-2">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="redes-sociais">
                    <h3>Redes sociais</h3>
                    <a href="https://www.instagram.com/ifba_seabra/" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/@IFBACampusSeabra" target="_blank"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="area-contato">
                    <h3>Contato</h3>
                    <p>Estrada Vicinal para Tenda, s/nº, Bairro: Barro Vermelho, Seabra 46.900-000</p>
                    <p><a href="https://portal.ifba.edu.br/seabra">https://portal.ifba.edu.br/seabra</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="localizacao">
                    <h3>Localização</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3896.7541287928852!2d-41.788688724933294!3d-12.399386087865897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x769d0c5fafa5fd9%3A0x2a51de007718e64a!2sIFBa%20Seabra!5e0!3m2!1spt-BR!2sbr!4v1721592582582!5m2!1spt-BR!2sbr"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
