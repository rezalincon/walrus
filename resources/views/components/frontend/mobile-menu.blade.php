 <div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
   

    <div class="mobile-menu-container scrollable">
        {{-- <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form> --}}

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
                    @forelse($top as $item)
                    <li><a href="{{$item->url}}">{{$item->name}}</a></li>
                    @empty

                    @endforelse
                    <li><a href="{{route('vendor.login')}}">Merchant Zone</a></li>
                    <!--<li><a href="#TrackModal">Track Order</a></li>-->
                    <li><a href="{{route('blogslist')}}">News Feed</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @forelse($categories as $category)
                    <li>
                        <a href="/{{$category->id}}/categorizeProducts">
                            <i class="w-icon-category"></i>{{$category->name}}
                        </a>
                        <ul>
                            @forelse($category->sub_categories as $subCategory)
                            <li>
                                <a href="/{{$subCategory->id}}/subCategorizeProducts">{{$subCategory->name}}</a>
                                <ul>
                                    @forelse($subCategory->child_categories as $childCategory)
                                    <li>
                                        <a href="/{{$childCategory->id}}/childCategorizeProducts">
                                            {{$childCategory->name}}</a>
                                    </li>
                                    @empty
                                        <li>----</li>
                                    @endforelse
                                </ul>
                            </li>
                            @empty
                                <li>----</li>
                            @endforelse
                        </ul>
                    </li>
                    @empty
                        <li>----</li>
                    @endforelse
                    
                    <li>
                        <a href="{{url('/all-categories')}}" class="text-center">All Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

