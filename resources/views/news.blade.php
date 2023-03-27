@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none" style="color: #048853; font-weight: 700;"> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/blog" class="text-decoration-none" style="color: #048853; font-weight: 700;"> Semua
                            Berita
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts?category={{ $news->jenberita->slug }}" class="text-decoration-none"
                            style="color: #048853; font-weight: 700;">
                            {{ $news->jenberita->name }}
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-12 col-md-12 col-lg-12 subberita">
            @if ($news->image)
                <div style="overflow: hidden;" class="subberita__img mb-3">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->jenberita->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $news->jenberita->name }}"
                    alt="{{ $news->jenberita->name }}" class="img-fluid mb-3" style="width: 100%; border-radius: 5px; height: 400px;">
            @endif

            <div class="row g-5">
                <div class="col-md-8">
                    <article class="blog-post">
                        <h2 class="mb-2 fw-bold">
                            {{ $news->title }}
                        </h2>
                        <h6 class="text-muted">
                            Dibuat {{ $news->created_at->diffForHumans() }}
                            oleh
                            <a href="/news?author={{ $news->author->username }}" class="text-decoration-none text-muted">{{ $news->author->name }}
                            </a>
                            <a href="/news?jenberita={{ $news->jenberita->slug }}"
                                class="text-decoration-none btn jenis__berita">{{ $news->jenberita->name }}
                            </a>
                        </h6>

                        <p>{{ strip_tags( \Illuminate\Support\Str::words($news->body, 30)) }}</p>
                        <hr>
                        <p>{!! $news->body !!}</p>
                    </article>
                </div>

                <div class="col-md-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-light rounded">
                            <h4 class="fst-italic">Tentang</h4>
                            <p class="mb-0">{{ strip_tags( \Illuminate\Support\Str::words($news->body, 15)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
