@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/provinces/{{ $province->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" required autofocus value="{{ old('name', $province->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug', $province->slug) }}" readonly="readonly">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input type="hidden" name="oldImage" value="{{ $province->image }}">
                @if ($province->image)
                    <img src="{{ asset('storage/' . $province->image) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <Script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value).then(response => response.json()).then(
                data => slug.value = data.slug)
        });

        function previewImage() {
            const input = document.querySelector('#image');
            const image = document.querySelector('.img-preview');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }
    </Script>
@endsection
