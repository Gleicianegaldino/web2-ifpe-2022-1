@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Adicione um novo produto</h2>
            </div>
        </div>
    </div>

    <!-- Sistema pra exibir mensagens de erro-->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> There is a problem with the data entered: <br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--Formulario-->
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!--Título-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}"
                        required maxlength="255">
                </div>
            </div>
        </div>

        <!--Descrição-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Descrição: </strong>
                    <textarea name="descricao" class="form-control"
                        required>{{ old('descricao') }}</textarea>
                </div>
            </div>
        </div>

        <!--Quantidade-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Quantidade: </strong>
                    <input type="number" name="quantidade" class="form-control"
                        value="{{ old('quantidade') }}" required>
                </div>
            </div>
            <!--Valor-->
            <div class="col">
                <div class="form-group">
                    <strong>Valor: </strong>
                    <input type="number" name="valor" class="form-control" value="{{ old('valor') }}"
                        required>
                </div>
            </div>
        </div>

        <!--Tag-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Tags: </strong>
                    <select class="form-select" aria-label="Default select example" name="tags_id[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!--Imagem-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Imagem:</strong>
                    <input id="image" type="file" name="image" class="form-control"
                        value="{{ old('image') }}" required>
                </div>
            </div>
        </div>

        <!--Submit-->
        <br>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn col btn-primary">Adicionar</button>
            </div>
        </div>

    </form>

</div>

@endsection
