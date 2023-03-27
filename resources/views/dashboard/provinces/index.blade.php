@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nama Kota</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Provinsi</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($province as $provinsi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $provinsi->name }}</td>
                        <td>{{ $provinsi->slug }}</td>
                        <td>
                            <a href="/dashboard/provinces/{{ $provinsi->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit" class="align-text-bottom"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
