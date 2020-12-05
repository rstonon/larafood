@extends('adminlte::page')

@section('title', "Módulos do Plano - {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.modules', $plan->id) }}">Módulos</a></li>
    </ol>

<h1>Módulos do Plano - <b>{{ $plan->name }}</b></h1><br>
    <a href="{{ route('plans.modules.available', $plan->id) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Módulo</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('modules.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->name }}</td>
                        <td>
                            <a href="{{ route('plans.module.detach', [$plan->id, $module->id])}}" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $modules->appends($filters)->links() }}
        @else
            {{ $modules->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
