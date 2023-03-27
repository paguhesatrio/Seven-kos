@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none" style="color: #048853; font-weight: 700;"> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts" class="text-decoration-none" style="color: #048853; font-weight: 700;"> Semua Kos
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts?province={{ $post->province->slug }}" class="text-decoration-none"
                            style="color: #048853; font-weight: 700;">
                            {{ $post->province->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts?regency={{ $post->regency->name }}" class="text-decoration-none"
                            style="color: #048853; font-weight: 700;">
                            {{ $post->regency->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts?district={{ $post->district->name }}" class="text-decoration-none"
                            style="color: #048853; font-weight: 700;">
                            {{ $post->district->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="/posts?village={{ $post->village->name }}" class="text-decoration-none"
                            style="color: #048853; font-weight: 700;">
                            {{ $post->village->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <p style="color: #048853; font-weight: 700; display: flex">{{ $post->name }}</p>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="image-kos" id="image-kos">
        <div class="container mb-5">
            <!-- carousel -->
            <div class="row wrap-carousel">
                <div class="col-8 h-100">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                @if ($post->image)
                                    <a href="{{ asset('storage/' . $post->image) }}" data-toggle="lightbox"
                                        data-gallery="example-gallery" class="col-sm-8">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->province->name }}"
                                            class="img-fluid">
                                    </a>
                                @else
                                    <img src="https://source.unsplash.com/1200x1500?{{ $post->province->name }}"
                                        alt="{{ $post->province->name }}" class="img-fluid"
                                        style="height: 500px; width: 1000px;">
                                @endif
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                @if ($post->image2)
                                    <a href="{{ asset('storage/' . $post->image2) }}" data-toggle="lightbox"
                                        data-gallery="example-gallery" class="col-sm-8">
                                        <img src="{{ asset('storage/' . $post->image2) }}"
                                            alt="{{ $post->province->name }}" class="img-fluid">
                                    </a>
                                @else
                                    <img src="https://source.unsplash.com/1200x1500?{{ $post->province->name }}"
                                        alt="{{ $post->province->name }}" class="img-fluid"
                                        style="height: 500px; width: 1000px;">
                                @endif
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                @if ($post->image3)
                                    <a href="{{ asset('storage/' . $post->image3) }}" data-toggle="lightbox"
                                        data-gallery="example-gallery" class="col-sm-8">
                                        <img src="{{ asset('storage/' . $post->image3) }}"
                                            alt="{{ $post->province->name }}" class="img-fluid">
                                    </a>
                                @else
                                    <img src="https://source.unsplash.com/1200x1500?{{ $post->province->name }}"
                                        alt="{{ $post->province->name }}" class="img-fluid"
                                        style="height: 500px; width: 1000px;">
                                @endif
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-4 h-100 img-kos">
                    <div class="h-50 img-kos1">
                        @if ($post->image4)
                            <a href="{{ asset('storage/' . $post->image4) }}" data-toggle="lightbox"
                                data-gallery="example-gallery" class="col-sm-8">
                                <img src="{{ asset('storage/' . $post->image4) }}" alt="{{ $post->province->name }}"
                                    class="img-fluid">
                            </a>
                        @else
                            <img src="https://source.unsplash.com/1200x500?{{ $post->province->name }}"
                                alt="{{ $post->province->name }}" class="img-fluid">
                        @endif
                    </div>
                    <div class="h-50 pt-1 img-kos2">
                        @if ($post->image5)
                            <a href="{{ asset('storage/' . $post->image5) }}" data-toggle="lightbox"
                                data-gallery="example-gallery" class="col-sm-8">
                                <img src="{{ asset('storage/' . $post->image5) }}" alt="{{ $post->province->name }}"
                                    class="img-fluid">
                            </a>
                        @else
                            <img src="https://source.unsplash.com/1200x500?{{ $post->province->name }}"
                                alt="{{ $post->province->name }}" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row g-5">
        <div class="col-8 col-lg-8 col-md-8">
            <h3 class="mb-3 display-6 fw-bold title__kos">
                {{ $post->name }}
            </h3>

            <article class="header__kos">
                <div class="col-12 col-lg-12 col-md-12 subtitle__kos">
                    <div class="col-3 col-lg-3 col-md-3 tipe__kos" style="float: left">
                        <a href="/posts?jenis={{ $post->jenis->slug }}" class="text-decoration-none">
                            {{ $post->jenis->name }}
                        </a>
                    </div>
                    <div class="col-5 col-lg-5 col-md-5 maps">
                        <p class="map"><img src="/img/map.svg" class="d-block d-lg-inline mx-auto" alt="">
                            {{ $post->alamat }}
                        </p>
                    </div>
                    <div class="col-3 col-lg-3 col-md-3">
                        <p class="sisa__kamar text-justify fw-bold"><i class='bx bx-door-open'></i>
                            {{ $post->kamar }}</p>
                    </div>
                    <div class="col-5 col-lg-5 col-md-5">
                        <form action="/posts" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <input type="hidden" value="{{ $post->id }} + {{  auth()->user()->id }}" name="slug">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <button class="favorit btn" type="submit" onclick="return confirm('Are you sure?')"><i class='bx bx-heart'></i> Simpan</button>
                        </form>
                    </div>
                </div>

                <hr>

                <div class="row col-12 col-lg-12 col-md-12 pemilik__kos">
                    <div class="col-6 col-lg-6 col-md-6">
                        <h6 class="text-justify">
                            Kos disewakan oleh
                            <a href="/posts?author={{ $post->author->username }}"
                                class="text-decoration-none">{{ $post->author->name }}
                            </a>
                        </h6>
                        <p>Last update {{ $post->created_at->diffForHumans() }}</p>
                        <p class="verifikasi"><i class='bx bx-envelope-open'></i> Pemilik kos terverifikasi</p>
                    </div>
                    <div class="col-3 col-lg-3 col-md-3">
                        <img src="/img/avatar.png" alt="">
                    </div>
                </div>

                <hr>

                <div class="col-12 col-lg-12 col-md-12 hadiah__sevenkos">
                    <h4 class="fw-bold">Yang Kamu dapatkan di SevenKos</h4>
                    <div class="mb-3 d-flex align-items-lg-center hadiah__sevenkos-1">
                        <div style="margin-top: -15px">
                            <img src="/img/free.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">Bebas biaya admin,
                            kamu tidak akan dikenakan biaya admin saat melakukan pembayaran di SevenKos.</p>
                    </div>
                    <div class="mb-3 d-flex align-items-lg-center hadiah__sevenkos-2">
                        <div style="margin-top: -15px">
                            <img src="/img/shield.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">Asuransi anak kos,
                            kompensasi untuk anak kos jika terjadi kehilangan barang di kosan.</p>
                    </div>
                    <div class="mb-3 d-flex align-items-lg-center hadiah__sevenkos-3">
                        <div style="margin-top: -15px">
                            <img src="/img/booking.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">Booking langsung,
                            kos ini bisa di-booking dan dibayar di situs dan aplikasi Mamikos, tanpa harus ketemuan dengan
                            pemilik.
                        </p>
                    </div>
                    <div class="d-flex align-items-lg-center hadiah__sevenkos-4">
                        <div style="margin-top: -15px">
                            <img src="/img/tamu.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">Dikelola SevenKos,
                            kos ini operasionalnya dikelola dan distandardisasi oleh SevenKos.</p>
                    </div>
                </div>

                <hr>

                <div class="col-12 col-lg-12 col-md-12 alamat__kos">
                    <h4 class="fw-bold mb-3">Alamat Kos</h4>
                   <p>  Provinsi : <a href="/posts?province={{ $post->province->slug }}" class="text-decoration-none"
                        style="color: #048853;">
                         {{ $post->province->name }}
                    </a> </p>

                    <p>  kabupaten/kota : <a href="/posts?regency={{ $post->regency->name }}" class="text-decoration-none"
                        style="color: #048853;">
                         {{ $post->regency->name }}
                    </a> </p>


                    <p>  kecamatan : <a href="/posts?district={{ $post->district->name }}" class="text-decoration-none"
                        style="color: #048853;">
                         {{ $post->district->name }}
                    </a> </p>

                    <p>  kelurahan/desa : <a href="/posts?village={{ $post->village->name }}" class="text-decoration-none"
                        style="color: #048853;">
                         {{ $post->Village->name }}
                    </a> </p>

                    <p>  alamat lengkap: <a class="text-decoration-none" style="color: #048853;">
                         {{ $post->alamat }}
                    </a> </p>

                </div>

                <hr>

                <div class="col-12 col-lg-12 col-md-12 tipe__kamar">
                    <h4 class="fw-bold mb-2">Spesifikasi tipe kamar</h4>
                    <div class="mb-2 d-flex align-items-lg-center tipe__kamar-1">
                        <div style="margin-top: -15px">
                            <img src="/img/bedroom.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->tipekamar }} meter</p>
                    </div>
                    <div class="mb-2 d-flex align-items-lg-center tipe__kamar-2">
                        <div style="margin-top: -15px">
                            <img src="/img/electric.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->listrik }} listrik</p>
                    </div>
                    <div class="d-flex align-items-lg-center tipe__kamar-3">
                        <div style="margin-top: -15px">
                            <img src="/img/water.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->air }} air</p>
                    </div>
                </div>

                <hr>


                <div class="row col-12 col-md-12 col-lg-12 fasilitas__kamar">
                    <div class="mb-1 col-5 col-md-5 col-lg-5">
                        <h4 class="fw-bold">Fasilitas kamar</h4>
                        <div class="mb-2 d-flex align-items-lg-center fasilitas__kamar-1">
                            <div style="margin-top: -15px">
                                <img src="/img/bathtub.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->kamarmandi }}</p>
                        </div>
                        <div class="mb-2 d-flex align-items-lg-center fasilitas__kamar-2">
                            <div style="margin-top: -15px">
                                <img src="/img/ac.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->ac }} Ac</p>
                        </div>
                        <div class="d-flex align-items-lg-center fasilitas__kamar-3">
                            <div style="margin-top: -15px">
                                <img src="/img/bed.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->kasur }} Kasur
                            </p>
                        </div>
                    </div>
                    <div class="mt-3 col-7 col-md-7 col-lg-7">
                        <br>
                        <div class="mb-1 d-flex align-items-lg-center fasilitas__kamar-4">
                            <div style="margin-top: -15px">
                                <img src="/img/wardrobe.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->lemari }} Lemari
                                Baju</p>
                        </div>
                        <div class="d-flex align-items-lg-center fasilitas__kamar-5">
                            <div style="margin-top: -15px">
                                <img src="/img/desk.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->meja }} Meja &
                                Kursi</p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row col-12 col-md-12 col-lg-12">
                    <div class="mb-1 col-5 col-md-5 col-lg-5 fasilitas__umum">
                        <h4 class="fw-bold">Fasilitas umum</h4>
                        <div class="mb-2 d-flex align-items-lg-center fasilitas__umum-1">
                            <div style="margin-top: -15px">
                                <img src="/img/wifi.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->wifi }} WiFi</p>
                        </div>
                        <div class="mb-2 d-flex align-items-lg-center fasilitas__umum-2">
                            <div style="margin-top: -15px">
                                <img src="/img/dress.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->jemur }} R. Jemur
                            </p>
                        </div>
                    </div>
                    <div class="mt-3 col-5 col-md-5 col-lg-5">
                        <br>
                        <div class="mb-1 d-flex align-items-lg-center fasilitas__umum-3">
                            <div style="margin-top: -15px">
                                <img src="/img/couch.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->tamu }} R.Tamu
                            </p>
                        </div>
                        <div class="d-flex align-items-lg-center fasilitas__umum-4">
                            <div style="margin-top: -15px">
                                <img src="/img/kitchen.png" alt="">
                            </div>
                            <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->dapur }} Dapur
                            </p>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row col-12 col-md-12 col-lg-12 peraturan__kos">
                    <div class="mb-1 col-7 col-md-7 col-lg-7">
                        <h4 class="fw-bold">Peraturan di kos ini</h4>
                    </div>
                    <div class="mb-2 d-flex align-items-lg-center peraturan__kos-1">
                        <div style="margin-top: -15px">
                            <img src="/img/time.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->akses }}</p>
                    </div>
                    <div class="mb-2 d-flex align-items-lg-center peraturan__kos-2">
                        <div style="margin-top: -15px">
                            <img src="/img/bed.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">Maks. {{ $post->maks }} orang/
                            kamar</p>
                    </div>
                    <div class="mb-2 d-flex align-items-lg-center peraturan__kos-3">
                        <div style="margin-top: -15px">
                            <img src="/img/couple.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->teman }}</p>
                    </div>
                    <div class="d-flex align-items-lg-center peraturan__kos-4">
                        <div style="margin-top: -15px">
                            <img src="/img/dog.png" alt="">
                        </div>
                        <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->hewan }} hewan</p>
                    </div>
                </div>

                <hr>

                <div class="row col-12 col-md-12 col-lg-12 info__kos">
                    <h4 class="fw-bold">Cerita pemilik tentang kos ini</h4>
                    <article class="fs-8 text-justify">
                        {!! $post->body !!}
                    </article>
                </div>
            </article>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="card card__bayar text-center">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bold">Rp {{ $post->price }} / Bulan</h5>

                        <a href="" class="cara_bayar2" data-bs-toggle="modal" data-bs-target="#sewa"><button
                                class="cara_bayar2 btn"><i class='bx bxl-whatsapp'
                                    style="font-size: 30px; display: inline-flex"></i> Sewa
                                Kos</button></a>
                    </div>
                </div>

                <div class="p-2 bg-light rounded-3 alamat">
                    <div class="container-fluid py-1">
                        <iframe src={{ $post->maps }} width="100%" height="300"
                            style="border:0; border-radius: 5px" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="sewa">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sewa Kos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>
                        Cara Sewa Kos
                    </p>
                </div>

                {{-- <div class="modal-body">
                    <p style="margin-left: 10px; display: inline-block; width: 550px">{{ $post->no_hp }}</p>
                </div> --}}

                <div class="modal-body">
                    <section id="user__login">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-12 col-md-12 col-lg-12 cara__sewa">
                                    @if ($post->bayar == '-')
                                    <a href="" onclick="return confirm('Pembayaran Belum Ada Coba untuk Hubungi Pemilik Kos')" class="text-decoration-none">
                                        <div class="icon__sewa">
                                            <img src="/img/payment.png" alt="">
                                        </div>
                                        <div class="description__sewa">
                                            <h4>Pembayaran</h4>
                                        </div>
                                    </a>
                                    @else
                                        <form action="/posts1" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                                            <input type="hidden" value="{{ $post->id }} + {{  auth()->user()->id }}" name="slug">
                                            <input type="hidden" value="sedang diproses" name="status">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                        <div class="icon__sewa">
                                            <img src="/img/payment.png" alt="">
                                        </div>
                                        <div class="description__sewa">
                                        </div>
                                        <button class="btn" type="submit" onclick="return confirm('Lanjut ke pembayaran')" style="border: none"> <h4> Pembayaran</h4> </button>
                                            {{-- Agar Pembayaran lebih Aman Hubungi Pemilik Kos !!!, jika belum tekan cancel --}}
                                        </form>
                                @endif

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="modal-body">

                    <section id="pemilik__login">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-12 col-md-12 col-lg-12 cara__sewa">
                                    <a
                                        href="https://wa.me/{{ $post->no_hp }}?text=contoh%20isi%20pesan%20dikirim%20via%20whatsapp" class="text-decoration-none">
                                        <div class="icon__sewa">
                                            <img src="/img/whatsapp-logo.png" alt="">
                                        </div>
                                        <div class="description__sewa">
                                            <h4>Chat WA ({{ $post->no_hp }})</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
@endsection
