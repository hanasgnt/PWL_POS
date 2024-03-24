@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" onclick="window.location.href='kategori/create'">Add
                    Kategori</button>
                {{-- <a class= "btn-group flex-wrap" href="kategori/create">+ Tambah Kategori</a> --}}
                <br><br>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
