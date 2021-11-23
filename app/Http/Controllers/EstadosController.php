<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class EstadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estados = Estado::paginate(20);
        Paginator::useBootstrap();
        return view('estado.lista', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estado.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $estado = new Estado();
        $estado->fill($request->all());
        $estado->save();
        $request->session()->flash('mensagem_sucesso', 'Estado salvo com sucesso!');
        return Redirect::to('estados/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
        $estado = Estado::find($estado->id);
        return view('estado.formulario', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $estado = Estado::find($id);
        $estado->fill($request->all());
        $estado->save();
        $request->session()->flash('mensagem_sucesso', 'Estado alterado com sucesso!');
        return Redirect::to('estados/'.$estado->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $estado = Estado::find($id);
        $estado->delete();
        $request->session()->flash('mensagem_sucesso', 'Estado removido com sucesso!');
        return Redirect::to('estados');
    }
}
