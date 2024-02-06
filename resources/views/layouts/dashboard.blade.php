<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>@yield('title') | Manajemen Gedung</title>
@stack('before-styles')
<link rel="icon" href="{{ asset('image/gambar/logopenabur.png') }}" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="{{ asset('template/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/plugins/morrisjs/morris.css') }}"/>
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/css/hm-style.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/css/color_skins.css') }}">

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{ asset('template/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{-- toastr --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet">
@stack('after-styles')
</head>

<body class="theme-cyan index2" style="background-color: #fbfbfb">

    {{-- Fitur --}}
    @yield('content')
    {{-- End Fitur --}}

@stack('before-scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('template/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/countTo.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/sparkline.bundle.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/widgets/infobox/infobox-1.js') }}"></script>
<script src="{{ asset('template/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('template/assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
<script src="{{ asset('template/assets/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('template/assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{ asset('template/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/tables/jquery-datatable.js') }}"></script>

<script src="{{ asset('template/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('template/assets/js/pages/tables/jquery-datatable.js') }}"></script>
{{-- Script Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- Js Select2 Option --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- script toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

{{-- datatables --}}
<script>
  $(function () {
      $('.js-basic-example').DataTable();
  });
  </script>

<script>
    /*global $ */
    $(document).ready(function() {
        "use strict";
        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI

        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');

        $(".menu > ul > li").hover(function(e) {
          if ($(window).width() > 943) {
            $(this).children("ul").stop(true, false).fadeToggle(150);
            e.preventDefault();
          }
        });
        //If width is more than 943px dropdowns are displayed on hover
        $(".menu > ul > li").on('click',function() {
          if ($(window).width() <= 943) {
            $(this).children("ul").fadeToggle(150);
          }
        });
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

        $(".h-bars").on('click',function(e) {
          $(".menu > ul").toggleClass('show-on-mobile');
          e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

      });
    </script>

  {{-- notifikasi toast --}}
  <script>
	  @if (Session::has('success'))
	  toastr.success("{{Session::get('success')}}")
	  @endif
  </script>

<script>
  @if (Session::has('warning'))
  toastr.warning("{{Session::get('warning')}}")
  @endif
</script>

<script>
  @if (Session::has('error'))
  toastr.error("{{Session::get('error')}}")
  @endif
</script>

    @stack('after-scripts')
</body>
</html>