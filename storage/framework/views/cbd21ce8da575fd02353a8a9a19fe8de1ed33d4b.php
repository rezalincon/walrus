<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php if(\Illuminate\Support\Facades\Request::is('productdetails/*') || \Illuminate\Support\Facades\Request::is('productdetails/*#')): ?>
        <?php echo $__env->yieldContent('facebook-share-meta-tags'); ?>
    <?php endif; ?>
    <title>Aayan</title>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <?php
    $data=\App\Model\Favicon::first();
   ?>
    <?php if($data): ?>
        <link rel="icon" type="image/png" href="<?php echo e(asset('storage/storeFavicon/'.$data->file)); ?>">
       
    <?php else: ?>
        <link rel="icon" type="image/png" href="<?php echo e(asset('storage/storeFavicon/common.png')); ?>">
    <?php endif; ?>

  <script>
      WebFontConfig = {
          google: { families: ['Poppins:400,500,600,700,800'] }
      };
      (function (d) {
          var wf = d.createElement('script'), s = d.scripts[0];
          wf.src = '<?php echo e(asset('frontend/assets/js/webfont.js')); ?>';
          wf.async = true;
          s.parentNode.insertBefore(wf, s)
      })(document);
  </script>

       <link rel="preload" href="<?php echo e(asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')); ?>" as="font" type="font/woff2"
       crossorigin="anonymous">
   <link rel="preload" href="<?php echo e(asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')); ?>" as="font" type="font/woff2"
       crossorigin="anonymous">
   <link rel="preload" href="<?php echo e(asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')); ?>" as="font" type="font/woff2"
           crossorigin="anonymous">
   <link rel="preload" href="<?php echo e(asset('frontend/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf')); ?>" crossorigin="anonymous">

   <!-- Vendor CSS -->
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/vendor/fontawesome-free/css/all.min.css')); ?>">

   <!-- Plugins CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('../backend/assets/vendor/toastr/toastr.min.css')); ?>">

   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/vendor/animate/animate.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('../frontend/assets/vendor/magnific-popup/magnific-popup.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/vendor/photoswipe/photoswipe.min.css')); ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/vendor/photoswipe/default-skin/default-skin.min.css')); ?>">
   <!-- Default CSS -->
   

   <link rel="stylesheet" type="text/css" href="<?php echo e(asset('../frontend/assets/css/demo5.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/scss/demos/demo5/demo5.css')); ?>">
    <?php echo $__env->yieldContent('page-styles'); ?>
    <?php echo $__env->yieldContent('profile-styles'); ?>

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
    <?php if($pixel): ?>

        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo e($pixel->pixel_id); ?>');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=<?php echo e($pixel->pixel_id); ?>&ev=PageView&noscript=1"
            /></noscript>
    <?php endif; ?>
<!-- End Facebook Pixel Code -->

</head>

<body class="home">

<?php if(\Illuminate\Support\Facades\Request::is('productdetails/*') || \Illuminate\Support\Facades\Request::is('productdetails/*#')): ?>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>

    <div class="page-wrapper">
        <input id="token" type="text" value="" hidden>
        <input type="text" id="userId" value="<?php echo e(Auth::id()); ?>" hidden>
        <input type="text" id="productColor" value="" hidden>
        <input type="text" id="productSize" value="" hidden>
        <input type="text" id="productPrice" value="" hidden>
        <input type="text" id="productQty" value="" hidden>
        <!-- Start of Header -->
         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.header','data' => []]); ?>
<?php $component->withName('frontend.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <!-- End of Header -->

        <!-- Start of Main-->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- End of Main -->

        <!-- Start of Footer -->
         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.footer','data' => []]); ?>
<?php $component->withName('frontend.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Start of Sticky Footer -->
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.sticky-footer','data' => []]); ?>
<?php $component->withName('frontend.sticky-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    <!-- End of Sticky Footer -->


    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.mobile-menu','data' => []]); ?>
<?php $component->withName('frontend.mobile-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product-popup','data' => []]); ?>
<?php $component->withName('frontend.product-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <!-- End of Quick view -->


   <!-- Plugin JS File -->


   <script src="<?php echo e(asset('../frontend/assets/vendor/jquery/jquery.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/sticky/sticky.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/parallax/parallax.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/owl-carousel/owl.carousel.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js')); ?>"></script>

    <script src="<?php echo e(asset('../frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>

   <script src="<?php echo e(asset('frontend/assets/vendor/zoom/jquery.zoom.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/skrollr/skrollr.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/photoswipe/photoswipe.min.js')); ?>"></script>
   <script src="<?php echo e(asset('frontend/assets/vendor/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('../backend/assets/vendor/toastr/toastr.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('page-scripts'); ?>
<?php echo $__env->yieldContent('profile-scripts'); ?>
<script src="<?php echo e(asset('/backend/js/subscribe.js')); ?>"></script>
    <script src="<?php echo e(asset('/frontend/js/trackOrder.js')); ?>"></script>
    <script src="<?php echo e(asset('/frontend/js/add-to-cart.js')); ?>"></script>
    <script src="<?php echo e(asset('/frontend/js/quickView.js')); ?>"></script>
    <script src="<?php echo e(asset('/frontend/js/wishList.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/popup-login.js')); ?>"></script>
<?php echo $__env->yieldContent('view-cart-script'); ?>
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
<?php /**PATH /home/aayancom/public_html/resources/views/frontend/master/master.blade.php ENDPATH**/ ?>