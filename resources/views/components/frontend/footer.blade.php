<hr class="mt-2">
<footer class="footer appear-animat" data-animation-options="{
    'name': 'fadeIn'
}">
    <div class="text-white bg-blue">
        <div class="footer-newsletter">
    <div class="container-fluid text-white bg-blue p-4">

      

    <div class="mb-nws">
    <div class="text-center">
        <h3 class="text-white">Join Now To Our <br> Newsletter</h3>
        <form action="" method="post" id="add-sub-form">
            @csrf
            <input  type="email" placeholder="Enter Your Email address" id="email" name="email"class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
            <button type="submit" class="btn btn-block mt-3 text-white m-submit"><i class="fas fa-paper-plane"></i> Subscribe</button>
        </form>

    </div>

    </div>
<section class="mb-nws">
    <div class="m-newsletter">
      <div class="m-newsletter-inner">
      
      <div class="widget-body">
                            <div style="padding:0px" class="col-xl-3 col-lg-2 col-sm-4 ">
                                <a href="/" class="logo-footer">
                                <?php
                                $footerLogo=\App\Model\Logo::where('type','footer')->first();
                                ?>
                                @if($footerLogo)
                                    <img style="width:80px" src="\storage\storeLogo\{{$footerLogo->file}}" alt="logo" width="145" height="45"/>
                                @else
                                    <img style="width:100px" src="\storage\storeLogo\common.png" alt="logo" width="145" height="45"/>
                                @endif                      
                                </a>
                            </div>
                            <label class="label-social d-block text-dark mt-4"><h4 class="text-white">Get in Touch</h4></label>
                            <div class="social-icons social-icons-colored">
                                <?php
                                $social=\App\Model\Social::first();
                                ?>
                                @if($social && $social->f_status)
                                    <a href="{{$social->facebook}}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                @else
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                @endif
                               
                            @if($social && $social->l_status)
                            <a href="{{$social->linkedin}}" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                        @else
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        @endif

                        @if($social && $social->t_status)
                                    <a href="{{$social->twitter}}" target="_blank" class="social-icon social-pinterest w-icon-youtube"></a>
                                @else
                                    <a href="#" class="social-icon social-pinterest w-icon-youtube"></a>
                                @endif                            
                               

                                @if($social && $social->d_status)
                                <a href="{{$social->dribble}}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                            @else
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            @endif 
                                
                            </div>
                        </div>
      
      
      
      
    
    
      </div>
      <div style="width:50%;padding:20px">
    
      <div class="widget">
                            @php
                            $s_data = App\Model\Submenu::where('sub_status','Active')->get();
                        @endphp
                            <h3 class="widget-title text-white"> {{isset($s_data[0])?$s_data[0]->menu:''}}</h3>
                            <div class="mt-2" >
                                @foreach($s_data as $s_data)
                                <a href="{{ route('footer_menu',['id'=>$s_data->id]) }}"style="color:white !important">{{ $s_data->sub_menu }}</a><br>

                            @endforeach
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
                            @if($footerText)
                                {{$footerText->footer}}
                            @else
                                <p>nothing</p>
                            @endif
                        </h4>
                        <span style="color:white">
                        <?php
                            $copyright=\App\Model\Footer::first();
                            ?>
                            @if($copyright)
                                {!!$copyright->copyright!!}
                                
                            @else
                                <p class="copyright text-white">Nothing</p>
                            @endif
                        </span>
                            
                         
                      
                    </div>

    </div>
    <div class="f-app">
    <div class="widget">
                        <h4 class="widget-title text-white">Download</h4>
                        <div class="f-app-container">
                            <div class="f-app-left">
                                <a href=""><img style="height: 50px;width:50px" src="https://www.cnet.com/a/img/KnzgVqR0kmKc-k3nHassdj_hnTU=/940x0/2021/01/28/00951dc3-1819-4860-bbf6-afe654077af6/google-play-store.png" alt=""></a>
                            </div>
                            <div class="f-app-right">
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
                {{-- <div class="col-xl-3 col-lg-2">
                    <a href="/" class="logo-footer">
                        <?php
                        $footerLogo=\App\Model\Logo::where('type','footer')->first();
                        ?>
                        @if($footerLogo)
                            <img src="\storage\storeLogo\{{$footerLogo->file}}" alt="logo" width="145" height="45"/>
                        @else
                            <img src="\storage\storeLogo\common.png" alt="logo" width="145" height="45"/>
                        @endif
                    </a>
                </div> --}}
                <div class="col-md-6">
                    <div class="icon-box icon-box-side justify-content-center text-dark">
                        <div class="icon-box-icon ">
                            <i class="w-icon-envelop3 text-white"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-uppercase font-weight-bold text-white" >Subscribe To Our
                                Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.</p>
                        </div><br>
                        
                    </div><br>
        <span class="text-danger" id="eError"></span>                    
                        <form action="" method="post" id="add-sub-form"
                            class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                            @csrf
                            <input type="email" class="form-control mr-2 bg-white text-default" name="email"
                                id="email" placeholder="Enter Your E-mail Address For Subscribe"/>
                              
                            <button class="btn btn-primary btn-rounded" type="submit">Subscribe<i
                                    class="w-icon-long-arrow-right"></i></button>
                                    
                        </form>
                </div>
            
            </div>
        </div>
        <div class="container-fluid">
        <div id="nws2" class="footer-top ml-2">
            <div  class="row">
                <div id="frow" class="col-lg-3 col-sm-6 ">
                    <div class="widget widget-about">
                        <div class="widget-body">
                            <div class="widget-inner">
                                <a href="/" class="">
                                <?php
                                $footerLogo=\App\Model\Logo::where('type','footer')->first();
                                ?>
                                @if($footerLogo)
                                    <img class="img-fluid" src="\storage\storeLogo\{{$footerLogo->file}}" alt="logo" />
                                @else
                                    <img src="\storage\storeLogo\common.png" alt="logo" width="145" height="45"/>
                                @endif                      
                                </a>
                            </div>
                            <label class="label-social d-block text-dark mt-4"><h4 class="text-white">Get in Touch</h4></label>
                            <div class="social-icons social-icons-colored ">
                                <?php
                                $social=\App\Model\Social::first();
                                ?>
                                @if($social && $social->f_status)
                                    <a href="{{$social->facebook}}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                @else
                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                @endif
                               
                            @if($social && $social->l_status)
                            <a href="{{$social->linkedin}}" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                        @else
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        @endif

                        @if($social && $social->t_status)
                                    <a href="{{$social->twitter}}" target="_blank" class="social-icon social-pinterest w-icon-youtube"></a>
                                @else
                                    <a href="#" class="social-icon social-pinterest w-icon-youtube"></a>
                                @endif                            
                               

                                @if($social && $social->d_status)
                                <a href="{{$social->dribble}}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                            @else
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            @endif 
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">


                        <div class="widget">
                            @php
                            $s_data = App\Model\Submenu::where('sub_status','Active')->get();
                        @endphp
                            <h3 class="widget-title text-white">{{isset($s_data[0]) ? $s_data[0]->menu :"Not Found"}}</h3>
                            <div class="mt-2" >
                                @foreach($s_data as $s_data)
                                <a class="text-white" href="{{ route('footer_menu',['id'=>$s_data->id]) }}" >{{ $s_data->sub_menu }}</a><br>

                            @endforeach
                            </div>
                            

                    </div>

                </div>
                <div class="col-lg-3 col-sm-6 ">
                    <div class="widget ">
                        <h4 class="widget-title text-white">
                            <?php
                            $footerText=\App\Model\Footer::first();
                            
                            ?>
                            @if($footerText)
                                {{$footerText->footer}}
                            @else
                                <p>nothing</p>
                            @endif
                        </h4>
                        <p >
                            <?php
                            $copyright=\App\Model\Footer::first();
                            ?>
                            @if($copyright)
                                {!!$copyright->copyright!!}
                                
                            @else
                                <p class="copyright">Nothing</p>
                            @endif
                        </p>
                            
                         
                      
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title text-white">Download</h4>
                        <div class="m-app">
                            <div class="m-app-left">
                                <a href="#"><img style="height:50px;width:50px" src="https://www.cnet.com/a/img/KnzgVqR0kmKc-k3nHassdj_hnTU=/940x0/2021/01/28/00951dc3-1819-4860-bbf6-afe654077af6/google-play-store.png" alt=""></a>
                            </div>
                            <div class="m-app-right">
                                <a href="#"><img style="height:50px;width:50px;" src="https://logos-world.net/wp-content/uploads/2021/02/App-Store-Logo.png?" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="nws3" class="footer-bottom container-fluid bg-blue">
        <div class="container row col-md-12">
            <div class="footer-left col-md-5">
                <h6 class="text-white mt-5">
                    <?php
                    $copy=\App\Model\Footer::first();
                    ?>
                    @if($copy)
                        {!!$copy->cotact!!}
                    @else
                        <p class="cotact">Nothing</p>
                    @endif
                </h6>              

            </div>
            <div class="col-md-7">
                    <img src="https://drobboseba.com/wp-content/uploads/2020/09/footer-banner.png" alt="">
            </div>

        </div>
    </div>
</footer>
