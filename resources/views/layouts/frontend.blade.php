{{-- <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Add to cart</title>
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   </head>
   <body>
      <div  class="bg-white">
         <header>
            <div class="container px-6 py-3 mx-auto">
               <div class="flex items-center justify-between">
                  <div class="flex items-center justify-end w-full">
                     <button class="mx-4 text-gray-600 focus:outline-none sm:mx-0">
                     </button>
                  </div>
               </div>
               <nav  class="p-6 mt-4 text-white bg-pink-300 sm:flex sm:justify-center sm:items-center">
               <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
                    <span class="font-semibold text-xl tracking-tight">Laravel 9 Shopping Cart</span>
                </div>
                  <div class="flex flex-col sm:flex-row">
                     <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>

                     <a href="{{ route('cart.list') }}" class="flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ Cart::getTotalQuantity()}}
                     </a>
                  </div>
               </nav>
            </div>
         </header>
         <main class="my-8">
            @yield('content')
         </main>
      </div>
   </body>
</html> --}}

<!doctype html>
<html lang="en">

<head>
    {{-- Google Font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Gulzar&family=Monoton&family=Montserrat&family=Pacifico&family=Rubik+Moonrocks&display=swap"
        rel="stylesheet">

    <link class="img-thumbnail rounded-circle" rel="icon img-thumbnail rounded-circle" type="image/jpg"
        href="/img/logo.jpg" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    {{-- Title --}}
    <title> Sevenkos - Keranjang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- CSS File -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- BoxIcons v2.1.2 -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to cart</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>


<body>

    @include('partials.navbar')

    <div class="container mt-4">
        <a href="{{ route('cart.list') }}" class="flex items-center">
        </a>
        <main class="my-8">
            @yield('content')
        </main>
    </div>
    </div>

    @include('partials.footer')

    @include('partials.scrollup')

    <!-- JS File -->

    <script type="text/javascript" src="/js/navbar.js"></script>

    <script src="/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

    {{-- Light Box --}}
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.0/dist/index.bundle.min.js"></script>
</body>
