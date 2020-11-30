@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
    <h1>Módulo - <b>{{ $module->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">

            <div class="form-group">
                <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $module->name }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control" value="{{ $module->description }}" disabled>
            </div>

        <form action="{{ route('modules.destroy', $module->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
