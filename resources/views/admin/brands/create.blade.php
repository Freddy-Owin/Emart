@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Categories</h1>
@stop

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex row justify-content-between">
            <h3>Create a New Category</h3>
            <a href="{{ route('brands.index') }}" class="btn btn-info">Back</a>
        </div>
        <form action="{{ route('brands.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop