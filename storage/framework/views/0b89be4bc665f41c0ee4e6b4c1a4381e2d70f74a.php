<?php $__env->startSection('main-content'); ?>
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h1><strong>Top Vendor Minimum Amount</strong></h1>
                <span>Dashboard</span> <i class="fa fa-angle-right"></i>
                
                <span>Top Vendor</span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">

                <div class="body">
                    <button id="add_btn" class="btn btn-success btn-round mb-5"  data-toggle="modal" data-target="#addTopVendor"><i class="fa fa-plus"></i>Add/Edit Minimum Top Vendor Amount</button>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($other->top_vendor_amount != 0): ?>
                                    <tr id="data-id" data-id="<?php echo e($other->id); ?>">
                                        <td id="id"><?php echo e($other->id); ?></td>
                                        <td id="amount"><?php echo e($other->top_vendor_amount); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3">Not added yet</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal ml-5 fade bd-example-modal-lg" tabindex="-1" id="addTopVendor" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel"><strong>Add Minimum Withdraw Amount</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form action="" id="add-withdraw-form" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Amount*</strong></span>
                                    </div>
                                    <input type="number" class="form-control" id="formAmount" name="amount" placeholder="Enter Minimum Amount" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                </div>

                                <button type="submit" class="btn btn-primary theme-bg gradient">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closeBtn" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    


    
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="editWithdrawModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel"><strong>Edit Minimum Withdraw Amount</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form action="" id="edit-withdraw-form" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Amount*</strong></span>
                                    </div>
                                    <input type="number" class="form-control" id="edit-amount" name="amount" placeholder="Enter Minimum Amount" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                    <input type="text" id="withdraw-id" name="id" hidden>

                                </div>

                                <button type="submit" class="btn btn-primary theme-bg gradient">Update Withdraw</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closeBtn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('minimum-withdraw-scripts'); ?>

    <script src="<?php echo e(asset('/backend/js/topvendor.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/setting/top_vendor_min_amount.blade.php ENDPATH**/ ?>