@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Módulos</a></li>
    </ol>

    <h1>Módulos</h1><br>
    <a href="{{ route('modules.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Módulo</a>

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
                    <th width="200">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->name }}</td>
                        <td>
                            <a href="{{ route('modules.show', $module->id)}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('modules.edit', $module->id)}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $modules->appends($filters)->links() }}
        @else
            {{ $modules->links() }}
        @endif

    </div>
@stop
