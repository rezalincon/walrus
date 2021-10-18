<?php $__env->startSection('content'); ?>
 <main class="main">
        <div class="container">
            <div class="intro-wrapper">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="owl-carousel owl-theme row gutter-no cols-1 animation-slider owl-dot-inner"
                             data-owl-options="{
                        'nav': false,
                        'loop': true,
                        'dots': true,
                        'items': 1,
                        'autoplay': true
                    }">

                    <?php $__empty_1 = true; $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="intro-slide intro-slide1 banner bg-transparent banner-fixed br-sm"
                    style="background-image: url(<?php echo e("storage/storeSliders/$item->image_file"); ?>);  background-color: #5D5E62;">
                     <div style="margin-top:120px;" class="banner-content x-50 w-100">
                                        <a href="<?php echo e($item->link); ?>"
                                           class="btn btn-white btn-link btn-icon-right mt-5 slide-animate"
                                           data-animation-options="{
                                'name': 'fadeInUpShorter', 'duration': '0.1s', 'delay': '0.1s'
                            }">
                                           <button class="btn btn-primary rounded"><i class="w-icon-long-arrow-right"></i>Discover Now</button>
                                        </a>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-danger">Not Found</p>
                            <?php endif; ?>


                        </div>
                    </div>

                </div>
            </div>
            <div >

                <div  class="row">


                    <div class=" col-md-6 h-camp">
                       <a href="<?php echo e($link1); ?>"> <img style="height:100%; width:100%" src="\storage\storeLogo\<?php echo e($campaign1); ?>" alt="campaign">
                       </a>
                    </div>

                    <div  class="h-camp col-md-6">
                      <a href="<?php echo e($link2); ?>"> <img style="height:100%; width:100%" src="\storage\storeLogo\<?php echo e($campaign2); ?>" alt="campaign">
                      </a>
                    </div>
               </div>


            </div>

        </div>
        <!-- End of Intro-wrapper -->

            <div id="icon-mb" class="owl-carousel owl-theme row cols-md-4 cols-sm-3 cols-1 container icon-box-wrapper appear-animate br-sm bg-white"
            data-owl-options="{
            'nav': false,
            'dots': false,
            'loop': true,
            'margin': 30,
            'autoplay': true,
            'autoplayTimeout': 4000,
            'responsive': {
                '0': {
                    'items': 1
                },
                '576': {
                    'items': 2
                },
                '768': {
                    'items': 2
                },
                '992': {
                    'items': 3
                },
                '1200': {
                    'items': 4
                }
            }
            }">
            <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-money "></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($service[0]) ? $service[0]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($service[0]) ? $service[0]->details :"Not Found"); ?></p>
                </div>
            </div>
            <div class="icon-box icon-box-side text-dark">
                <span style="margin-right:10px" class="icon-box-icon icon-payment">
                    <i class="w-icon-headphone"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($service[1]) ? $service[1]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($service[1]) ? $service[1]->details :"Not Found"); ?></p>
                </div>
            </div>
            <div class="icon-box icon-box-side text-dark icon-box-money">
                <span class="icon-box-icon icon-money">
                    <i class="w-icon-truck"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($service[2]) ? $service[2]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($service[2]) ? $service[2]->title :"Not Found"); ?></p>
                </div>
            </div>
            <div class="icon-box icon-box-side text-dark icon-box-chat">
                <span class="icon-box-icon icon-chat">
                    <i class="w-icon-bag"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($service[3]) ? $service[3]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($service[3]) ? $service[3]->title :"Not Found"); ?></p>
                </div>
            </div>
        </div>
        
        
        
 <div class="title-link-wrapper container appear-animate mt-10 mb-4 ">
            <h2 class="title title-link pt-1">Offer Product</h2>
            <a href="<?php echo e(route('product.offer')); ?>" class="ls-normal">More Offer Product<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="container">
            <div style="margin-right:0;margin-left:0;padding-right:0;padding-left:0" class="row col-md-12 col-lg-12 col-12  mb-9">

            <?php $__empty_1 = true; $__currentLoopData = $offer_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="col-md-2 col-6 col-lg-2 mb-5">
                    <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>">
                                <img style="height:200px; width:100%;"  src="<?php echo e("/$item->photo"); ?>" alt="Product" >
                                <img style="height:200px; width:100%;" src="<?php echo e("/$item->photo"); ?>" alt="Product">
                            </a>
                            <div class="product-action-vertical">
                                <?php if($item->stock > 0): ?>
                                <a href="#" data-id="<?php echo e($item->id); ?>" class="btn-product-icon btn-wishlist w-icon-heart"
                                   title="Add to wishlist"></a>
                                <?php endif; ?>

                            </div>
                            
                        <div class="product-action-horizontal">    
                            <?php if($item->online_payment==1): ?>                   
                           <small class="text-primary font-weight-bold text-uppercase">Payment Only</small>                                                                          
                        <?php else: ?>
                        <small class="text-success font-weight-bold text-uppercase">Cash On Delivery</small>
                        <?php endif; ?>
                        </div>
                        </figure>
                        <div class="badge-overlay">
                        <span class="top-left badge pink">SALE</span>
                         </div>
                        <div class="product-details">

                            <h4 class="product-name"><strong><a style="font-size: 15px" href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>"><?php echo e($item->name); ?></a></strong></h4>

                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <?php if(ceil($item->avg_rating) > 0): ?>
                                    <span class="ratings" style="width: 0%;"></span>
                                    <?php endif; ?>

                                    <?php if(ceil($item->avg_rating) == 1): ?>
                                    <span class="ratings" style="width: 20%;"></span>
                                    <?php endif; ?>
                                    <?php if(ceil($item->avg_rating) == 2): ?>
                                    <span class="ratings" style="width: 40%;"></span>
                                    <?php endif; ?>
                                    <?php if(ceil($item->avg_rating) == 3): ?>
                                    <span class="ratings" style="width: 60%;"></span>
                                    <?php endif; ?>
                                    <?php if(ceil($item->avg_rating) == 4): ?>
                                    <span class="ratings" style="width: 80%;"></span>
                                    <?php endif; ?>
                                    <?php if(ceil($item->avg_rating) == 5): ?>
                                    <span class="ratings" style="width: 100%;"></span>
                                    <?php endif; ?>
                                    <!--<span class="tooltiptext tooltip-top"></span>-->
                                </div>
                                <a href="#" class="rating-reviews">(

                                    <?php if($item->ratings->count()>0): ?>

                                    <?php echo e($item->ratings->count()); ?>

                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                    Reviews
                                    )</a>
                            </div>
                            <div class="product-price">
                                TK <ins class="new-price"><?php echo e($item->price); ?></ins><del class="old-price"><?php echo e($item->previous_price); ?></del>
                            </div>
                            <?php if($item->stock > 0): ?>
                                <a style="width:100%" data-id="<?php echo e($item->id); ?>" class="btn btn-primary btn-cart" href="#"> <i class="fas fa-shopping-cart"></i>&nbsp  Buy Now</a>
                            <?php else: ?>
                                <button style="width: 100%; background-color: darkred; color: white" type="button" class="btn btn-danger" disabled><i class="fas fa-shopping-cart"></i>&nbsp  Out of Stock</button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-danger">No Offer Available</p>
            <?php endif; ?>

        </div>
        </div>
        
          
      <div  class="container mt-1 pt-2">
        <div class="col-md-12"  >
            <a href="#"><img style="height:auto; width:100%" src="<?php echo e("storage/advertise/".(isset($advertise[1])? $advertise[1]->image_file:'')); ?>"></a>
             <!--<div class="banner-content align-items-center">-->
             <!--    <div class="banner-price-info">-->
             <!--        <div class="discount text-secondary font-weight-bolder ls-25 lh-1">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->subtitle:''); ?>-->
             <!--        </div>-->
             <!--    </div>-->
             <!--    <hr class="divider bg-white">-->
             <!--    <div class="banner-info mb-0">-->
             <!--        <h3 class="banner-title text-white font-weight-normal ls-25">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->description:''); ?>-->
             <!--        </h3>-->
             <!--        <a href="<?php echo e(isset($item)?$item->link:''); ?>"-->
             <!--           class="btn btn-primary btn-link  btn-icon-right">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->title:''); ?>-->
             <!--            <i class="w-icon-long-arrow-right"></i></a>-->
             <!--    </div>-->
             <!--</div>-->

         </div>

         </div>
        
         <div class="title-link-wrapper appear-animate container mt-10 mb-4 ">
                <h2 class="title title-link pt-1">Feature Products</h2>
                <a href="<?php echo e(route('productall')); ?>" class="ls-normal">More Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
                <div class="container mb-5">
                    <div style="margin-right:0;margin-left:0;padding-right:0;padding-left:0" class=" product-wrapper row col-md-12 col-sm-12 col-12">

                <?php $__empty_1 = true; $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

       <div class="col-md-2 col-sm-4 col-6">
            <div class="product-wrap mt-3">
            <div class="product text-center">
                <figure class="product-media">
                    <a href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>">
                        <img style="height:200px;width:200;" src="<?php echo e("/$item->photo"); ?>" alt="Product" >
                        <img style="height:200px;width:200;" src="<?php echo e("/$item->photo"); ?>" alt="Product">
                    </a>
                    <div class="product-action-vertical">
                        <?php if($item->stock > 0): ?>
                        <a href="#" data-id="<?php echo e($item->id); ?>" class="btn-product-icon btn-wishlist w-icon-heart"
                           title="Add to wishlist"></a>
                        <?php endif; ?>
                    </div>
                    
                        <div class="product-action-horizontal">    
                            <?php if($item->online_payment==1): ?>                   
                           <small class="text-primary font-weight-bold text-uppercase">Payment Only</small>                                                                          
                        <?php else: ?>
                        <small class="text-success font-weight-bold text-uppercase">Cash On Delivery</small>
                        <?php endif; ?>
                        </div>
                </figure>
                <div class="product-details">
                    <h2 class="product-name"><strong><a style="font-size: 15px" href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>"><?php echo e($item->name); ?></a></strong></h2>
                    <div class="ratings-container">
                        <div class="ratings-full">
                            <?php if(ceil($item->avg_rating) > 0): ?>
                            <span class="ratings" style="width: 0%;"></span>
                            <?php endif; ?>

                            <?php if(ceil($item->avg_rating) == 1): ?>
                            <span class="ratings" style="width: 20%;"></span>
                            <?php endif; ?>
                            <?php if(ceil($item->avg_rating) == 2): ?>
                            <span class="ratings" style="width: 40%;"></span>
                            <?php endif; ?>
                            <?php if(ceil($item->avg_rating) == 3): ?>
                            <span class="ratings" style="width: 60%;"></span>
                            <?php endif; ?>
                            <?php if(ceil($item->avg_rating) == 4): ?>
                            <span class="ratings" style="width: 80%;"></span>
                            <?php endif; ?>
                            <?php if(ceil($item->avg_rating) == 5): ?>
                            <span class="ratings" style="width: 100%;"></span>
                            <?php endif; ?>
                            <!--<span class="tooltiptext tooltip-top"></span>-->
                        </div>
                        <a href="#" class="rating-reviews">(

                            <?php if($item->ratings->count()>0): ?>

                            <?php echo e($item->ratings->count()); ?>

                            <?php else: ?>

                                0
                            <?php endif; ?>

                            Reviews
                            )</a>
                    </div>
                    <div class="product-price">
                        TK <ins class="new-price"><?php echo e($item->price); ?></ins><del class="old-price"><?php echo e($item->previous_price); ?></del>
                    </div>
                    <?php if($item->stock > 0): ?>
                        <a style="width:100%" data-id="<?php echo e($item->id); ?>" class="btn btn-primary btn-cart" href="#"> <i class="fas fa-shopping-cart"></i>&nbsp  Buy Now</a>
                    <?php else: ?>
                        <button style="width: 100%; background-color: darkred; color: white" type="button" class="btn btn-danger" disabled><i class="fas fa-shopping-cart"></i>&nbsp  Out of Stock</button>
                    <?php endif; ?>
                </div>

            </div>
        </div>
       </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-danger">No Feature Product Available</p>
                <?php endif; ?>

            </div>

                </div>
                
                <div class="title-link-wrapper container appear-animate mb-4">
            <h2 class="title title-link pt-1">Shop By Brands</h2>
            <a href="<?php echo e(route('more.brand')); ?>">More Brands<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="owl-carousel container owl-theme row appear-animate cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-9"
                 data-owl-options="{
                'nav': false,
                'dots': true,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '576': {
                        'items': 3
                    },
                    '768': {
                        'items': 4
                    },
                    '992': {
                        'items': 6
                    }
                }
            }">
                <?php $__empty_1 = true; $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div style="text-align:center" class="product-wrap  brands-home square bg-white rounded p-3">
                        <a  href="<?php echo e(route('brand.product',[$item->id,Str::slug($item->name)])); ?>">
                            <img style="margin-top:10px;height:150px;width:150px;margin-left:auto;margin-right:auto"  src="<?php echo e("/uploads/brand-images/$item->photo"); ?>" alt="">
                        </a>
                        <a href="<?php echo e(route('brand.product',[$item->id,Str::slug($item->name)])); ?>"><h4 class="mt-1"><?php echo e($item->name); ?></h4></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-danger">No Brands Available</p>
                <?php endif; ?>
            </div>
            
