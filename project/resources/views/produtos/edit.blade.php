@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <!--Titulo-->
    <div class="row">
        <div class="col">
            <div class="pull-left">
                <h2>Edição produto</h2>
            </div>
        </div>
    </div>


    <!-- Sistema pra exibir mensagens de erro-->
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> There is a problem with the data entered: <br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <!--Formulario-->
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Título: </strong>
                    <input type="text" name="titulo" class="form-control" value="{{ $produto->titulo }}" required
                        maxlength="150">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Descrição: </strong>
                    <textarea name="descricao" class="form-control" required>{{ $produto->descricao }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Quantidade: </strong>
                    <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade }}"
                        required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Valor: </strong>
                    <input type="number" name="valor" class="form-control" value="{{ $produto->valor }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn col btn-primary">Editar</button>
            </div>
        </div>

    </form>
</div>

@endsection
