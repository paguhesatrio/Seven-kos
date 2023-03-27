@extends('layouts.main')

@section('container')
    {{-- <h1 class="text-center text-success fw-bold">{{ $title }}</h1> --}}

    <section class="about" id="about">

        <div class="container about">

            <div class="row featurette d-flex align-items-lg-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-bold lh-1">Aplikasi Pencari Kos No. 1 di Indonesia</span></h2>
                    <p class="lead">Cari kos yang akurat dan tepercaya kini semakin
                        mudah. Sejak didirikan pada 27 September 2022,
                        Mamikos telah berkembang hingga menjadi
                        aplikasi pencari kos no. 1 di Indonesia.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300"
                        height="300" src="/img/about1.png" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>



            <div class="row featurette d-flex align-items-lg-center">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-bold lh-1">Informasi Data Kos Yang Lengkap</span></h2>
                    <p class="lead">Mamikos memanfaatkan teknologi dengan mengelola dan menyajikan daftar kos dengan
                        penjelasan fasilitas secara terperinci dan dilengkapi dengan foto serta detail dari setiap kos. Kami
                        memiliki tim Mamichecker, yang tugasnya mengecek dan membuat profil setiap properti. Temukan
                        properti dengan tanda Mamichecker sebagai properti yang sudah dicek oleh tim kami!</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400"
                        height="400" src="/img/about2.png" preserveAspectRatio="xMidYMid slice" focusable="false">

                </div>
            </div>


            <div class="row featurette d-flex align-items-lg-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-bold lh-1">Penghubung Pemilik dan Pencari Kos</span></h2>
                    <p class="lead">Mamikos telah menghubungkan lebih dari 110 ribu pemilik kos dengan 6-8 juta pencari
                        kos setiap bulannya, untuk memberikan akomodasi yang lebih baik. Inovasi yang kami lakukan bertujuan
                        untuk memberikan kenyamanan dan kemudahan bagi penyewa dan pemilik kos.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300"
                        height="300" src="/img/about3.png" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>

            <div class="row featurette d-flex align-items-lg-center">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-bold lh-1">Data Kos Seluruh Indonesia</span></h2>
                    <p class="lead">Saat ini kami memiliki lebih dari 2 juta kamar kos yang tersebar di lebih dari 140
                        kota di seluruh Indonesia. Mamikos berusaha untuk bisa terus menyajikan data ketersediaan kamar yang
                        akurat, agar calon penghuni mendapatkan kemudahan dalam pencarian kos.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300"
                        height="300" src="/img/about4.png" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>

        </div>
    </section>
@endsection
