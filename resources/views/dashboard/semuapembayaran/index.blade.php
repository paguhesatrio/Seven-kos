@extends('dashboard.layouts.main')@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pemesanan Anda</h1>
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
                <th scope="col">pemesan</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Kota</th>
                <th scope="col">Status</th>
                <th scope="col">Pemilik</th>
                <th scope="col">No rekening</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->author->username }}</td>
                    <td>{{ $pembayaran->post->name }}</td>
                    <td>{{ $pembayaran->post->regency->name }}</td>
                    <td>{{ $pembayaran->status }}</td>
                    <td>{{ $pembayaran->post->author->username }}</td>
                    <td>{{ $pembayaran->post->rekening }}</td>
                    <td> <a href="{{ asset('storage/' . $pembayaran->image) }}" data-toggle="lightbox"
                        data-gallery="example-gallery">
                        <img src="{{ asset('storage/' . $pembayaran->image) }}" style="width:40px;height:40px;" >
                    </a></td>

                    <td>
                        <a href="/dashboard/pembayaran/{{ $pembayaran->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit" class="align-text-bottom"></span></a>
                        <a href="/dashboard/infos/create" class="btn btn-primary">info</a>
                         <form action="/dashboard/pembayaran/{{ $pembayaran->slug }}" method="POST" class="d-inline">
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
