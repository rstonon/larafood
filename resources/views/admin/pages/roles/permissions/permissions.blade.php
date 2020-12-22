@extends('adminlte::page')

@section('title', "Permissões do Cargo - {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.permissions', $role->id ) }}">Permissões</a></li>
    </ol>

<h1>Permissões do Cargo - <b>{{ $role->name }}</b></h1><br>
    <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Nova Permissão</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th width="50">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{ route('roles.permissions.detach', [$role->id, $permission->id])}}" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
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
