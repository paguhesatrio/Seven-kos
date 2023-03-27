{{-- @dd($news) --}}

@extends('layouts.main')

@section('container')

    <h1 class="text-center text-success fw-bold">{{ $title }}</h1>

    <section class="berita">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <form action="/blog">
                        @if (request('jenberita'))
                            <input type="hidden" name="jenberita" value="{{ request('jenberita') }}">
                        @endif
                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="Cari..." name="search" id="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-2 mt-4">
            @if ($news->count())
                <div class="col-12 col-md-12 col-lg-12 mb-5">
                    <div class="card card__berita text-bg-dark">
                        <a href="/blog/{{ $news[0]->slug }}">
                            @if ($news[0]->image)
                                <img src="{{ asset('storage/' . $news[0]->image) }}" alt="{{ $news[0]->jenberita->name }}"
                                    class="card-img img-fluid">
                            @else
                                <img src="https://source.unsplash.com/1200x1500?{{ $news[0]->jenberita->name }}"
                                    alt="{{ $news[0]->jenberita->name }}" class="card-img img-fluid">
                            @endif
                        </a>
                        <div class="card-img-overlay">
                            <a class="text-decoration-none text-white jenis__berita fw-bold"
                                href="/posts?category={{ $news[0]->jenberita->slug }}">{{ $news[0]->jenberita->name }}</a>
                                <h3 class="card-title mt-3"><a class="text-decoration-none"
                                        href="/blog/{{ $news[0]->slug }}">{{ $news[0]->title }}</a></h3>
                                <small>
                                    Penulis <a class="text-decoration-none"
                                        href="/news?author={{ $news[0]->author->username}}">{{ $news[0]->author->name }}</a>
                                    dibuat {{ $news[0]->updated_at->format('d-m-y') }}
                                </small>
                                </p>
                                <p class="card-text mt-4"><a class="text-decoration-none"
                                    href="/blog/{{ $news[0]->slug }}">{{ strip_tags( \Illuminate\Support\Str::words($news[0]->body, 15,'...')) }};</a></p>
                        </div>
                    </div>
                </div>

                @foreach ($news->skip(1) as $new)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card subcard__berita">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="/blog/{{ $new->slug }}">
                                    @if ($new->image)
                                        <img src="{{ asset('storage/' . $new->image) }}"
                                            alt="{{ $new->jenberita->name }}" class="img-fluid rounded-start">
                                    @else
                                        <img src="https://source.unsplash.com/1200x1500?{{ $new->jenberita->name }}"
                                            alt="{{ $new->jenberita->name }}" class="img-fluid rounded-start">
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a class="text-decoration-none jenis__berita fw-bold"
                                        href="/posts?category={{ $new->jenberita->slug }}">{{ $new->jenberita->name }}</a>
                                        <h3 class="card-title"><a class="text-decoration-none"
                                            href="/blog/{{ $new->slug }}">{{ $new->title }}</a></h3>
                                    <small>
                                        Penulis <a class="text-decoration-none"
                                            href="/news?author={{ $new->author->username }}">{{ $new->author->name }}</a>
                                        dibuat {{ $new->updated_at->format('d-m-y') }}
                                    </small>
                                    <p class="card-text">{{ strip_tags( \Illuminate\Support\Str::words($new->body, 15,'...')) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    @else
        <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
    @endif


        <div class="d-flex justify-content-center mb-5">
            {{ $news->links() }}
        </div>
    </section>
@endsection
