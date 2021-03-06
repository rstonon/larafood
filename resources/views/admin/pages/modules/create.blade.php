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

            @include('admin.pages.modules._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
