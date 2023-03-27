@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kost</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kos</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" required autofocus value="{{ old('name', $post->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug', $post->slug) }}" readonly="readonly">
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
                        @if (old('jenis_id', $post->jenis_id) == $jenis->id)
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
                    @foreach ($provinces as $provinsi)
                        @if (old('province_id', $post->province_id) == $provinsi->id)
                            <option value="{{ $provinsi->id }}" selected>{{ $provinsi->name }}</option>
                        @else
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Kabupaten/Kota</label>
                <select class="form-select" id="kabupaten" name="regency_id">
                    @foreach ($regencies as $provinsi)
                        @if (old('regency_id', $post->regency_id) == $provinsi->id)
                            <option value="{{ $provinsi->id }}" selected>{{ $provinsi->name }}</option>
                        @else
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Kecamatan</label>
                <select class="form-select" id="kecamatan" name="district_id">
                    @foreach ($districts as $provinsi)
                        @if (old('district_id', $post->district_id) == $provinsi->id)
                            <option value="{{ $provinsi->id }}" selected>{{ $provinsi->name }}</option>
                        @else
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="">Kelurahan/Desa</label>
                <select class="form-select" id="desa" name="village_id">
                    @foreach ($villages as $provinsi)
                        @if (old('village_id', $post->village_id) == $provinsi->id)
                            <option value="{{ $provinsi->id }}" selected>{{ $provinsi->name }}</option>
                        @else
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" required value="{{ old('alamat', $post->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar 1</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
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

            <div class="mb-3">
                <label for="image2" class="form-label">Gambar 2</label>
                <input type="hidden" name="oldImage2" value="{{ $post->image2 }}">
                @if ($post->image2)
                    <img src="{{ asset('storage/' . $post->image2) }}"
                        class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview2 img-fluid mb-3 col-sm-5">
                @endif
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
                <input type="hidden" name="oldImage3" value="{{ $post->image3 }}">
                @if ($post->image3)
                    <img src="{{ asset('storage/' . $post->image3) }}"
                        class="img-preview3 img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview3 img-fluid mb-3 col-sm-5">
                @endif
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
                <input type="hidden" name="oldImage4" value="{{ $post->image4 }}">
                @if ($post->image4)
                    <img src="{{ asset('storage/' . $post->image4) }}"
                        class="img-preview4 img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview4 img-fluid mb-3 col-sm-5">
                @endif
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
                <input type="hidden" name="oldImage5" value="{{ $post->image5 }}">
                @if ($post->image5)
                    <img src="{{ asset('storage/' . $post->image5) }}"
                        class="img-preview5 img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview5 img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image5') is-invalid @enderror" type="file" id="image5"
                    name="image5" onchange="previewImage5()">
                @error('image5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" required value="{{ old('price', $post->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <h3>Tipe Kamar</h3>

            <div class="mb-3">
                <label for="kamar" class="form-label">Ketersedian Kamar</label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->kamar) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
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
                <label for="tipekamar" class="form-label">Ukuran kamar</label>
                <input type="text" class="form-control @error('tipekamar') is-invalid @enderror" id="tipekamar"
                    name="tipekamar" required value="{{ old('tipekamar', $post->tipekamar) }}">
                @error('tipekamar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="listrik" class="form-label"><h5>Listrik</h5></label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->listrik) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control @error('listrik') is-invalid @enderror" id="listrik"
                name="listrik" required value="{{ old('listrik') }} " >
                    <option value="Termasuk">Termasuk</option>
                    <option value="Tidak Termasuk">Tidak Termasuk</option>
                 </select >
            @error('listrik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="air" class="form-label"><h5>Air</h5></label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->air) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control @error('air') is-invalid @enderror" id="air"
                name="air" required value="{{ old('air') }} " >
                    <option value="Termasuk">Termasuk</option>
                    <option value="Tidak Termasuk">Tidak Termasuk</option>
                 </select >
            @error('air')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <h3>Fasilitas Kamar</h3>

            <div class="mb-3">
                <label for="kamarmandi" class="form-label"><h5>Kamar Mandi</h5></label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->kamarmandi) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control @error('kamarmandi') is-invalid @enderror" id="kamarmandi"
                name="kamarmandi" required value="{{ old('kamarmandi') }} " >
                <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                <option value="Kamar Mandi Luar (bersama)">Kamar Mandi Luar (bersama) </option>
                 </select >
            @error('kamarmandi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="ac" class="form-label"><h5>AC</h5></label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->ac) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control @error('ac') is-invalid @enderror" id="ac"
                name="ac" required value="{{ old('ac') }} " >
                <option value="Terdapat">Terdapat</option>
                <option value="Tidak Terdapat">Tidak Terdapat</option>
                 </select >
            @error('ac')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="kasur" class="form-label"><h5>Kasur</h5></label>
                <h3></h3>
                <small>Pilihan Lama</small>
                <input  type="text" class="form-control" required value="{{ ($post->kasur) }}" readonly="readonly">
                <h3></h3>
                <small>Pilihan Baru</small>
                <select  type="text" class="form-control @error('kasur') is-invalid @enderror" id="kasur"
                name="kasur" required value="{{ old('kasur') }} " >
                <option value="Terdapat">Terdapat</option>
                <option value="Tidak Terdapat">Tidak Terdapat</option>
                 </select >
            @error('kasur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

        <div class="mb-3">
            <label for="lemari" class="form-label"><h5>Lemari</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->lemari) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('lemari') is-invalid @enderror" id="lemari"
            name="lemari" required value="{{ old('lemari') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('lemari')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="meja" class="form-label"><h5>Meja</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->meja) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('meja') is-invalid @enderror" id="meja"
            name="meja" required value="{{ old('meja') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('meja')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <h3>Fasilitas Umum</h3>

        <div class="mb-3">
            <label for="wifi" class="form-label"><h5>wifi</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->wifi) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('wifi') is-invalid @enderror" id="wifi"
            name="wifi" required value="{{ old('wifi') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('wifi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jemur" class="form-label"><h5>Jemuran</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->jemur) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('jemur') is-invalid @enderror" id="jemur"
            name="jemur" required value="{{ old('jemur') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('jemur')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tamu" class="form-label"><h5>Ruang tamu</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->tamu) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('tamu') is-invalid @enderror" id="tamu"
            name="tamu" required value="{{ old('tamu') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('tamu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dapur" class="form-label"><h5>Ruang dapur</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->dapur) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('dapur') is-invalid @enderror" id="dapur"
            name="dapur" required value="{{ old('dapur') }} " >
            <option value="Terdapat">Terdapat</option>
            <option value="Tidak Terdapat">Tidak Terdapat</option>
             </select >
            @error('dapur')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <h3>Peraturan kos</h3>

        <div class="mb-3">
            <label for="akses" class="form-label"><h5>Ruang akses</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->akses) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('akses') is-invalid @enderror" id="akses"
            name="akses" required value="{{ old('akses') }} " >
            <option value="Akses 24 jam">Akses 24 jam</option>
            <option value="Terdapat dapat jam malam">Terdapat dapat jam malam</option>
             </select >
            @error('akses')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="maks" class="form-label"><h5>Maxsmial</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->maks) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('maks') is-invalid @enderror" id="maks"
            name="maks" required value="{{ old('maks') }} " >
            <option value="1">1</option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="bebas">bebas </option>
             </select >
            @error('maks')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="teman" class="form-label"><h5>teman</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->teman) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('teman') is-invalid @enderror" id="teman"
            name="teman" required value="{{ old('teman') }} " >
            <option value="Lawan Jenis dilarang ke kamar">Lawan Jenis dilarang ke kamar</option>
            <option value="Bebas">Bebas</option>
             </select >
            @error('teman')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hewan" class="form-label"><h5>hewan</h5></label>
            <h3></h3>
            <small>Pilihan Lama</small>
            <input  type="text" class="form-control" required value="{{ ($post->hewan) }}" readonly="readonly">
            <h3></h3>
            <small>Pilihan Baru</small>
            <select  type="text" class="form-control @error('hewan') is-invalid @enderror" id="hewan"
            name="hewan" required value="{{ old('hewan') }} " >
            <option value="Boleh membawa">Boleh membawa </option>
            <option value="Dilarang Membawa">Dilarang Membawa</option>
             </select >
            @error('hewan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" required value="{{ old('no_hp', $post->no_hp) }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="maps" class="form-label">Link Maps (isi - dan # jika tidak ada)</label>
                <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps"
                    required value="{{ old('maps', $post->maps) }}">
                @error('maps')
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
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>

            {{-- @can('admin') --}}
            <div class="mb-3">
                <label for="maps" class="form-label">Pemilik</label>
                <input type="text" class="form-control"  id="txtName" value="{{ old('user_id', $post->user_id) }}" />
            </div>

            <div class="mb-3">
                <label for="bayar" class="form-label">Link Pembayaran</label>
                <input type="text" class="form-control" value="{{ old('bayar', $post->bayar)}}" name="bayar"/>
            </div>
            {{-- @endcan --}}

            <div class="mb-3">
                <label for="rekening" class="form-label">No Rekening (jika tidak ada jangan di isi)</label>
                <input type="text" class="form-control" value="{{old('rekening', $post->rekening )}}" name="rekening"/>
            </div>

            <input  type="hidden" id = "lblName" value="{{ auth()->user()->id }}" name="user_id">

           <button onclick = "CopyToLabel()" type="submit" class="btn btn-primary">Create Post</button>
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

       function CopyToLabel() {
       //Reference the TextBox.
       var txtName = document.getElementById("txtName");

       //Reference the Label.
       var lblName = document.getElementById("lblName");

       //Copy the TextBox value to Label.
       lblName.value = txtName.value;
   }
   </Script>
@endsection
