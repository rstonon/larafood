@extends('adminlte::page')

@section('title', "Módulos da Permissão - {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>

<h1>Módulos da Permissão - <b>{{ $permission->name }}</b></h1><br>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('modules.search') }}" method="POST" class="form form-inline">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->name }}</td>
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
    @include('sweetalert::alert')
@stop
