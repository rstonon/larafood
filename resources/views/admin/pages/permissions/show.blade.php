@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissão - <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">

            <div class="form-group">
                <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control" value="{{ $permission->description }}" disabled>
            </div>

        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
