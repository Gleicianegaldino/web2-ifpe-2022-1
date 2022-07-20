@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col">
            <div class="pull-left">
                <h2>Tags Index</h2>
            </div>
        </div>
    </div>

    <!-- Sistema pra exibir mensagens de erro e sucesso-->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>#{{ $tag->name }}</td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at }}</td>

                <td>
                    <form action="{{ route( 'tags.destroy' ,$tag->id) }}" method="POST">
                        <a class="btn btn-info"
                            href="{{ route('tags.show' ,$tag->id) }}">Visualizar</a>
                        <a class="btn btn-primary"
                            href="{{ route('tags.edit', $tag->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

</div>

@endsection
