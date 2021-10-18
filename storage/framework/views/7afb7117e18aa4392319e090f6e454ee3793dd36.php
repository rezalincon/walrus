<?php $__env->startSection('content'); ?>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo e(('frontend/assets/css/style.min.css')); ?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
        <style>
            #s-ban{
	width: 100%;
	height: 200px;
	<?php if(isset($banner->file)): ?>
	
	background: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.3)), url("<?php echo e("/storage/storeFavicon/".$banner->file); ?>") center no-repeat;
	<?php endif; ?>
	background-size: cover;
	position: relative;
    overflow: hidden;
  
}
        </style>
    </head>
    <!-- Start of Main -->
    <main class="main container">
        <!-- Start of Page Content -->
        <div class="page-content ">
            <?php ($asset = $banner ? asset("/storage/storeFavicon/$banner->file") : ""); ?>
            <?php ($backgroundImg = $asset ? "background-color: #FFC74E; " : "background-color: #FFC74E;"); ?>
            <div id="s-ban" class="rounded mt-5 shop-default-banner shop-boxed-banner border banner d-flex align-items-center mb-6" >
                <div class="container banner-content d-flex">
                    <div>
                        <img style="width:100px;height:86px" src="<?php echo e("/uploads/vendors/".$vendor[0]->shop_image); ?>" />
                    </div>
                    <div class="ml-5">
                        <h3 class="banner-subtitle m-0  text-white font-weight-bold"><?php echo e($vendor[0]->shop_name); ?></h3>
                        <h6 class=" text-white m-0 text-uppercase "><?php echo e($vendor[0]->address); ?></h6>
                        <!--<p class="m-0 text-white">Contact: <?php echo e($vendor[0]->phone); ?></p>-->
                        <!--<p class="m-0 text-white"><strong>Emal: <?php echo e($vendor[0]->email); ?></strong></p>-->
                        <input type="text" id="vendor_id" value="<?php echo e($vendor[0]->id); ?>" hidden>
                    </div>
                </div>

            </div>
            <!-- End of Shop Banner -->
            

                        <div class="filter-mb">

                            <div class="widget widget-collapsible mb-2">
                                <h3 style="border: 1px solid #fd3d11;" class="widget-title m-4 p-3 collapsed"><span class="m-3">All Categories &nbsp</span></h3>
                                <ul class="widget-body filter-items search-ul m-3" style="display: none">
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li><a data-id="<?php echo e($category->id); ?>" class="product_category1" href="#"><?php echo e($category->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <div  class="widget widget-collapsible">
                                <h3 style="border: 1px solid #fd3d11;"  class="widget-title  m-4 p-3 collapsed"><span class="m-3">Price &nbsp</span></h3>
                                <div class="widget-body m-3" style="display: none">
                                    <ul class="filter-items search-ul" id="searchUl">
                                        <li><a href="#">Tk. 0 - 500</a></li>
                                        <li><a href="#">Tk. 500 - 1000</a></li>
                                        <li><a href="#">Tk. 1000 - 2000</a></li>
                                        <li><a href="#">Tk. 2000 - 3000</a></li>
                                        <li><a href="#">Tk. 3000 - 4000</a></li>
                                        <li><a href="#">Tk. 4000 - 5000</a></li>
                                        <li><a href="#">Tk. 5001 +</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                               placeholder="$min"><span class="delimiter">-</span><input
                                            type="number" name="max_price" class="max_price text-center"
                                            placeholder="$max"><a href="#"
                                                                  class="btn btn-primary btn-rounded goBtn">Go</a>
                                    </form>
                                </div>
                            </div>
                        </div><br>
                   


                        
                            <div class="infinite-scroll">

                                <div style="padding-right:0;padding-left:0;margin:0;" class="product-wrapper row col-md-12 col-sm-12 col-12" id="all_products">
                                    <?php $__empty_1 = true; $__currentLoopData = $shopProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col-md-2 col-sm-4 col-6">

                                            <div class="product-wrap mt-2">
                                                <div  class="product mb-5 text-center">
                                                    <figure class="product-media">
            <a href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>">
                                                            <img style="height:200px; width:100%;" src="<?php echo e("/$item->photo"); ?>" alt="Product" >
                                                            <img style="height:200px; width:100%;" src="<?php echo e("/$item->photo"); ?>" alt="Product">
                                                        </a>
                                                        <?php if($item->stock > 0): ?>
                                                            <div class="product-action-vertical">
                                                                <a href="#" data-id="<?php echo e($item->id); ?>" class="btn-product-icon btn-wishlist w-icon-heart"
                                                                   title="Add to wishlist"></a>

                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                    <div class="product-action-horizontal">    
                                                        <?php if($item->online_payment==1): ?>                   
                                                       <small class="text-primary font-weight-bold text-uppercase">Payment Only</small>                                                                          
                                                    <?php else: ?>
                                                    <small class="text-success font-weight-bold text-uppercase">Cash On Delivery</small>
                                                    <?php endif; ?>
                                                    </div>
                                                    </figure>
                                                    <?php if($item->offer_product==1): ?>
                                                    <div hidden class="product-price">
                                                        <ins class="new-price"><?php echo e($item->previous_price); ?></ins><del class="old-price"><?php echo e($item->price); ?></del>
                                                    </div>
                                                    <div class="badge-overlay">
                                                        <span class="top-left badge pink">SALE</span>
                                                         </div>
                                                <?php else: ?>
                                                    <div hidden class="product-price">
                                                        <ins class="new-price"><?php echo e($item->price); ?></ins>
                                                    </div>
                                                <?php endif; ?>
                                                    <div class="product-details">
                                                        <h3 class="product-name">
    <a href="<?php echo e(route('product.details',[$item->id, Str::slug($item->name)])); ?>"><?php echo e($item->name); ?></a>
                                                        </h3>
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
                                                            <button style="width: 100%; background-color: darkred; color: white" type="button" class="btn btn-danger" disabled><i class="fas fa-shopping-cart"></i>&nbsp  Stock Out</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p class="text-danger">Product Not found</p>
                                    <?php endif; ?>
                                </div>
                                <?php echo e($shopProduct->links()); ?>

                            </div>

                        
                        <!-- End of Main Content -->
                    
                    <!-- End of Shop Content -->
                </div>
            </div>
        </div>

        
        <div class="modal fade bd-example-modal-sm" id="pleaseWaitModal" tabindex="-1" role="dialog" aria-labelledby="pleaseWaitModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content m-0 p-0 text-center" style="background-color: transparent !important; border: none !important;">
                    <div>
                        <div class="spinner-grow text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
            

            

    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
    <script src="<?php echo e(asset('frontend/js/shop-products.js')); ?>"></script>
    <script type="text/javascript">
                $('ul.pagination').hide();
                $('.infinite-scroll').jscroll({
                    autoTrigger: true,
                    debug: true,
                    loadingHtml: '<h4 class="text-center mt-2 mb-2">Loading More</h4>',
                    padding: 0,
                    nextSelector: '.pagination li.active + li a',
                    contentSelector: 'div.infinite-scroll',
                    callback: function() {
                        $('ul.pagination').remove();
                    }
                });
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/product/shop_product.blade.php ENDPATH**/ ?>