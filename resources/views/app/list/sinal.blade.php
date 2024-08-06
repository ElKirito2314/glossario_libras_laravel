@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-lista">
        <h1>Listagem de Sinais</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Termo</th>
                        <th>Descrição</th>
                        <th>Fonte</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sinais as $sin)
                        <tr>
                            <td>{{ $sin->termo_id }}</td>
                            <td>{{ $sin->descricao }}</td>
                            <td>{{ $sin->fonte }}</td>
                            <td>
                                <form id="form_{{$sin->id}}" method="post" action="{{ route('sinal.destroy', $sin->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$sin->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #119c4b"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('sinal.edit', $sin->id) }}"><i class="bi bi-pencil-square" style="color: #119c4b"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                   <div class="pagination justify-content-center">  {{ $sinais->appends($request)->links() }}</div>
                    Exibindo {{ $sinais->count() }} sinais(s) de {{ $sinais->total() }} (de {{ $sinais->firstItem() }} a {{ $sinais->lastItem() }})
                </div>
        </div>
@endsection