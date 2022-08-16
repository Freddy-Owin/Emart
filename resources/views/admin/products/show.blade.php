@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="container">
        <div class="d-flex row justify-content-center">
            <div class="card mt-3 col-5">
                <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}" height="300px" width="300px">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name : {{ $product->name }}</li>
                        <li class="list-group-item">Description : {{ $product->description }}</li>
                        <li class="list-group-item">Stock : {{ $product->stock }}</li>
                        <li class="list-group-item">Price : {{ $product->price }} $</li>
                        <li class="list-group-item">Category : {{ $product->category->name }}</li>
                        <li class="list-group-item">Brand : {{ $product->brand->name }}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex jusityf-content-start">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning m-2">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-primary m-2">Back</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop