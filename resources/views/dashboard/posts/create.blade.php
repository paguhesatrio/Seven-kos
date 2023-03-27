@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Kost Baru</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kos</label>
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
                <label for="jenis" class="form-label">Jenis</label>
                <select class="form-select" name="jenis_id">
                    @foreach ($jenis as $jenis)
                        @if (old('jenis_id') == $jenis->id)
                            <option value="{{ $jenis->id }}" selected>{{ $jenis->name }}</option>
                        @else
                            <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Provinsi</label>
                <select class="form-select" id="provinsi" name="province_id">
                    <option>=====Pilih Provinsi====</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                    @endforeach
                </select>
    </div>


        <div class="mb-3">
                <label for="">Kabupaten/Kota</label>
                <select class="form-select" id="kabupaten" name="regency_id">
                </select>
        </div>


        <div class="mb-3">
                <label for="">Kecamatan</label>
                <select class="form-select" id="kecamatan" name="district_id">
                </select>
            </div>


        <div class="mb-3">
                <label for="">Desa/Kelurahan</label>
                <select class="form-select" id="desa" name="village_id">
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
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" required value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" required value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <h3>Tipe Kamar</h3>

            <div class="mb-3">
                <label for="kamar" class="form-label">Ketersedian Kamar</label>
                <select type="text" class="form-control @error('kamar') is-invalid @enderror" id="kamar"
                    name="kamar" required value="{{ old('kamar') }}">
                    <option value="Ada Kamar Kosong">Ada Kamar Kosong</option>
                    <option value="Kamar Penuh">Kamar Penuh</option>
                </select>
                @error('kamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipekamar" class="form-label">Ukuran Kamar</label>
                <input type="text" class="form-control @error('tipekamar') is-invalid @enderror" id="tipekamar"
                    name="tipekamar" required value="{{ old('tipekamar') }}">
                @error('tipekamar')
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

            <h3>Fasilitas Umum</h3>

            <div class="mb-3">
                <label for="wifi" class="form-label">wifi</label>
                <select type="text" class="form-control @error('wifi') is-invalid @enderror" id="wifi"
                    name="wifi" required value="{{ old('wifi') }} ">
                    <option value="Terdapat">Terdapat</option>
                    <option value="Tidak Terdapat">Tidak Terdapat</option>
                </select>
                @error('wifi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jemur" class="form-label">jemur</label>
                <select type="text" class="form-control @error('jemur') is-invalid @enderror" id="jemur"
                    name="jemur" required value="{{ old('jemur') }} ">
                    <option value="Terdapat">Terdapat</option>
                    <option value="Tidak Terdapat">Tidak Terdapat</option>
                </select>
                @error('jemur')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tamu" class="form-label">tamu</label>
                <select type="text" class="form-control @error('tamu') is-invalid @enderror" id="tamu"
                    name="tamu" required value="{{ old('tamu') }} ">
                    <option value="Terdapat">Terdapat</option>
                    <option value="Tidak Terdapat">Tidak Terdapat</option>
                </select>
                @error('tamu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dapur" class="form-label">dapur</label>
                <select type="text" class="form-control @error('dapur') is-invalid @enderror" id="dapur"
                    name="dapur" required value="{{ old('dapur') }} ">
                    <option value="Terdapat">Terdapat</option>
                    <option value="Tidak Terdapat">Tidak Terdapat</option>
                </select>
                @error('dapur')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <h3>Peraturan kos</h3>

            <div class="mb-3">
                <label for="akses" class="form-label">Akses</label>
                <select type="text" class="form-control @error('akses') is-invalid @enderror" id="akses"
                    name="akses" required value="{{ old('akses') }} ">
                    <option value="Akses 24 jam">Akses 24 jam</option>
                    <option value="Terdapat dapat jam malam">Terdapat dapat jam malam</option>
                </select>
                @error('akses')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="maks" class="form-label">maks</label>
                <select type="text" class="form-control @error('maks') is-invalid @enderror" id="maks"
                    name="maks" required value="{{ old('maks') }} ">
                    <option value="1">1</option>
                    <option value="2">2 </option>
                    <option value="3">3 </option>
                    <option value="bebas">bebas </option>
                </select>
                @error('maks')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="teman" class="form-label">Lawan Jenis Di kamar</label>
                <select type="text" class="form-control @error('teman') is-invalid @enderror" id="teman"
                    name="teman" required value="{{ old('teman') }} ">
                    <option value="Lawan Jenis dilarang ke kamar">Lawan Jenis dilarang ke kamar</option>
                    <option value="Bebas">Bebas</option>
                </select>
                @error('teman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hewan" class="form-label">hewan</label>
                <select type="text" class="form-control @error('hewan') is-invalid @enderror" id="hewan"
                    name="hewan" required value="{{ old('hewan') }} ">
                    <option value="Boleh membawa">Boleh membawa </option>
                    <option value="Dilarang Membawa">Dilarang Membawa</option>
                </select>
                @error('hewan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone/WhatsApp</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" required value="{{ old('no_hp') }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Keterangan</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="maps" class="form-label">Link Maps (isi - jika tidak ada)</label>
                <textarea type="text" style="height: 200px" class="form-control @error('maps') is-invalid @enderror"
                    id="maps" name="maps" required value="{{ old('maps') }}"></textarea>
                @error('maps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                {{-- <label for="bayar" class="form-label">Link Pembayaran</label> --}}
                <input type="hidden" class="form-control" value="{{'-'}}" name="bayar"/>
            </div>

            <div class="mb-3">
                <label for="rekening" class="form-label">No Rekening (jika tidak ada isi - )</label>
                <input type="text" class="form-control" value="{{old('rekening')}}" name="rekening"/>
            </div>

            <input  type="hidden" id = "lblName" value="{{ auth()->user()->id }}" name="user_id">
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
