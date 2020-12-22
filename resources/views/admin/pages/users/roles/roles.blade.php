@extends('adminlte::page')

@section('title', "Cargos do Usuário - {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id ) }}">Cargos</a></li>
    </ol>

<h1>Cargos do Usuário - <b>{{ $user->name }}</b></h1><br>
    <a href="{{ route('users.roles.available', $user->id) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Cargo</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
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
                    <th width="50">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('users.roles.detach', [$user->id, $role->id])}}" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
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
