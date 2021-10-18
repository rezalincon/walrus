


<?php $__env->startSection('main-content'); ?>
    <div class="div1">
        <div class="row my-4">
            <div class="col-md-12">
            </div>

        </div>

        <?php if(Session::get('success')): ?>
        <div class="alert text-white container" style="background: #3daa1b;">
            <?php echo e(Session::get('success')); ?>

        </div>
        <?php endif; ?>
         <form method="post" action="<?php echo e(route('productUpdate', $product->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">

                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Name</b></span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Product Name"
                                            aria-label="Username" aria-describedby="basic-addon1" name="name" value="<?php echo e($product->name); ?>">
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
                                        <input type="text" class="form-control" placeholder="dRE6871FNk"
                                            aria-label="Product" aria-describedby="basic-addon1" name="sku"  value="<?php echo e($product->sku); ?>">
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
                                            <option <?php echo e($product->category_id == $row->id ? 'selected': ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
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
                                        <?php $__empty_1 = true; $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option <?php echo e($product->subcategory_id == $row->id ? 'selected': ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="">No Subcategories Added</option>
                                        <?php endif; ?>
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
                                    <select class="form-control" name="childcategory_id" id="categoryId">
                                        <option value="" data-display="Select">Select Category</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option <?php echo e($product->category_id == $row->id ? 'selected': ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="">No Categories Added</option>
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
                                     <label for="basic-url"><span style="font-size: 18px;"><b>Brand</b></span></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="brand_id" id="subcategoryId">
                                        <option value="" data-display="Select">Select Subcategory</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option <?php echo e($product->brand_id == $row->id ? 'selected': ''); ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
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
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"> <span style="font-size: 18px;"><b>Feature
                                                Image</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                          <img  class="img-fluid" src="<?php echo e(asset($product->photo)); ?>" id="fetureImage" height="60px" width="100%">
                                          <br>
                                          <br>
                                          <br>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fetureInput" name="photo">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
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
                            </div>

                             <label for="basic-url"> <span style="font-size: 18px;"><b>Product Gallery
                                        Images</b></span></label>
                    <div class="row">
                          <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="colum">

                              <img  class="img-fluid" src="<?php echo e(asset('uploads')); ?>/product-gallery/<?php echo e($data->image_file); ?>" id="fetureInputGallery" style="height: 100px;width: 180px;">

                      </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                  <br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    
                                </div>
                                          <br>
                                <div class="custom-file">
                                  <form id='post-form' class='post-form' method='post'>

                                    <input id='files' class="custom-file-input" name="image_file[]" type='file' id="galleryInput" multiple/>
                                    <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                                     <output id='result' />
                                    </form>
                                </div>
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

                            <div class="row my-5">
                                
                                
                                <div class="fancy-checkbox mx-5">
                                    
                                </div>

                                <div class="my-3 col-md-12" id="field" >

                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Estimated Shipping
                                                Time</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="text" class="form-control" placeholder="Estimated Shipping Time"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="ship" value="<?php echo e($product->ship); ?>">
                                    </div>
                                </div>
                                <div>
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Sizes</b></span></label>
                                </div>

                                <div class="fancy-checkbox mx-5">
                                    

                                </div>
                                <div class="my-3 col-md-12" id="field1" >
                                    <div class="row" id="size">
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Name :</b> (eg.
                                                    S,M,L,XL,XXL,3XL,4XL)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <?php $__currentLoopData = explode(',',rtrim($product->size, ',')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="size_name">
                                                <input type="text" class="form-control" placeholder="Size Name"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" name="size[]" value="<?php echo e($fields); ?>"><br>
                                                </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <?php $__currentLoopData = explode(',',rtrim($product->size_qty, ',')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="size_qty">
                                                <input type="text" class="form-control"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" placeholder="Size Qty"
                                                    name="size_qty[]" value="<?php echo e($fields); ?>"> <br>
                                                </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Price :</b> (It will be base price)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                                <div class="row" id="size_price">
                                                    <div class="col-md-9">
                                                        <?php $__currentLoopData = explode(',',rtrim($product->size_price, ',')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <input type="txt" min="0"  step="0.01" class="form-control"
                                                                       placeholder="0" aria-label="Product Name"
                                                                       aria-describedby="basic-addon1" name="size_price[]"  value="<?php echo e($fields); ?>"> <br>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <span></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-success" id="addSizeBtn">Add More Sizes <i class="fa fa-plus"></i></button>
                                        </div>

                                    </div>
                                   <!--  <div class="row my-4">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <a id="addSize" class="btn btn-outline-primary"><i class="fa fa-plus"> Add
                                                More Size</i></a>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div> -->
                                </div>


                                <div class="fancy-checkbox ml-5">
                                    
                                </div>

                                <?php if(!empty($product->color)): ?>


                                <div class="my-3 col-md-12" id="field2">
                                    <label for="basic-url"><span style="font-size: 18px;"><b> Product Colors </b></span>
                                        (Choose
                                        Your Favorite Colors,Separate with comma)</label>
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <div class="col-md-12" id="color">
                                            <div class="row" id="addMoreColor">
                                                <div class="col-md-7">
                                                    <?php $__currentLoopData = explode(',', rtrim($product->color, ',')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <input type="text" width="80%" value="<?php echo e($fields); ?>" class="form-control" placeholder="Enter Product Color"
                                                               aria-label="Product Name" aria-describedby="basic-addon1" name="color[]" >
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="col-md-5">
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <button type="button" style="margin-left: 20%" class="btn btn-sm btn-success" id="moreColorBtn">Add more color <i class="fa fa-plus"></i></button>
                                        </div>
                                </div>
                                    <!-- <div class="row my-5">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            
                                                    <a id="addColor" class="btn btn-outline-primary"><i class="fa fa-plus"> Add
                                                        More Color</i></a>
                                                </div>
                                        <div class="col-md-3"></div>
                                    </div> -->
                                </div>
                                <?php endif; ?>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Current
                                                Price</b></span> (In
                                        BDT)</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="number" min="0" step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product Name" aria-describedby="basic-addon1"
                                            name="price" value="<?php echo e($product->price); ?>" >
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
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Offer
                                                Price</b></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="number" min="0"  step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product" aria-describedby="basic-addon1"
                                            name="previous_price" value="<?php echo e($product->previous_price); ?>">
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
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Offer Product</strong></span>
                                        (amount)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="offerproduct" id="">
                                             <?php if($product->offer_product==1): ?>
                                            <option value="1">Yes</option>
                                            <?php endif; ?>
                                            <?php if($product->offer_product==0): ?>
                                            <option value="0">No</option>
                                            <?php endif; ?>
                                            <option disabled>Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Stock</b></span> (Leave
                                        Empty
                                        will Show Always Available)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="number" class="form-control" placeholder="e.g 20"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="stock" value="<?php echo e($product->stock); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Want to Feature</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="feature">
                                            <?php if($product->featured==1): ?>
                                            <option value="1">Yes</option>
                                            <?php endif; ?>
                                            <?php if($product->featured==0): ?>
                                            <option value="0">No</option>
                                            <?php endif; ?>
                                            <option disabled>Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product
                                                Description</b></span></label>
                                     <div class="form-floating">
                                        <textarea class="form-control" placeholder="Enter Description"
                                            id="summernote" name="details" s><?php echo $product->details; ?></textarea>
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
                                <div class="col-lg-6 col-md-12 ">

                                    <hr>
                                    <?php if($product->online_payment == 1): ?>
                                        <label for="basic-url"><span style="font-size: 18px;"><b>Online Payment Only</b></span></label>
                                        <div class="fancy-checkbox mt-3">
                                            <input type="hidden" name="online_payment" value="0">
                                            <label><input type="checkbox" name="online_payment" value="1" checked><span>Check if only online payment is applicable</span></label>
                                        </div>
                                        <?php endif; ?>
                                    <?php if($product->online_payment == 0): ?>
                                        <label for="basic-url"><span style="font-size: 18px;"><b>Online Payment Only</b></span></label>
                                        <div class="fancy-checkbox mt-3">
                                            <input type="hidden" name="online_payment" value="0">
                                            <label><input type="checkbox"  name="online_payment" value="1"><span>Check if only online payment is applicable</span></label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Youtube Video URL</b></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Youtube Video URL"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="youtube" value="<?php echo e($product->youtube); ?>">
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Tags</b></span> (Seperate with
                                        comma)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        </div>
                                        <input type="text" class="form-control" aria-label="Product Name"
                                            aria-describedby="basic-addon1" name="tags" value="<?php echo e($product->tags); ?>">
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
                                        style="font-size: 22px;"><b>Update Product</b></button>
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

        <script type="text/javascript">
         $(document).ready(function() {
              $('#summernote').summernote();});
        </script>
    </div>
    <script type="text/javascript">
  fetureInput.onchange = evt => {
  const [file] = fetureInput.files
  if (file) {
          fetureImage.src = URL.createObjectURL(file)
  }
}
</script>

<script type="text/javascript">
  fetureInputGallery.onchange = evt => {
  const [file] = fetureInputGallery.files
  if (file) {
          galleryInput.src = URL.createObjectURL(file)
  }
}
</script>

    <script>
        $(function (){
            $('#addSizeBtn').on('click',function (){
                $('#size_name').append(`
                    <input type="text" class="form-control" placeholder="Size Name"
                     aria-label="Product Name" aria-describedby="basic-addon1" name="size[]" value=""><br>
                `);

                $('#size_qty').append(`
                    <input type="text" class="form-control" placeholder="Size Qty"
                         aria-label="Product Name" aria-describedby="basic-addon1"
                         name="size_qty[]" value=""> <br>
                `);

                $('#size_price').append(`
                <div class="col-md-9">
                <div>
                    <input type="txt" min="0"  step="0.01" class="form-control"
                           placeholder="0" aria-label="Product Name"
                           aria-describedby="basic-addon1" name="size_price[]"> <br>
                </div>
                </div>
                <div class="col-md-3">
                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-minus"></i></button>
                </div>
                `);
            })
        });

        $(document).ready(function () {
            $(document).on('click','.remove-row',function (){
                let sizeName = $('#size_name input');
                let sizeBr = $('#size_name br');
                sizeName[$(sizeName).length -1].remove();
                sizeBr[$(sizeBr).length -1].remove();

                let sizeQty = $('#size_qty input');
                let sizeQtyBr = $('#size_qty br');
                sizeQty[$(sizeQty).length - 1].remove();
                sizeQtyBr[$(sizeQtyBr).length - 1].remove();

                $(this).parent().prev().remove();
                $(this).parent().remove();
            });
        });

        $(function (){
            $('#moreColorBtn').on('click', function () {
                $('#addMoreColor').append(`
                <div class="col-md-7 mt-2">
                <input type="text" width="80%" value="" class="form-control" placeholder="Enter Product Color"
                    aria-label="Product Name" aria-describedby="basic-addon1" name="color[]" >
                </div>
                <div class="col-md-5 mt-2">
                    <button type="button" class="btn btn-sm btn-danger removeColorBtn"><i class="fa fa-minus"></i></button>
                </div>
`);
            });

            $(document).on('click','.removeColorBtn',function(){
                $(this).parent().prev().remove();
                $(this).parent().remove();
            });
        })

    </script>
     <script>
           $(".alert:not(.not_hide)").delay(5000).slideUp(700, function () {
            $(this).alert('close');
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/product/editProduct.blade.php ENDPATH**/ ?>