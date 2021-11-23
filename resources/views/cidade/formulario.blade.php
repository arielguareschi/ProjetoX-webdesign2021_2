@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Informe os dados da Cidade
                <a href="{{ url('cidades') }}" class="btn btn-outline-success btn-sm float-right">Listar Cidades</a>
            </div>
            <div class="card-body">
                @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{  Session::get('mensagem_sucesso') }}</div>
                @endif
                @if(Route::is('cidades.show'))
                    {!! Form::model($cidade, ['method'=>'PATCH', 'url'=>'cidades/'.$cidade->id]) !!}
                @else
                    {!! Form::open(['method'=>'POST', 'url'=>'cidades']) !!}
                @endif
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) !!}
                {!! Form::label('estado_id', 'Estado') !!}
                {!! Form::select('estado_id', $estados, null, ['class'=>'form-control', 'placeholder'=>'Selecione o estado']) !!}
                {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
