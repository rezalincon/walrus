<!---->

<!--<?php $__env->startSection('title', __('Not Found')); ?>-->
<!--<?php $__env->startSection('code', '404'); ?>-->
<!--<?php $__env->startSection('message', __('Not Found')); ?>-->

<section>
    <div style="text-align:center">
        <div style="width:100%;">
            <img style="width:50%" src="https://i.ibb.co/QKkvDNT/undraw-page-not-found-su7k.png" alt="">
        </div>
        <div style="width:100%;">
            <h1>Ooops! <br> Page not Found</h1>
            <a href="<?php echo e(url('/')); ?>">
                <button style="padding:10px;background-color:#FD3D11;color:white;borfer-radius:10px;border:none;cursor:pointer;">Go BACK</button>
            </a>
        </div>
    </div>
</section>
<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/views/404.blade.php ENDPATH**/ ?>