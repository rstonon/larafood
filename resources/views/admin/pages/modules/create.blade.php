@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
    <h1>Cadastrar Novo Módulo</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('modules.store') }}" class="form" method="POST">
            @csrf

            @include('admin.includes.alerts')

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $module->name ?? old('name') }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
            </div>

        </form>
    </div>

@stop
