@extends('dashboard.layouts.main')@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Berita</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/news/create" class="btn btn-primary">Buat Berita Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Jenis Berita</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $news)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->jenberita->name }}</td>
                    <td>
                        <a href="/blog/{{ $news->slug }}" class="badge bg-info"><span data-feather="eye"
                                class="align-text-bottom"></span></a>
                        <a href="/dashboard/news/{{ $news->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit" class="align-text-bottom"></span></a>
                        <form action="/dashboard/news/{{ $news->slug }}" method="POST" class="d-inline">
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
