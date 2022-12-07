@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Items</h1>
    {{-- add button --}}
    <a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
@stop

@section('content')
    {{-- table of item --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-secondary">View</a>
                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('items.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>
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