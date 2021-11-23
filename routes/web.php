<?php

use App\Http\Controllers\CidadesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Auth;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('teste', function(){
    echo "teste de rota";
});

Route::get('teste/{abc}', function($teste){
    echo "com um parametro " . $teste;
});

Route::get('teste/{var1}/{var2}', function($teste, $outra){
    echo "Ola Mundo! " . $teste . "  -  " . $outra;
});

Route::get('olateste', [TesteController::class, 'teste']);
Route::get('olateste/{valor}', [TesteController::class, 'teste2']);

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/empresas', [EmpresasController::class, 'lista']);
Route::get('/empresa/novo', [EmpresasController::class, 'novo']);
Route::post('empresa/salvar', [EmpresasController::class, 'salvar']);
Route::get('empresa/{empresa}/editar', [EmpresasController::class, 'editar']);
Route::patch('empresa/{empresa}', [EmpresasController::class, 'atualizar']);
Route::delete('empresa/{empresa}', [EmpresasController::class, 'deletar']);


Route::resource('estados', EstadosController::class);
Route::resource('cidades', CidadesController::class);
