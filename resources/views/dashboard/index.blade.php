@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>

    <section class="cara" id="cara">
        <div class="container-fluid rounded d-flex mt-1" style="background-color:rgba(255, 255, 255, 0)">
            <div class="row col-lg-12 cara">
                <div class="col-lg-12">
                    <h5 class="fw-bold mt-5">SevenKos - Fitur
                    @can('pemilik')
                    <a>Pemilik</a>
                    @endcan

                    @can('admin')
                    <a>Admin</a>
                    @endcan

                    </h5>
                    <h5 class="fw-bold mb-3">Silahkan klik menu kos pada sidebar disamping</h5>
                    <ul>
                        <li>
                            Fitur Home Berfungsi Untuk Kembali ke halaman awal
                        </li>
                        <li>
                            Fitur Favorit Berguna untuk menyimpan kos favorit anda
                        </li>
                        <li>
                            Fitur Pemesanan Berguna melihat dan melanjutkan pembayaran dari kos yang sudah di pesan
                        </li>
                        @can('pemilik')
                        <li>
                            Fitur Kos Berguna untuk menginputkan, mengedit, dan menghapus kos anda
                        </li>
                        <li>
                            Fitur Info Berguna untuk memberitahu anda bahwa pembayaran dari user lain sudah diterima
                        </li>
                        @endcan
                        @can('admin')
                        <li>
                            Fitur berita Berguna untuk menginputkan, mengedit, dan menghapus berita anda
                        </li>
                        <li>
                            Fitur Semua Info Berguna untuk melihat info yang sudah dibuat
                        </li>
                        <li>
                            Fitur Semua user Berguna untuk melihat user yang sudah dibuat
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="berita">
        <div class="row mb-2 mt-4">
            @if ($news->count())
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card subcard__berita" style="max-width: 358px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="/blog/{{ $news[0]->slug }}">
                                    @if ($news[0]->image)
                                        <img src="{{ asset('storage/' . $news[0]->image) }}"
                                            alt="{{ $news[0]->jenberita->name }}" class="img-fluid rounded-start">
                                    @else
                                        <img src="https://source.unsplash.com/1200x1500?{{ $news[0]->jenberita->name }}"
                                            alt="{{ $news[0]->jenberita->name }}" class="img-fluid rounded-start">
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a class="text-decoration-none jenis__berita fw-bold"
                                        href="/posts?category={{ $news[0]->jenberita->slug }}">{{ $news[0]->jenberita->name }}</a>
                                    <h3 class="card-title"><a class="text-decoration-none"
                                            href="/blog/{{ $news[0]->slug }}">{{ $news[0]->title }}</a></h3>
                                    <small>
                                        Penulis <a class="text-decoration-none"
                                            href="/news?author={{ $news[0]->author->username }}">{{ $news[0]->author->name }}</a>
                                        dibuat {{ $news[0]->updated_at->format('d-m-y') }}
                                    </small>
                                    <p class="card-text">
                                        {{ strip_tags(\Illuminate\Support\Str::words($news[0]->body, 15, '...')) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($news->skip(1) as $new)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card subcard__berita" style="max-width: 358px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="/blog/{{ $new->slug }}">
                                        @if ($new->image)
                                            <img src="{{ asset('storage/' . $new->image) }}"
                                                alt="{{ $new->jenberita->name }}" class="img-fluid rounded-start">
                                        @else
                                            <img src="https://source.unsplash.com/1200x1500?{{ $new->jenberita->name }}"
                                                alt="{{ $new->jenberita->name }}" class="img-fluid rounded-start">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a class="text-decoration-none jenis__berita fw-bold"
                                            href="/posts?category={{ $new->jenberita->slug }}">{{ $new->jenberita->name }}</a>
                                        <h3 class="card-title"><a class="text-decoration-none"
                                                href="/blog/{{ $new->slug }}">{{ $new->title }}</a></h3>
                                        <small>
                                            Penulis <a class="text-decoration-none"
                                                href="/news?author={{ $new->author->username }}">{{ $new->author->name }}</a>
                                            dibuat {{ $new->updated_at->format('d-m-y') }}
                                        </small>
                                        <p class="card-text">
                                            {{ strip_tags(\Illuminate\Support\Str::words($new->body, 15, '...')) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
        </div>
    </section>

    <div class="text-center mt-3">
        <a href="/blog" class="text-decoration-none btn btn-primary mb-3 fw-bold" style="background-color: #16be72">Lihat
            Semua Berita</a>
    </div>

    </div>
    </div>
@else
    <p class="text-center fs-4 text-success fw-bold">No Post Found.</p>
    @endif

    </section>
    @can('pemilik')
    <section id="cara">
        <div class="container-fluid rounded d-flex mt-1" style="background-color:rgba(255, 255, 255, 0)">
            <div class="row col-lg-12 cara">
                <div class="col-lg-12">
                    <h5 class="fw-bold mt-5">SevenKos - Ingin menginputkan Kos Anda?</h5>
                    <h5 class="fw-bold mb-3">silahkan klik menu kos pada sidebar disamping</h5>
                    <ul>
                        <li>
                            Input No Wa:
                            <p>Dimulai dengan menginputkan +62</p>
                            <p class="fw-bold">Contoh No Anda: 082251628282, maka menjadi +6282251628282</p>
                        </li>
                        <li>
                            Input Map(Lokasi):
                            <p>Pertama-tama mencari lokasi kos anda pada aplikasi google maps, lalu:</p>
                            <ul>
                                <li>
                                    Cari Lokasi Kos Anda
                                </li>
                                <li>
                                    Klik Menu Share
                                </li>
                                <li>
                                    Klik Menu Embed a map pada Menu Share
                                    <img src="/img/dashboard1.png" alt="" style="display: flex">
                                </li>
                                <li>
                                    Copy HTML dari lokasi anda
                                </li>
                                <li>
                                    Kemudian ubah hasil copy HTML lokasi anda
                                    <p class="fw-bold">Contoh:</p>
                                    <img src="/img/dashboard2.png" alt="" style="display: flex">
                                    <p class="fw-bold">Menjadi:</p>
                                    <img src="/img/dashboard3.png" alt="" style="display: flex; margin-left: 41px">
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endcan
@endsection


