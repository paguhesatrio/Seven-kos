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
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Kota</th>
                <th scope="col">Jenis</th>
                <th scope="col">pemilik</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->regency->name }}</td>
                    <td>{{ $post->jenis->name }}</td>
                    <td>{{ $post->author->username }}</td>
                    <td>
                        <a href="/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"
                                class="align-text-bottom"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit" class="align-text-bottom"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
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
