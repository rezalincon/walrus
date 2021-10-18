
<?php $__env->startSection('main-content'); ?>
    <div class="div1">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h1><strong>Add Product</strong></h1>
                    <span>Dashboard</span> <i class="fa fa-angle-right"></i>
                    <span>Product</span> <i class="fa fa-angle-right"></i>
                    <span>Add Product</span>
                </div>
            </div>
        </div>
        <?php if(Session::get('success')): ?>
        <div class="alert text-white container" style="background: #3daa1b;">
            <?php echo e(Session::get('success')); ?>

        </div>
        <?php endif; ?>
        <form method="post" action="<?php echo e(route('vendorcreateProduct')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">

                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product Name</strong></span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    </div>
                                        <input type="text" class="form-control" placeholder="Enter Product Name"
                                            aria-label="Username" aria-describedby="basic-addon1" name="name" value="<?php echo e(old('name')); ?>">
                                    </div>
                                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"> <span style="font-size: 18px;"><b>Product Sku</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dRE6871FNk"
                                            aria-label="Product" aria-describedby="basic-addon1" name="sku" value="<?php echo e(old('sku')); ?>">
                                            
                                    </div>
                                     <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Category</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="category_id" id="categoryId">
                                            <option value="" data-display="Select">Select Category</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('category_id') == $row->id ? 'selected' : ''); ?>><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="">No Categories Added</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                     <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Sub Category</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="subcategory_id" id="subcategoryId">
                                            <option value="" data-display="Select">Select Subcategory</option>
                                            
                                        </select>
                                    </div>
                                      <?php $__errorArgs = ['subcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b> Child
                                                Category</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="childcategory_id" id="childcategoryId">
                                            <option value="" data-display="Select">Select category</option>
                                            <?php $__empty_1 = true; $__currentLoopData = $childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('childcategory_id') == $row->id ? 'selected' : ''); ?>><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="">No Childcategories Added</option>
                                            <?php endif; ?>
                                        </select>

                                    </div>
                                     <?php $__errorArgs = ['childcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                <label for="basic-url"><span style="font-size: 18px;"><b>Brand</b></span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="brand_id" id="brandcategoryId">
                                        <option value="" data-display="Select">Select Brand</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value="">No Brand Added</option>
                                        <?php endif; ?>
                                    </select>

                                </div>
                                <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="form-text text-danger"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                                <!--<div class="col-lg-6 col-md-12">-->
                                <!--    <div class="input-group mb-3">-->
                                <!--        <div class="input-group-prepend">-->
                                <!--            <span class="input-group-text" id="inputGroup-sizing-default">Feature Image </span>-->
                                <!--        </div>-->
                                <!--        <input type="file" name="photo" class="dropify photo" value="<?php echo e(old('photo')); ?>" required>-->
                                <!--    </div>-->
                                <!--     <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                                <!--        <p class="form-text text-danger"><?php echo e($message); ?></p>-->
                                <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
                                <!--</div>-->
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Feature Image </span>
                                        </div>
                                        <input type="file" name="photo" class="dropify photo" value="<?php echo e(old('photo')); ?>" required>
                                    </div>
                                     <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label for="basic-url"> <span style="font-size: 18px;"><b>Product Gallery
                                        Images</b></span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                 <input id='files' class="custom-file-input" name="image_file[]" type='file' id="galleryInput" multiple/>
                                    <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                                     <output id='result' />
                                    </form>
                            </div>
                                 <?php $__errorArgs = ['image_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <!--    <label for="basic-url"><span style="font-size: 18px;"><b>Brand</b></span></label>-->
                            <!--    <div class="input-group mb-3">-->
                            <!--        <div class="input-group-prepend">-->
                            <!--        </div>-->
                            <!--        <select class="form-control" name="brand_id" id="brandcategoryId">-->
                            <!--            <option value="" data-display="Select">Select Brand</option>-->
                            <!--            <?php $__empty_1 = true; $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>-->
                            <!--            <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>-->
                            <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>-->
                            <!--            <option value="">No Brand Added</option>-->
                            <!--            <?php endif; ?>-->
                            <!--        </select>-->

                            <!--    </div>-->
                            <!--    <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
                            <!--        <p class="form-text text-danger"><?php echo e($message); ?></p>-->
                            <!--    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->

                            </div>


                            </div>
                            

                            <div class="row my-5">

                                <div class="fancy-checkbox mx-5">
                                    <label><input type="checkbox" id="checked" onclick="valueChanged()"><span
                                            style="font-size: 18px;"><strong>Allow Estimated Shipping Time</strong></span></label>
                                </div>

                                <div class="my-3 col-md-12" id="field" style="display:none">

                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product Estimated Shipping
                                                Time</strong></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="Estimated Shipping Time"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="ship" value="<?php echo e(old('ship')); ?>">
                                    </div>
                                </div>
                                <div class="fancy-checkbox mx-5">
                                    <label><input type="checkbox" id="checked1" onclick="valueChanged1()"><span
                                            style="font-size: 18px;"><strong>Allow Product Sizes</strong></span></label>
                                </div>
                                <div class="my-3 col-md-12" id="field1" style="display:none">
                                    <div class="row" id="size">
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><strong>Size Name :</strong> (eg.
                                                    S,M,L,XL,XXL,3XL,4XL)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Size Name"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" name="size[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><strong>Size Qty :</strong> (Number
                                                    of
                                                    quantity of this size)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" placeholder="1"
                                                    aria-label="Product Name" aria-describedby="basic-addon1"
                                                    name="size_qty[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><strong>Size Price :</strong> (This
                                                    price
                                                    will be added with base price)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="number" min="0" value="0" step="0.01" class="form-control"
                                                    placeholder="0" aria-label="Product Name"
                                                    aria-describedby="basic-addon1" name="size_price[]">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">

                                            <a id="addSize" class="btn btn-outline-primary"><i class="fa fa-plus"><strong> Add
                                                More Size </strong></i></a>

                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>


                                <div class="fancy-checkbox ml-5">
                                    <label><input type="checkbox" id="checked2" onclick="valueChanged2()"><span
                                            style="font-size: 18px;"><strong>Allow Product Colors</strong></span></label>
                                </div>
                                <div class="my-3 col-md-12" id="field2" style="display:none">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Add Product Color</strong></span>
                                        (Choose
                                        Your Favorite Colors)</label>
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                        </div>
                                        <div class="col-md-12" id="color">



                                        <input type="text" class="form-control" placeholder="Enter Product Color"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="color[]">
                                    </div>
                                </div>

                                    <div class="row my-5">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">

                                                    <a id="addColor" class="btn btn-outline-primary"><i class="fa fa-plus"> <strong>Add
                                                        More Color</strong></i></a>

                                                </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product Current
                                                Price</strong></span> (In
                                        BDT)</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="number" min="0" step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product Name" aria-describedby="basic-addon1"
                                            name="price" value="<?php echo e(old('price')); ?>">
                                    </div>
                                     <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product Previous
                                                Price</strong></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="number" min="0" step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product" aria-describedby="basic-addon1"
                                            name="previous_price" value="<?php echo e(old('previous_price')); ?>">
                                    </div>
                                     <?php $__errorArgs = ['previous_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                
                                


                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product Stock</strong></span> (Leave
                                        Empty
                                        will Show Always Available)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="number" class="form-control" placeholder="e.g 20"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="stock" value="<?php echo e(old('stock')); ?>">
                                    </div>
                                </div>
                                <!--<div class="col-lg-6 col-md-12 ">-->
                                <!--    <label for="basic-url"><span style="font-size: 18px;"><strong>Online Payment Only</strong></span></label>-->
                                <!--    <div class="fancy-checkbox mt-3">-->
                                <!--        <label><input type="checkbox" name="online_payment" value="1"><span><strong>Check if only online payment is applicable</strong></span></label>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="row">
                                



                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Product
                                                Description</strong></span></label>
                                     <div class="form-floating">
                                        <textarea class="form-control" placeholder="Enter Description"
                                            id="summernote" name="details" s><?php echo e(old('details')); ?></textarea>
                                    </div>
                                     <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Youtube Video URL</strong></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Youtube Video URL"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="youtube" value="<?php echo e(old('youtube')); ?>">
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Tags</strong></span> (Seperate with
                                        comma)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" aria-label="Product Name" placeholder="e.g aaa,bbb"
                                            aria-describedby="basic-addon1" name="tags" value="<?php echo e(old('tags')); ?>">
                                    </div>
                                     <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="form-text text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class=" col-md-4 mt-4">

                                    <button type="submit" class="btn btn-primary theme-bg gradient btn-round p-3 px-5"
                                        style="font-size: 16px;"><strong>Create Product</strong></button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>





                        </div>
                    </div>
                </div>

            </div>
        </form>

        <script>
            function valueChanged() {
                var checkBox = document.getElementById("checked");
                var text = document.getElementById("field");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
        <script>
            function valueChanged1() {
                var checkBox = document.getElementById("checked1");
                var text = document.getElementById("field1");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
        <script>
            function valueChanged2() {
                var checkBox = document.getElementById("checked2");
                var text = document.getElementById("field2");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                $("#addColor").on('click',function(e) {

                    $("#color").append(`

                    <input type="text" class="form-control mt-3" placeholder="Enter Product Color"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="color[]">

                    `);

                });



                $("#addSize").on('click',function(e) {

                    $("#size").append(`

                    <div class="row" id="size">
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Name :</b> (eg.
                                                    S,M,L,XL,XXL,3XL,4XL)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <input type="text" class="form-control" placeholder="Size Name"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" name="size[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Qty :</b> (Number
                                                    of
                                                    quantity of this size)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <input type="text" class="form-control" placeholder="1"
                                                    aria-label="Product Name" aria-describedby="basic-addon1"
                                                    name="size_qty[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Price :</b> (This
                                                    price
                                                    will be added with base price)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <input type="number" min="0" value="0" step="0.01" class="form-control"
                                                    placeholder="0" aria-label="Product Name"
                                                    aria-describedby="basic-addon1" name="size_price[]">
                                            </div>
                                        </div>

                                    </div>

                    `);

                 });


            });
        </script>
        <script type="text/javascript">

         $(document).ready(function() {
              $('#summernote').summernote();});
        </script>

 <script>
           $(".alert:not(.not_hide)").delay(5000).slideUp(700, function () {
            $(this).alert('close');
        });
    </script>



<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="subcategory_id"]').attr('disabled', 'disabled');
        $('select[name="childcategory_id"]').attr('disabled', 'disabled');
       // $('select[name="subcategory_id"]').disabled();
        $('select[name="category_id"]').on('change', function() {
            var catID = $(this).val();

            $('select[name="childcategory_id"]').attr('disabled', 'disabled');
                        $('select[name="childcategory_id"]').empty();

            if(catID) {
                $.ajax({
                    url: '/findsub/'+catID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data)
                        $('select[name="subcategory_id"]').removeAttr('disabled');
                        $('select[name="subcategory_id"]').empty();

                        if(data.length>0){
                        $.each(data, function(key, value) {

                            console.log(value)
                            $('select[name="subcategory_id"]').append('<option >Select Subcategory</option><option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }else{

                        $('select[name="subcategory_id"]').append('<option value="0">'+ 'Not Found' +'</option>');

                    }


                    }
                });
            }else{
                $('select[name="subcategory_id"]').attr('disabled', 'disabled');
            }
        });




        $('select[name="subcategory_id"]').on('change', function() {
            var ccatID = $(this).val();

            if(ccatID) {
                $.ajax({
                    url: '/findchild/'+ccatID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data)
                        $('select[name="childcategory_id"]').removeAttr('disabled');
                        $('select[name="childcategory_id"]').empty();

                        if(data.length>0){
                        $.each(data, function(key, value) {

                            console.log(value)
                            $('select[name="childcategory_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }else{

                        $('select[name="childcategory_id"]').append('<option value="0">'+ 'Not Found' +'</option>');

                    }


                    }
                });
            }else{
                $('select[name="childcategory_id"]').attr('disabled', 'disabled');
            }
        });


    });
</script>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/vendor/product/addProduct.blade.php ENDPATH**/ ?>