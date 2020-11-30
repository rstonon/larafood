@extends('adminlte::page')

@section('title', 'Permissóes')

@section('content_header')
    <h1>Cadastrar Nova Permissão</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('permissions.store') }}" class="form" method="POST">

            @include('admin.pages.permissions._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
