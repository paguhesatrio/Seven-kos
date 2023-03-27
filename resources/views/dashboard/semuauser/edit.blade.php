@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/semuauser/{{ $users->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name', $users->auth->id) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" required value="{{ old('username', $users->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email', $users->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="text" class="form-control @error('Password') is-invalid @enderror" id="Password"
                    name="Password" required value="{{ old('Password', $users->Password) }}">
                @error('Password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="is_admin" class="form-label">admin</label>
                <input type="text" class="form-control @error('is_admin') is-invalid @enderror" id="is_admin"
                    name="is_admin" required value="{{ old('is_admin', $users->is_admin) }}">
                @error('is_admin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}


            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>

    <Script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?name=' + name.value).then(response => response.json()).then(data =>
                slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage1() {
            const input = document.querySelector('#image1');
            const image = document.querySelector('.img-preview1');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }

        function previewImage2() {
            const input = document.querySelector('#image2');
            const image = document.querySelector('.img-preview2');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }

        function previewImage3() {
            const input = document.querySelector('#image3');
            const image = document.querySelector('.img-preview3');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }

        function previewImage4() {
            const input = document.querySelector('#image4');
            const image = document.querySelector('.img-preview4');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }

        function previewImage5() {
            const input = document.querySelector('#image5');
            const image = document.querySelector('.img-preview5');

            image.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(input.files[0]);

            oFReader.onload = function(oFREvent) {
                image.src = oFREvent.target.result;
            };
        }
    </Script>
@endsection
