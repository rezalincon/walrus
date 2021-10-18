
<?php $__env->startSection('content'); ?>
<head>
    <head>
        <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/assets/css/style.min.css')); ?>">

    </head>
</head>

<style>
    #oldPhoto{
        width: 100px;
        height: 100px;
    }
</style>
<div  class="container">
    <div class="title-link-wrapper appear-animate mt-2 container mb-4">
        <h2 class="title title-link pt-1">My Account</h2>
        <a href="/" class="ls-normal">Back Home<i class="w-icon-long-arrow-left"></i></a>

    </div>
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        <ul class="nav nav-tabs mb-6" role="tablist">
                            <li class="nav-item">
                                <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-orders" class="nav-link">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-details" class="nav-link">Account details</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('customer.logout')); ?>" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <p class="greeting">
                                    Hello
                                    <span class="text-dark font-weight-bold"><?php echo e(Auth::user()->name); ?></span>
                                    (not
                                    <span class="text-dark font-weight-bold"><?php echo e(Auth::user()->name); ?></span>?
                                    <a href="<?php echo e(route('customer.logout')); ?>" class="text-primary"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log out
                                    </a>)
                                </p>

                                <p class="mb-4">
                                    From your account dashboard you can view your <a href="#account-orders"
                                        class="text-primary link-to-tab">recent orders</a> and
                                    <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                        account details.</a>
                                </p>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-orders" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-details" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Account Details</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="<?php echo e(route('wishlist.view', Auth::id())); ?>" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Wishlist</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="<?php echo e(route('customer.logout')); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane mb-4" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>
 
                                <div class="table-responsive">
                                <table class="shop-table account-orders-table mb-6 table-striped   dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="order-id">#<?php echo e($order->order_id); ?></td>
                                            <td class="order-date"><?php echo e($order->created_at->format('d-m-Y')); ?></td>
                                            
                                            <td> 
                                                <?php if($order->status == 'pending'): ?>
                                                    <span class=" bg-warning text-white">Pending</span>
                                                <?php elseif($order->status == 'Processing'): ?>
                                                    <span class="border bg-info text-white">Processing</span>
                                                <?php elseif($order->status == 'Completed'): ?>
                                                    <span class="border bg-success text-white">Completed</span>
                                                    <?php elseif($order->status == 'Declined'): ?>
                                                    <span class="border bg-danger text-white">Declined</span>
                                                    <?php elseif($order->status == 'On Delivery'): ?>
                                                    <span class="border bg-dark text-white">On Delivery</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="order-total">
                                                <span class="order-price"><?php echo e($order->total); ?></span> for
                                                <span class="order-quantity"><?php echo e($order->orderProduct->sum('qty')); ?></span> item
                                            </td>
                                            
                                            <td class="order-action">
                                                <a href="<?php echo e(route('customer.order.details', $order->id)); ?>"
                                                    class="btn  btn-primary btn-block px-0 btn-sm btn-rounded text-white">View</a>
                                            </td>

                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                                </div>

                                <a href="/" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light d-flex ">
                                    <div class="d-flex mr-auto">
                                        <span class="icon-box-icon icon-account mr-2">
                                            <i class="w-icon-user"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title mb-0 ls-normal ">Account Details</h4>
                                        </div>
                                    </div>
                                        <button class="btn btn-primary" id="account-details-edit">Edit</button>
                                </div>
                                <hr>

                                <!-- account details table start -->
                                <div class="row" id="account-details-table">
                                    <div class="col-sm-6 mb-6">
                                        <div class="ecommerce-address billing-address pr-lg-8">
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td id="name2"><?php echo e(Auth::user()->name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone:</th>
                                                            <td id="phone2"><?php echo e(Auth::user()->phone); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email:</th>
                                                            <td id="email2"><?php echo e(Auth::user()->email); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address:</th>
                                                            <td id="address2"><?php echo e(Auth::user()->address); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>City:</th>
                                                            <td id="city2"><?php echo e(Auth::user()->city); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gender:</th>
                                                            <td id="gender2">
                                                                <?php if(Auth::user()->gender == 1 ): ?>
                                                                    Male
                                                                <?php elseif(Auth::user()->gender == 2 ): ?>
                                                                    Female
                                                                <?php elseif(Auth::user()->gender == 3 ): ?>
                                                                    Others
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-6">
                                        <div class="ecommerce-address shipping-address pr-lg-8">
                                            <?php if(!empty(Auth::user()->image)): ?>
                                                <img id="oldPhoto" src="<?php echo e(asset('uploads/users/'.Auth::user()->image)); ?>" alt="user image">
                                            <?php else: ?>
                                                <img hidden id="oldPhoto" src="" alt="user image">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- account details table end -->

                                <!-- profile update form start -->
                                <form class="form account-details-form" method="post" id="account-details-form" hidden>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" id="name" name="name" value="<?php echo e(Auth::user()->name); ?>"
                                                    class="form-control form-control-md">
                                            </div>
                                            <strong><span id="edit_name_error" class="invalid-feedback d-block mb-3" role="alert">
                                            </span> </strong>
                                        </div>
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="phone">Phone *</label>
                                        <input type="text" id="phone" name="phone" value="<?php echo e(old('phone', Auth::user()->phone)); ?>"
                                            class="form-control form-control-md">
                                    </div>
                                    <strong><span id="edit_phone_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <div class="form-group mb-6">
                                        <label for="user-email">Email address </label>
                                        <input type="email" id="user-email" name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>"
                                            class="form-control form-control-md">
                                    </div>
                                    <strong><span id="edit_email_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <div class="form-group mb-6">
                                        <label for="address">Address </label>
                                        <input type="text" id="address" name="address" value="<?php echo e(old('address', Auth::user()->address)); ?>"
                                            class="form-control form-control-md">
                                    </div>
                                    <strong><span id="edit_address_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <div class="form-group mb-6">
                                        <label for="city">City </label>
                                        <input type="text" id="city" name="city" value="<?php echo e(old('city', Auth::user()->city)); ?>"
                                            class="form-control form-control-md">
                                    </div>
                                    <strong><span id="edit_city_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <div class="form-group mb-6">
                                        <label for="gender">Gender </label>
                                        <select name="gender" id="gender">
                                            <option >Select gender</option>
                                            <option value="1" <?php echo e(Auth::user()->gender == 1 ? 'selected' : ''); ?>>Male</option>
                                            <option value="2" <?php echo e(Auth::user()->gender == 2 ? 'selected' : ''); ?>>Female</option>
                                            <option value="3" <?php echo e(Auth::user()->gender == 3 ? 'selected' : ''); ?>>Others</option>
                                        </select>
                                    </div>
                                    <strong><span id="edit_gender_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="password" name="password" placeholder="Minimum 8 characters">
                                    </div>
                                    <strong><span id="edit_password_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>
                                    <div class="form-group mb-6">
                                        <label class="text-dark" for="confirm-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="confirm-password" name="password_confirmation">
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="image">Image </label>
                                        <input id="image" type="file" name="image" class="dropify edit-photo" >
                                    </div>
                                    <strong><span id="edit_image_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>

                                    <button type="submit" class="btn btn-primary btn-rounded btn-sm mb-4">Save Changes</button>
                                    <button id="cancel" class="btn btn-primary btn-rounded btn-sm mb-4">Cancel</button>
                                </form>
                                <!-- profile update form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
</div>
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable({
        processing: true,
            serverSide: true,
            responsive: true,
    });

} );
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('profile-styles'); ?>
    <style>
        .pagination > .page-item.next{
            padding: 0;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('profile-scripts'); ?>
<script src="<?php echo e(asset('backend/assets/bundles/datatablescripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend/js/pages/tables/jquery-datatable.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/js/profile.js')); ?>"></script>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/profile/customer-profile.blade.php ENDPATH**/ ?>