@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')

    @if (session("created"))
    <div class="alert alert-success" role="alert">
        {{ session("created") }}
    </div>
    @endif
    @if (session("deleted"))
    <div class="alert alert-danger" role="alert">
        {{ session("deleted") }}
    </div>
    @endif
    @if (session("updated"))
    <div class="alert alert-info" role="alert">
        {{ session("updated") }}
    </div>
    @endif
    <div class="container">
        <div class="d-flex row justify-content-center">
            <div class="col-10">
                <table class="mt-2 table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>
                                <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/products') }}/{{ $item->image }}" alt="" width="50px" height="50px">    
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->price }} $</td>
                            <td>
                                <a href="{{ route('products.show', $item->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
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