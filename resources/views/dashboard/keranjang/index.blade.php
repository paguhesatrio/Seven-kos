@extends('dashboard.layouts.main')@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Favorit anda</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
@endif

<section id="rekomendasi">
    <div class="row">
        @foreach ($keranjangs as $keranjang)
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="card card__kos p-2">
                    <div class="kota position-absolute rounded px-3 py-2" style="background-color: rgba(0, 0, 0, 0)"><a
                            class="text-decoration-none text-white fw-bold"
                            href="/posts?province={{ $keranjang->post->province->slug }}">{{ $keranjang->post->province->name }}</a>
                    </div>
                    <div class="kota position-absolute rounded"
                        style="background-color: rgba(0, 0, 0, 0); right: 15px;margin-top: 7px"><a
                            class="text-decoration-none text-white" href="/posts/{{ $keranjang->post->slug }}"><img
                                src="/img/eye.svg" alt=""></a></div>
                    <div class="kota position-absolute rounded"
                        style="background-color: rgba(0, 0, 0, 0); left: 15px;margin-top: 208px">
                        <h4>Rp {{ $keranjang->post->price }}</h4>
                    </div>
                    <a href="/posts/{{ $keranjang->post->slug }}">
                        @if ($keranjang->post->image)
                            <img src="{{ asset('storage/' . $keranjang->post->image) }}"
                                alt="{{ $keranjang->post->province->name }}" class="card-img-top">
                        @else
                            <img src="https://source.unsplash.com/1200x1500?{{ $keranjang->post->province->name }}"
                                alt="{{ $keranjang->post->province->name }}" class="card-img-top">
                        @endif
                    </a>
                    <div class="card-body">
                        <span class="d-flex justify-content-between">
                            <h3 class="card-title"><a class="text-decoration-none"
                                    href="/posts/{{ $keranjang->post->slug }}">{{ $keranjang->post->name }}</a>
                            </h3>
                            <a href="/posts?jenis={{ $keranjang->post->jenis->slug }}"
                                class="text-decoration-none jenis__kos">
                                {{ $keranjang->post->jenis->name }}
                            </a>
                            <form action="/dashboard/keranjang/{{ $keranjang->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span data-feather="x-circle" class="align-text-bottom"></span>
                                </button>
                            </form>
                        </span>
                        <p style="margin-top: -10px">
                            <small class="sub__title">
                                Pemilik: <a class="text-decoration-none"
                                    href="/posts?author={{ $keranjang->post->author->username }}">{{ $keranjang->post->author->name }}</a>
                                terakhir update {{ $keranjang->post->updated_at->format('d-m-y') }}
                            </small>
                        </p>
                        <div class="d-flex align-items-lg-center" style="margin-top: -10px">
                            <div>
                                <img src="/img/map.svg" class="d-block d-lg-inline mx-auto" alt="">
                            </div>
                            <p class="card-text" style="margin-left: 5px; display: inline-block; width: 600px">
                                {{ $keranjang->post->alamat }}</p>
                        </div>
                        <div class="card-fasilitas mt-4 d-flex justify-content-between px-4">
                            <span>
                                <img src="/img/bed.png" alt=""> {{ $keranjang->post->kamar }}
                                <h6>Kamar Kos</h6>
                            </span>
                            <span class="text-center">
                                <img src="/img/bathtub.png" alt="">
                                <h6>{{ $keranjang->post->kamarmandi }}</h6>
                            </span>
                            <span>
                                <img src="/img/bedroom.png" alt=""> {{ $keranjang->post->tipekamar }} meter
                                <h6>Luas Kamar</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
