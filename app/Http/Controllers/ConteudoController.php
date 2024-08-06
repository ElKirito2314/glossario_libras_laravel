<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Sinais;
use App\Models\Termos;

class ConteudoController extends Controller
{
    public function index() {
        $categorias = categorias::all();
        $sinais = sinais::all();
        return view('site.conteudo', ['titulo' => 'Conteúdos', 'sinais' => $sinais, 'categorias' => $categorias]);
    }
    
}
