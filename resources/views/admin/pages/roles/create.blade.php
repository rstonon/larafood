@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <h1>Cadastrar Novo Cargo</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('roles.store') }}" class="form" method="POST">

            @include('admin.pages.roles._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
