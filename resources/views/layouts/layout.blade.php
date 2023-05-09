<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Book</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ ('public/frontend/assets/img/icons8-book-stack-64.png') }}" rel="icon">
  <link href="{{ ('public/frontend/assets/img/icons8-book-stack-64.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/vendor/swiper/swiper-bundle.min.cs') }}s" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('public/frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->
  <link href="{{ asset('public/frontend/assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/css/book.css') }}" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/css/scroll.css') }}" rel="stylesheet">
  <link href="{{ asset('public/frontend/assets/css/author.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio - v1.1.1
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @livewireStyles
</head>

<body style="background-color:aliceblue; color:black">
    @include('layouts.inc.frontend.header')


  <main style="margin-top: 3cm" id="main" data-aos="fade" data-aos-delay="1500">

    @yield('home')
    @yield('about')
    @yield('category')
    @yield('books')
    @yield('library')

  </main><!-- End #main -->
  @include('layouts.inc.frontend.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/js/book.js') }}"></script>
  <script src="{{ asset('public/frontend/js/custom.js') }}" type="text/javascript"></script>
{{-- <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("header").style.top = "0";
      document.getElementById("profilelibr").style.top = "0";
      document.getElementById("profilelibr2").style.top = "0";
    } else {
      document.getElementById("header").style.top = "-110px";
      document.getElementById("profilelibr").style.top = "-100px";
      document.getElementById("profilelibr2").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
}
  </script>  --}}
  @livewireScripts

</body>

</html>