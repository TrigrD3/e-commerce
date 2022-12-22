@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>List Admins</h1>
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
                            <th scope="col">User ID</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Mulai Kerja</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tanggal_mulai_kerja }}</td>
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