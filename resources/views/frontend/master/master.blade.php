<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @if(\Illuminate\Support\Facades\Request::is('productdetails/*') || \Illuminate\Support\Facades\Request::is('productdetails/*#'))
        @yield('facebook-share-meta-tags')
    @endif
    <title>Aayan</title>



{{-- csslink --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
   <?php
    $data=\App\Model\Favicon::first();
   ?>
    @if($data)
        <link rel="icon" type="image/png" href="{{asset('storage/storeFavicon/'.$data->file)}}">
       
    @else
        <link rel="icon" type="image/png" href="{{asset('storage/storeFavicon/common.png')}}">
    @endif

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
   <link rel="stylesheet" href="{{ asset('../backend/assets/vendor/toastr/toastr.min.css') }}">

   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/animate/animate.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('../frontend/assets/vendor/magnific-popup/magnific-popup.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/photoswipe/photoswipe.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/photoswipe/default-skin/default-skin.min.css')}}">
   <!-- Default CSS -->
   {{-- <link rel="stylesheet" href="{{asset('/backend/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}"> --}}

   <link rel="stylesheet" type="text/css" href="{{asset('../frontend/assets/css/demo5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/scss/demos/demo5/demo5.css')}}">
    @yield('page-styles')
    @yield('profile-styles')

    <style>
.form-control{
    border-color:#000000 !important;
}


         a :hover{
    text-decoration: none !important;

  }
  body a {
      text-decoration:none !important;
  }
    </style>


    <!-- Facebook Pixel Code -->
    @if($pixel)

        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{$pixel->pixel_id}}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id={{$pixel->pixel_id}}&ev=PageView&noscript=1"
            /></noscript>
    @endif
<!-- End Facebook Pixel Code -->

</head>

<body class="home">

@if(\Illuminate\Support\Facades\Request::is('productdetails/*') || \Illuminate\Support\Facades\Request::is('productdetails/*#'))
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endif

    <div class="page-wrapper">
        <input id="token" type="text" value="" hidden>
        <input type="text" id="userId" value="{{Auth::id()}}" hidden>
        <input type="text" id="productColor" value="" hidden>
        <input type="text" id="productSize" value="" hidden>
        <input type="text" id="productPrice" value="" hidden>
        <input type="text" id="productQty" value="" hidden>
        <!-- Start of Header -->
        <x-frontend.header/>
        <!-- End of Header -->

        <!-- Start of Main-->
        @yield('content')
        <!-- End of Main -->

        <!-- Start of Footer -->
        <x-frontend.footer/>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Start of Sticky Footer -->
    <x-frontend.sticky-footer/>
    <!-- End of Sticky Footer -->


    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <x-frontend.mobile-menu/>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    <x-frontend.product-popup/>

    <!-- End of Quick view -->


   <!-- Plugin JS File -->
{{-- <script src="{{asset('/backend/js/pages/tables/jquery-datatable.js')}}"></script>
   <script src="{{asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('/backend/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script> --}}

   <script src="{{asset('../frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/sticky/sticky.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/parallax/parallax.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>

    <script src="{{asset('../frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

   <script src="{{asset('frontend/assets/vendor/zoom/jquery.zoom.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/skrollr/skrollr.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/photoswipe/photoswipe.min.js')}}"></script>
   <script src="{{asset('frontend/assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('../backend/assets/vendor/toastr/toastr.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
@yield('page-scripts')
@yield('profile-scripts')
<script src="{{asset('/backend/js/subscribe.js')}}"></script>
    <script src="{{asset('/frontend/js/trackOrder.js')}}"></script>
    <script src="{{asset('/frontend/js/add-to-cart.js')}}"></script>
    <script src="{{asset('/frontend/js/quickView.js')}}"></script>
    <script src="{{asset('/frontend/js/wishList.js')}}"></script>
    <script src="{{asset('frontend/js/popup-login.js')}}"></script>
@yield('view-cart-script')
    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

</body>
</html>
