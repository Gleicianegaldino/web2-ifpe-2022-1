@extends('layouts.app')
@section('content')

<div class="mx-auto" style="width: 800px;">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tags</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $tag->id }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="form-group">
                <strong>Nome:</strong>
                #{{ $tag->name }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="form-group">
                <strong>Updated:</strong>
                {{ $tag->updated_at }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="form-group">
                <strong>Created:</strong>
                {{ $tag->created_at }}
            </div>
        </div>
    </div>


</div>

@endsection
