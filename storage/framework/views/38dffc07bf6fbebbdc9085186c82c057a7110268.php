

<?php $__env->startSection('main-content'); ?>
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h1>Admin Profile</h1>
                <span>Dashboard</span> <i class="fa fa-angle-right"></i>
                <span>Admin</span> <i class="fa fa-angle-right"></i>
                <span>Profile</span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">

                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                        <!--<li class="dropdown">-->
                        <!--    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>-->
                        <!--    <ul class="dropdown-menu theme-bg gradient">-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="body">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto mb-3">
                        <?php if(Auth::user()->role_id == '1'): ?>
                            <h6 class="text-center">Role : Admin</h6>
                        <?php elseif(Auth::user()->role_id == '2'): ?>
                            <h6 class="text-center">Role : Moderator</h6>
                        <?php else: ?> 
                            <h6 class="text-center">Role : Editor</h6>
                        <?php endif; ?>
                        <form action="" id="edit-admin-form" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="edit-shop-name" class="col-sm-3 col-form-label"><strong>Admin Name</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-name" type="text" class="form-control" name="name"  placeholder="Enter shop name" value="<?php echo e(old('name',$admin->name)); ?>">
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->

                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default">Admin Name*</span>-->
                            <!--    </div>-->
                            <!--    <input type="text" class="form-control" id="edit-name" name="name" value="<?php echo e(old('name',$admin->name)); ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>-->
                            <!--</div>-->
                            <strong><span id="edit_name_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            <div class="form-group row">
                                <label for="edit-email" class="col-sm-3 col-form-label"><strong>Email</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-email" type="email" class="form-control" name="email"  value="<?php echo e(old('email',$admin->email)); ?>" readonly>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default">Email*</span>-->
                            <!--    </div>-->
                            <!--    <input type="email" class="form-control" id="edit-email" name="email" value="<?php echo e(old('email',$admin->email)); ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>-->
                            <!--</div>-->
                            <strong><span id="edit_email_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            <div class="form-group row">
                                <label for="edit-phone" class="col-sm-3 col-form-label"><strong>Phone</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-phone" type="text" class="form-control" name="phone"  value="<?php echo e(old('phone',$admin->phone)); ?>" >
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>-->
                            <!--    </div>-->
                            <!--    <input type="text" class="form-control" id="edit-phone" name="phone" value="<?php echo e(old('phone',$admin->phone)); ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->
                            <strong><span id="edit_phone_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            <div class="form-group row">
                                <label for="edit-password" class="col-sm-3 col-form-label"><strong>Password</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-password" type="password" class="form-control" name="password"  >
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>-->
                            <!--    </div>-->
                            <!--    <input type="password" class="form-control" id="edit-password" name="password" aria-label="Default" placeholder="Minimum 8 characters" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->
                            <strong><span id="edit_password_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            <div class="form-group row">
                                <label for="eid="edit-password_confirmation"" class="col-sm-3 col-form-label"><strong>Confirm Password</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-password_confirmation" type="password" class="form-control" name="password_confirmation" >
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password</span>-->
                            <!--    </div>-->
                            <!--    <input type="password" class="form-control" id="edit-password_confirmation" name="password_confirmation" aria-label="Default" placeholder="Confirm password" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"> Image</span>
                                        </div>
                                        <input id="edit-image" type="file" name="image" class="dropify edit-photo" >
                                    </div> 
                                    <strong><span id="edit_image_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="col-6">
                                    <?php if(!empty($admin->image)): ?>
                                        <img width="100%" height="200px" id="oldPhoto" style="margin-top: 37px" src="<?php echo e(asset('uploads/admins/'.$admin->image)); ?>" alt="">
                                    <?php else: ?>
                                        <img hidden width="100%" height="200px" id="oldPhoto" style="margin-top: 37px" src="" alt="">
                                    <?php endif; ?>

                                </div>
                            </div>                 

                            <button type="submit" class="btn btn-primary theme-bg gradient">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/backend/assets/css/nice-select.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-scripts'); ?>
    <script src="<?php echo e(asset('/backend/assets/js/jquery.nice-select.js')); ?>"></script>
    <script !src="">
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>
    <script src="<?php echo e(asset('/backend/js/admin-profile.js')); ?>"></script>

<?php $__env->stopSection(); ?>

            
<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/admin/admin-profile.blade.php ENDPATH**/ ?>