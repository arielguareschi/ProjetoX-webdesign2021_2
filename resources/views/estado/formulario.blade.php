@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Informe os dados do Estado
                <a href="{{ url('estados') }}" class="btn btn-outline-success btn-sm float-right">Listar Estados</a>
            </div>
            <div class="card-body">
                @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{  Session::get('mensagem_sucesso') }}</div>
                @endif
                @if(Route::is('estados.show'))
                    {!! Form::model($estado, ['method'=>'PATCH', 'url'=>'estados/'.$estado->id]) !!}
                @else
                    {!! Form::open(['method'=>'POST', 'url'=>'estados']) !!}
                @endif
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) !!}
                {!! Form::label('uf', 'UF') !!}
                {!! Form::input('text', 'uf', null, ['class'=>'form-control', 'placeholder'=>'UF']) !!}
                {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
