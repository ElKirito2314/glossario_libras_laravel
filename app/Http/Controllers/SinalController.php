<?php

namespace App\Http\Controllers;

use App\Models\Sinais;
use App\Models\Termos;
use Illuminate\Http\Request;

class SinalController extends Controller
{
    public function sinais(Request $request)
    {
        $categoria_id = $request->input('categoria_id');
        $termos = termos::where('categoria_id', $categoria_id)->pluck('id');
        $sinais = sinais::whereIn('termo_id', $termos)->paginate(5);
        return view('site.sinal', ['titulo' => 'Sinais', 'sinais' => $sinais, 'termos' => $termos, 'request' => $request->all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sinais = sinais::paginate(3);
        return view('app.list.sinal', ['titulo' => 'Lista de Sinais', 'sinais' => $sinais, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sinais = new sinais();
        $termos = termos::all();
        return view('app.cad.sinal', ['titulo' => 'Cadastro de Sinais', 'cadTitulo' => 'Cadastro de Sinais', 'termos' => $termos, 'sinais' => $sinais]);
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
            'termo_id' => 'required',
            'fonte' => 'required',
            'descricao' => 'required'
        ];

        $feedback = [
            'descricao.required' => 'Preencha a descrição, por favor!',
            'termo_id.required' => 'Selecione o termo, por favor!',
            'fonte.required' => 'Preencha a fonte, por favor!'
        ];

        $request->validate($regras, $feedback);

        $sinais = new sinais();
        $sinais->fill($request->except('midia'));
    
        if ($request->hasFile('midia')) {
            $imagem = $request->file('midia');
            if ($imagem->isValid()) {
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->storeAs('public/img/', $imagemNome);
                $sinais->midia = 'img/' . $imagemNome;
            } else {
                return redirect()->back()->withErrors(['midia' => 'Falha no upload da mídia.']);
            }
        }
    
        $sinais->save();

        return redirect()->route('sinal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sinais $sinais)
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
        $sinais = sinais::find($id);
        $termos = termos::all();
        return view('app.cad.sinal', ['titulo' => 'Edição de Sinais', 'cadTitulo' => 'Edição de Sinais', 'termos' => $termos, 'sinais' => $sinais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinais $sinais)
    {
        $regras = [
            'termo_id' => 'required',
            'fonte' => 'required',
            'descricao' => 'required'
        ];

        $feedback = [
            'descricao.required' => 'Preencha a descrição, por favor!',
            'termo_id.required' => 'Selecione o termo, por favor!',
            'fonte.required' => 'Preencha a fonte, por favor!'
        ];

        $request->validate($regras, $feedback);

        $sinais = sinais::find($request->input('id'));
        $sinais->fill($request->except('midia'));
    
        if ($request->hasFile('midia')) {
            $imagem = $request->file('midia');
            if ($imagem->isValid()) {
                if ($sinais->midia && file_exists(public_path($sinais->midia))) {
                    unlink(public_path($sinais->midia));
                }
    
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->storeAs('public/img', $imagemNome);
                $sinais->midia = 'img/' . $imagemNome;
            } else {
                return redirect()->back()->withErrors(['midia' => 'Falha no upload da mídia.']);
            }
        }
    
        $sinais->save();

        return redirect()->route('sinal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sinais::find($id)->delete();
        return redirect()->route('sinal.index');
    }
}
