@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Silahkan masukan bukti transfer</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/pembayaran/{{ $pembayaran->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf


        <div class="mb-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                required value="{{ old('slug', $pembayaran->slug) }}" readonly="readonly">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar 1</label>
                <input type="hidden" name="oldImage" value="{{ $pembayaran->image }}">
                @if ($pembayaran->image)
                    <img src="{{ asset('storage/' . $pembayaran->image) }}"
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

            @can('admin')
            <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($pembayaran->status) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control" id="txtName1" value="{{ old('status', $pembayaran->status) }} " >
                    <option value="Sedang diproses">Sedang diproses</option>
                    <option value="Pembayaran Berhasil">Pembayaran Berhasil</option>
                </select >
            </div>

            <div class="mb-3">
                <label for="maps" class="form-label">Pemilik</label>
                <input type="text" class="form-control" id="txtName" value="{{ old('user_id', $pembayaran->user_id) }}" />
            </div>
            @endcan

            <input  type="hidden" id = "lblName1" value="sedang diproses" name="status">
            <input  type="hidden" id = "lblName" value="{{ auth()->user()->id }}" name="user_id">

            <button onclick = "CopyToLabel()" type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <Script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/bayar/checkSlug?title=' + title.value).then(response => response.json()).then(data =>
                slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
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

       function CopyToLabel() {
       //Reference the TextBox.
       var txtName = document.getElementById("txtName");
       //Reference the Label.
       var lblName = document.getElementById("lblName");
       //Copy the TextBox value to Label.
       var txtName1 = document.getElementById("txtName1");
       //Reference the Label.
       var lblName1 = document.getElementById("lblName1");

       lblName.value = txtName.value;
       //Copy the TextBox value to Label.
       lblName1.value = txtName1.value;
        }
    </Script>
@endsection
