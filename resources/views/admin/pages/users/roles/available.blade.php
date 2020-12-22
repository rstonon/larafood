@extends('adminlte::page')

@section('title', "Cargos Disponíveis para o Cargo - {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id ) }}">Cargos</a></li>
    </ol>

<h1>Cargos Disponíveis para o Cargo - <b>{{ $user->name }}</b></h1><br>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('users.roles.available', $user->id) }}" method="POST" class="form form-inline">
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
            <form action="{{ route('users.roles.attach', $user->id) }}" method="post">
                    @csrf
                    @foreach ($roles as $role)
                    <tr>
                        <td><input type="checkbox" name="roles[]" value="{{ $role->id }}"></td>
                        <td>{{ $role->name }}</td>
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
            {{ $roles->appends($filters)->links() }}
        @else
            {{ $roles->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
