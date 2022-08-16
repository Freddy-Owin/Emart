@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex row justify-content-around">
        <div class="content-title col-8">
            <h2>Edit Product</h2>
        </div>
        <div class="col-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
        <div class="container">
            <div class="d-flex row justify-content-center">
                <div class="card col-8">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                                @foreach ($category as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="" class="form-control">
                                <option value="{{ $product->brand_id }}">{{ $product->brand->name }}</option>
                                @foreach ($brand as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control">
                                {{ $product->description }}
                            </textarea>
                        </div>
                        <div class="form-gourp">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" name="image" onchange="loadFile(event)">
                            <img src="{{ asset('storage/products') }}/{{ $product->image }}" id="output" alt="Product Image" width="130px" height="130px" class="mt-2">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Edit</button>
                    </div>
                </div>
                   
            </div>
            
        </div>
    </form>
    <script>
        var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop