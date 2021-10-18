
<?php $__env->startSection('content'); ?>
<main class="main">

<nav class="container">
<div class="title-link-wrapper appear-animate mb-4 ">
<h2 class="title title-link pt-1">Details</h2>
<a href="<?php echo e(route('productall')); ?>" class="ls-normal">Products<i class="w-icon-long-arrow-left"></i></a>
</div>
</nav>

<div class="page-content mt-2">
<div class="container">
    <?php if(Session::get('success')): ?>
    <div class="alert text-white container" style="background: #09c422;">
        <?php echo e(Session::get('success')); ?>

    </div>
    <?php endif; ?>
<div class="row gutter-lg">
<div class="main-content">
<?php $__empty_1 = true; $__currentLoopData = $productDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="product product-single row">
<div class="col-md-6 mb-4 mb-md-8">
<div class="product-gallery product-gallery-sticky">
<div
class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
<figure class="product-image">
<img src="<?php echo e("/$item->photo"); ?>"
  style="width: 100%; height: 500px"
data-zoom-image="<?php echo e("/$item->photo"); ?>"
alt="Fashion Table Sound Marker">
</figure>
<?php $__empty_2 = true; $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
<figure class="product-image">
<img
src="<?php echo e(asset('../../uploads/product-gallery/'.$row->image_file)); ?>"
data-zoom-image="<?php echo e(asset('../../uploads/product-gallery/'.$row->image_file)); ?>"
alt="Fashion Table Sound Marker" width="800" height="900">
</figure>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
<?php endif; ?>

</div>
<div class="product-thumbs-wrap">
<div class="product-thumbs row cols-4 gutter-sm">
<div class="product-thumb active">
<img src="<?php echo e("/$item->photo"); ?>"
alt="Product Thumb" width="400" height="500">
</div>
<?php $__empty_2 = true; $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
<div class="product-thumb">
<img
src="<?php echo e(asset('../../uploads/product-gallery/'.$row->image_file)); ?>"
alt="Product Thumb" width="800" height="900">
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
<?php endif; ?>
</div>
<button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
<button class="thumb-down disabled"><i
class="w-icon-angle-right"></i></button>
</div>
</div>
</div>
<div class="col-md-6 mb-6 mb-md-8">
<div class="product-details pt-5 pb-5" data-sticky-options="{'minWidth': 767}">
<h1 class="product-title"><?php echo e($item->name); ?></h1>
<div class="product-bm-wrapper">
<figure class="brand">
    <?php if(isset($item->brand->photo)): ?>
<img
src="<?php echo e(isset($item->brand->photo) ? "/uploads/brand-images/".$item->brand->photo : ''); ?>"
alt="Brand"
width="60" height="30"/>
    <?php endif; ?>
</figure>

<div class="product-meta">
<div class="product-categories">
Category:
<span class="product-category"><a
href="<?php echo e(isset($item->categories->id) ? url('/'.$item->categories->id.'/categorizeProducts') : '#'); ?>">
    <?php echo e(isset($item->categories->name) ? $item->categories->name : ''); ?></a></span>
</div>
<div class="product-sku">
SKU: <span><?php echo e($item->sku); ?></span>
</div>
<div class="product-sku mt-2">
Stock: <span><?php echo e($item->stock); ?></span>
</div>
</div>
    <div class="ml-5">
    <div class="social-links">
<div class="social-icons social-no-color border-thin">

    <div class="fb-share-button"
         data-href="<?php echo e(url('/productdetails/'.$item->id)); ?>"
         data-layout="button">
    </div>
</div>
</div>
    </div>
</div>

<hr class="product-divider">

<div class="product-price"><span

    <div  class="product-price">
        <ins class="new-price">TK <?php echo e($item->price); ?></ins><del class="old-price">TK <?php echo e($item->previous_price); ?></del>
    </div>

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

<!--<div class="product-short-desc">-->
<!--<?php echo $item->details; ?>-->
<!--</div>-->

<hr class="product-divider">

<?php if($item->color != ','): ?>
<div
class="product-form product-variation-form product-size-swatch product-variations">
<label>Colors:</label>
<div class="flex-wrap d-flex align-items-center" id="color-variation">
<?php
$colors = explode(',', $item->color);
foreach ($colors as $color){
if ($color != ''){
?>
<a href="#" class="size mr-1 pro-color"><?=$color?></a>
<?php }}?>
</div>
</div>
<?php endif; ?>

