<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::paginate(20);
        Paginator::useBootstrap();
        return view('cidade.lista', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::select('nome', 'id')->pluck('nome', 'id');
        return view('cidade.formulario', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade();
        $cidade->fill($request->all());
        $cidade->save();
        $request->session()->flash('mensagem_sucesso', 'Cidade salva com sucesso!');
        return Redirect::to('cidades/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        $cidade = Cidade::find($cidade)->first();
        $estados = Estado::select('nome', 'id')->pluck('nome', 'id');
        return view('cidade.formulario', compact('cidade', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        $cidade->fill($request->all());
        $cidade->save();
        $request->session()->flash('mensagem_sucesso', 'Cidade alterada com sucesso!');
        return Redirect::to('cidades/'.$cidade->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        $cidade->delete();
        $request->session()->flash('mensagem_sucesso', 'Cidade excluida com sucesso!');
        return Redirect::to('cidades');
    }
}
