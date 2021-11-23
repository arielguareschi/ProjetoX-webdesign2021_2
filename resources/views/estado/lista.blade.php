@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Lista de Estados
                <a href="{{ url('estados/create') }}" class="btn btn-outline-success btn-sm float-right">Novo Estado</a>
            </div>
            <div class="card-body">
                @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                @endif
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>UF</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $estado)
                            <tr>
                                <td>{{ $estado->id }}</td>
                                <td>{{ $estado->nome }}</td>
                                <td>{{ $estado->uf }}</td>
                                <td>
                                    <a href="{{ url('estados/'.$estado->id) }}" class="btn btn-sm btn-outline-primary">
                                        Editar 
                                    </a>
                                    {!! Form::open(['method'=>'DELETE', 'url'=>'estados/'.$estado->id, 'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $estados->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
