@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Cadastrar Novo Usuário</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" class="form" method="POST">

            @include('admin.pages.users._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
