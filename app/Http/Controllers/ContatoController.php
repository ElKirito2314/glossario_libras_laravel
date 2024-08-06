<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato() 
    {
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
    
    public function salvar(Request $request){
        $regras = [
            'nome' => 'required',
            'telefone' => 'required|min:13|max:13',
            'email' => 'required|email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:1500'
        ];

        $feedback = [
            'nome.required' => 'Preencha o seu :attribute, por favor!',
            'telefone.required' => 'O preenchimento do seu :attribute é obrigatório!',
            'email.required' => 'Preencha seu e-mail, por favor!',
            'email' => 'Insira um e-mail válido!',
            'motivo_contato.required' => 'Por favor, selecione o motivo do seu contato!',
            'telefone.min' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
            'telefone.max' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
            'mensagem.required' => 'Por favor, digite aqui a sua :attribute',
            'mensagem.max' => 'Este campo tem limite de 1500 caracteres'
        ];

        $request->validate($regras, $feedback);
        
        $contato = new SiteContato();
        $contato->fill($request->all());

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $contato->save();
            }
            $motivo_contatos = [
                '1' => 'Dúvida',
                '2' => 'Elogio',
                '3' => 'Reclamação'
            ];
            return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
}
