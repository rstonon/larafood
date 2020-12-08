@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Editar Usuário - <b>{{$user->name}}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.users._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
