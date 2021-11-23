@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Lista de Empresas
                <a href="{{ url('empresa/novo') }}" class="btn btn-outline-success btn-sm float-right">Nova Empresa</a>
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
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Cidade</th>
                            <th>Responsável</th>
                            <th>E-mail</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->id }}</td>
                                <td>{{ $empresa->nome }}</td>
                                <td>{{ $empresa->endereco }}</td>
                                <td>{{ $empresa->telefone }}</td>
                                <td>{{ $empresa->cidade }}</td>
                                <td>{{ $empresa->responsavel }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>
                                    <a href="{{ url('empresa/'.$empresa->id.'/editar') }}" class="btn btn-sm btn-outline-primary">
                                        Editar
                                    </a>
                                    {!! Form::open(['method'=>'DELETE', 'url'=>'empresa/'.$empresa->id, 'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $empresas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
