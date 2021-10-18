@extends('vendor.layout.master.master')

@section('main-content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h1><strong>Vendor Profile</strong></h1>
                <span>Dashboard</span> <i class="fa fa-angle-right"></i>
                <span>Vendor</span> <i class="fa fa-angle-right"></i>
                <span>Profile</span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">

                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                        <!--<li class="dropdown">-->
                        <!--    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>-->
                        <!--    <ul class="dropdown-menu theme-bg gradient">-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>-->
                        <!--        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="body">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <form action="" id="edit-vendor-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="edit-shop-name" class="col-sm-3 col-form-label"><strong>Shop Name</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-shop-name" type="text" class="form-control" name="shop_name"  placeholder="Enter shop name" value="{{old('shopname',$vendor->shop_name)}}" readonly>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Shop Name*</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="text" class="form-control" id="edit-shop-name" placeholder="Enter shop name" name="shop_name" value="{{old('shopname',$vendor->shop_name)}}" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>-->
                            <!--</div>-->
                            <strong><span id="edit_shopname_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            <div class="form-group row">
                                <label for="edit-address" class="col-sm-3 col-form-label"><strong>Address</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-address" type="text" name="address" class="form-control"  placeholder="Enter address" value="{{$vendor->address}}" required>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Address*</strong></span>-->
                            <!--    </div>-->
                            <!--    <textarea id ="edit-address" class="input-field" name="address" required=""  placeholder="Enter address">{{$vendor->address}}</textarea>-->
                            <!--</div>-->
                            <strong><span id="address_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>

                            <!--<div class="row">-->
                            <!--    <div class="col-6">-->
                            <!--        <div class="input-group mb-3">-->
                            <!--            <div class="input-group-prepend">-->
                            <!--                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Shop Image*</strong></span>-->
                            <!--            </div>-->
                            <!--            <input id="edit-shop-image" type="file" name="shop_image" class="dropify edit-shop_photo" >-->
                            <!--        </div> -->
                            <!--        <strong><span id="edit_shopimage_error" class="invalid-feedback d-block mb-3" role="alert">-->
                            <!--        </span> </strong>-->
                            <!--    </div>-->
                            <!--    <div class="col-6">-->
                            <!--        @if(!empty($vendor->shop_image))-->
                            <!--            <img width="100%" height="200px" id="oldShopPhoto" style="margin-top: 37px" src="{{ asset('uploads/vendors/'.$vendor->shop_image) }}" alt="">-->
                            <!--        @else-->
                            <!--            <img hidden width="100%" height="200px" id="oldShopPhoto" style="margin-top: 37px" src="" alt="">-->
                            <!--        @endif-->

                            <!--    </div>-->
                            <!--</div> -->


                           <div class="form-group row">
                                <label for="edit-name" class="col-sm-3 col-form-label"><strong>Owner Name</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-name" type="text" name="name" class="form-control" placeholder="Enter name" value="{{old('name',$vendor->name)}}"  required>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Owner Name*</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="text" class="form-control" id="edit-name" name="name" placeholder="Enter name" value="{{old('name',$vendor->name)}}" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>-->
                            <!--</div>-->
                            <strong><span id="edit_name_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            
                            <div class="form-group row">
                                <label for="edit-email" class="col-sm-3 col-form-label"><strong>Owner Email</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-email" type="email" name="email" class="form-control"  value="{{old('email',$vendor->email)}}" readonly>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Owner Email*</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="email" class="form-control" id="edit-email" name="email" placeholder="Enter email" value="{{old('email',$vendor->email)}}" readonly aria-label="Default" aria-describedby="inputGroup-sizing-default" required>-->
                            <!--</div>-->
                            <strong><span id="edit_email_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            
                            <div class="form-group row">
                                <label for="edit-phone" class="col-sm-3 col-form-label"><strong>Phone</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-phone" type="number" name="phone" class="form-control"  value="{{old('phone',$vendor->phone)}}" readonly>
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Owner Phone*</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="number" class="form-control" id="edit-phone" name="phone" placeholder="Enter phone number" readonly value="{{old('phone',$vendor->phone)}}" aria-label="Default" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->
                            <strong><span id="edit_phone_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>

                            <div class="form-group row">
                                <label for="edit-password" class="col-sm-3 col-form-label"><strong>Password</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-password" type="password" name="password" class="form-control"  >
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Password</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="password" class="form-control" id="edit-password" name="password" aria-label="Default" placeholder="Minimum 8 characters" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->
                            <strong><span id="edit_password_error" class="invalid-feedback d-block mb-3" role="alert">
                            </span> </strong>
                            
                            <div class="form-group row">
                                <label for="edit-password_confirmation" class="col-sm-3 col-form-label"><strong>Confirm Password</strong></label>
                                    <div class="col-sm-9">
                                       <input id="edit-password_confirmation" type="password" name="password_confirmation" class="form-control"  >
                                    </div>
                            </div>
                            <!--<div class="input-group mb-3">-->
                            <!--    <div class="input-group-prepend">-->
                            <!--        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Confirm Password</strong></span>-->
                            <!--    </div>-->
                            <!--    <input type="password" class="form-control" id="edit-password_confirmation" name="password_confirmation" aria-label="Default" placeholder="Confirm password" aria-describedby="inputGroup-sizing-default" >-->
                            <!--</div>-->

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"> <strong>Image</strong></span>
                                        </div>
                                        <input id="edit-image" type="file" name="image" class="dropify edit-photo" >
                                    </div> 
                                    <strong><span id="edit_image_error" class="invalid-feedback d-block mb-3" role="alert">
                                    </span> </strong>
                                </div>
                                <div class="col-6">
                                    @if(!empty($vendor->image))
                                        <img width="100%" height="200px" id="oldPhoto" style="margin-top: 37px" src="{{ asset('uploads/vendors/'.$vendor->image) }}" alt="">
                                    @else
                                        <img hidden width="100%" height="200px" id="oldPhoto" style="margin-top: 37px" src="" alt="">
                                    @endif

                                </div>
                            </div>                 

                            <button type="submit" class="btn btn-primary theme-bg gradient">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-stylesheet')
    <link rel="stylesheet" href="{{asset('/backend/assets/css/nice-select.css')}}">

@endsection
@section('page-scripts')
    <script src="{{asset('/backend/assets/js/jquery.nice-select.js')}}"></script>
    <script !src="">
        $(document).ready(function () {
            $('select').niceSelect();
        });
    </script>
    <script src="{{asset('/backend/js/vendor-profile.js')}}"></script>

@endsection

            