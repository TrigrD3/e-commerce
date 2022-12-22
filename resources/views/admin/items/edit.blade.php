@extends('adminlte::page')

@section('titles', 'Dashboard')

@section('content_header')
    <h1>Edit</h1>
@stop

@section('content')
    {{-- edit item detail --}}
  
      <div class="row">
        <div class="col">
          <form action="{{ route('items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
            </div>

            <div class="form-group">
              <label for="img">Image</label>
              <div>
                <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="" width="100px">
              </div>

              <input type="text" name="img" id="img" class="form-control" value="{{ $item->img }}">
  
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}">
            </div>

            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="text" name="stock" id="stock" class="form-control" value="{{ $item->stock }}">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $item->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop