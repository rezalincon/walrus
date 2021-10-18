<hr class="mt-2">
<footer class="footer appear-animat" data-animation-options="{
    'name': 'fadeIn'
}">
    <div class="text-white" style="background-color: #0e2141;">
        <div class="footer-newsletter">
    <div class="container-fluid text-white p-4" style="background-color: #0e2141;">

      

    <div class="mb-nws">
    <div style="text-align:center">
        <h3 class="text-white">Join Now To Our <br> Newsletter</h3>
        <form action="" method="post" id="add-sub-form">
            <?php echo csrf_field(); ?>
        <input  type="email" placeholder="Enter Your Email address" style="color:white;border: 1px solid #000000 !important; background-color: #000508;border-radius:5px" id="email" name="email"class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
        <button type="submit" class="btn btn-block mt-3 text-white" style="background-color: #d81818;border-radius:5px;border: 1px solid #ac0303"><i style="color:white;" class="fas fa-paper-plane"></i> Subscribe</button>
    </form>

    </div>

    </div>
<section class="mb-nws">
    <div style="display:flex; flex-direction:row;width:100%">
      <div style="width:50%;padding-top:30px">
      
      <div class="widget-body">
                            <div style="padding:0px" class="col-xl-3 col-lg-2 col-sm-4 ">
                                <a href="/" class="logo-footer">
                                <?php
                                $footerLogo=\App\Model\Logo::where('type','footer')->first();
                                ?>
                                <?php if($footerLogo): ?>
                                    <img style="width:80px" src="\storage\storeLogo\<?php echo e($footerLogo->file); ?>" alt="logo" width="145" height="45"/>
                                <?php else: ?>
                                    <img style="width:100px" src="\storage\storeLogo\common.png" alt="logo" width="145" height="45"/>
                                <?php endif; ?>                      
                                </a>
                            </div>
                            <label class="label-social d-block text-dark mt-4"><h4 class="text-white">Get in Touch</h4></label>
                            <div class="social-icons social-icons-colored">
                                <?php
                                $social=\App\Model\Social::first();
                                ?>
                                <?php if($social && $social->f_status): ?>
                                    <a href="<?php echo e($social->facebook); ?>" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                <?php else: ?>
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <?php endif; ?>
                               
                            <?php if($social && $social->l_status): ?>
                            <a href="<?php echo e($social->linkedin); ?>" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                        <?php else: ?>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        <?php endif; ?>

                        <?php if($social && $social->t_status): ?>
                                    <a href="<?php echo e($social->twitter); ?>" target="_blank" class="social-icon social-pinterest w-icon-youtube"></a>
                                <?php else: ?>
                                    <a href="#" class="social-icon social-pinterest w-icon-youtube"></a>
                                <?php endif; ?>                            
                               

                                <?php if($social && $social->d_status): ?>
                                <a href="<?php echo e($social->dribble); ?>" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                            <?php else: ?>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <?php endif; ?> 
                                
                            </div>
                        </div>
      
      
      
      
    
    
      </div>
      <div style="width:50%;padding:20px">
    
      <div class="widget">
                            <?php
                            $s_data = App\Model\Submenu::where('sub_status','Active')->get();
                        ?>
                            <h3 class="widget-title text-white"> <?php echo e(isset($s_data[0])?$s_data[0]->menu:''); ?></h3>
                            <div class="mt-2" >
                                <?php $__currentLoopData = $s_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('footer_menu',['id'=>$s_data->id])); ?>"style="color:white !important"><?php echo e($s_data->sub_menu); ?></a><br>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            

                    </div>
    
    
    </div>
    </div>
</section>


<section class="mb-nws">
    <div style="display:flex; flex-direction:row;width:100;">

    <div style="width:50%">
    <div class="widget ">
                        <h4 class="widget-title text-white">
                            <?php
                            $footerText=\App\Model\Footer::first();
                            ?>
                            <?php if($footerText): ?>
                                <?php echo e($footerText->footer); ?>

                            <?php else: ?>
                                <p>nothing</p>
                            <?php endif; ?>
                        </h4>
                        <span style="color:white">
                        <?php
                            $copyright=\App\Model\Footer::first();
                            ?>
                            <?php if($copyright): ?>
                                <?php echo $copyright->copyright; ?>

                                
                            <?php else: ?>
                                <p class="copyright text-white">Nothing</p>
                            <?php endif; ?>
                        </span>
                            
                         
                      
                    </div>

    </div>
    <div style="width:50%;margin-left:30px">
    <div class="widget">
                        <h4 class="widget-title text-white">Download</h4>
                        <div style="display: flex;flex-direction:row">
                            <div style="width50px;height:50px;margin-right:15px">
                                <a href=""><img style="height: 50px;width:50px" src="https://www.cnet.com/a/img/KnzgVqR0kmKc-k3nHassdj_hnTU=/940x0/2021/01/28/00951dc3-1819-4860-bbf6-afe654077af6/google-play-store.png" alt=""></a>
                            </div>
                            <div style="width50px;height:50px;">
                                <a href=""><img style="height: 50px;width:50px;" src="https://logos-world.net/wp-content/uploads/2021/02/App-Store-Logo.png" alt=""></a>
                            </div>
                        </div>

                    </div>
    </div>
       
    </div>
