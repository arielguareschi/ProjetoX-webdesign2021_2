<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    //

    public function teste(){
        //echo "Estou no teste do controller!";
        return view('teste');
    }

    public function teste2($valor){
        //return view('teste2', ['valor'=>$valor]);
        $outra = "outra";
        return view('teste2', compact('valor', 'outra'));
        //echo "aqui2 " . $valor;
    }
}
