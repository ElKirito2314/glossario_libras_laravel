@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-lista">
        <h1>Listagem de Categorias</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $cat)
                        <tr>
                            <td>{{ $cat->nome }}</td>
                            <td>{{ $cat->descricao }}</td>
                            <td>
                                <form id="form_{{$cat->id}}" method="post" action="{{ route('categoria.destroy', $cat->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$cat->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #119c4b"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('categoria.edit', $cat->id) }}"><i class="bi bi-pencil-square" style="color: #119c4b"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                   <div class="pagination justify-content-center">  {{ $categorias->appends($request)->links() }}</div>
                    Exibindo {{ $categorias->count() }} categorias(s) de {{ $categorias->total() }} (de {{ $categorias->firstItem() }} a {{ $categorias->lastItem() }})
                </div>
        </div>
@endsection