</section>






    </div>
        <div id="nws"  class="footer-newsletter container-fluid">
            <div class="row justify-content-center align-items-center">
                
                <div class="col-md-6">
                    <div class="icon-box icon-box-side justify-content-center text-dark">
                        <div class="icon-box-icon ">
                            <i style="color:lightgray" class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-uppercase font-weight-bold" style="color: #f4f4f4 !important">Subscribe To Our
                                Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.</p>
                        </div><br>
                        
                    </div><br>
        <span class="text-danger" id="eError"></span>                    
                        <form action="" method="post" id="add-sub-form"
                            class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            <?php echo csrf_field(); ?>
                            <input type="email" class="form-control mr-2 bg-white text-default" name="email"
                                id="email" placeholder="Enter Your E-mail Address For Subscribe"/>
                              
                            <button class="btn btn-primary btn-rounded" type="submit">Subscribe<i
                                    class="w-icon-long-arrow-right"></i></button>
                                    
                        </form>
                </div>
            
            </div>
        </div>
        <div class="container-fluid">
        <div id="nws2" class="footer-top ml-2" style="padding: 2.1rem 0 1.5rem;">
            <div  class="row">
                <div style="margin-left:auto" id="frow" class="col-lg-3 col-sm-6 ">
                    <div class="widget widget-about">
                        <div class="widget-body">
                            <div style="height:40px;width:106px">
                                <a href="/" class="">
                                <?php
                                $footerLogo=\App\Model\Logo::where('type','footer')->first();
                                ?>
                                <?php if($footerLogo): ?>
                                    <img class="img-fluid" src="\storage\storeLogo\<?php echo e($footerLogo->file); ?>" alt="logo" />
                                <?php else: ?>
                                    <img src="\storage\storeLogo\common.png" alt="logo" width="145" height="45"/>
                                <?php endif; ?>                      
                                </a>
                            </div>
                            <label class="label-social d-block text-dark mt-4"><h4 class="text-white">Get in Touch</h4></label>
                            <div class="social-icons social-icons-colored ">
                                <?php
                                $social=\App\Model\Social::first();
                                ?>
                                <?php if($social && $social->f_status): ?>
                                    <a href="<?php echo e($social->facebook); ?>" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                <?php else: ?>
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <?php endif; ?>
                               
                            <?php if($social && $social->l_status): ?>
                            <a href="<?php echo e($social->linkedin); ?>" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                        <?php else: ?>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        <?php endif; ?>

                        <?php if($social && $social->t_status): ?>
                                    <a href="<?php echo e($social->twitter); ?>" target="_blank" class="social-icon social-pinterest w-icon-youtube"></a>
                                <?php else: ?>
                                    <a href="#" class="social-icon social-pinterest w-icon-youtube"></a>
                                <?php endif; ?>                            
                               

                                <?php if($social && $social->d_status): ?>
                                <a href="<?php echo e($social->dribble); ?>" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                            <?php else: ?>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <?php endif; ?> 
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">


                        <div class="widget">
                            <?php
                            $s_data = App\Model\Submenu::where('sub_status','Active')->get();
                        ?>
                            <h3 class="widget-title text-white"><?php echo e(isset($s_data[0]) ? $s_data[0]->menu :"Not Found"); ?></h3>
                            <div class="mt-2" >
                                <?php $__currentLoopData = $s_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('footer_menu',['id'=>$s_data->id])); ?>" style="color: #f4f4f4 !important"><?php echo e($s_data->sub_menu); ?></a><br>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            

                    </div>

                </div>
                <div class="col-lg-3 col-sm-6 ">
                    <div class="widget ">
                        <h4 class="widget-title text-white">
                            <?php
                            $footerText=\App\Model\Footer::first();
                            
                            ?>
                            <?php if($footerText): ?>
                                <?php echo e($footerText->footer); ?>

                            <?php else: ?>
                                <p>nothing</p>
                            <?php endif; ?>
                        </h4>
                        <p >
                            <?php
                            $copyright=\App\Model\Footer::first();
                            ?>
                            <?php if($copyright): ?>
                                <?php echo $copyright->copyright; ?>

                                
                            <?php else: ?>
                                <p class="copyright">Nothing</p>
                            <?php endif; ?>
                        </p>
                            
                         
                      
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title text-white">Download</h4>
                        <div style="display: flex;flex-direction:row">
                            <div style="width:50px;height:50px;margin-right:15px">
                                <a href="#"><img style="height:50px;width:50px" src="https://www.cnet.com/a/img/KnzgVqR0kmKc-k3nHassdj_hnTU=/940x0/2021/01/28/00951dc3-1819-4860-bbf6-afe654077af6/google-play-store.png" alt=""></a>
                            </div>
                            <div style="width:50px;height:50px;">
                                <a href="#"><img style="height:50px;width:50px;" src="https://logos-world.net/wp-content/uploads/2021/02/App-Store-Logo.png?" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="nws3" class="footer-bottom container-fluid" style="background-color:#020d1f;padding:1rem 0 !important;">
        <div class="container row col-md-12">
            <div class="footer-left col-md-5">
                <h6 class="text-white mt-5">
                    <?php
                    $copy=\App\Model\Footer::first();
                    ?>
                    <?php if($copy): ?>
                        <?php echo $copy->cotact; ?>

                    <?php else: ?>
                        <p class="cotact">Nothing</p>
                    <?php endif; ?>
                </h6>              

            </div>
            <div class="col-md-7">
                    <img src="https://drobboseba.com/wp-content/uploads/2020/09/footer-banner.png" alt="">
            </div>

        </div>
    </div>
</footer>
<?php /**PATH /home/aayancom/public_html/resources/views/components/frontend/footer.blade.php ENDPATH**/ ?>