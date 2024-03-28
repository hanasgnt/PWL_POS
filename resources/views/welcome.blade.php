@extends('adminlte::page')
@extends('layout.app')

{{-- Customize layout sections --}}

@section('title', 'Dashboard')
@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}
@section('content_body')
    <p>Welcome to this beautiful admin panel</p>
@stop

{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        console.log("Hi, I'm using the Laravel.AdminLTE package!")
    </script>
@endpush

{{-- P6 - Poin A --}}
{{-- @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Level id</label><input type="text" class="form-control" placeholder="id">
                        <div> <br>
                        </div>
                        <button type = "submit" class ="btn btn-info">Submit </button>
                    </div>
                @stop

                @section('css')
                    Add here extra stylesheets
                    <link rel="stylesheet" href="/css/admin_custom.css">
                @stop

                @section('js')
                    <script>
                        console.log("Hi, I'm using the Laravel-AdminLTE package!");
                    </script>
                @stop --}}
