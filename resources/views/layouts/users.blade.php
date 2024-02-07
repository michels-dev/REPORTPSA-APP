<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | PSA</title>
  @stack('before-styles')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('image/icon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landingpage/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('landingpage/assets/css/style.css') }}" rel="stylesheet">
  @stack('after-styles')
</head>
<body>

    {{-- Fitur --}}
        @yield('content')
    {{-- End Fitur --}}

    @stack('before-scripts')
  <!-- Vendor JS Files -->
  <script src="{{ asset('landingpage/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landingpage/assets/js/main.js') }}"></script>

  @stack('after-scripts')
</body>
</html>