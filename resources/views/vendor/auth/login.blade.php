@extends('vendor.master.master')

@section('content')
<style>
    .login-popup#login-page{
        margin: auto;
    }
.form-control{
    border-color:#2A9CF5;
}
    .page-title{
        margin-top: 5%;
        text-align: center;
    }
    .tacbox {
  display:block;
  padding: 0em;
  margin: 0em;
  background-color: #fff;
  max-width: 800px;
}

#checkbox {
  height: 1em;
  width: 1em;
  vertical-align: middle;
}
@media (max-width: 575.98px) { 
    #mb-hide{display:none;}
    }
</style>

<!-- Start of Main -->
<main class="main login-page">
    <input id="token" type="text" value="" hidden>
    <div class="page-header">
        <div class="container">
            <h1 class="page-title text-dark">Merchant Zone</h1>
            <center>
                <style>
                    .btn-primary{
                        background-color: #fd3d11 !important;
                        border: none;
                    }
                </style>
                <a href="/" class="btn btn-primary">Back Home</a>
            </center>
            <hr>
        </div>
    </div>

    <div class="page-content">
        <div class="container mb-5 mt-5">
        <div  class="row justify-content-center">
            <div class="row col-md-8 shadow">
                <div id="mb-hide" class="col-md-6">
                    
                <div class="img">
                 <a href="#"><img src="https://i.ibb.co/vLP1bfP/undraw-Vault-re-s4my.png" alt="undraw-Mobile-posts-re-bpuw" border="0" /></a>
		        </div> <br>
                <h3 style="text-align:center">Welcome Back</h3>
                <p style="text-align:center">It is nice to see you again<br>Sign In to continue your acount</p>
             
            </div>               

                <div class="col-md-6">
            <div id="login-page" class="login-popup mb-3 mt-2">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="#sign-in-tab" class="nav-link active" id="sign-in-tab-a">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sign-up-tab" class="nav-link">Sign Up</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!-- sign in tab -->
                        <div class="tab-pane active" id="sign-in-tab">
                            @if(session()->has('activeerr'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                    <strong>{{session('activeerr')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session()->has('pass'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                <strong>{{session('pass')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                             <!-- reg successful msg -->
                             <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                <strong id="reg_successful"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                            <form id="customer-login-form" action="{{ route('vendor.login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile no. *</label>
                                    <input placeholder="Enter mobile no" name="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    required autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label>Password *</label>
                                    <input type="password" name="password" placeholder="Minimum 8 characters"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <a href="#" class="fp mt-2 mb-2"> <u style="color:#fd3d11; ">Forgot password?</u></a>                          

                                <button type="submit" class="btn btn-primary btn-block my-4">Sign In</button>

                               <hr>
                            </form>
                        </div>
                      

                        <!-- sign up tab -->
                        <div class="tab-pane" id="sign-up-tab">
                            <!-- otp send error -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none;">
                                <strong id="sending_error"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-warning my-2 pr-0" role="alert" style="display: none;">
                                    <strong><span class="text-center mt-2" id="reg_sending_error" style="padding: 10px; padding-right:0"></span></strong><span class="reg_timer text-danger"></span>
                            </div>

                            <form  method="post" id="registerForm" >
                                <div class="form-group mb-3">
                                    <label>Your Name *</label>
                                    <input placeholder="Enter your name" id="reg_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                    <strong><span id="reg_name_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Mobile No. *</label>
                                    <input placeholder="Enter mobile no" type="number" id="reg_phone" class="form-control" name="phone"  value="{{ old('phone') }}" required>
                                    <strong><span id="reg_phone_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email *</label>
                                    <input placeholder="Enter email" type="email" id="reg_email" class="form-control" name="email"  value="{{ old('email') }}" required>
                                    <strong><span id="reg_email_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Shop Name *</label>
                                    <input placeholder="Enter your shop name" type="text" id="reg_shop_name" class="form-control" name="shop_name"  value="{{ old('shop_name') }}" required>
                                    <strong><span id="reg_shop_name_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Address *</label>
                                    <input placeholder="Enter your address" type="text" id="reg_address" class="form-control" name="address"  value="{{ old('address') }}" required>
                                    <strong><span id="reg_address_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password *</label>
                                    <input type="password" id="reg_password" class="form-control" name="password"  value="{{ old('password') }}" placeholder="Minimum 8 characters" required>
                                    <strong><span id="reg_password_error" class="invalid-feedback" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password Confirmation *</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
                                </div>

                                <div class="tacbox">
                                        <input id="checkbox" type="checkbox" />
                                        <label for="checkbox"> I agree to these <a href="{{route('terms')}}">Terms and Conditions</a>..</label>
                                          <strong><span id="checkbox_feedback" class="invalid-feedback text-danger" role="alert">
                                        </span> </strong>
                                </div>  

                                <a id="register" href="#" type="submit" class="btn btn-primary my-4">Sign Up</a>

                               
                            </form>
                            <!--<p>Do you have an account? <a href="#" class="fp_login_btn"><u>Sign In</u></a></p>-->

                        </div>
                    </div>
                </div>
            </div>




                </div>
            </div>
        </div>
        </div>
    </div>
</main>
<!-- End of Main -->

 <!--------- otp modal ----->

<div class="modal fade shadow" id="otp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content m-auto" id="modal-content" style="width: 50%">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLabel">Phone Verification</p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-0">
                <!-- alert start-->
                <div class="alert-success">
                    <span class="text-center mt-2" id="code_sent" style="padding: 10px 0"></span>
                </div>
                <div class="alert-warning">
                    <span class="text-center mt-2" id="code_invalid" style="padding: 10px 0"></span>
                </div>

                <div class="alert-warning">
                    <span class="text-center mt-2" id="verification-error" style="padding: 10px 0"></span>
                </div>
                <!-- alert end-->


                <label for="code"></label>
                <input type="text" class="mb-2 form-control" name="code" id="code" placeholder="verification code" autocomplete="off">
                <button type="button" id="verify" class="btn btn-primary mt-2">Verify</button>
                <button type="button" id="fp_verify" class="btn btn-primary mt-2">Verify</button>
                <button type="button" id="resend" class="btn btn-primary mt-2" disabled>Resend code <span class="text-warning reg_timer"></span></button>
                <button type="button" id="fp_resend" class="btn btn-primary mt-2" disabled>Resend code <span class="text-warning timer"></span></button>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeBtn" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- modal: forgot password -->
    <div class="modal fade shadow" id="fp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content m-auto" id="" style="width: 50%">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Give phone no to get verification code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body m-0">

                    <!-- alert start-->
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="fp_phone_invalid" style="padding: 10px"></span>
                    </div>
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="fp_sending_error" style="padding: 10px; padding-right:0"></span><span class="timer"></span>
                    </div>
                    <!-- alert end-->

                    <form id="fp-form" method="post">

                        <input name="phone" id="fp-phone" placeholder="Mobile No." type="number" class="form-control" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        <strong><span id="fp_phone_error" class="invalid-feedback" role="alert">
                        </span> </strong>

                        <div class="button-box">
                            <button class="btn-block btn-primary mt-2 mb-2 p-3" style="font-size:12px" type="submit">Send Verification Code</button>
                            <div class="bottom login-toggle-btn">
                                <span class="helper-text mt-3" >Know your password? <a class="fp_login_btn" style="float:none " href="#"> <u style="color:#fd3d11;">Login </u></a></span>
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

    <!-- modal: reset password -->
    <div class="modal fade shadow" id="reset-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content m-auto" id="" style="width: 50%">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel"> Password Reset</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body m-0">

                    <!-- alert start-->
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="reset_error" style="padding: 10px"></span>
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
@endsection

@section('page-scripts')
    <script src="{{ asset('vendor/js/vendor-login-register.js')}}"> </script>
@endsection
