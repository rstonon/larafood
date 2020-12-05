@extends('adminlte::page')

@section('title', "Planos do Módulo - {$module->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modules.index') }}">Módulos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('modules.plans', $module->id) }}" class="active">Planos</a></li>
    </ol>

<h1>Planos do Módulo - <b>{{ $module->name }}</b></h1><br>
    {{-- <a href="{{ route('plans.modules.available', $plan->id) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Módulo</a> --}}

@stop

@section('content')
    <div class="card-header">
    {{-- <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form> --}}
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
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
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
            {{ $plans->appends($filters)->links() }}
        @else
            {{ $plans->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
