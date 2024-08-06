@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-lista">
        <h1>Listagem de Termos</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Termo em Português</th>
                        <th>Definição</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($termos as $ter)
                        <tr>
                            <td>{{ $ter->categorias->nome ?? 'Categoria removida' }}</td>
                            <td>{{ $ter->termo_port }}</td>
                            <td>{{ $ter->definicao }}</td>
                            <td>
                                <form id="form_{{$ter->id}}" method="post" action="{{ route('termo.destroy', $ter->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$ter->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #119c4b"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('termo.edit', $ter->id) }}"><i class="bi bi-pencil-square" style="color: #119c4b"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                   <div class="pagination justify-content-center">  {{ $termos->appends($request)->links() }}</div>
                    Exibindo {{ $termos->count() }} termos(s) de {{ $termos->total() }} (de {{ $termos->firstItem() }} a {{ $termos->lastItem() }})
                </div>
        </div>
@endsection