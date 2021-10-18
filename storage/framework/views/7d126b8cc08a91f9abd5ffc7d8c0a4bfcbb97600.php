<link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<link rel="icon" href="<?php echo e(asset('/backend/favicon.ico')); ?>" type="image/x-icon">
<title>Invoice</title>
<style>
    @media  print {
  .noPrint{
    display:none;
  }
}
</style>
<div class="mt-5 container">
<a class=" mb-3 btn noPrint btn-success" href="/admin/orders/view">Back to Order</a>
<div class="row clearfix mb-3">
    <div class="col-md-12 text-right">
        <button onclick="window.print();"  class="noPrint btn btn-primary">Print Invoice</button>
    </div>
</div> 
<div class="row clearfix mb-2">
    
    <div class="col-md-6 col-sm-6">
        <img src="\storage\storeLogo\<?php echo e($invoiceLogo[0]->file); ?>" height="80" width="140">
        <p><h4>Order Details </h4></p>
        <span><strong>Order Date :</strong> <?php echo e($orders[0]->order->created_at->format('d-m-Y')); ?></span><br>
        <span><strong>Order Code :</strong> <?php echo e($orders[0]->order->order_id); ?></span><br>
        <span> <strong>Shipping Method :</strong>
        <?php echo e($orders[0]->order->shipping_method); ?>

        </span><br>
        <span> <strong>Payment Method :</strong> <?php echo e($orders[0]->order->payment_method); ?></span>                                
    </div>  

   <div class="col-md-6 col-sm-6 mt-5">
    <div>
        <strong><u>Billing Details</u> </strong><br>
        <span><strong>Customer Name</strong>: <?php echo e($orders[0]->order->name); ?></span><br>
        <span><strong>Contact No</strong>: <?php echo e($orders[0]->order->phone); ?></span><br>
        <span><strong>Email</strong>: <?php echo e($orders[0]->order->email); ?></span><br>
        <span><strong>Address</strong>: <?php echo e($orders[0]->order->address); ?></span><br>
        <span><strong>City</strong>: <?php echo e($orders[0]->order->city); ?></span><br>
        <span><strong>Zip</strong>: <?php echo e($orders[0]->order->zip); ?></span><br>
        <span><strong>Country</strong>: <?php echo e($orders[0]->order->country); ?></span>
    </div>
</div>
</div>
<hr class="btn-primary">
<div class="row clearfix">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-5">
                <thead class="table-primary">
                    <tr>
                        <th>Order Code</th>                                                        
                        <th>Item</th>
                        <th style="width: 120px;">Quantity</th>
                        <th class="hidden-sm-down" style="width: 80px;">Price</th>
                        <th style="width: 80px; text-align: right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($orders[0]->order->order_id); ?></td>
                        <td>
                            <span><?php echo e($item->product->name); ?></span><br>
                            <small>Color: <?php echo e($orders[0]->color); ?></small><small> Size: <?php echo e($orders[0]->size); ?></small>
                            <p class="hidden-sm-down mb-0 text-muted">Shop Name :<?php echo e($item->vendor->shop_name); ?> </p>
                        </td>                                                    
                        <td><?php echo e($item->qty); ?></td>
                        <td class="hidden-sm-down"><?php echo e($item->product->price); ?></td>
                        <td class="text-right"><?php echo e($item->qty* $item->product->price); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-right">
                            <span>Subtotal: <strong class="text-success"><?php echo e($orders[0]->order->subtotal); ?></strong></span>
                        </td>
                        </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-right">
                            <span>Shipping Cost: <strong class="text-success"><?php echo e($orders[0]->order->shipping_method); ?></strong></span>
                        </td>
                        </tr>                             
                </tbody>
               
                <tfoot>
                    <td colspan="4"></td>
                    <td class="text-right">
                        <span>Total: <strong class="text-success"><?php echo e($orders[0]->order->total); ?></strong></span>
                    </td>
                </tfoot>
            </table>
            <div class="col-md-6">
                <span><strong>Note:</strong> Thank you for doing Business with us.</span>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>


<?php /**PATH /home/aayancom/public_html/resources/views/admin/orders/invoice.blade.php ENDPATH**/ ?>