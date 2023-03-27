<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- My Style -->
    <link rel="stylesheet" href="/css/login.css">

    <!--Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>{{ $title }}</title>
</head>

<body>

    <form action="/register" method="POST">
        @csrf
        <div class="row justify-content-center align-items-center my-3 mx-2">
            <div class="col-lg-4">
                <div class="header text-center">
                    <img class="img-thumbnail rounded-circle mx-auto d-block mb-3" src="img/logo.jpg" alt=""
                        width="100" height="100">
                    <h1>Registration Form</h1>
                    <p>Please enter your details!</p>
                </div>
                <div class="login-form">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                        id="name" placeholder="Enter your name" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                        id="username" placeholder="Enter your username" required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                        id="email" placeholder="Enter your email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        id="password" placeholder="Enter your password" required value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <button class="signin mt-3 mb-1" type="submit">Register</button>
                    <div class="text-center">
                        <span class="d-inline">Already Registered? <a href="/login"
                                class="signup d-inline text-decoration-none">Login</a></span>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <img src="/img/accent.png" alt="" class="position-absolute h-100 top-0 start-0 accent-img">
    <img src="/img/accent2.png" alt="" class="position-absolute h-100 top-0 end-0 accent-img d-inline"
        style="-webkit-transform: rotate(180deg);-moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);-o-transform: rotate(180deg);transform: rotate(180deg);">
    {{-- <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/kos1.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Convenient Place</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/kos2.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Convenient Place</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/kos3.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Convenient Place</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div> --}}



    <script type="text/javascript" src="js/main.js"></script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->

</body>

</html>
