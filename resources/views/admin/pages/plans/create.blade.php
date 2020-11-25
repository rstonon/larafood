@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
    <div class="card-header">
        #filtros
    </div>
    <div class="card-body">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="price" class="form-control" placeholder="Preço">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control" placeholder="Descrição">
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
            </div>
        </form>
    </div>

@stop
