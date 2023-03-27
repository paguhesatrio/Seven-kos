{{-- @dd($post) --}}

@extends('layouts.main')

@section('container')

    <h1 class="text-center text-success fw-bold">{{ $title }}</h1>

    <div class="row d-flex justify-content-center mb-5 mt-5">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="/post">
                @if (request('province'))
                    <input type="hidden" name="province" value="{{ request('province') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group input-cari mb-3 mx-auto">
                    <input type="search" class="form-control input__search" placeholder="Cari berdasarkan lokasi..."
                        name="search" id="search" value="{{ request('search') }}">
                    <button class="btn btn-danger button-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>



    <section id="rekomendasi">
        <div class="container">
            <div class="row">
                @if ($kamars->count())
                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="card card__kos p-2">
                            <div class="kota position-absolute rounded px-3 py-2"
                                style="background-color: rgba(0, 0, 0, 0)">
                                <a class="text-decoration-none text-white fw-bold"
                                    href="/kamars?province={{ $kamars[0]->post->province->slug }}">{{ $kamars[0]->post->province->name }}</a>
                            </div>
                            <div class="kota position-absolute rounded"
                                style="background-color: rgba(0, 0, 0, 0); right: 15px;margin-top: 7px"><a
                                    class="text-decoration-none text-white" href="/kamars/{{ $kamars[0]->slug }}"><img
                                        src="/img/eye.svg" alt=""></a></div>
                            <div class="kota position-absolute rounded"
                                style="background-color: rgba(0, 0, 0, 0); left: 15px;margin-top: 208px">
                                <h4>Rp {{ $kamars[0]->post->price }}</h4>
                            </div>
                            <a href="/kamars/{{ $kamars[0]->slug }}">
                                @if ($kamars[0]->post->image)
                                    <img src="{{ asset('storage/' . $kamars[0]->post->image) }}"
                                        alt="{{ $kamars[0]->post->province->name }}" class="card-img-top">
                                @else
                                    <img src="https://source.unsplash.com/1200x1500?{{ $kamars[0]->post->province->name }}"
                                        alt="{{ $kamars[0]->post->province->name }}" class="card-img-top">
                                @endif
                            </a>
                            <div class="card-body">
                                <span class="d-flex justify-content-between">
                                    <h3 class="card-title"><a class="text-decoration-none"
                                            href="/kamars/{{ $kamars[0]->slug }}">{{ $kamars[0]->post->name }}</a>
                                    </h3>
                                    <a href="/kamars?jenis={{ $kamars[0]->post->jenis->slug }}"
                                        class="text-decoration-none jenis__kos">
                                        {{ $kamars[0]->post->jenis->name }}
                                    </a>
                                </span>
                                <p style="margin-top: -10px">
                                    <small class="sub__title">
                                        Pemilik: <a class="text-decoration-none"
                                            href="/kamars?author={{ $kamars[0]->post->author->username }}">{{ $kamars[0]->post->author->name }} </a>
                                        terakhir update {{ $kamars[0]->post->updated_at->format('d-m-y') }}
                                    </small>
                                </p>
                                <div class="d-flex align-items-lg-center" style="margin-top: -10px">
                                    <div>
                                        <img src="/img/map.svg" class="d-block d-lg-inline mx-auto" alt="">
                                    </div>
                                    <p class="card-text" style="margin-left: 5px; display: inline-block; width: 600px">
                                        {{ $kamars[0]->post->alamat }}</p>
                                </div>
                                <div class="card-fasilitas mt-4 d-flex justify-content-between px-4">
                                    <span>
                                        <img src="/img/bed.png" alt=""> {{ $kamars[0]->post->kamar }}
                                        <h6>Kamar Kos</h6>
                                    </span>
                                    <span class="text-center">
                                        <img src="/img/bathtub.png" alt="">
                                        <h6>{{ $kamars[0]->post->kamarmandi }}</h6>
                                    </span>
                                    <span>
                                        <img src="/img/bedroom.png" alt=""> {{ $kamars[0]->post->tipekamar }} meter
                                        <h6>Luas Kamar</h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>



{{-- -----------------------------------------------------------------------------------------------------------------------------------}}
                    @foreach ($kamars->skip(1) as $kamar)
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <div class="card card__kos p-2">
                                <div class="kota position-absolute rounded px-3 py-2"
                                    style="background-color: rgba(0, 0, 0, 0)"><a
                                        class="text-decoration-none text-white fw-bold"
                                        href="/kamars?province={{ $kamar->post->province->slug }}">{{ $kamar->post->province->name }}</a>
                                </div>
                                <div class="kota position-absolute rounded"
                                    style="background-color: rgba(0, 0, 0, 0); right: 15px;margin-top: 7px"><a
                                        class="text-decoration-none text-white" href="/kamars/{{ $kamar->slug }}"><img
                                            src="/img/eye.svg" alt=""></a></div>
                                <div class="kota position-absolute rounded"
                                    style="background-color: rgba(0, 0, 0, 0); left: 15px;margin-top: 208px">
                                    <h4>Rp {{ $kamar->post->price }}</h4>
                                </div>
                                <a href="/kamars/{{ $kamar->slug }}">
                                    @if ($kamar->post->image)
                                        <img src="{{ asset('storage/' . $kamar->post->image) }}"
                                            alt="{{ $kamar->post->province->name }}" class="card-img-top">
                                    @else
                                        <img src="https://source.unsplash.com/1200x1500?{{ $kamar->post->province->name }}"
                                            alt="{{ $kamar->post->province->name }}" class="card-img-top">
                                    @endif
                                </a>
                                <div class="card-body">
                                    <span class="d-flex justify-content-between">
                                        <h3 class="card-title"><a class="text-decoration-none"
                                                href="/kamars/{{ $kamar->slug }}">{{ $kamar->post->name }}</a>
                                        </h3>
                                        <a href="/kamars?jenis={{ $kamar->post->jenis->slug }}"
                                            class="text-decoration-none jenis__kos">
                                            {{ $kamar->post->jenis->name }}
                                        </a>
                                    </span>
                                    <p style="margin-top: -10px">
                                        <small class="sub__title">
                                            Pemilik: <a class="text-decoration-none"
                                                href="/kamars?author={{ $kamar->post->author->username }}">{{ $kamar->post->author->name }}</a>
                                            terakhir update {{ $kamar->post->updated_at->format('d-m-y') }}
                                        </small>
                                    </p>
                                    <div class="d-flex align-items-lg-center" style="margin-top: -10px">
                                        <div>
                                            <img src="/img/map.svg" class="d-block d-lg-inline mx-auto" alt="">
                                        </div>
                                        <p class="card-text"
                                            style="margin-left: 5px; display: inline-block; width: 600px">
                                            {{ $kamar->post->alamat }}</p>
                                    </div>
                                    <div class="card-fasilitas mt-4 d-flex justify-content-between px-4">
                                        <span>
                                            <img src="/img/bed.png" alt=""> {{ $kamar->post->kamar }}
                                            <h6>Kamar Kos</h6>
                                        </span>
                                        <span class="text-center">
                                            <img src="/img/bathtub.png" alt="">
                                            <h6>{{ $kamar->post->kamarmandi }}</h6>
                                        </span>
                                        <span>
                                            <img src="/img/bedroom.png" alt=""> {{ $kamar->post->tipekamar }} meter
                                            <h6>Luas Kamar</h6>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>

        </div>
    @else
        <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
        @endif

    </section>

@endsection
