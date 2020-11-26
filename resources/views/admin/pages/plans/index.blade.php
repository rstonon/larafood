@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>

    <h1>Planos</h1><br>
    <a href="{{ route('plans.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Plano</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="200">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('details.plan.index', $plan->url)}}" class="btn bg-gradient-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('plans.show', $plan->url)}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('plans.edit', $plan->url)}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $plans->appends($filters)->links() }}
        @else
            {{ $plans->links() }}
        @endif

    </div>
@stop
