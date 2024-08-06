<?php

namespace App\Http\Controllers;

use App\Models\Termos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class TermoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $termos = termos::paginate(10);
        return view('app.list.termo', ['titulo' => 'Lista de Termos', 'termos' => $termos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $termos = new termos();
        $categorias = categorias::all();
        return view('app.cad.termo', ['titulo' => 'Cadastro de Termos', 'cadTitulo' => 'Cadastro de Termos', 'categorias' => $categorias, 'termos' => $termos]);
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
            'categoria_id' => 'required',
            'termo_port' => 'required',
            'definicao' => 'required'
        ];

        $feedback = [
            'definicao.required' => 'Preencha a definição, por favor!',
            'categoria_id.required' => 'Selecione a categoria, por favor!',
            'termo_port.required' => 'Preencha o nome, por favor!'
        ];

        $request->validate($regras, $feedback);

        $termos = new termos();
        $termos->fill($request->all());

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $termos->save();
        }

        return redirect()->route('termo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(termos $termos)
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
        $termos = termos::find($id);
        $categorias = categorias::all();
        return view('app.cad.termo', ['titulo' => 'Edição de Termos', 'cadTitulo' => 'Edição de Termos', 'categorias' => $categorias, 'termos' => $termos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $regras = [
            'categoria_id' => 'required',
            'termo_port' => 'required',
            'definicao' => 'required'
        ];

        $feedback = [
            'definicao.required' => 'Preencha a definição, por favor!',
            'categoria_id.required' => 'Selecione a categoria, por favor!',
            'termo_port.required' => 'Preencha o nome, por favor!'
        ];

        $request->validate($regras, $feedback);

        $termos = termos::find($request->input('id'));
        $termos->update($request->all());

        return redirect()->route('termo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        termos::find($id)->delete();
        return redirect()->route('termo.index');
    }
}
