@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Cadastrar Nova Mesa</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('tables.store') }}" class="form" method="POST">

            @include('admin.pages.tables._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