<?php if($item->size != ','): ?>
<div class="product-form product-variation-form product-size-swatch">
<label class="mb-1">Size:</label>
<div class="flex-wrap d-flex align-items-center product-variations">
<?php
$sizes = explode(',', $item->size);
foreach ($sizes as $size){
if ($size != ''){
?>
<a href="#" data-id="<?php echo e($item->id); ?>"
class="size pro-size"><?=$size?></a>
<?php }}?>
</div>
</div>

<div class="product-variation-price pvp" style="margin-top: -30px" hidden>
Tk. <span class="product-price-text-bottom"><?php echo e($item->price); ?></span>
</div>
<?php endif; ?>

<div class="fix-bottom ">
<div class="product-form container">
<div class="product-qty-form">
<div class="row input-group">
                                        <input class="quantity form-control" type="number" min="1" max="10000000" value="1">
                                        <button class="quantity-plus w-icon-plus" style="border: none !important"></button>
                                        <button class="quantity-minus w-icon-minus"
                                            style="border: none !important"></button>
                                    </div>
</div>

    <?php if($item->stock > 0): ?>
        <button data-id="<?php echo e($item->id); ?>" class="btn btn-dark btn-buy mr-3" id="buyNowBtn">
            
            <i class="w-icon-cart"></i>
            <span>Buy Now</span>
        </button>
        <button data-id="<?php echo e($item->id); ?>" class="btn btn-primary btn-cart">
            <i class="fas fa-shopping-cart"></i>
            <span>Add to Cart</span>
        </button>
    <?php else: ?>
        <button data-id="<?php echo e($item->id); ?>" class="btn btn-danger btn-cart" disabled>
            <i class="w-icon-cart"></i>
            <span>Out of stock</span>
        </button>
    <?php endif; ?>

</div>
</div>


</div>
</div>
</div>


<div class="tab tab-nav-boxed tab-nav-underline product-tabs mb-5 shadow p-3">
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a href="#product-tab-description" class="nav-link active p-2">Description</a>
</li>
<li class="nav-item">
<a href="#product-tab-specification" class="nav-link p-2">Specification</a>
</li>
<li class="nav-item">
<a href="#product-tab-vendor" class="nav-link p-2">Vendor Info</a>
</li>
<li class="nav-item">
<a href="#product-tab-reviews" class="nav-link p-2">Customer Reviews (<?php echo e(count($rating)); ?>)</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="product-tab-description">
<div class="row mb-4">
<div class="col-md-6 mb-5">

<p class="mb-4"><?php echo $item->details; ?></p>
<ul class="list-type-check">
</ul>
</div>
<div class="col-md-6 mb-5">
<div class="banner banner-video product-video br-xs">
<figure class="banner-media">

<?php if(!empty($item->youtube)): ?>
<iframe width="560" height="315" src="<?php echo e($item->youtube); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<a class="btn-play-video btn-iframe"
href="<?php echo e("$item->youtube"); ?>"></a>
<?php endif; ?>
</figure>
</div>
</div>
</div>

</div>
<div class="tab-pane" id="product-tab-specification">

<table class="table">
    <?php if(isset($item->brand->name)): ?>
    <tr>
        <th style="width:30%">Brand</th>
        
        <td><?php echo e($item->brand->name); ?></td>
        
    </tr>
    <?php endif; ?>
    
    <?php if($item->color != ','): ?>
    <tr>
        <th>Color</th>
       
        <td><?php echo e($item->color); ?></td>
     
    </tr>
    <?php endif; ?>
    
    <?php if($item->size != ','): ?>
    <tr>
        <th>Size</th>
        
        <td><?php echo e($item->size); ?></td>
        
    </tr>
    <?php endif; ?>
    
    <?php if(!empty($item->ship)): ?>
    <tr>
        <th>Shipping Cost</th>
        
        <td><?php echo e($item->ship); ?></td>
        
    </tr>
    <?php endif; ?>
  </table>


</div>
<div class="tab-pane" id="product-tab-vendor">
<div class="row mb-3">
<div class="col-md-4 mb-4">
<figure class="vendor-banner br-sm">
<img
src="<?php echo e(isset($item->vendor->image) ? asset('/uploads/vendors/'.$item->vendor->image) : ''); ?>"
alt="Vendor Banner" width="300" height="295"
style="background-color: #353B55;"/>
</figure>
</div>
<div class="col-md-6 pl-2 pl-md-6 mb-4">
<div class="vendor-user">
<figure class="vendor-logo mr-4">

