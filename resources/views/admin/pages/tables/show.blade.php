@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesa - <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">

            <div class="form-group">
                <label>Identificador:</label>
            <input type="text" name="name" class="form-control" value="{{ $table->identify }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" cols="30" rows="10" class="form-control" disabled>{{ $table->description }}</textarea>
            </div>

        <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
