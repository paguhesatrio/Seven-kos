@extends('layouts.main')

@section('container')
    <h1 class="text-center text-success fw-bold mb-4">{{ $title }}</h1>
    <section id="fitur" class="overflow-hidden">
            <div class="container">
                <div class="row">
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <a href="/posts?category={{ $category->slug }}" class="text-decoration-none">
                                    <div class="card card__kategori bg-dark">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->name }}">
                                        @else
                                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}"
                                                alt="{{ $category->name }}">
                                        @endif
                                        <div class="card-img-overlay d-flex align-items-center p-0">
                                            <h5 class="card-title text-center flex-fill text-uppercase p-4 fs-3 fw-bold"
                                                style="background-color: rgba(0, 0, 0, 0.0)">{{ $category->name }}
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
        @endif
    </section>
@endsection