</figure>
<div>
</div>
</div>
<ul class="vendor-info list-style-none"> <br><br>
<li class="store-name">
<h3 style="line-height:0" class="detail"><?php echo e($item->vendor->shop_name); ?></h3>
</li>
<!--<li class="store-name">-->
<!--<p class="detail"><?php echo e($item->vendor->address); ?></p>-->
<!--</li>-->
<!--<li class="store-phone">-->
<!--<label>Phone:</label>-->
<!--<a href="#tel:"><?php echo e($item->vendor->phone); ?></a>-->
<!--</li>-->
</ul>
<a href="<?php echo e(route('shop.product',[$item->vendor->id,Str::slug($item->vendor->shop_name)])); ?>"
class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
Store<i class="w-icon-long-arrow-right"></i></a>
</div>
</div>

</div>


                <?php
                $star1 = $item->ratings
                    ->where('product_id', $item->id)
                    ->where('rating', 1)
                    ->count();

                $star2 = $item->ratings
                    ->where('product_id', $item->id)
                    ->where('rating', 2)
                    ->count();
                $star3 = $item->ratings
                    ->where('product_id', $item->id)
                    ->where('rating', 3)
                    ->count();
                $star4 = $item->ratings
                    ->where('product_id', $item->id)
                    ->where('rating', 4)
                    ->count();
                $star5 = $item->ratings
                    ->where('product_id', $item->id)
                    ->where('rating', 5)
                    ->count();

                $tot_stars = $star1 + $star2 + $star3 + $star4 + $star5;
                if ($tot_stars > 0) {
                   $ar = 1 * $star1 + 1 * $star2 + 1 * $star3 + 1 * $star4 + (1 * $star5) / 5;
                } else {
                    $ar = 0;
                }

                ?>


                <div class="tab-pane" id="product-tab-reviews">
                    <div class="row mb-4">
                        <div class="col-xl-4 col-lg-5 mb-4">
                            <div class="ratings-wrapper">
                                <div class="avg-rating-container">
                                    <!--<h4 class="avg-mark font-weight-bolder ls-50"><?php echo e($ar); ?></h4>-->
                                    <div class="avg-rating">
                                        <p class="text-dark mb-1">Average Rating</p>
                                        <div class="ratings-container">

                                            <a href="#" class="rating-reviews">(<?php echo e(count($item->ratings)); ?>

                                                Reviews)</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                    <span class="text-dark font-weight-bold"></span>Rating by Stars<span
                                        class="count"></span>
                                </div>
                                <?php

                                for ($i = 1; $i <= 5; ++$i) {
                                    $var = "star$i";
                                    $count = $$var;
                                    if ($tot_stars > 0) {
                                        $percent = ($count * 100) / $tot_stars;
                                    } else {
                                        $percent = 0;
                                    }

                                    for ($j = 1; $j <= 5; ++$j) {
                                        echo $j <= $i ? '⭐' : '  ';
                                    }
                                    printf("\t%2d (%5.2f%%)\n <br>", $count, $percent, 2);
                                }

                                ?>

                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 mb-4">
                           <?php if(Auth::check()): ?>
                            <div class="review-form-wrapper">
                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                    Review</h3>
                                <p class="mb-3">Your email address will not be published. Required
                                    fields are marked *</p>
                                <form action="<?php echo e(route('productrating')); ?>" method="POST" class="review-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="rating-form">
                                        <label for="rating">Your Rating Of This Product : </label>
                                        <span class="ratingt-stars">
                                            <a class="star1" id="a">⭐ |</a>
                                            <a class="star2" id="b">⭐⭐ |</a>
                                            <a class="sta-3" id="c">⭐⭐⭐ |</a>
                                            <a class="sta-4" id="d">⭐⭐⭐⭐ |</a>
                                            <a class="star5" id="e">⭐⭐⭐⭐⭐ |</a>


                                        </span>
                                        <input type="hidden" id="rat" name="rating">
                                        <input type="hidden" value="<?php echo e($item->id); ?>" name="product_id">


                                    </div>
                                    <textarea cols="30" rows="6" name="review" placeholder="Write Your Review Here..."
                                        class="form-control" id="review"></textarea>
                                    <div class="row gutter-md mt-2">
                                        <div class="col-md-6">
                                            <input type="hidden" class="form-control mb-2" name="name" value="<?php echo e(auth()->user()->name); ?>"
                                                placeholder="Your Name" id="author">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="email" value="<?php echo e(auth()->user()->email); ?>"
                                                id="email_1">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-5">Submit
                                        Review
                                    </button>
                                </form>
                            </div>
                            <?php else: ?>

                          <a href="/login" style="margin: 15rem" class="btn btn-primary btn-lg">Log in First</a>


                            <?php endif; ?>
                        </div>
                    </div>


    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                        <h4>Reviews</h4>
                        <hr>
                        <div class="tab-content">
                            <div class="tab-pane active" id="show-all">
                                <ul class="comments list-style-none">
                                    <?php $__empty_2 = true; $__currentLoopData = $item->ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>


                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="comment-content">
                                                    <h4 class="comment-author">
                                                        <h5 class="text-info"><?php echo e($r->name); ?> <br><small
                                                                class="text-dark"><?php echo e($r->created_at->format('d-m-y')); ?></small>
                                                        </h5>
                                                    </h4>
                                                    <div class="ratings-container comment-rating">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <?php if(ceil($r->rating) > 0): ?>
                                                                    <span class="ratings" style="width: 0%;"></span>
                                                                <?php endif; ?>

                                                                <?php if(ceil($r->rating) == 1): ?>
                                                                    <span class="ratings"
                                                                        style="width: 20%;"></span>
                                                                <?php endif; ?>
                                                                <?php if(ceil($r->rating) == 2): ?>
                                                                    <span class="ratings"
                                                                        style="width: 40%;"></span>
                                                                <?php endif; ?>
                                                                <?php if(ceil($r->rating) == 3): ?>
                                                                    <span class="ratings"
                                                                        style="width: 60%;"></span>
                                                                <?php endif; ?>
                                                                <?php if(ceil($r->rating) == 4): ?>
                                                                    <span class="ratings"
                                                                        style="width: 80%;"></span>
                                                                <?php endif; ?>
                                                                <?php if(ceil($r->rating) == 5): ?>
                                                                    <span class="ratings"
                                                                        style="width: 100%;"></span>
                                                                <?php endif; ?>
                                                                <!--<span class="tooltiptext tooltip-top"></span>-->
                                                            </div>
                                                            <a href="#" class="rating-reviews">(

                                                                <?php if($item->ratings->count() > 0): ?>

                                                                    <?php echo e($item->ratings->count()); ?>

                                                                <?php else: ?>

                                                                    0
                                                                <?php endif; ?>

                                                                Reviews
                                                                )
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p><?php echo e($r->review); ?></p>
                                                </div>
                                            </div>
                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                                    <?php endif; ?>

                                </ul>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>Not Found</p>
                        <?php endif; ?>
                    </div>
