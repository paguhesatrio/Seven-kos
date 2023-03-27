@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Silahkan Buat Kamar Baru</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/kamar" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kamar</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {{-- <label for="slug" class="form-label">Slug</label> --}}
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}" readonly="readonly">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kost" class="form-label">Pilih Kos yang akan di tambah kamar</label>
                <select class="form-select" name="kost_id">
                    @foreach ($kosts as $kost)
                        @if (old('kost_id') == $kost->id)
                            <option value="{{ $kost->id }}" selected>{{ $kost->name }}</option>
                        @else
                            <option value="{{ $kost->id }}">{{ $kost->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar 1</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image2" class="form-label">Gambar 2</label>
                <img class="img-preview2 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image2') is-invalid @enderror" type="file" id="image2"
                    name="image2" onchange="previewImage2()">
                @error('image2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image3" class="form-label">Gambar 3</label>
                <img class="img-preview3 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image3') is-invalid @enderror" type="file" id="image3"
                    name="image3" onchange="previewImage3()">
                @error('image3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image4" class="form-label">Gambar 4</label>
                <img class="img-preview4 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image4') is-invalid @enderror" type="file" id="image4"
                    name="image4" onchange="previewImage4()">
                @error('image4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image5" class="form-label">Gambar 5</label>
                <img class="img-preview5 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image5') is-invalid @enderror" type="file" id="image5"
                    name="image5" onchange="previewImage5()">
                @error('image5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" required value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

                <h3>Tipe Kamar</h3>

                <div class="mb-3">
                    <label for="kamar" class="form-label">Jumlah Kamar</label>
                    <input type="text" class="form-control @error('kamar') is-invalid @enderror" id="kamar"
                        name="kamar" required value="{{ old('kamar') }}">
                    @error('kamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ukuran" class="form-label">Ukuran Kamar</label>
                    <input type="text" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran"
                        name="ukuran" required value="{{ old('ukuran') }}">
                    @error('ukuran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="listrik" class="form-label">Listrik</label>
                    <select type="text" class="form-control @error('listrik') is-invalid @enderror" id="listrik"
                        name="listrik" required value="{{ old('listrik') }} ">
                        <option value="Termasuk">Termasuk</option>
                        <option value="Tidak Termasuk">Tidak Termasuk</option>
                    </select>
                    @error('listrik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="air" class="form-label">Air</label>
                    <select type="text" class="form-control @error('air') is-invalid @enderror" id="air"
                        name="air" required value="{{ old('air') }} ">
                        <option value="Termasuk">Termasuk</option>
                        <option value="Tidak Termasuk">Tidak Termasuk</option>
                    </select>
                    @error('air')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <h3>Fasilitas Kamar</h3>

                <div class="mb-3">
                    <label for="kamarmandi" class="form-label">Kamar Mandi</label>
                    <select type="text" class="form-control @error('kamarmandi') is-invalid @enderror" id="kamarmandi"
                        name="kamarmandi" required value="{{ old('kamarmandi') }} ">
                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                        <option value="Kamar Mandi Luar (bersama)">Kamar Mandi Luar (bersama) </option>
                    </select>
                    @error('kamarmandi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ac" class="form-label">Ac</label>
                    <select type="text" class="form-control @error('ac') is-invalid @enderror" id="ac"
                        name="ac" required value="{{ old('ac') }} ">
                        <option value="Terdapat">Terdapat</option>
                        <option value="Tidak Terdapat">Tidak Terdapat</option>
                    </select>
                    @error('ac')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kasur" class="form-label">kasur</label>
                    <select type="text" class="form-control @error('kasur') is-invalid @enderror" id="kasur"
                        name="kasur" required value="{{ old('kasur') }} ">
                        <option value="Terdapat">Terdapat</option>
                        <option value="Tidak Terdapat">Tidak Terdapat</option>
                    </select>
                    @error('kasur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lemari" class="form-label">lemari</label>
                    <select type="text" class="form-control @error('lemari') is-invalid @enderror" id="lemari"
                        name="lemari" required value="{{ old('lemari') }} ">
                        <option value="Terdapat">Terdapat</option>
                        <option value="Tidak Terdapat">Tidak Terdapat</option>
                    </select>
                    @error('lemari')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="meja" class="form-label">meja</label>
                    <select type="text" class="form-control @error('meja') is-invalid @enderror" id="meja"
                        name="meja" required value="{{ old('meja') }} ">
                        <option value="Terdapat">Terdapat</option>
                        <option value="Tidak Terdapat">Tidak Terdapat</option>
                    </select>
                    @error('meja')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- <label for="bayar" class="form-label">Link Pembayaran</label> --}}
                    <input type="hidden" class="form-control" value="{{'-'}}" name="bayar"/>
                </div>

            <input  type="text" id = "lblName" value="{{ auth()->user()->id }}" name="user_id">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <Script>
        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value).then(response => response.json()).then(data =>
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

<script src="/js/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script>
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $(function (){

            $("#provinsi").on('change', function(){
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type : 'POST',
                    url :   "{{ route('getkabupaten') }}",
                    data : {id_provinsi:id_provinsi},
                    cache : false,

                    success: function(msg){
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })

            $("#kabupaten").on('change', function(){
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type : 'POST',
                    url :   "{{ route('getkecamatan') }}",
                    data : {id_kabupaten:id_kabupaten},
                    cache : false,

                    success: function(msg){
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })

            $("#kecamatan").on('change', function(){
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type : 'POST',
                    url :   "{{ route('getdesa') }}",
                    data : {id_kecamatan:id_kecamatan},
                    cache : false,

                    success: function(msg){
                        $('#desa').html(msg);
                    },
                    error: function(data){
                        console.log('error:',data);
                    },
                })
            })
        })

    });
</script>


@endsection
