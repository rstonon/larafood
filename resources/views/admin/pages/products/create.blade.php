@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Cadastrar Novo Produto</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">



            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cadastro</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    @include('admin.pages.products._partials.form')
                </div>
                <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
            </div>

        </form>
    </div>
    @include('sweetalert::alert')
@stop