<div class="container">
             <div class="title-link-wrapper appear-animate mb-4">
                <h2 class="title title-link pt-1">Categoires</h2>
                <a href="<?php echo e(url('/all-categories')); ?>">All Categories<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div style="padding-right:0" class="row col-md-12 col-sm-12 col-12">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <div style="text-align:center;padding:10px" class="border bg-white">
                        <div>
                            <a href="<?php echo e(route('categorize.product',[$item->id, Str::slug($item->name)])); ?>"><img style="height:120px;width:100%" src="<?php echo e("/uploads/category-images/$item->photo"); ?>" alt="Category image"></a>
                        </div>
                        <a href="<?php echo e(route('categorize.product',[$item->id, Str::slug($item->name)])); ?>"><h6 style="margin-bottom:0px;" class="mt-1"><?php echo e($item->name); ?></h6></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </div>
        
       
        

            
           <div  class="container mt-1 pt-2">
        <div class="col-md-12" >
            <a href="#"><img style="height:auto; width:100%" src="<?php echo e("storage/advertise/".(isset($advertise[0])? $advertise[0]->image_file:'')); ?>"></a>
             <!--<div class="banner-content align-items-center">-->
             <!--    <div class="banner-price-info">-->
             <!--        <div class="discount text-secondary font-weight-bolder ls-25 lh-1">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->subtitle:''); ?>-->
             <!--        </div>-->
             <!--    </div>-->
             <!--    <hr class="divider bg-white">-->
             <!--    <div class="banner-info mb-0">-->
             <!--        <h3 class="banner-title text-white font-weight-normal ls-25">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->description:''); ?>-->
             <!--        </h3>-->
             <!--        <a href="<?php echo e(isset($item)?$item->link:''); ?>"-->
             <!--           class="btn btn-primary btn-link  btn-icon-right">-->
             <!--            <?php echo e(isset($advertise[1])?$advertise[1]->title:''); ?>-->
             <!--            <i class="w-icon-long-arrow-right"></i></a>-->
             <!--    </div>-->
             <!--</div>-->

         </div>

         </div>

            <!-- Shop by store -->

            <div class="title-link-wrapper appear-animate mt-5 mb-4">
                <h2 class="title title-link pt-1">Shop By Store</h2>
                <a href="<?php echo e(route('more.shop')); ?>">More Store<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div style="padding-right:0" class="row col-md-12 col-sm-12 col-12">
            <?php $__empty_2 = true; $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <div  class="col-md-2 col-sm-4 col-6 mb-3">
                    <div style="text-align:center;padding:10px" class="border bg-white">
                        <div>
                            <a href="<?php echo e(route('shop.product',[$item->id, Str::slug($item->shop_name)])); ?>"><img style="height:120px;width:100%" src="<?php echo e("/uploads/vendors/$item->shop_image"); ?>" alt=""></a>
                        </div>
                        <a href="<?php echo e(route('shop.product',[$item->id, Str::slug($item->shop_name)])); ?>"><h6 style="margin-bottom:0px" class="mt-1"><?php echo e($item->shop_name); ?></h6></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
            </div>
            <!-- <div class="owl-carousel owl-theme row appear-animate cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-9"
                 data-owl-options="{
                'nav': false,
                'dots': true,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 2
                    },
                    '576': {
                        'items': 3
                    },
                    '768': {
                        'items': 4
                    },
                    '992': {
                        'items': 6
                    }
                }
            }">
            <?php $__empty_3 = true; $__currentLoopData = $shop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
            <div  class="product-wrap  brands-home square bg-white rounded p-3">
                <a href="<?php echo e(route('shop.product',[$item->id, Str::slug($item->shop_name)])); ?>">
                      <img style="margin-top:10px;height:150px" src="<?php echo e("/uploads/vendors/$item->shop_image"); ?>" >
                    </a>  <br>
                    <a href="<?php echo e(route('shop.product',[$item->id, Str::slug($item->shop_name)])); ?>"><h4><?php echo e($item->shop_name); ?></h4></a>
               </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                <p class="text-danger">No Shop Available</p>
            <?php endif; ?>
            </div> -->


          

            <!-- End of Iocn Box Wrapper -->
       

    




         <div class="title-link-wrapper mb-4">
            <h2 class="title title-link title-vendor appear-animate pt-2 pb-2">Top Seller</h2>
        </div>
        <div class="owl-carousel owl-theme row cols-xl-4 cols-md-3 cols-sm-2 cols-1 vendor-wrapper appear-animate mb-10 pb-2"
             data-owl-options="{
        'nav': false,
        'dots': true,
        'margin': 20,
        'responsive': {
            '0': {
                'items': 2
            },
            '576': {
                'items': 2
            },
            '768': {
                'items': 3
            },
            '992': {
                'items': 6
            }
        }
    }">


    <?php if(isset($tShops[0]->id)): ?>
    <?php $__empty_3 = true; $__currentLoopData = $tShops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
        <?php if($top != null): ?>
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-banner">
                    <figure class="vendor-banner">
                        
                        <a href="<?php echo e(route('shop.product',[$top->id, Str::slug($top->shop_name)])); ?>">
                            <img src="<?php echo e("/uploads/vendors/$top->shop_image"); ?>" width="1200"
                                 height="390" style="background-color: #ECE7DF; height:100px" />
                        </a>
                    </figure>
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="<?php echo e(route('shop.product',[$top->id, Str::slug($top->shop_name)])); ?>">
                                <img style="height:90px;width:90px" src="<?php echo e("/uploads/vendors/$top->shop_image"); ?>"
                                     width="90" height="90" />
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="<?php echo e(route('shop.product',[$top->id, Str::slug($top->shop_name)])); ?>"><?php echo e($top->shop_name); ?></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
            <p class="text-danger">No Shops Available</p>
        <?php endif; ?>
        <?php endif; ?>
        </div>
    </main>

    <div class="modal fade top" style="padding-top: 170px;" id="modalpromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">

  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-body" >
        <div class=" d-flex justify-content-center align-items-center">
            <?php if(!empty($pop->file)): ?>
            <img src="<?php echo e(url('storage/storeLogo/'.$pop->file)); ?>" style="height:auto; width:100%" alt="">
            <?php else: ?>
            <P><img src="<?php echo e(asset('storage/storeLogo/common.jpg')); ?>"  style="height:auto; width:100%"alt=""></P>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


    <script>
       $(window).on('load',function(){
            let getPopup = JSON.parse(localStorage.getItem('popup'));
            if(getPopup === null){
                let today = new Date();
                let time = today.getHours();
                let date = today.getDate();
                let popup = {
                    time: time,
                    date: date,
                    flag: 1
                }
                localStorage.setItem('popup', JSON.stringify(popup));
            }else{
                let today = new Date();
                let time = today.getHours();
                let date = today.getDate();
                let timeDiff = Math.abs(time - parseInt(getPopup.time));
                if(timeDiff >=25 || date !== getPopup.date){
                    let popup = {
                        time: time,
                        date: date,
                        flag: 1
                    }
                    localStorage.setItem('popup', JSON.stringify(popup));
                }
            }
            
             if (parseInt(getPopup.flag) === 1) {
                setTimeout(function () {
                    $('#modalpromo').modal('show');
                        let today = new Date();
                        let time = today.getHours();
                        let date = today.getDate();
                        let popup = {
                            time: time,
                            date: date,
                            flag: 0
                        }
                    localStorage.setItem('popup', JSON.stringify(popup));
                }, 100);
            
            }
        })


	</script>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-styles'); ?>
    
   <style>
       
       .menu .menu-title{
            margin-bottom: 2rem;
            font-size: 1.4rem;
            line-height: 1;
            letter-spacing: -0.025em;
            color: inherit !important;
       }
       
   </style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/main.blade.php ENDPATH**/ ?>