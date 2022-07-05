@extends('layouts.app')
@section('content')

<!--Titulo-->
<div class="row">
    <div class="col-lg-margin-tb">
        <div class="pull-left">
            <h2>Adicione um novo produto</h2>
        </div>
    </div>
</div>

<!--Formulario-->
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Título: </strong>
                <input type="text" name="titulo" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Descrição: </strong>
                <textarea name="descricao" class="form-control"> </textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Quantidade: </strong>
                <input type="number" name="quantidade" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Valor: </strong>
                <input type="number" name="valor" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn col btn-primary">Adicionar</button>
        </div>
    </div>

</form>

@endsection
