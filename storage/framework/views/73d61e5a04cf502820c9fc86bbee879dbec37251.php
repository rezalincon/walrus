 <div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
   

    <div class="mobile-menu-container scrollable">
        

        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <?php $__empty_3 = true; $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                    <li><a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>

                    <?php endif; ?>
                    <li><a href="<?php echo e(route('vendor.login')); ?>">Merchant Zone</a></li>
                    <!--<li><a href="#TrackModal">Track Order</a></li>-->
                    <li><a href="<?php echo e(route('blogslist')); ?>">News Feed</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <?php $__empty_3 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                    <li>
                        <a href="/<?php echo e($category->id); ?>/categorizeProducts">
                            <i class="w-icon-category"></i><?php echo e($category->name); ?>

                        </a>
                        <ul>
                            <?php $__empty_4 = true; $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_4 = false; ?>
                            <li>
                                <a href="/<?php echo e($subCategory->id); ?>/subCategorizeProducts"><?php echo e($subCategory->name); ?></a>
                                <ul>
                                    <?php $__empty_5 = true; $__currentLoopData = $subCategory->child_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_5 = false; ?>
                                    <li>
                                        <a href="/<?php echo e($childCategory->id); ?>/childCategorizeProducts">
                                            <?php echo e($childCategory->name); ?></a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_5): ?>
                                        <li>----</li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_4): ?>
                                <li>----</li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                        <li>----</li>
                    <?php endif; ?>
                    
                    <li>
                        <a href="<?php echo e(url('/all-categories')); ?>" class="text-center">All Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/aayancom/public_html/resources/views/components/frontend/mobile-menu.blade.php ENDPATH**/ ?>