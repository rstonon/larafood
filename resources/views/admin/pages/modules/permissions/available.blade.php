@extends('adminlte::page')

@section('title', "Permissões Disponíveis para o Módulo - {$module->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modules.index') }}">Módulos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('modules.permissions', $module->id ) }}">Permissões</a></li>
    </ol>

<h1>Permissões Disponíveis para o Módulo - <b>{{ $module->name }}</b></h1><br>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('modules.permissions.available', $module->id) }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            <form action="{{ route('modules.permissions.attach', $module->id) }}" method="post">
                    @csrf
                    @foreach ($permissions as $permission)
                    <tr>
                        <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                        <td>{{ $permission->name }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $permissions->appends($filters)->links() }}
        @else
            {{ $permissions->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
