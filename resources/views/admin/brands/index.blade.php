@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    Brands
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
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Brands</th>
                <th>
                    <a href="{{ route('brands.create') }}" class="btn btn-success">Create</a>
                </th>
            </tr>
        </thead>   
        <tbody>
            @foreach ($brand as $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>
                        <form action="{{ route('brands.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>   
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop