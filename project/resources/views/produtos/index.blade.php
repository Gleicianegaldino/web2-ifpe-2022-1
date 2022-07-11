@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

	<div class="row">
        <div class="col">
            <div class="pull-left">
                <h2>Produtos Index</h2>
            </div>            
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
   
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Created</th>
            <th>Updated</th>            
            <th>Action</th>
        </tr>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>
                <a href="{{ url("/produtos/{$produto->id}")  }}">
                    {{$produto->titulo}}
                </a>
            </td>
            <td>{{ $produto->created_at }}</td>
            <td>{{ $produto->updated_at }}</td>            
            
            <td>
                <form action="{{ route('produtos.destroy',$produto->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('produtos.show',$produto->id) }}">Visualizar</a> 
                       
                    <a class="btn btn-primary" href="{{ route('produtos.edit',$produto->id) }}">Editar</a>   
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
