{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark position-relative">
    <div class="container">
        <a href="/">
            <img src="/img/logo.jpg" width="55" height="55" class="img-thumbnail rounded-circle me-3">
        </a>
        <a class="navbar-brand" href="/">SEVEN INC KOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">BERANDA</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'posts' ? 'active' : '' }}" href="/posts">KOS</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'provinces' ? 'active' : '' }}"
                        href="/provinces">LOKASI</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'blog' ? 'active' : '' }}" href="/blog">BERITA</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }}"
                        href="/about">TENTANG</a>
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
                                <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Dashboard</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/profil"><i class="bx bx-user"></i> Profil</a> --}}
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>
                                        LOGOUT
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
                                <a href="/login" class="text-decoration-none">
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
                                <a href="/login" class="text-decoration-none">
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
{{-- <nav class="navbar navbar-expand-lg navbar-dark position-relative">
    <div class="container">
        <a href="/">
            <img src="/img/logo.jpg" width="55" height="55" class="img-thumbnail rounded-circle me-3">
        </a>
        <a class="navbar-brand" href="/">SEVEN INC KOS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">HOME</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'posts' ? 'active' : '' }}" href="/posts">KOS</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'provinces' ? 'active' : '' }}"
                        href="/provinces">LOKASI</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'blog' ? 'active' : '' }}" href="/blog">BLOG</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ request()->segment(1) == 'about' ? 'active' : '' }}" href="/about">ABOUT</a>
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
                                <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    My Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>
                                        LOGOUT
                                    </button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login"
                                class="nav-link display-6 lh-7 fw-bold text-light {{ $active === 'login' ? 'active' : '' }} fs-5"><i
                                    class="bi bi-box-arrow-in-right"></i> LOGIN</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav> --}}