</div>
</div>
</div>


<section class="related-product-section">
<div class="title-link-wrapper mb-4">
<h4 class="title">Related Products</h4>
<a href="<?php echo e(isset($productDetails[0]->categories->id) ? route('categorize.product',[$productDetails[0]->categories->id, Str::slug($productDetails[0]->categories->name)]) : '#'); ?>" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
Products<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2"
data-owl-options="{
'nav': false,
'dots': false,
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
'items': 5
}
}
}">
<?php $__empty_1 = true; $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="product text-center">
<figure class="product-media">
<a href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>">
<img style="height:200px;width:200px;" src="<?php echo e("/$item->photo"); ?>" alt="Product" width="300"
height="338">
<img style="height:200px;width:200px;" src="<?php echo e("/$item->photo"); ?>" alt="Product" width="300"
height="338">
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
<?php if($item->offer_product==1): ?>
<div class="badge-overlay">
    <span class="top-left badge pink">SALE</span>
</div>
<?php endif; ?>

<div class="product-details">
<h4 class="product-name"><a href="<?php echo e(route('product.details',[$item->id , Str::slug($item->name)])); ?>"><?php echo e($item->name); ?></a></h4>
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
    <ins class="new-price">TK <?php echo e($item->price); ?></ins><del class="old-price">TK <?php echo e($item->previous_price); ?></del>
</div>

<?php if($item->stock > 0): ?>
<a style="width:100%" data-id="<?php echo e($item->id); ?>" class="btn btn-primary btn-cart" href="#"> <i class="fas fa-shopping-cart"></i>&nbsp  Buy Now</a>
<?php else: ?>
<button style="width: 100%; background-color: darkred; color: white" type="button" class="btn btn-danger" disabled><i class="fas fa-shopping-cart"></i>&nbsp  Out of Stock</button>
<?php endif; ?>
</div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?>
</div>
</section>
</div>
<!-- End of Main Content -->
<aside class="sidebar product-sidebar sidebar-fixed right-sidebar bg-white sticky-sidebar-wrapper">
<div class="sidebar-overlay"></div>
<a class="sidebar-close" href="#"><i class="close-icon"></i></a>
<a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
<div class="sidebar-content scrollable">
<div class="sticky-sidebar">
<div class="widget widget-icon-box mb-6">
    
    <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class=w-icon-money "></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($services[0]) ? $services[0]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($services[0]) ? $services[0]->details :"Not Found"); ?></p>
                </div>
    </div>
    
    <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-bag "></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($services[1]) ? $services[1]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($services[1]) ? $services[1]->details :"Not Found"); ?></p>
                </div>
    </div>
    
    <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-headphone"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($services[2]) ? $services[2]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($services[2]) ? $services[2]->details :"Not Found"); ?></p>
                </div>
    </div>
    
    <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-truck"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal"><?php echo e(isset($services[3]) ? $services[3]->title :"Not Found"); ?></h4>
                    <p class="text-default"><?php echo e(isset($services[3]) ? $services[3]->details :"Not Found"); ?></p>
                </div>
    </div>
    

