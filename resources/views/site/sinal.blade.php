@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
        <div class="container-fluid py-5">
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Pesquisar...">
                <button onclick="search()"><i class="bi bi-search"></i></button>
            </div>
            <script>
                document.getElementById('search-input').addEventListener('keypress', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        search();
                    }
                });
    
                function search() {
                    const query = document.getElementById('search-input').value.toLowerCase();
                    const sinais = document.querySelectorAll('.sinal-item');
                    let count = 0;
    
                    sinais.forEach(sinal => {
                        const termo = sinal.querySelector('.termo').textContent.toLowerCase();
                        if (termo.includes(query)) {
                            sinal.style.display = 'block';
                            count++;
                        } else {
                            sinal.style.display = 'none';
                        }
                    });
    
                    const paginacao = document.querySelector('.paginacao');
                     if (count > 0) 
                    {
                        paginacao.innerHTML = `Exibindo ${count} sinais de ${sinais.length} (de 1 a ${count})`;
                    } 
                    else 
                    {
                        paginacao.innerHTML = `Exibindo 0 sinais de ${sinais.length} (de 0 a 0)`;
                    }
                }
            </script>
                       
            @foreach ($sinais as $sinal)
            <div class="sinal-item">
                <div class="row mb-4" style="border: 1px solid #ccc; padding: 10px;">
                    <div class="col-md-4">
                        <video width="100%" controls>
                            <source src="{{ asset('storage/' . $sinal->midia) }}" type="video/mp4">
                            Seu navegador não suporta o elemento de vídeo.
                        </video>
                    </div>
                    <div class="col-md-8">
                        <h5 class="termo">{{ $sinal->termos->termo_port }}</h5>
                        <p>{{ $sinal->termos->definicao }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="paginacao">
                <div class="pagination justify-content-center">  {{ $sinais->appends($request)->links() }}</div>
                 Exibindo {{ $sinais->count() }} sinais de {{ $sinais->total() }} (de {{ $sinais->firstItem() }} a {{ $sinais->lastItem() }})
             </div>
        </div>
@endsection
