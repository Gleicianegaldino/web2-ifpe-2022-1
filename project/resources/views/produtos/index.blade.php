@extends('layouts.app')
@section('content')

<h2>Produtos Index</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th width="280px">Ação</th>
    </tr>
    @foreach ($produtos as $produto)
    <tr>
        <td>{{ $produto->id }}</td>
        <td>
            <a href="{{ url("/produtos/ {$produto->id}") }}">
                {{$produto->titulo }}
            </a>
        </td>

        <td>
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                <a href="{{ route('produtos.show', $produto->id) }}">Show</a>
                <a href="{{ route('produtos.edit', $produto->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</table>



@endsection
