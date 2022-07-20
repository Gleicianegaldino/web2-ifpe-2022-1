@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit a tag</h2>
            </div>
        </div>
    </div>

    <!-- Sistema pra exibir mensagens de erro-->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>OPS!</strong> There is a problem with the data entered: <br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif

    <form action="{{ route('tags.update' , $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">

                    <strong>Nome:</strong>
                    <input type="text" name="name" class="form-control" required maxlength="60"
                        value="{{ $tag->name }}">

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn col btn-primary">Update</button>
            </div>
        </div>

    </form>
</div>

@endsection
