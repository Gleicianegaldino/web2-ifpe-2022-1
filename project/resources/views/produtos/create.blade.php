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
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!--Título-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required
                        maxlength="255">
                </div>
            </div>
        </div>

        <!--Descrição-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Descrição: </strong>
                    <textarea name="descricao" class="form-control" required>{{ old('descricao') }}</textarea>
                </div>
            </div>
        </div>

        <!--Quantidade-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Quantidade: </strong>
                    <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}"
                        required>
                </div>
            </div>
        </div>

        <!--Valor-->
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Valor: </strong>
                    <input type="number" name="valor" class="form-control" value="{{ old('valor') }}" required>
                </div>
            </div>
        </div>

        <!--Submit-->
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn col btn-primary">Adicionar</button>
            </div>
        </div>

    </form>

</div>

@endsection
