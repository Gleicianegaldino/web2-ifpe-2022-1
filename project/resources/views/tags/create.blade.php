@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crie uma nova tag</h2>
            </div>
        </div>
    </div>

    <!-- Sistema pra exibir mensagens de erro-->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> there is a problem with the data entered: <br><br>
            <ul>
                @foreach($errors-all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="name" class="form-control" required maxlength="60"
                        value="{{ old('name') }}">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn col btn-primary">Criar</button>
            </div>
        </div>

    </form>

</div>

@endsection
