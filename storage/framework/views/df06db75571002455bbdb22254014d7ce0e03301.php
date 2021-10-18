
<?php $__env->startSection('content'); ?>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo e(('frontend/assets/css/style.min.css')); ?>">
</head>

<nav class="breadcrumb-navs">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="passed"><a href="/">Home</a></li>
            <li class="active"><a href="#">Terms And Condition</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="row">


        <div class="col-md-12">
    
            <p><?php echo @$terms->terms ?></p>
    
    
        </div>
    
    
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/terms.blade.php ENDPATH**/ ?>