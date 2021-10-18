

    <!-- Start of Header -->
    <header class="header">
        <div class="header-top border-bottom">
            <div class="container  p-3">
                <div class="header-left mt-2">
                    {{-- <?php
                        $headerText=\App\Model\HeaderText::first();
                    ?>
                    @if($headerText)
                       {!!$headerText->text!!}
                    @else
                        <p class="welcome-msg">Welco!</p>
                    @endif --}}
                    <div class="ml-5">
                        <?php
                        $left1=\App\Model\HeaderText::where('type','left1')->first();
                        ?>
                        @if($left1)
                        <a class="h-anchor" href="#"><i class="fas h-icon fa-phone-volume"></i> {{$left1->text}}</a>
                        @else
                        <a class="h-anchor" href="#"><i class="fas h-icon fa-phone-volume"></i> </a>
                        @endif

                    </div>
                    <div>

                    <?php
                        $left2=\App\Model\HeaderText::where('type','left2')->first();
                        ?>
                        @if($left2)
                        <a class="h-anchor a-space"  href="#"><i class="fas h-icon fa-headset"></i> {{$left2->text}}</a>
                        @else
                        <a class="h-anchor a-space"  href="#"><i class="fas h-icon fa-headset"></i></a>
                        @endif

                    </div>

                </div>
                <div class="header-right">
                    <div>
                    <?php
                        $right=\App\Model\HeaderText::where('type','right')->first();
                        ?>
                        @if($right)
                        <a class="h-anchor" href="#"><i class="fas h-icon fa-tablet-alt"></i> {{$right->text}}</a>
                        @else
                        <a class="h-anchor" href="#"><i class="fas h-icon fa-tablet-alt"></i> </a>
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <!-- End of Header Top -->

        <div  class="header-middle">
            <div class="container mb-3">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle w-icon-hamburger">
                    </a>
                    <a href="/" class="logo ml-lg-0">
                        <?php
                        $headerLogo=\App\Model\Logo::where('type','header')->first();
                        ?>
                        @if($headerLogo)
                            <img src="\storage\storeLogo\{{$headerLogo->file}}" alt="logo" width="110" height="30"/>
                        @else
                            <img src="\storage\storeLogo\common.png" alt="logo" width="110" height="30"/>
                        @endif

                    </a>

                        <div id="smb" class="row col-md-10 search-mobile col-sm-8 col-xs-10 m-auto">
                            <div id="smb2" class="col-md-10 col-sm-8 s-center">
                                <input type="text" class="form-control m-src" autocomplete="off" name="search" id="search" placeholder="Search for..." required />
                            </div>
                            <div class="col-md-2 col-sm-2 src-btn">
                                <button type="button" class="btn btn-primary s-btn"><i class="fas fa-search"></i></button>
                            </div>
                        <div class="row justify-content-center overflow-auto: background-color:white;" id="search-modal" hidden>
            <div id="src-mbl">
                <div class="card tab-card ml-auto mr-auto overflow-auto" >
                  <div class="card-header bg-white tab-card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Products</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Brands</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Shops</a>
                      </li>
                    </ul>
                  </div>

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">




                    </div>
                    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">

                    </div>
                    <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">

                    </div>

                  </div>
                </div>
              </div>
        </div>


                        </div>




                </div>
                
                <?php
                    $wishlist = 0;
                    if (Auth::id()){
                        $wishlist = \App\Model\Wishlist::where('user_id',Auth::id())->count();
                    }
                    
                    $cart = 0;
                    if (Auth::id()){
                        $cart = \App\Model\Cart::where('user_id',Auth::id())->count();
                    }
                ?>

               
                <div class="header-right">


                   
                    
                    <script !src="">
                        document.getElementsByClassName('wishlist')[0].addEventListener("click", ()=>{
                            const userId = document.getElementById('userId').value;
                            if(userId === ''){
                                alert("You have to login First");
                            }
                        });
                    </script>

                    <div class="h-cart cart-dropdown cart-offcanvas mr-0 mr-lg-2 d-flex">
                    <div class="wish-overlay"></div>
                    <a id="heart" class="wishlist label-down wish-dropdown text-decoration-none" href="{{(Auth::id()) ? route('wishlist.view',Auth::id()) : '#'}}">
                        <i class="fa fa-heart">
                        <span id="wishlist-count" class="wish-count"><?=$wishlist?></span>
                        </i>
                    </a>
                    
                        <div class="cart-overlay"></div>
                        <a id="cart"href="#" class="cart-toggle label-down link text-decoration-none">
                            <i  class="fa fa-shopping-cart">
                                <span  class="cart-count"><?=$cart?></span>
                            </i>
                            <span class="cart-label"></span>
                        </a>

                        <div class="dropdown-box">
                            <div class="cart-header">
                                <span>Shopping Cart</span>
                                <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="products cart-products p-cart overflow-auto">
                            </div>

                            <div class="cart-total">
                                <label>Subtotal:</label>
                                <span class="price">00</span>
                            </div>

                            <div class="cart-action">
                                <a href="{{route('view.cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded" id="sidebarCheckoutBtn">Checkout</a>
                            </div>
                        </div>
                        <!-- End of Dropdown Box -->
                    </div>
                </div>
                @guest
                <a class="d-lg-show login compare label-down link d-xs-show ml-4" data-toggle="modal" href="#LoginModal"><i
                        class="fa fa-user"></i></a>

            @else
            <a class="d-lg-show login compare label-down link d-xs-show ml-4" href="{{ route('customer.profile') }}"><i
                class="fa fa-user"></i></a>
              <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest

            </div>
        </div>
        <!-- End of Header Middle -->


        {{-- search modal --}}

        

         <div  class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                    <div class="container">
                        <div  class="inner-wrap">
                            <div class="header-left">
                                <div class="dropdown category-dropdown has-border" data-visible="true" id="sticky-dropdown-homepage">
                                    <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="fal" data-display="static"
                                        title="Browse Categories">
                                        <i class="w-icon-category"></i>
                                <span>Categories</span>
                            </a>

                            <div class="dropdown-box">
                                <ul class="menu vertical-menu category-menu">
                                    <?php $i = 0;?>
                                    @forelse($categories as $category)
                                        <?php $i++ ?>
                                        <li>
                                            <a href="{{route('categorize.product',[$category->id, Str::slug($category->name)])}}">
                                                {{$category->name}}
                                            </a>
                                            <ul class="menu vertical-menu">
                                                @forelse($category->sub_categories as $subCategory)
                                                <li>

                                                    <h6 style="margin-bottom:0px" class="menu-title">
                                                        <a href="{{route('childCategorize.product', [$subCategory->id, Str::slug($subCategory->name)])}}">
                                                            {{$subCategory->name}}
                                                        </a>
                                                    </h6> 
                                                   
                                                    <ul>
                                                        @forelse($subCategory->child_categories as $childCategory)
                                                        <li>
                                                            <a href="{{route('subCategorize.product', [$childCategory->id,Str::slug($childCategory->name)])}}">{{$childCategory->name}}</a>
                                                        </li>
                                                        @empty
                                                            <li>Not Found</li>
                                                        @endforelse
                                                    </ul>
                                                </li>
                                                @empty
                                                    <li>Not Found</li>
                                                @endforelse
                                            </ul>
                                        </li>
                                        @empty
                                            <li>Not Found</li>
                                    @endforelse
                                        <?php
                                            if ($i >= 7){
                                        ?>
                                            <li><a class="text-center text-primary text-white" href="{{url('/all-categories')}}"> View All Categories</a></li>
                                        <?php }?>

                                </ul>
                            </div>
                        </div>

                            @forelse ($top as $item)
                            <nav class="main-nav">
                            <ul class="menu active-underline">
                                <li class="">
                                    <a class="text-decoration-none" href="{{url($item->url)}}">{{$item->name}}</a>
                                </li>
                            </ul>
                            </nav>
                            @empty
                                <p>Not found</p>
                            @endforelse


                    </div>
                    <div class="header-right">
                        <a  class="d-xl-show text-decoration-none"  href="{{route('blogslist')}}"></i>News Feed</a>
                        <a  class="d-xl-show text-decoration-none mr-5" data-toggle="modal" href="#TrackModal"></i>Track Order</a>
                        <a target="_blank" href="{{route('vendor.login')}}" class="mr-4 text-decoration-none"></i>Merchant Zone</a>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
 <!-- ------------------------------------------------------ -->
        <!--  login pop up modal -->
        <div class="modal fade " id="LoginModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <!-- Start of Page Header -->
                        <div class="container">
                            <h1 class="page-title mb-0">Login</h1>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="page-content">
                            <div class="container">
                                <div class="login-popup login">
                                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">

                                        <div class="tab-content">

                                            <!-- login tab -->
                                            <div class="tab-pane active" id="">

                                                <!-- login error msg -->
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
                                                    <strong id="login_error"></strong>
                                                    <button type="button" class="close" data-dismiss="" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- reset msg -->
                                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                                    <strong id="reset_successful"></strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- reg successful msg -->
                                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                                    <strong id="reg_successful"></strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="customerLogin" method="POST">

                                                    <div class="form-group">
                                                        <label>Mobile no. *</label>
                                                        <input placeholder="Enter mobile no" name="phone" type="text"
                                                        class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                                        required autofocus>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label>Password *</label>
                                                        <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror" placeholder="Minumum 8 characters"
                                                        value="{{ old('password') }}" required autocomplete="password" autofocus>
                                                    </div>
                                                    <a href="#" class="fp mt-2"> <u>Forgot password?</u> </a>

                                                    <a href="#" id="login" type="submit" class="btn btn-primary my-4">Sign In</a>

                                                    <span class="font-size-md"> Don't have an account? </span> <a class="mb-4 font-size-md u-sign" href="{{ route('customer.register') }}"><u>Sing up</u></a>

                                                </form>
                                            </div>
                                                        <hr>
                                        </div>
                                        
                                        <div class="social-icons social-icon-border-color d-flex justify-content-start">
                                        <a href="/login/facebook" class="social-button" id="facebook-connect"> <span>Sign In with Facebook</span></a>
                                        <a href="/login/google" class="social-button" id="google-connect"> <span>Sign In with Google</span></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- End of Main -->
                    </div>
                </div>
            </div>
        </div>

















         <!--------- otp modal ----->

         <div class="modal fade" id="otp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content m-auto" id="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">Phone Verification</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body m-0">
                        <!-- alert start-->
                        <div class="alert-success">
                            <span class="text-center mt-2" id="code_sent"></span>
                        </div>
                        <div class="alert-warning">
                            <span class="text-center mt-2" id="code_invalid"></span>
                        </div>
                        <div class="alert-warning">
                            <span class="text-center mt-2" id="verification-error"></span>
                        </div>
                        <!-- alert end-->


                        <label for="code"></label>
                        <input type="text" class="mb-2 form-control" name="code" id="code" placeholder="verification code" autocomplete="off">

                        <button type="button" id="verify" class="btn btn-primary mt-2">Verify</button>
                        <button type="button" id="fp_verify" class="btn btn-primary mt-2">Verify</button>
                        <button type="button" id="resend" class="btn btn-primary mt-2" disabled>Resend code</button>
                        <button type="button" id="fp_resend" class="btn btn-primary mt-2" disabled>Resend code <span class="text-warning timer"></span> </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeBtn" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal: forgot password -->
        <div class="modal fade " id="fp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content m-auto" id="m-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Give phone no to get verification code</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body m-0">

                        <!-- alert start-->
                        <div class="alert-warning my-2" style="display: none;">
                            <span class="text-center mt-2" id="fp_phone_invalid"></span>
                        </div>
                        <div class="alert-warning my-2" style="display: none;">
                            <span class="text-center mt-2" id="fp_sending_error"></span><span class="timer"></span>
                        </div>
                        <!-- alert end-->

                        <form id="fp-form" method="post">

                            <input  name="phone" id="fp-phone" placeholder="Mobile No." type="number" class="form-control" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            <strong><span id="fp_phone_error" class="invalid-feedback" role="alert">
                            </span> </strong>

                            <div class="mt-2">
                                <button class="btn-block btn-primary mt-2 mb-2 p-3 v-code" type="submit">Send Verification Code</button>
                                <div class="bottom login-toggle-btn">
                                    <span class="helper-text mt-3">Know your password? <a id="fp_login_btn"  href="#"> <u>Login </u></a></span>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeBtn" class="btn btn-primary p-1" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal: reset password -->
        <div class="modal fade " id="reset-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content m-auto" id="" style="width: 50%">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel"> Password Reset</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body m-0">

                        <!-- alert start-->
                        <div class="alert-warning my-2" style="display: none;">
                            <span class="text-center mt-2" id="reset_error"></span>
                        </div>
                        <!-- alert end-->

                        <form id="reset-form" method="post">
                            <input hidden name="uniqid" id="reset_uniqid" >
                            <div class="">
                                <input id="reset_password" class="form-control" type="password" name="password" placeholder="Password (minimum 8 characters)" value="{{ old('password') }}" required autocomplete="new-password" autofocus>
                                <br>
                                <strong><span id="reset_password_error" class="invalid-feedback" role="alert">
                                </span> </strong>
                            </div>

                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                            <div class="button-box">
                                <div class="login-toggle-btn">
                                    <button class="btn btn-primary btn-sm mt-3" type="submit">Reset Password</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeBtn" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- modal: track order -->
        <div class="modal fade" id="TrackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content m-auto" id="tm-content">
                    <div class="modal-header">
                        <h4 class="modal-title"  id="exampleModalLabel">Track Order</h4>
                        <button type="button" id="trackXCloseBtn" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <form id="track_form" method="post">

                            <input  name="oid" id="oid" placeholder="Enter Order Code" type="" class="form-control mt-5" value="" required >

                            <div class="alert" id="order_status" style="display:none"></div>

                            <div class="mt-2">
                                <button class="btn-block btn-primary" type="submit">Track Order</button>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="trackCloseBtn" class="btn btn-primary p-2" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>







        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>

    $(document).ready(function () {
        $('#search').on('input',function (){
            $(this).val($(this).val() ? $(this).val().trimStart() : '');
        })

        $(document).mouseup(function(e){
           let container = $('#search-modal');
           let search = $('#search');
           if (!container.is(e.target) && !search.is(e.target) && container.has(e.target).length === 0){
               $(container).attr('hidden',true);
           }
        });

        $('#search').on('keyup',function () {

            var query = $(this).val();

            if ($(this).val() == ''){
                $('#one').html('');
                $('#search-modal').attr('hidden',true);
            }else{
                $('#search-modal').attr('hidden',false);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/searchajax',
                    data: {
                        search: query
                    },
                    success: function (data) {
                        
                        $('#one').html('');
                        if( data[0].length>0){
                        for (var i = 0; i < data[0].length; i++){
                            $('#one').append(`
                        <li class="list-item border-bottom-1 p-3" style=" list-style:none">
                                            <a href="/productdetails/${data[0][i].id}/${convertToSlug(data[0][i].name)}" class="single-item">
                                            <div class="row p-3">
                                                <div class="col-2">
                                                     <div class="product-image">
                                                    <img style="height: 50px; width: 41px" src="/${data[0][i].photo}" alt="product image" class="">
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="product-info">
                                                        <div class="product-info-top"><h6 class="product-name">${data[0][i].name}</h6></div>
                                                    </div>
                                                    <div class="product-price">Tk. ${data[0][i].price}</div>
                                                </div>
                                            </div>
                                            </a>
                                        </li>

                    `);
                        }
                        }else{

                            $('#one').append(`
                        <li class="list-item border-bottom-1 p-3" style=" list-style:none">
                                            <h6 align="center" class="text-danger">Not Found</h6 >
                                        </li>

                    `);

                        }


                        $('#two').html('');
                        if( data[1].length>0){
                        for (var i = 0; i < data[1].length; i++){
                            $('#two').append(`
                            <li class="list-item border-bottom-1 p-3" style=" list-style:none">
                                            <a href="/brandbyproduct/${data[1][i].id}/${convertToSlug(data[1][i].name)}" class="single-item">
                                            <div class="row p-3">
                                                <div class="col-2">
                                                     <div class="product-image">
                                                    <img style="height: 40px; width: 40px" src="/uploads/brand-images/${data[1][i].photo}" alt="product image" class="">
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="product-info">
                                                        <div class="product-info-top"><h6 class="product-name">${data[1][i].name}</h6></div>
                                                    </div>

                                                </div>
                                            </div>
                                            </a>
                                        </li>

                    `);
                        } }else{

$('#two').append(`
<li class="list-item border-bottom-1 p-3" style=" list-style:none">
    <h6 align="center" class="text-danger">Not Found</h6 >
            </li>

`);

}

                        $('#three').html('');
                        if( data[2].length>0){
                        for (var i = 0; i < data[2].length; i++){
                            $('#three').append(`
                            <li class="list-item border-bottom-1 p-3" style=" list-style:none">
                                            <a href="/shopbystore/${data[2][i].id}/${convertToSlug(data[2][i].shop_name)}" class="single-item">
                                            <div class="row p-3">
                                                <div class="col-2">
                                                     <div class="product-image">
                                                    <img style="height: 40px; width: 40px" src="/uploads/vendors/${data[2][i].shop_image}" alt="product image" class="">
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="product-info">
                                                        <div class="product-info-top"><h6 class="product-name">${data[2][i].shop_name}</h6></div>
                                                    </div>

                                                </div>
                                            </div>
                                            </a>
                                        </li>

                    `);
                        }
                    }else{

$('#three').append(`
<li class="list-item border-bottom-1 p-3" style=" list-style:none">
    <h6 align="center" class="text-danger">Not Found</h6 >
            </li>

`);

}


                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }

        });
    });

    function convertToSlug(Text){
        return Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'')
                ;
    }

        </script>

@if(\Illuminate\Support\Facades\Request::is('/') || \Illuminate\Support\Facades\Request::is('/#'))
    <script>
        $(function (){
            $('#sticky-dropdown-homepage').addClass('show-dropdown');
        });
    </script>
@endif













