@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuário - <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">

            @include('admin.includes.alerts')

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
            </div>

            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
                <label>Empresa:</label>
                <input type="text" name="tenant" class="form-control" value="{{ $user->tenant->name }}" disabled>
            </div>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
