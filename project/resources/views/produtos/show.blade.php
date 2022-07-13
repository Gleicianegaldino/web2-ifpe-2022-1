@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col">
            <div class="pull-left">
                <h2>Produtos</h2>
            </div>
        </div>
    </div>

    @isset($produto->image)
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagem:</strong>
                <img src="{{ asset('storage/'.$produto->image->path) }}">

            </div>
        </div>
    </div>
    @endisset

    <div class="card ">
        <div class="card-header">
            <h1>{{ $produto->titulo }}</h1>
        </div>

        <div class="card-body">
            <p class="card-text">{{ $produto->descricao }}</p>
        </div>
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col-3">Id: {{$produto->id}} </div>
                <div class="col-3">Quantidade: {{$produto->quantidade}} </div>
                <div class="col-3">Valor: {{$produto->valor}} </div>
                <div class="col-3">Created: {{$produto->created_at}} </div>
                <div class="col-3">Updated: {{$produto->updated_at}} </div>
            </div>
        </div>
    </div>

</div>

@endsection
