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
            <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
        </div>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="category_id">Category ID</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="" disabled selected> </option>
                       @foreach ($category as $index)
                           <option value="{{ $index->id }}">{{ $index->name }}</option>
                       @endforeach
                    </select>
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