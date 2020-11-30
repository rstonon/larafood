@extends('adminlte::page')

@section('title', "Adicionar novo Detalhe ao Plano - {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.create', $plan->url) }}">Novo</a></li>
    </ol>

    <h1>Cadastrar Novo Detalhe</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('details.plan.store', $plan->url) }}" class="form" method="POST">

            @include('admin.pages.plans.details._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
