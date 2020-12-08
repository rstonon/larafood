@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categoria - <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">

            <div class="form-group">
                <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" cols="30" rows="10" class="form-control" disabled>{{ $category->description }}</textarea>
            </div>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
