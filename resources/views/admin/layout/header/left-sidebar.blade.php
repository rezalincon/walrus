<div id="left-sidebar" class="sidebar">
    @php
        $file=App\Model\Logo::where('type','sidebar')->first();
    @endphp
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
   
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                @if($file)
                    
                    <img src="{{asset('/storage/storeLogo')}}/{{$file->file}}" class="user-photo" alt="Logo">
                @else
                    <img src="{{asset('/storage/storeLogo')}}/common.jpg" class="user-photo" alt="Logo">
                @endif
            </div>
            <div class="dropdown">
                <span>Admin</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->name}}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{ route('admin.profile') }}"><i class="fa fa-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">

            <ul id="main-menu" class="metismenu animation-li-delay">
                {{-- <li class="header">Main</li> --}}
                <!-- admin access only -->

                @if(Auth::user()->role_id == '1')
                    <li class= "{{Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                @endif
                <!-- admin and moderator access only -->
                @if(Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
                    <li class= "{{Request::is('admin/orders/*') ? 'active' : '' }}">
                        <a href="#manageOrders" class="has-arrow"><i class="fa fa-list"></i><span>Orders</span></a>
                        <ul class="metismenu">
                            <li class="{{ Request::is('admin/orders/view') ? 'active' : '' }}"><a href="{{route('orders.view')}}">All Orders</a></li>
                        </ul>
                    </li>
                @endif

                <li class="{{Request::is('admin/product/*') ? 'active' : '' }}">
                    <a href="#product" class="has-arrow"><i class="fa fa-cart-plus"></i><span>Products</span></a>
                    <ul class="metismenu">
                      
                        <li class="{{Request::is('admin/product/allProducts') ? 'active' : '' }}"><a href="/admin/product/allProducts">All Products</a></li>
                        <li class="{{Request::is('admin/product/deActivatedProducts') ? 'active' : '' }}"><a href="/admin/product/deActivatedProducts">Deactivated Products</a></li>
                        {{-- <li><a href="/admin/product/productCatalogs">Product Catalogs</a></li> --}}

                    </ul>
                </li>
                <li class="{{Request::is('admin/brand/*') ? 'active' : '' }}">
                    <a href="#allbrand" class="has-arrow"><i class="fa fa-arrows"></i><span>Manage Brand</span></a>
                    <ul class="metismenu">
                        <li class="{{Request::is('admin/brand/view') ? 'active' : '' }}"><a href="{{route('brand.view')}}">Brand</a></li>
                    </ul>
                </li>

                <li class="{{Request::is('admin/category/view', 'admin/subcategory/view', 'admin/childcategory/view') ? 'active' : '' }}">
                    <a href="#manageCategories" class="has-arrow"><i class="fa fa-anchor"></i><span>Manage Categories</span></a>
                    <ul class="metismenu">
                        <li class="{{Request::is('admin/category/view') ? 'active' : '' }}"><a href="{{route('category.view')}}">Main Category</a></li>
                        <li class="{{Request::is('admin/subcategory/view') ? 'active' : '' }}"><a href="{{route('subcategory.view')}}">Sub Category</a></li>
                        <li class="{{Request::is('admin/childcategory/view') ? 'active' : '' }}"><a href="{{route('childCategory.view')}}">Child Category</a></li>
                    </ul>
                </li>

                <!-- admin and moderator access only -->
                @if(Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
                    <li class="{{Request::is('admin/vendor/vendorsList', 'admin/vendor/withdrawrequest') ? 'active' : '' }}">
                        <a href="#" class="has-arrow"><i class=" fa fa-users"></i><span>Vendors</span></a>
                        <ul class="metismenu">
                            <li class="{{Request::is('admin/vendor/vendorsList') ? 'active' : '' }}"><a href="{{route('vendorShow')}}" >Vendors List</a></li>
                             <li><a href="{{route('vendorDeactivated')}}" >Deactivate Vendors List</a></li>
                            <li class="{{Request::is('admin/vendor/withdrawrequest') ? 'active' : '' }}"><a href="{{route('withdraw')}}" >Withdraw Request</a></li>
                        </ul>
                    </li>

                    <li class="{{Request::is('admin/customer/*') ? 'active' : '' }}">
                        <a href="#" class="has-arrow"><i class=" fa fa-users"></i><span>Customer</span></a>
                        <ul class="metismenu">
                            <li class="{{Request::is('admin/customer/customerList') ? 'active' : '' }}"><a href="{{route('customerShow')}}" >Customer List</a></li>
                        </ul>
                    </li>
                @endif

                <!----------- Admin access only  --------->
                @if(Auth::user()->role_id == '1')
                    <li class="{{Request::is('admin/admin/view') ? 'active' : '' }}">
                        <a href="{{ route('admin.view') }}"><i class="fa fa-address-book"></i> <span>Admins</span></a>
                    </li>
                @endif

                <!-- admin and moderator access only -->
                @if(Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
                    <li class="{{Request::is('admin/report') ? 'active' : '' }}">
                        <a href="{{ route('report') }}"><i class="fa fa-file-pdf-o"></i> <span>Report</span></a>
                    </li>

                    <li class="{{ Request::is('admin/setting/logo', 'admin/setting/footer', 'admin/setting/favicon', 'admin/setting/shipping', 'admin/setting/headerText', 'admin/setting/view-submenu', 'admin/social/topmenu/view' ) ? 'active' : '' }}">
                        <a href="#generalSetting" class="has-arrow"><i class="fa fa-cog"></i></i><span>General Setting</span></a>
                        <ul class="metismenu">
                            <li class="{{Request::is('admin/setting/logo') ? 'active' : '' }}"><a href="{{route('logo.view')}}">Logo</a></li>
                            <li class="{{Request::is('admin/setting/footer') ? 'active' : '' }}"><a href="{{route('footer.view')}}">Footer</a></li>
                            <li class="{{Request::is('admin/setting/favicon') ? 'active' : '' }}"><a href="{{route('favicon.view')}}">Fevicon</a></li>
                            <li class="{{Request::is('admin/setting/shipping') ? 'active' : '' }}"><a href="{{route('shipping.view')}}">Shipping Method</a></li>
                            <li class="{{Request::is('admin/setting/headerText') ? 'active' : '' }}"><a href="{{route('header.text')}}">Header Text</a></li>
                            <li class="{{Request::is('admin/setting/view-submenu') ? 'active' : '' }}"><a href="{{route('view_sub_menu')}}">Footer Menu</a></li>
                            <li class="{{Request::is('admin/social/topmenu/view') ? 'active' : '' }}"><a href="{{route('topmenu.view')}}">Top Menu</a></li> 
                            
                            <li class="{{Request::is('admin/terms-condition') ? 'active' : '' }}"><a href="{{route('setting.terms')}}">Terms And Conditions</a></li>

                        </ul>
                    </li>
                    <li class="{{Request::is('admin/social/socialLinks') ? 'active' : '' }}">
                        <a href="#socialSetting" class="has-arrow"><i class=" fa fa-share-alt"></i><span>Social Setting</span></a>
                        <ul class="metismenu">
                            <li class="{{Request::is('admin/social/socialLinks') ? 'active' : '' }}"><a href="{{route('socialLinks.view')}}">Social Links</a></li>
                            <li class="{{Request::is('admin/setting/pixel/view') ? 'active' : '' }}"><a href="{{route('pixel.view')}}">Pixel Setup</a></li>

                        </ul>
                    </li>
                    <li class="{{Request::is('admin/setting/campaign', 'admin/setting/services', 'admin/setting/sliders', 'admin/setting/advertise') ? 'active' : '' }}">
                        <a href="#homePageSetting" class="has-arrow"><i class="fa fa-cog"></i><span>Home Page Setting</span></a>
                        <ul class="metismenu">
                            <li class="{{Request::is('admin/setting/campaign') ? 'active' : '' }}"><a href="{{route('campaign.view')}}">Campaign</a></li>
                            <li class="{{Request::is('admin/setting/services') ? 'active' : '' }}"><a href="{{route('services.view')}}">Services</a></li>
                            <li class="{{Request::is('admin/setting/sliders') ? 'active' : '' }}"><a href="{{route('sliders.view')}}">Sliders</a></li>
                            <li class="{{Request::is('admin/setting/advertise') ? 'active' : '' }}"><a href="{{route('advertise.view')}}">Advertisements</a></li>
                        </ul>
                    </li>

                    <li class="{{Request::is('admin/blogs') ? 'active' : '' }}">
                        <a href="{{ route('blogs') }}"><i class="fa fa-envelope"></i> <span>Blogs</span></a>
                    </li>

                    <li class="{{Request::is('admin/subscribers') ? 'active' : '' }}">
                        <a href="{{ route('subscribers') }}"><i class="fa fa-address-book"></i> <span>Subscribers</span></a></li>
                    <li>
                    <li class="{{Request::is('admin/viewgroupmail') ? 'active' : '' }}">
                        <a href="{{ route('groupmail') }}"><i class="fa fa-envelope"></i> <span>Email</span></a>
                    </li>
                    <li class="{{Request::is('admin/vendor/minimum-withdraw') ? 'active' : '' }}">
                        <a href="{{ route('minimum.withdraw.view') }}"><i class="fa fa-money"></i> <span>Minimum Withdraw</span></a>
                    </li>
                    <li class="{{Request::is('admin/vendor/top-vendor') ? 'active' : '' }}">
                        <a href="{{ route('topvendor.view') }}"><i class="fa fa-money"></i> <span>Top Vendor Min Amount</span></a>
                    </li>
                    
                @endif
            </ul>
        </nav>
    </div>
</div>


