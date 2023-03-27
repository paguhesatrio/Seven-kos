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

    <div class="row justify-content-center align-items-center my-3 mx-2">
        <div class="col-lg-4">
            <div class="header text-center">
                <img class="img-thumbnail rounded-circle mx-auto d-block mb-3" src="img/logo.jpg" alt=""
                    width="100" height="100">
                <h1>welcome back</h1>
                <p>Welcome back! Please Login</p>
            </div>
            <div class="login-form">
                <form action="/login" method="post">
                    @csrf
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Enter your email" autofocus required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password"
                        name="password" required>
                    <a href="#" class="text-decoration-none text-center">Forgot password</a>

                    <button class="signin" type="submit">Sign In</button>

                    <button class="signin-google">
                        <img src="/img/icon.png" alt="">
                        Sign In With Google</button>
                    <div class="text-center">
                        <span class="d-inline">Dont' have account? <a href="/register"
                                class="signup d-inline text-decoration-none">Sign up
                                for free</a></span>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <img src="/img/accent.png" alt="" class="position-absolute h-100 top-0 start-0 accent-img">
    <img src="/img/accent2.png" alt="" class="position-absolute h-100 top-0 end-0 accent-img d-inline"
        style="-webkit-transform: rotate(180deg);-moz-transform: rotate(180deg);
    -ms-transform: rotate(180deg);-o-transform: rotate(180deg);transform: rotate(180deg);">


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
    @include('sweetalert::alert')
</body>

</html>
