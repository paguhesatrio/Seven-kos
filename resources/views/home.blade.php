<!doctype html>
<html lang="en" id="home">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- icons title --}}
    <link class="img-thumbnail" rel="icon img-thumbnail rounded-circle" type="image/x-icon" href="/img/logo.jpg" />
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Gulzar&family=Monoton&family=Montserrat&family=Pacifico&family=Rubik+Moonrocks&display=swap"
        rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/homestyle.css">

    {{-- <link rel="stylesheet" href="/css/styles.css"> --}}

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- BoxIcons v2.1.2 -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">

    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <title>{{ $title }}</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed">
        <div class="container">
            <a href="/">
                <img src="/img/logo.jpg" width="55" height="55" class="img-thumbnail rounded-circle me-3">
            </a>
            <a class="navbar-brand page-scroll" href="#home">SEVEN INC KOS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link page-scroll" aria-current="page" href="#home">BERANDA</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link page-scroll" href="#layanan">LAYANAN</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link page-scroll" href="#promo">PROMO</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link page-scroll" href="#contact">KONTAK</a>
                    </li>
                </ul>
                <div>
                    <ul class="navbar-nav mx-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Welcome back, {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/dashboard"><i
                                            class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
                                    {{-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/profile"><i class="bx bx-user"></i> Profil</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i
                                                class="bi bi-box-arrow-in-right"></i> LOGOUT
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href=""
                                    class="login nav-link display-6 lh-7 fw-bold text-light {{ $active === 'login' ? 'active' : '' }} fs-5"
                                    data-bs-toggle="modal" data-bs-target="#login"><i class="bi bi-box-arrow-in-right"></i>
                                    LOGIN</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- The Modal -->
    <div class="modal" id="login">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Masuk ke Mamikos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>
                        Saya ingin masuk sebagai
                    </p>
                </div>

                <div class="modal-body">
                    <section id="user__login">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-12 col-md-12 col-lg-12 cara__sewa">
                                    <a href="/login">
                                        <div class="icon__sewa">
                                            <img src="/img/sewa.jpg" alt="">
                                        </div>
                                        <div class="description__sewa">
                                            <h4>Pencari Kos</h4>
                                        </div>
                                    </a>
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
                                    <a href="/loginpemilik">
                                        <div class="icon__sewa">
                                            <img src="/img/sewa.jpg" alt="">
                                        </div>
                                        <div class="description__sewa">
                                            <h4>Pemilik Kos</h4>
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

    {{-- hero banner --}}
    <section id="hero">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline my-auto mt-auto" style="z-index: 2;">
                    <div class="fw-bold text-light sub-time">
                        <marquee>
                            <a href="https://time.is/Yogyakarta" id="time_is_link" rel="nofollow"
                                class="text-dark text-decoration-none"></a>
                            <span id="Yogyakarta_z41c"></span>
                        </marquee>
                        <script src="//widget.time.is/id.js"></script>
                        <script>
                            time_is_widget.init({
                                Yogyakarta_z41c: {
                                    template: "TIME<br>DATE",
                                    date_format: "dayname, dnum monthname year"
                                }
                            });
                        </script>
                    </div>
                    <h1 class="title_header" style="--duration: 1s">
                        <span style="--delay: .5s"> Membantu Temukan Kos Impian.</span>
                    </h1>
                    <p class="subtitle_header" style="--duration: 1s">
                        <span class="fw-bold" style="--delay: .7s">Seven Kos INC</span><span
                            style="--delay: .9s; margin-top: -50px">hadir untuk temukan Kos terbaik untukmu, untuk di
                            sewa dengan sumber terpercaya.</span>
                    </p>
                    <a href="/posts" style="--duration: 1s;">
                        <span style="--delay: .5s">
                            <button class="button-lg-primary">
                                Temukan Kos
                            </button>
                            <a href="/posts">
                                <img src="/img/arrow.png" alt="">
                            </a>
                        </span>
                    </a>
                </div>
                {{-- <div class="col-md-6 hero-tagline my-auto mt-auto">
                    <p class="text-white">Scroll down</p>
                <span class="mouse">
                    <span class="mouse-wheel"></span>
                </span>
                </div> --}}
            </div>
            <img src="/img/hero banner.png" alt="" class="position-absolute end-0 bottom-0 img-hero">
            <img src="/img/accent.png" alt="" class="position-absolute h-100 top-0 start-0 accent-img">
            <div class="col-md-12 hero-tagline my-auto mt-4 text-center">
                <div class="home__scroll">
                    <a href="#berita" class="home__scroll-button button--flex">
                        <i class="uil uil-mouse-alt home__scroll-mouse"></i>
                        <span class="home__scroll-name">Scroll down</span>
                        <i class="uil uil-arrow-down home__scroll-arrow"></i>
                    </a>
                </div>
                {{-- <audio controls>
                    <source src="/music/musicweb.mpeg" type="audio/mp3">
                </audio> --}}
            </div>
        </div>
    </section>

    {{-- layanan section --}}
    <section id="layanan">
        <div class="container elemen">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Layanan Kami</h2>
                    <span class="sub-title">Seven Kos INC hadir menjadi solusi bagi kamu</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 text-center mb-4">
                    <a href="/posts" class="text-decoration-none">
                        <div class="card-layanan">
                            <div class="circle-icon position-relative mx-auto">
                                <img src="/img/home.png" alt=""
                                    class="position-absolute top-50 start-50 translate-middle">
                            </div>
                            <h3 class="mt-4">Kos Terbaru</h3>
                            <p class="mt-3">Seven Kos INC kini jadi kenyataan, sewa kos bary dengan fasilitas terbaik
                                dengan lingkungan yang nyaman.</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 text-center mb-4">
                    <a href="/posts" class="text-decoration-none">
                        <div class="card-layanan">
                            <div class="circle-icon position-relative mx-auto">
                                <img src="/img/sewa.png" alt=""
                                    class="position-absolute top-50 start-50 translate-middle">
                            </div>
                            <h3 class="mt-4">Sewa Kos</h3>
                            <p class="mt-3">Sewa Kos yang indah untuk anda, pilihan terbaik untuk tempat tinggal
                                anda.</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 text-center mb-4">
                    <a href="/posts" class="text-decoration-none">
                        <div class="card-layanan">
                            <div class="circle-icon position-relative mx-auto">
                                <img src="/img/town.png" alt=""
                                    class="position-absolute top-50 start-50 translate-middle">
                            </div>
                            <h3 class="mt-4">Beli Kos</h3>
                            <p class="mt-3">Beli Kos sempurna dengan harga terbaik kualitas terjamin dari sumber
                                terpercaya.</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section id="berita">
        <div class="container elemen">
            <div class="row mb-4">
                <div class="col-12 col-md-6 col-lg-9 text-lg-start">
                    <h2 class="fw-bold">
                        Berita Untuk Mu
                    </h2>
                </div>
                <div class="col-12 col-md-6 col-lg-3 button-fiturs">
                    <a href="/blog">
                        <button class="button-fitur">
                            <a href="/blog">Semua Berita</a><img src="/img/Vector.png" alt=""
                                class="ms-3">
                        </button>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row mb-5 justify-content-center d-flex">
                    @if ($news->count())
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <div class="card subcard__berita">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="/blog/{{ $news[0]->slug }}">
                                            @if ($news[0]->image)
                                                <img src="{{ asset('storage/' . $news[0]->image) }}"
                                                    alt="{{ $news[0]->jenberita->name }}"
                                                    class="img-fluid rounded-start">
                                            @else
                                                <img src="https://source.unsplash.com/1200x1500?{{ $news[0]->jenberita->name }}"
                                                    alt="{{ $news[0]->jenberita->name }}"
                                                    class="img-fluid rounded-start">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a class="text-decoration-none jenis__berita fw-bold"
                                                href="/posts?province={{ $news[0]->jenberita->slug }}">{{ $news[0]->jenberita->name }}</a>
                                            <h3 class="card-title"><a class="text-decoration-none"
                                                    href="/blog/{{ $news[0]->slug }}">{{ $news[0]->title }}</a></h3>
                                            <small>
                                                Penulis <a class="text-decoration-none"
                                                    href="/news?author={{ $news[0]->author->username }}">{{ $news[0]->author->name }}</a>
                                                dibuat {{ $news[0]->updated_at->format('d-m-y') }}
                                            </small>
                                            </p>
                                            <p class="card-text">
                                                {{ strip_tags(\Illuminate\Support\Str::words($news[0]->body, 15, '...')) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($news->skip(1) as $new)
                            <div class="col-12 col-md-6 col-lg-4 mb-5">
                                <div class="card subcard__berita">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <a href="/blog/{{ $new->slug }}">
                                                @if ($new->image)
                                                    <img src="{{ asset('storage/' . $new->image) }}"
                                                        alt="{{ $new->jenberita->name }}"
                                                        class="img-fluid rounded-start">
                                                @else
                                                    <img src="https://source.unsplash.com/1200x1500?{{ $new->jenberita->name }}"
                                                        alt="{{ $new->jenberita->name }}"
                                                        class="img-fluid rounded-start">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a class="text-decoration-none jenis__berita fw-bold"
                                                    href="/posts?province={{ $new->jenberita->slug }}">{{ $new->jenberita->name }}</a>
                                                <h3 class="card-title"><a class="text-decoration-none"
                                                        href="/blog/{{ $new->slug }}">{{ $new->title }}</a></h3>
                                                <small>
                                                    Penulis <a class="text-decoration-none"
                                                        href="/news?author={{ $new->author->username }}">{{ $new->author->name }}</a>
                                                    dibuat {{ $new->updated_at->format('d-m-y') }}
                                                </small>
                                                </p>
                                                <p class="card-text">
                                                    {{ strip_tags(\Illuminate\Support\Str::words($new->body, 15, '...')) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

            </div>
        </div>
    @else
        <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
        @endif
    </section>

    {{-- Search Section --}}
    <section id="search" class="d-flex align-items-center">
        <div class="container mb-5 elemen">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2>Temukan Kos Impianmu</h2>
                    <p class="sub-search">sekarang Anda dapat menghemat semua hal stres, waktu, dan biaya tersembunyi,
                        dengan ratusan kos untuk anda</p>
                </div>
                <form action="#rekomendasi">
                    @csrf
                    @if (request('province'))
                        <input type="hidden" name="province" value="{{ request('province') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="col-10 mx-auto mt-5">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="sewa" role="tabpanel"
                                aria-labelledby="sewa-tab">
                                {{-- dropdown tipe kos --}}
                                <div class="input-group input-cari mb-3">
                                    <input type="search" class="form-control input__search"
                                        placeholder="cari berdasarkam lokasi..." name="search" id=""
                                        value="" aria-label="Text input with dropdown button">
                                    <button class="button-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

    {{-- Cara Sewa --}}
    <section id="poster">
        <div class="container elemen">
            <div class="row mt-5">
                <div class="col-12 col-md-12 col-lg-12 cara__sewa">
                    <a href="">
                        <div class="icon__sewa">
                            <img src="/img/sewa.jpg" alt="">
                        </div>
                        <div class="description__sewa">
                            <h3>Coba cara baru sewa kos!</h3>
                            <p>Biar sewa kos lebih gampang dan aman, coba sistem sewa khusus buat anak kos.</p>
                            <br>
                            <a href="">mau coba?</a>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container elemen">
            <div class="row mt-5">
                <div class="col-12 col-md-12 col-lg-12 sertifikat">
                    <a href="">
                        <div class="icon__sertifikat">
                            <img src="/img/penghargaan.png" alt="">
                        </div>
                        <div class="description__sertifikat">
                            <h3>Kos Dikelola Mamikos, Terjamin Nyaman</h3>
                            <p>Fast Response 24/7, Foto Properti Akurat, Foto Area & Informasi lengkap</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Kos --}}
    <section id="rekomendasi">
        <div class="container elemen">
            <div class="row mt-5">
                <div class="col-12 col-md-6 col-lg-9 text-lg-start">
                    <h2 class="fw-bold">Rekomendasi Kos Untuk Mu</h2>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-4 button__kos mb-4">
                    <a href="/posts">
                        <button class="button__kost">
                            Lihat Semua Kos<img src="/img/Vector.png" alt="" class="ms-3">
                        </button>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @if ($posts->count())
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <div class="card p-2">
                                <div class="kota position-absolute rounded px-3 py-2"
                                    style="background-color: rgba(0, 0, 0, 0)">
                                    <a class="text-decoration-none text-white fw-bold"
                                        href="/posts?province={{ $posts[0]->province->slug }}">{{ $posts[0]->province->name }}</a>
                                </div>
                                <div class="kota position-absolute rounded"
                                    style="background-color: rgba(0, 0, 0, 0); right: 15px;margin-top: 7px"><a
                                        class="text-decoration-none text-white"
                                        href="/posts/{{ $posts[0]->slug }}"><img src="/img/eye.svg"
                                            alt=""></a></div>
                                <div class="kota position-absolute rounded"
                                    style="background-color: rgba(0, 0, 0, 0); left: 15px;margin-top: 208px">
                                    <h4>Rp {{ $posts[0]->price }}</h4>
                                </div>
                                <a href="/posts/{{ $posts[0]->slug }}">
                                    @if ($posts[0]->image)
                                        <img src="{{ asset('storage/' . $posts[0]->image) }}"
                                            alt="{{ $posts[0]->province->name }}" class="card-img-top">
                                    @else
                                        <img src="https://source.unsplash.com/1200x1500?{{ $posts[0]->province->name }}"
                                            alt="{{ $posts[0]->province->name }}" class="card-img-top">
                                    @endif
                                </a>
                                <div class="card-body">
                                    <span class="d-flex justify-content-between">
                                        <h3 class="card-title"><a class="text-decoration-none"
                                                href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->name }}</a>
                                        </h3>
                                        <a href="/posts?jenis={{ $posts[0]->jenis->slug }}"
                                            class="text-decoration-none jenis__kos">
                                            {{ $posts[0]->jenis->name }}
                                        </a>
                                    </span>
                                    <p>
                                        <small class="sub__title">
                                            Pemilik: <a class="text-decoration-none"
                                                href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>
                                            terakhir update {{ $posts[0]->updated_at->format('d-m-y') }}
                                        </small>
                                    </p>
                                    <div class="d-flex align-items-lg-center" style="margin-top: -10px">
                                        <div>
                                            <img src="/img/map.svg" class="d-block d-lg-inline mx-auto"
                                                alt="">
                                        </div>
                                        <p class="card-text"
                                            style="margin-left: 5px; display: inline-block; width: 600px">
                                            {{ $posts[0]->alamat }}</p>
                                    </div>
                                    <div class="card-fasilitas mt-4 d-flex justify-content-between px-4">
                                        <span>
                                            <img src="/img/bed.png" alt="">
                                            <h6>{{ $posts[0]->kamar }}</h6>
                                        </span>
                                        <span class="text-center">
                                            <img src="/img/bathtub.png" alt="">
                                            <h6>{{ $posts[0]->kamarmandi }}</h6>
                                        </span>
                                        <span>
                                            <img src="/img/bedroom.png" alt="">
                                            <h6>{{ $posts[0]->tipekamar }}
                                                meter</h6>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($posts->skip(1) as $post)
                            <div class="col-12 col-md-6 col-lg-4 mb-5">
                                <div class="card p-2">
                                    <div class="kota position-absolute rounded px-3 py-2"
                                        style="background-color: rgba(0, 0, 0, 0)"><a
                                            class="text-decoration-none text-white fw-bold"
                                            href="/posts?province={{ $post->province->slug }}">{{ $post->province->name }}</a>
                                    </div>
                                    <div class="kota position-absolute rounded"
                                        style="background-color: rgba(0, 0, 0, 0); right: 15px;margin-top: 7px"><a
                                            class="text-decoration-none text-white"
                                            href="/posts/{{ $post->slug }}"><img src="/img/eye.svg"
                                                alt=""></a></div>
                                    <div class="kota position-absolute rounded"
                                        style="background-color: rgba(0, 0, 0, 0); left: 15px;margin-top: 208px">
                                        <h4>Rp {{ $post->price }}</h4>
                                    </div>
                                    <a href="/posts/{{ $post->slug }}">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                alt="{{ $post->province->name }}" class="card-img-top">
                                        @else
                                            <img src="https://source.unsplash.com/1200x1500?{{ $post->province->name }}"
                                                alt="{{ $post->province->name }}" class="card-img-top">
                                        @endif
                                    </a>
                                    <div class="card-body">
                                        <span class="d-flex justify-content-between">
                                            <h3 class="card-title"><a class="text-decoration-none"
                                                    href="/posts/{{ $post->slug }}">{{ $post->name }}</a>
                                            </h3>
                                            <a href="/posts?jenis={{ $post->jenis->slug }}"
                                                class="text-decoration-none jenis__kos">
                                                {{ $post->jenis->name }}
                                            </a>
                                        </span>
                                        <p>
                                            <small class="sub__title">
                                                Pemilik: <a class="text-decoration-none"
                                                    href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                                terakhir update {{ $post->updated_at->format('d-m-y') }}
                                            </small>
                                        </p>
                                        <div class="d-flex align-items-lg-center" style="margin-top: -10px">
                                            <div>
                                                <img src="/img/map.svg" class="d-block d-lg-inline mx-auto"
                                                    alt="">
                                            </div>
                                            <p class="card-text"
                                                style="margin-left: 5px; display: inline-block; width: 600px">
                                                {{ $post->alamat }}</p>
                                        </div>
                                        <div class="card-fasilitas mt-4 d-flex  px-4">
                                            <span>
                                                <img src="/img/bed.png" alt="">
                                                <h6>{{ $post->kamar }}</h6>
                                            </span>
                                            <span class="text-center">
                                                <img src="/img/bathtub.png" alt="">
                                                <h6>{{ $post->kamarmandi }}</h6>
                                            </span>
                                            <span>
                                                <img src="/img/bedroom.png" alt="">
                                                <h6>{{ $post->tipekamar }}
                                                    meter</h6>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    @else
        <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
        @endif

    </section>

    {{-- promo --}}
    <section class="promo" id="promo">
        <div class="container mb-5 mt-5 elemen">
            <!-- carousel -->
            <div class="row wrap-carousel">
                <div class="col-8 h-100 pr-1">
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
                                <img src="img/1.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/2.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/3.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-4 h-100 pl-0">
                    <div class="h-50">
                        <img class="w-100 h-100 rounded" src="img/3.png" alt="" />
                    </div>
                    <div class="h-50 pt-1">
                        <img class="w-100 h-100 rounded" src="img/4.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- area --}}
    <section id="fitur" class="overflow-hidden">
        <div class="container elemen">
            <div class="row mb-4 mt-5">
                <div class="col-12 col-md-6 col-lg-9 text-lg-start">
                    <h2 class="fw-bold">
                        Area Kos Terpopuler
                    </h2>
                </div>
                <div class="col-12 col-md-6 col-lg-3 button-fiturs">
                    <a href="/provinces">
                        <button class="button-fitur">
                            Lihat Semua..<img src="/img/Vector.png" alt="" class="ms-3">
                        </button>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @if ($posts->count())
                        @foreach ($provinces as $province)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <a href="/posts?province={{ $province->slug }}" class="text-decoration-none">
                                    <div class="card bg-dark">
                                        @if ($province->image)
                                            <img src="{{ asset('storage/' . $province->image) }}"
                                                alt="{{ $province->name }}">
                                        @else
                                            <img src="https://source.unsplash.com/500x500?{{ $province->name }}"
                                                alt="{{ $province->name }}">
                                        @endif
                                        <div class="card-img-overlay d-flex align-items-center p-0">
                                            <h5 class="card-title text-center flex-fill text-uppercase p-4 fs-3 fw-bold"
                                                style="background-color: rgba(0, 0, 0, 0.0)">{{ $province->name }}
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

    {{-- Vidio --}}
    <section id="vidio">
        <div class="container mt-5 elemen">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 text-center">
                    <iframe width="100%" height="345" style="border-radius: 10px"
                        src="https://www.youtube.com/embed/12_kO6oWlLE?autoplay=1&mute=1" class="youtube">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container-fluid d-flex mt-5 bg__about elemen"
            style="background-color:rgb(224, 224, 224);margin-bottom: -158px">
            <div class="row col-12 col-md-12 col-lg-12">
                <div class="col-6">
                    <h5 class="fw-bold mb-3 mt-5">SevenKos - Website Anak Kos di Indonesia</h5>
                    <p class="text-justify">Mamikos memanfaatkan teknologi untuk berkembang dari aplikasi cari kos
                        menjadi
                        aplikasi yang memudahkan calon anak kos untuk booking properti kos dan juga melakukan pembayaran
                        kos. Saat ini kami memiliki lebih dari 2 juta kamar kos yang tersebar di lebih dari 140 kota di
                        seluruh Indonesia. Mamikos juga menyediakan layanan manajemen properti, bernama Singgahsini dan
                        Apik, untuk menjawab kebutuhan calon penghuni yang menginginkan kos eksklusif atau kos murah.
                        Mamikos berusaha untuk bisa terus menyajikan daftar rumah kos dengan data ketersediaan kamar
                        yang
                        akurat, fasilitas kos terperinci, dilengkapi dengan foto serta detail harga kos, dan kemudahan
                        survei via fitur virtual tour agar calon penghuni mendapatkan kenyamanan dalam proses pencarian
                        dan
                        booking kos.
                    </p>
                    <p class="mb-5 text-justify">Untuk memberikan perlindungan bagi para anak kos selama pandemi,
                        Mamikos
                        menghadirkan Kos Higienis. Kos Higienis merupakan kos dengan konsep yang menerapkan pelaksanaan
                        standar protokol kesehatan, seperti disinfeksi kamar, jaga jarak, penggunaan masker, dan swab
                        antigen untuk kamu saat akan mulai ngekos nanti.</p>
                    <h5 class="fw-bold mb-3">Fitur yang dapat dimanfaatkan di Mamikos</h5>
                    <p class="fw-bold text-justify">a. Fitur Pencarian</p>
                    <p class="ml-3 text-justify">Di kolom pencarian, kamu bisa cari kos di sekitarmu atau kos di
                        seluruh
                        daerah di Indonesia dengan memasukkan keyword, seperti kos dekat Kampus/Universitas di
                        masing-masing
                        kota, cari kos di Jogja, Depok, Jakarta, Surabaya, Bandung, dan kota besar lainnya atau cari kos
                        di
                        sekitar lokasi saya saat ini.</p>
                    <p class="fw-bold text-justify">b. Fitur Pencarian</p>
                    <p class="ml-3 text-justify">Cari kos berdasarkan fasilitas kos yang kamu mau, lebih mudah dengan
                        filter
                        berdasarkan Kos AC, Kos Kamar mandi dalam, Kos Wifi. Bisa juga pilih kos dengan tipe kos, mulai
                        dari
                        Kos Harian, Kos Bulanan hingga Kos Tahunan. Mau cari Kos Bebas, Kos Pasutri, Kos Putra, Kos
                        Putri,
                        Kos Campur juga bisa.</p>
                    <p class="fw-bold text-justify">c. Chat dengan Penyewa</p>
                    <p class="ml-3 text-justify">Terhubung langsung dengan pemilik kos dan bisa bertanya lebih lanjut
                        mengenai info kos melalui fitur chat di Mamikos.</p>
                </div>
                <div class="col-6 mt-5">
                    <p class="fw-bold text-justify">d. Kos Review</p>
                    <p class="ml-3 text-justify">Lihat review dari para penghuni kos agar kamu semakin yakin untuk sewa
                        kos.
                        Kamu juga bisa tulis pengalaman kamu selama ngekos untuk menambah info kos tersebut.</p>
                    <p class="fw-bold text-justify">e. Favorit</p>
                    <p class="ml-3 text-justify">Ketemu dengan kos idaman, bisa disimpan dulu melalui fitur favorit
                        kos. Kos
                        yang sudah kamu simpan, dapat kamu booking di kemudian hari.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <section id="contact">
        <div class="container-fluid overlay h-100 elemen">
            <div class="container">
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-3">
                        <h5 class="text-uppercase font-weight-bold text-decoration-none"><a href="/">
                                <img src="/img/logo.jpg" width="55" height="55"
                                    class="img-thumbnail rounded-circle icon__footer">
                            </a>SEVEN INC KOS</h5>
                        <p>
                            Dapatkan "info kos murah" hanya di SEVEN INC KOS. Mau "Sewa Kost Murah"?
                        </p>
                        <div class="icon-contact">
                            <img src="/img/android.png" width="120" height="150"
                                class="img-thumbnail icon__contact" style="border-radius: 10px">
                            <img src="/img/ios.png" width="120" height="150"
                                class="img-thumbnail icon__contact" style="border-radius: 10px">
                        </div>

                    </div>
                    <!--Grid column-->
                    <div class="col-md-3 menu__contact">
                        <h5 class="text-uppercase font-weight-bold mb-2">SEVEN INC KOS</h5>

                        <ul class="list-unstyled mb-0 text-decoration-none">
                            <li class="mb-2">
                                <a href="/about" class="text-decoration-none">Tentang kami</a>
                            </li>
                            <li class="mb-2">
                                <a href="#!" class="text-decoration-none">Promosikan Kost Anda</a>
                            </li>
                            <li class="mb-2">
                                <a href="/pusatbantuan" class="text-decoration-none">Pusat Bantuan</a>
                            </li>
                            <li class="mb-2 mb-">
                                <a href="/blog" class="text-decoration-none">Blog SEVEN INC</a>
                            </li>
                            <li class="mb-2">
                                <a href="/syarat" class="text-decoration-none">Syarat dan Ketentuan Umum</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <div class="col-md-6">
                        <div class="contact">
                            <h3>
                                Butuh Konsultasi..? Silahkan kontak kami. Kami Siap Membantu
                            </h3>
                            <div class="kontak">
                                <h6>Kontak</h6>
                                <div class="mb-3 d-flex align-items-lg-center">
                                    <div>
                                        <img src="/img/alamat.png" alt="">
                                    </div>
                                    <a href="https://goo.gl/maps/3SP9VmphtbLvmdVRA" class="text-decoration-none"
                                        style="margin-left: 18px; display: inline-block; width: 550px">Karangjambe, Gg.
                                        Arjuna No.59, Jaranan, Banguntapan, Kec. Banguntapan, Kabupaten Bantul Daerah
                                        Istimewa Yogyakarta 55198</a>
                                </div>
                                <div class="mb-3">
                                    <img src="/img/telpon.png" alt="">
                                    <a href="#" class="text-decoration-none"
                                        style="margin-left: 18px">02744534571</a>
                                </div>
                                <div class="mb-3">
                                    <img src="/img/pesan.png" alt="">
                                    <a href="#" class="text-decoration-none"
                                        style="margin-left: 18px">seveninc@gmail.com</a>
                                </div>

                            </div>
                            <div class="sosial">
                                <h6>Social Media</h6>
                                <a href="#" class="me-3"><img src="/img/fb.png" alt=""></a>
                                <a href="#" class="me-3"><img src="/img/twit.png" alt=""></a>
                                <a href="#" class="me-3"><img src="/img/ig.png" alt=""></a>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="b-example-divider"></div>

    <footer class="d-flex align-items-center position-relative">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div
                        class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-lg-start justify-content-center">
                        <h5 class="text-uppercasetext-decoration-none text-light"><a href="/">
                                <img src="/img/logo.jpg" width="55" height="55"
                                    class="img-thumbnail rounded-circle mr-5"></a>SEVEN INC KOS
                        </h5>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 align-items-center d-flex justify-content-center">
                        <a href="#hero" class="text-light">Beranda</a>
                        <a href="#layanan" class="text-light">Layanan</a>
                        <a href="#promo" class="text-light">Promo</a>
                        <a href="#contact" class="text-light">Kontak</a>
                    </div>
                </div>
                <div class="row position-absolute copy start-50 translate-middle">
                    <div class="col-12">
                        <p class="text-center">&copy; 2022 Company, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--==================== SCROLL TOP ====================-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup__icon"></i>
    </a>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- JS File -->
    {{-- <script src="js/jquery-3.6.0.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="/js/navbar.js"></script>

    <script src="/js/script.js"></script>

</body>

</html>