</div>
<?php $__empty_1 = true; $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="widget widget-banner mb-2">
    <div class="banner banner-fixed br-sm">
        <figure>
            <img src="<?php echo e(url("storage/advertise/$item->image_file")); ?>"  width="240"
                height="260" style="background-color: #7def78;" />
        </figure>
        <!--<div class="banner-content">-->
        <!--    <div class="banner-price-info font-weight-bolder text-secondary lh-1 ls-25">-->
        <!--        <sup class="font-weight-bold"><?php echo e($item->subtitle); ?></sup>-->
        <!--    </div>-->
        <!--    <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">-->
        <!--        <?php echo e($item->description); ?></h4>-->
        <!--        <a href="<?php echo e($item->link); ?>"class="btn btn-primary btn-link  btn-icon-right">Discover-->
        <!--            Now<i class="w-icon-long-arrow-right"></i></a>-->
        <!--</div>-->
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>Not Found</p>
<?php endif; ?>
</div>
</div>
</aside>
</div>
</div>
</div>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$( document ).ready(function() {




$("#a").on('click',function(){
$("#rat").val(1);
$("#b").hide();
$("#c").hide();
$("#d").hide();
$("#e").hide();
})

$("#b").on('click',function(){
$("#rat").val(2);
$("#a").hide();
$("#c").hide();
$("#d").hide();
$("#e").hide();
})

$("#c").on('click',function(){
$("#rat").val(3);
$("#b").hide();
$("#a").hide();
$("#d").hide();
$("#e").hide();
})

$("#d").on('click',function(){
$("#rat").val(4);
$("#b").hide();
$("#c").hide();
$("#a").hide();
$("#e").hide();
})

$("#e").on('click',function(){
$("#rat").val(5);
$("#b").hide();
$("#c").hide();
$("#a").hide();
$("#d").hide();
})
});

</script>
<script>
    $(".alert:not(.not_hide)").delay(5000).slideUp(500, function () {
     $(this).alert('close');
 });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>
    <script>
        $(document).ready(function(){
            $('#buyNowBtn').on('click',function(){
                let userId = $('#userId').val();
                let qty = 1;
                if ($('#productQty').val()){
                    qty = $('#productQty').val();
                }
                if (userId){
                    let color = $('#productColor').val();
                    let size = $('#productSize').val();
                    let productId = $(this).attr('data-id');
                    if (size){
                        window.location.replace(`/singlecheckout/${qty}/${productId}/${size}`);
                    }else if (color){
                        window.location.replace(`/singlecheckout/${qty}/${productId}/${color}`);
                    }else if (size && color){
                        window.location.replace(`/singlecheckout/${qty}/${productId}/${color}/${size}`);
                    }else{
                        window.location.replace(`/singlecheckout/${qty}/${productId}`);
                    }
                }else{
                    toastr.options = {
                                "timeOut": "3000",
                                "closeButton": true,
                            };
                            toastr['error']('You have to login first!!!');
                }
            });
        });
    </script>
    
     <script>
        $(function() {

            $('.quantity-plus').on('click', function() {
                let a = $('.quantity').val();
                $('.quantity').val(parseInt(a) + 1);
                $('#productQty').val($('.quantity').val());
            });

            $('.quantity-minus').on('click', function() {
                let a = $('.quantity').val();
                if (parseInt(a) > 1) {
                    $('.quantity').val(parseInt(a) - 1);
                }
                $('#productQty').val($('.quantity').val());
            });

            $('.quantity').on('change', function() {
                if ($(this).val() < 1) {
                    $(this).val(1);
                }
                $('#productQty').val($('.quantity').val());
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('facebook-share-meta-tags'); ?>
    <meta property="og:url"           content="<?php echo e(url('/productdetails/'.$productDetails[0]->id)); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo e($productDetails[0]->name); ?>" />
    <!--<meta property="og:description"   content="<?php echo e($productDetails[0]->details); ?>" />-->
    <meta property="og:image"         content="<?php echo e(asset($productDetails[0]->photo)); ?>" />
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\uc\Downloads\AyyanFInal\resources\views/frontend/product/product_details.blade.php ENDPATH**/ ?>