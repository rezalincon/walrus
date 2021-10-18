<?php $__env->startSection('content'); ?>

<div class="page-wrapper">   
    <!-- Start of Main-->
    <main class="main">
      <div class="container">

          <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body">
                  <h2 class="card-title text-center"><?php echo e($data->sub_menu); ?></h2>
                  <p class="card-text"><?php echo $data->sub_menu_details; ?></p>
                 
              </div>
          </div>

      </div>

    </main>
   

   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/footer_menu/footer_menu.blade.php ENDPATH**/ ?>