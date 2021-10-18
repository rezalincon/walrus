
<?php $__env->startSection('main-content'); ?>
<div class="block-header">
  <div class="row clearfix">
      <div class="col-lg-8 col-md-12 col-sm-12">
          <h1>Vendor Withdraw</h1>
          <span>Dashboard</span> <i class="fa fa-angle-right"></i>
          <span>Vendor</span> <i class="fa fa-angle-right"></i>
          <span>Withdraw</span>
      </div>
  </div>
</div>
<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Shop Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $__empty_1 = true; $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                              
                          
                                <tr>
                                    <td><?php echo e($item->vendor->shop_name); ?></td>
                                    <td><?php echo e($item->vendor->email); ?></td>
                                    <td><?php echo e($item->amount); ?></td>
                                    <td><?php echo e($item->method); ?></td>
                                    <td><?php echo e($item->created_at->format('d-M-Y')); ?></td>

                                    <td>
                                      <select name="" class="theme-bg " data-id="<?php echo e($item->id); ?>" id="selectStatus" >
                                        <option class="text-dark" value="Pending" <?php echo e($item->status == "Pending" ? 'selected' : ''); ?>>Pending</option>
                                        <option class="text-dark" value="Processing" <?php echo e($item->status == "Processing" ? 'selected' : ''); ?>>Processing</option>
                                        <option class="text-dark" value="Completed" <?php echo e($item->status == "Completed" ? 'selected' : ''); ?>>Completed</option>
                                        <option class="text-dark" value="Declined" <?php echo e($item->status == "Declined" ? 'selected' : ''); ?>>Declined</option>
                                        
                                    </select>
                                    </td>
                                    <td>
                                        <a href="/admin/vendor/<?php echo e($item->id); ?>/withdrawview"
                                        class="btn btn-primary btn-round">Details <i class="fa fa-eye"></i></a>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <p>No Request Found</p>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-stylesheet'); ?>
<!--<link rel="stylesheet" href="<?php echo e(asset('/backend/assets/css/nice-select.css')); ?>">-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-scripts'); ?>
<!--<script src="<?php echo e(asset('/backend/assets/js/jquery.nice-select.js')); ?>"></script>-->
<script !src="">
    // $(document).ready(function() {
    //     $('select').niceSelect();
    // });

       //Status update ajax
       $(document).ready(function () {
        $(document).on('change','#selectStatus',function () {
        let status = $(this).val();
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: `/admin/vendor/${id}/withdrawrequest`,
            data: {status: status},
            success: (data) => {
                toastr.options = {
                    "timeOut": "2000",
                    "closeButton": true,
                };
                toastr['success'](data);
            },
            error: (error) => {
                console.log(error);
                }
            })
        });
        });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/vendor/vendor_withdraw.blade.php ENDPATH**/ ?>