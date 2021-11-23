<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class EmpresasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lista(){
        $empresas = Empresa::paginate(20);
        Paginator::useBootstrap();
        return view('empresa.lista', compact('empresas'));
    }

    public function novo(){
        return view('empresa.formulario');
    }

    public function salvar(Request $request){
        $empresa = new Empresa();
        $empresa->fill($request->all());
        $empresa->save();
        $request->session()->flash('mensagem_sucesso', 'Empresa cadastrada com sucesso!');
        return Redirect::to('empresa/novo');
    }

    public function editar($id){
        $empresa = Empresa::findOrFail($id);
        return view('empresa.formulario', compact('empresa'));
    }

    public function atualizar($id, Request $request){
        $empresa = Empresa::find($id);
        $empresa->update($request->all());
        $request->session()->flash('mensagem_sucesso', 'Empresa alterada com sucesso!');
        return Redirect::to('empresa/'.$empresa->id.'/editar');
    }

    public function deletar($id, Request $request){
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        $request->session()->flash('mensagem_sucesso', 'Empresa removida com sucesso');
        return Redirect::to('empresas');
    }
}
