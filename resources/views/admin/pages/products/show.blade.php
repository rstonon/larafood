@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produto - <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">


            <div class="form-group">
                <label>Imagem:</label><br/>
                {{-- <input type="text" name="name" class="form-control" value="{{ $product->name }}" disabled> --}}
                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width:200px;">
            </div>

            <div class="form-group">
                <label>Título:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->title }}" disabled>
            </div>
            <div class="form-group">
                <label>Flag:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->flag }}" disabled>
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->price }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" cols="30" rows="10" class="form-control" disabled>{{ $product->description }}</textarea>
            </div>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
@stop
