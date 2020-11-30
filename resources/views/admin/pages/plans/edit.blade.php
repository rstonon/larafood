@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar Plano - <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.plans._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
