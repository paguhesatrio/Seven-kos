@extends('dashboard.layouts.main')@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kos Anda</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/kamar/create" class="btn btn-primary">Buat Kamar Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Kota</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamars as $kamar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kamar->name }}</td>
                    <td>{{ $kamar->post->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
