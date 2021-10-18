

<?php $__env->startSection('main-content'); ?>



<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <h1><strong>Blogs</strong></h1>
            <span>Dashboard</span> <i class="fa fa-angle-right"></i>
            <span>Blogs</span> <i class="fa fa-angle-right"></i>

        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">

                <a href="<?php echo e(route('blogadd')); ?>" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Add Blog</a>

            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>

                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td><?php echo e($b->id); ?></td>
                                <td><?php echo e($b->title); ?></td>
                                <td>
                                    <a href="<?php echo e(route('blogedit',$b->id)); ?>"  class="btn btn-primary btn-round mr-1 editBtn" style="cursor: pointer" type="button"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo e(route('blogdelete',$b->id)); ?>"  class="btn btn-danger btn-round deleteBtn" style="cursor: pointer" type="submit"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>