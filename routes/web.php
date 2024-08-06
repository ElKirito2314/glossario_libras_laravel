<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index');   
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])
    ->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])
    ->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])
    ->name('site.contato');
Route::get('/conteudos', [\App\Http\Controllers\ConteudoController::class, 'index'])
    ->name('site.conteudo');
Route::get('/sinais', [App\Http\Controllers\SinalController::class, 'sinais'])
    ->name('site.sinal');

Auth::routes();


Route::middleware('auth')->prefix('/app')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('app.home');
    Route::get('/cadastro', [\App\Http\Controllers\CadastroController::class, 'index'])
        ->name('app.cadastro');
    Route::get('/consulta', [\App\Http\Controllers\ConsultaController::class, 'index'])
        ->name('app.consulta');

    Route::resource('sinal', App\Http\Controllers\SinalController::class);
    Route::resource('termo', App\Http\Controllers\TermoController::class);
    Route::resource('categoria', App\Http\Controllers\CategoriaController::class);
});

