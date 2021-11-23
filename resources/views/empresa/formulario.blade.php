@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Informe os dados da Empresas
                <a href="{{ url('empresas') }}" class="btn btn-outline-success btn-sm float-right">Listar Empresas</a>
            </div>
            <div class="card-body">
                @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{  Session::get('mensagem_sucesso') }}</div>
                @endif
                @if(Request::is('*/editar'))
                    {!! Form::model($empresa, ['method'=>'PATCH', 'url'=>'empresa/'.$empresa->id]) !!}
                @else
                    {!! Form::open(['method'=>'POST', 'url'=>'empresa/salvar']) !!}
                @endif
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) !!}
                {!! Form::label('endereco', 'Endereço') !!}
                {!! Form::input('text', 'endereco', null, ['class'=>'form-control', 'placeholder'=>'Endereço']) !!}
                {!! Form::label('telefone', 'Telefone') !!}
                {!! Form::input('text', 'telefone', null, ['class'=>'form-control', 'placeholder'=>'Telefone']) !!}
                {!! Form::label('cidade', 'Cidade') !!}
                {!! Form::input('text', 'cidade', null, ['class'=>'form-control', 'placeholder'=>'Cidade']) !!}
                {!! Form::label('responsavel', 'Responsável') !!}
                {!! Form::input('text', 'responsavel', null, ['class'=>'form-control', 'placeholder'=>'Responsável']) !!}
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) !!}
                {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
