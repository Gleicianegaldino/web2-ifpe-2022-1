@extends('layouts.app')
@section('content')

<h2>Produtos</h2>

<ul>
    <ol>{{ $produto->id }}</ol>
    <ol>{{ $produto->titulo }}</ol>
    <ol>{{ $produto->descricao }}</ol>
    <ol>{{ $produto->quantidade }}</ol>
    <ol>{{ $produto->valor }}</ol>
</ul>



@endsection
