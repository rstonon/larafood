@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Plano - <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">
        #filtros
    </div>
    <div class="card-body">

            <div class="form-group">
                <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="{{ $plan->name }}" disabled>
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="price" class="form-control" value="R$ {{ number_format($plan->price, 2, ',', '.') }}" disabled>
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control" value="{{ $plan->description }}" disabled>
            </div>

        <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>

@stop
