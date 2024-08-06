<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = categorias::paginate(3);
        return view('app.list.categoria', ['titulo' => 'Lista de Categorias', 'categorias' => $categorias, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = new categorias();
        return view('app.cad.categoria', ['titulo' => 'Cadastro de Categorias', 'cadTitulo' => 'Cadastro de Categorias', 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required'
        ];

        $feedback = [
            'required' => 'Preencha a :attribute, por favor!',
            'nome.required' => 'Preencha o nome, por favor!'
        ];

        $request->validate($regras, $feedback);

        $categorias = new categorias();
        $categorias->fill($request->except('midia'));

        if ($request->hasFile('midia')) {
            $imagem = $request->file('midia');
            if ($imagem->isValid()) {
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->storeAs('public/img/', $imagemNome);
                $categorias->midia = 'img/' . $imagemNome;
            } else {
                return redirect()->back()->withErrors(['midia' => 'Falha no upload da mídia.']);
            }
        }
    
        $categorias->save();

        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = categorias::find($id);
        return view('app.cad.categoria', ['titulo' => 'Edição de Categorias', 'cadTitulo' => 'Edição de Categorias', 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required',
            'descricao' => 'required'
        ];

        $feedback = [
            'required' => 'Preencha a :attribute, por favor!',
            'nome.required' => 'Preencha o nome, por favor!'
        ];

        $request->validate($regras, $feedback);

        $categorias = categorias::find($request->input('id'));
        $categorias->fill($request->except('midia'));

        if ($request->hasFile('midia')) {
            $imagem = $request->file('midia');
            if ($imagem->isValid()) {
                if ($categorias->midia && file_exists(public_path($categorias->midia))) {
                    unlink(public_path($categorias->midia));
                }
    
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->storeAs('public/img', $imagemNome);
                $categorias->midia = 'img/' . $imagemNome;
            } else {
                return redirect()->back()->withErrors(['midia' => 'Falha no upload da mídia.']);
            }
        }
    
        $categorias->save();

        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorias::find($id)->delete();
        return redirect()->route('categoria.index');
    }
}
