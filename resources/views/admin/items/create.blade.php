@extends('adminlte::page')

@section('titles', 'Dashboard')

@section('content_header')
    <h1>Create Item</h1>
@stop

@section('content')
    {{-- create item  --}}
    <div class="row">
      <div class="col">
        <form action="{{ route('items.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>

          <div class="form-group">
            <label for="img">Img</label>
            <input type="text" name="img" id="img" class="form-control">
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
          </div>

          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" class="form-control">
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
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