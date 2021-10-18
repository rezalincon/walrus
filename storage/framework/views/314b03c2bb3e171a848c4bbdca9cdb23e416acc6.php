
<?php $__env->startSection('content'); ?>

<div class="page-wrapper">
    <main class="main">
      <div class="container">

          <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body">
                  <h2 class="card-title text-center"> <strong><h2 class="text-uppercase"><?php echo e($blog->title); ?></h2></strong> </h2>
                  <div class="container">                      
                      <p><?php echo $blog->details; ?></p>
                  </div>
              </div>
          </div>

      </div>

    </main>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/blogs/view.blade.php ENDPATH**/ ?>