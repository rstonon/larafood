@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}">Mesas</a></li>
    </ol>

    <h1>Mesas</h1><br>
    <a href="{{ route('tables.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Nova Mesa</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('tables.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>Descrição</th>
                    <th width="250">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $table->identify }}</td>
                        <td>{{ $table->description }}</td>
                        <td>
                            <a href="{{ route('tables.show', $table->id)}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('tables.edit', $table->id)}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $tables->appends($filters)->links() }}
        @else
            {{ $tables->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
