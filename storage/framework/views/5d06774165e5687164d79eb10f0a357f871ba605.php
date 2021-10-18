

<?php $__env->startSection('main-content'); ?>

<?php if(session('success')): ?>

  <div class="alert alert-success">
      <?php echo e(session('success')); ?>

  </div>
  <?php endif; ?>



<div class="col-lg-10 offset-md-1">
    <div class="card">
        <div class="header">
            <h2><strong>Blog</strong></h2>
        </div>
        <div class="body">
            <form action="<?php echo e(route('addblog')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <h6><strong> Title* </strong></h6>
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Enter title" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="form-group">
                    <h6><strong> Feature Photo* </strong></h6>
                    <div class="input-group">
                        <input type="file" name="image" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <h6><strong>Details*</strong></h6>
                    <div class="input-group">
                        <textarea name="body" class="summernote"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary theme-bg gradient">Add Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>
    <script>
        $('.summernote').summernote({
            placeholder: 'Type your message',
            tabsize: 1,
            height: 300
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/blog/add.blade.php ENDPATH**/ ?>