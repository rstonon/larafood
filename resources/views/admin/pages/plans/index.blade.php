@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1><br>
    <a href="{{ route('plans.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Plano</a>
@stop

@section('content')
    <div class="card-header">
        #filtros
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="100">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('plans.show', $plan->url)}}" class="btn btn-sm bg-gradient-warning"><i class="fas fa-eye"></i> Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $plans->links() }}
    </div>
@stop
