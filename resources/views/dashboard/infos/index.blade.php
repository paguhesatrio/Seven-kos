@extends('dashboard.layouts.main')@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Info</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-12">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemilik Kos</th>
                <th scope="col">slug</th>
                <th scope="col">status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($infos as $kamar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kamar->author->username }}</td>
                    <td>{{ $kamar->slug }}</td>
                    <td>{{ $kamar->status }}</td>
                <td>
                    <form action="/dashboard/infos/{{ $kamar->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <span data-feather="x-circle" class="align-text-bottom"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
