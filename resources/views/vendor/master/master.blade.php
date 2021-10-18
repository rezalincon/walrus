<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Aayan@com</title>
    <?php
    $data=\App\Model\Favicon::first();
   ?>
    @if($data)
        <link rel="icon" type="image/png" href="\storage\storeFavicon\{{$data->file}}">
    @else
        <link rel="icon" type="image/png" href="\storage\storeFavicon\common.png">
    @endif
{{-- csslink --}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

  <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/icons/favicon.png')}}">
  <script>
      WebFontConfig = {
          google: { families: ['Poppins:400,500,600,700,800'] }
      };
      (function (d) {
          var wf = d.createElement('script'), s = d.scripts[0];
          wf.src = '{{ asset('frontend/assets/js/webfont.js') }}';
          wf.async = true;
          s.parentNode.insertBefore(wf, s)
      })(document);
  </script>

       <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
       crossorigin="anonymous">
   <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
       crossorigin="anonymous">
   <link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
           crossorigin="anonymous">
   <link rel="preload" href="{{asset('frontend/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf')}}" crossorigin="anonymous">

   <!-- Vendor CSS -->
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/fontawesome-free/css/all.min.css')}}">

   <!-- Plugins CSS -->
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/animate/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

   <!-- Default CSS -->

   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/demo5.min.css')}}">
</head>

<body>
  
        @yield('content')

 
     
   <!-- Plugin JS File -->

   <script src="{{asset('/frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/parallax/parallax.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script src="{{asset('../frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

   <script src="{{asset('frontend/assets/vendor/zoom/jquery.zoom.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/skrollr/skrollr.min.js')}}"></script>

    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- login js -->

   @yield('page-scripts')

 

</body>
</html>