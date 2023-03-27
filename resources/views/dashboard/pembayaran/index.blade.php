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
    @can('admin')
    <a href="/dashboard/semuapembayaran" class="btn btn-primary">Semua Pembayaran</a>
    @endcan
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kos</th>
                <th scope="col">Kota</th>
                <th scope="col">Status</th>
                <th scope="col">Pemilik</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->post->name }}</td>
                    <td>{{ $pembayaran->post->regency->name }}</td>
                    <td>{{ $pembayaran->status }}</td>
                    <td>{{ $pembayaran->post->author->username }}</td>
                    {{-- <td>{{ $pembayaran->post->rekening }}</td> --}}
                    <td>
                        <a href="{{ $pembayaran->post->bayar }} " onclick="return confirm('Agar Pembayaran lebih Aman Hubungi Pemilik Kos dan jika sudah melakukan pembayaran harap di screenshot')" class="badge bg-success"><span data-feather="dollar-sign"
                                class="align-text-bottom"></span></a>
                        <a href="/dashboard/pembayaran/{{ $pembayaran->slug }}/edit" class="badge bg-warning"><span
                                data-feather="edit" class="align-text-bottom"></span></a>
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
