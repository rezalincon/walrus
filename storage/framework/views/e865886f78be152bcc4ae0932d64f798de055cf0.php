
<?php $__env->startSection('main-content'); ?>


<div class="mt-5 block-header d-flex justify-content-between">
    <div class=" row clearfix w-75">
        <div class=" col-lg-8 col-md-12 col-sm-12">
            <h1>Order Details</h1>
            <a href="/vendor/dashboard"><span>Dashboard</span></a> <i class="fa fa-angle-right"></i>
           <a href="/vendor/orders/view"><span>All Orders</span></a> <i class="fa fa-angle-right"></i>
            <span>Order Details</span>
        </div>
    </div>

    <!-- to update status -->
    <select name="" class="theme-bg" data-id="<?php echo e($orders[0]->id); ?>" id="selectStatus" >
        <option class="text-light" value="pending" <?php echo e($orders[0]->vendor_status == "Pending" ? 'selected' : ''); ?>>Pending</option>
        <option class="text-light" value="On Delivery" <?php echo e($orders[0]->vendor_status == "On Delivery" ? 'selected' : ''); ?>>On Delivery</option>
        <option class="text-light" value="Declined" <?php echo e($orders[0]->vendor_status == "Declined" ? 'selected' : ''); ?>>Declined</option>
    </select>
    <!-- --------------- -->
</div>

<div class="content-area">
    <div class="order-table-wrap">
        <div class="row">
            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                        Order Details
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="45%" width="45%">Order ID</th>
                                    <td width="10%">:</td>
                                    <td class="45%" width="45%"><?php echo e($orders[0]->order->order_id); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Total Product</th>
                                    <td width="10%">:</td>
                                    <td width="45%"><?php echo e($orders[0]->qty); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Total Cost</th>
                                    <td width="10%">:</td>
                                    <td width="45%"><?php echo e($orders[0]->qty*$orders[0]->product->price); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Ordered Date</th>
                                    <td width="10%">:</td>
                                    <td width="45%"><?php echo e($orders[0]->created_at->format('d-m-Y')); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Payment Method</th>
                                    <td width="10%">:</td>
                                    <td width="45%"><?php echo e($orders[0]->order->payment_method); ?></td>
                                </tr>

                                <tr>
                                    <th width="45%">Order Status</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><span class='badge badge-danger'><?php echo e($orders[0]->order->status); ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="footer-area">
                        <a href="<?php echo e(route('vendor.invoice',$orders[0]->id)); ?>" class="mybtn1"><i class="fa fa-eye"></i> View Invoice</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                        Billing Details
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="45%">Name</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->name); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Email</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->email); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Phone</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->phone); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Address</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->address); ?></td>
                                </tr>
                                <!-- <tr>
                                    <th width="45%">City</th>
                                    <th width="10%">:</th>
                                    <td width="45%">Bangladesh</td>
                                </tr> -->
                                <tr>
                                    <th width="45%">City</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->city); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Zip Code</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->zip); ?></td>
                                </tr>
                                <tr>
                                    <th width="45%">Country</th>
                                    <th width="10%">:</th>
                                    <td width="45%"><?php echo e($orders[0]->order->country); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mr-table">
                    <h4 class="title">Products Ordered</h4>
                    <div class="">
                            <table  class="table table-hover table-striped">
                                <thead>
                                    <tr>
        <tr>
            <th width="10%">Product ID#</th>
            <th>Shop Name</th>
            <th>Vendor Status</th>
            <th>Product Title</th>
            <th width="20%">Details</th>
            <th width="10%">Total Price</th>
            <th width="10%">Commision</th>
            <th width="10%">After Commision</th>




    </tr>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td><?php echo e($item->product_id); ?></td>
    <td>
    <a target="_blank" href="#"><?php echo e($item->vendor->shop_name); ?></a>
    </td>
    <td >
        <span class="badge badge-danger"><?php echo e($item->vendor_status); ?></span>
    </td>
    <td>
    <a target="_blank" href="#"><?php echo e($item->product->name); ?></a>
    </td>
    <td>
    <p>
    <strong>Size :</strong> <?php echo e($item->size); ?>

    </p>
    <p>
    <strong>color :</strong> <span>
    <?php echo e($item->color); ?></span>
    </p>
    <p>
    <strong>Price :</strong> <?php echo e($item->product->price); ?>

    </p>
    <p>
    <strong>Qty :</strong> <?php echo e($item->qty); ?>

    </p>

    </td>
    <td><?php echo e($item->qty*$item->product->price); ?></td>
    <td> <?php echo e($item->product->categories->commision); ?> % = <?php echo e($item->qty*$item->product->price*($item->product->categories->commision/100)); ?></td>
<td>
     <?php echo e($item->qty*$item->product->price-($item->qty*$item->product->price*($item->product->categories->commision/100))); ?>

</td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>


    </div>
    </div>
    </div>
    </div>
    </div>

        </div>

    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/css/custom.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-scripts'); ?>
    <script src="<?php echo e(asset('/backend/assets/js/jquery.nice-select.js')); ?>"></script>
    <script !src="">
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>

    <script>
        //Status update ajax
        $(document).on('change','#selectStatus',function () {
            let status = $(this).val();
            let id = $(this).attr('data-id');
            let email = $(this).prev().val();
            console.log(status);
            $.ajax({
                type: 'GET',
                url: `/vendor/orders/${id}/vendorupdateOrderStatus`,
                data: {'vendor_status': status,
                    'email':email},
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
    </script>
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/vendor/orders/order-details.blade.php ENDPATH**/ ?>