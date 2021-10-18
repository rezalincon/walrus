@extends('admin.layout.master.master')


@section('main-content')
    <div class="div1">
        <div class="row my-4">
            <div class="col-md-12">
            </div>

        </div>

        @if(Session::get('success'))
        <div class="alert text-white container" style="background: #3daa1b;">
            {{ Session::get('success') }}
        </div>
        @endif
         <form method="post" action="{{route('productUpdate', $product->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">

                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Name</b></span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Product Name"
                                            aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{$product->name}}">
                                    </div>
                                    @error('name')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"> <span style="font-size: 18px;"><b>Product Sku</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" placeholder="dRE6871FNk"
                                            aria-label="Product" aria-describedby="basic-addon1" name="sku"  value="{{$product->sku}}">
                                    </div>
                                     @error('sku')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Category</b></span></label>
                                    <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="category_id" id="categoryId">
                                        <option value="" data-display="Select">Select Category</option>
                                        @forelse($categories as $row)
                                            <option {{$product->category_id == $row->id ? 'selected': ''}} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @empty
                                            <option value="">No Categories Added</option>
                                        @endforelse
                                    </select>
                                    </div>
                                     @error('category_id')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Sub Category</b></span></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="subcategory_id" id="subcategoryId">
                                        <option value="" data-display="Select">Select Subcategory</option>
                                        @forelse($subcategories as $row)
                                            <option {{$product->subcategory_id == $row->id ? 'selected': ''}} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @empty
                                            <option value="">No Subcategories Added</option>
                                        @endforelse
                                    </select>
                                    </div>
                                      @error('subcategory_id')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b> Child
                                                Category</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="childcategory_id" id="categoryId">
                                        <option value="" data-display="Select">Select Category</option>
                                        @forelse($childcategories as $row)
                                            <option {{$product->category_id == $row->id ? 'selected': ''}} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @empty
                                            <option value="">No Categories Added</option>
                                        @endforelse
                                    </select>

                                    </div>
                                     @error('childcategory_id')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                     <label for="basic-url"><span style="font-size: 18px;"><b>Brand</b></span></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                    </div>
                                    <select class="form-control" name="brand_id" id="subcategoryId">
                                        <option value="" data-display="Select">Select Subcategory</option>
                                        @forelse($brand as $row)
                                            <option {{$product->brand_id == $row->id ? 'selected': ''}} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @empty
                                            <option value="">No Brand Added</option>
                                        @endforelse
                                    </select>

                                    </div>
                                     @error('brand_id')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"> <span style="font-size: 18px;"><b>Feature
                                                Image</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                          <img  class="img-fluid" src="{{ asset($product->photo)}}" id="fetureImage" height="60px" width="100%">
                                          <br>
                                          <br>
                                          <br>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fetureInput" name="photo">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                     @error('photo')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                             <label for="basic-url"> <span style="font-size: 18px;"><b>Product Gallery
                                        Images</b></span></label>
                    <div class="row">
                          @foreach($gallery as $data)
                            <div class="colum">

                              <img  class="img-fluid" src="{{asset('uploads')}}/product-gallery/{{$data->image_file}}" id="fetureInputGallery" style="height: 100px;width: 180px;">

                      </div>
                       @endforeach

                  </div>
                  <br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    {{-- <span class="input-group-text">Set Gallery</span> --}}
                                </div>
                                          <br>
                                <div class="custom-file">
                                  <form id='post-form' class='post-form' method='post'>

                                    <input id='files' class="custom-file-input" name="image_file[]" type='file' id="galleryInput" multiple/>
                                    <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                                     <output id='result' />
                                    </form>
                                </div>
                            </div>
                                 @error('image_file')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror

                            <div class="row my-5">
                                {{-- <div class="col-md-4"></div> --}}
                                {{-- <div class="col-md-4"> --}}
                                <div class="fancy-checkbox mx-5">
                                    {{-- <label><input type="checkbox" id="checked" onclick="valueChanged()"><span
                                            style="font-size: 18px;">Allow Estimated Shipping Time</span></label> --}}
                                </div>

                                <div class="my-3 col-md-12" id="field" >

                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Estimated Shipping
                                                Time</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <input type="text" class="form-control" placeholder="Estimated Shipping Time"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="ship" value="{{$product->ship}}">
                                    </div>
                                </div>
                                <div>
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Sizes</b></span></label>
                                </div>

                                <div class="fancy-checkbox mx-5">
                                    {{-- <label><input type="checkbox" id="checked1" onclick="valueChanged1()"><span
                                            style="font-size: 18px;">Allow Product Sizes</span></label> --}}

                                </div>
                                <div class="my-3 col-md-12" id="field1" >
                                    <div class="row" id="size">
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Name :</b> (eg.
                                                    S,M,L,XL,XXL,3XL,4XL)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    {{-- <span class="input-group-text">Shirt</span> --}}
                                                </div>
                                                @foreach(explode(',',rtrim($product->size, ',')) as $fields)
                                                <div id="size_name">
                                                <input type="text" class="form-control" placeholder="Size Name"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" name="size[]" value="{{$fields}}"><br>
                                                </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Qty :</b> (Number
                                                    of
                                                    quantity of this size)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    {{-- <span class="input-group-text">Shirt</span> --}}
                                                </div>
                                                @foreach(explode(',',rtrim($product->size_qty, ',')) as $fields)
                                                <div id="size_qty">
                                                <input type="text" class="form-control"
                                                    aria-label="Product Name" aria-describedby="basic-addon1" placeholder="Size Qty"
                                                    name="size_qty[]" value="{{$fields}}"> <br>
                                                </div>
                                                    @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basic-url"><span style="font-size: 15px;"><b>Size Price :</b> (It will be base price)
                                                </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    {{-- <span class="input-group-text">Shirt</span> --}}
                                                </div>
                                                <div class="row" id="size_price">
                                                    <div class="col-md-9">
                                                        @foreach(explode(',',rtrim($product->size_price, ',')) as $fields)
                                                            <div>
                                                                <input type="txt" min="0"  step="0.01" class="form-control"
                                                                       placeholder="0" aria-label="Product Name"
                                                                       aria-describedby="basic-addon1" name="size_price[]"  value="{{$fields}}"> <br>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-3">
                                                            <span></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-success" id="addSizeBtn">Add More Sizes <i class="fa fa-plus"></i></button>
                                        </div>

                                    </div>
                                   <!--  <div class="row my-4">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <a id="addSize" class="btn btn-outline-primary"><i class="fa fa-plus"> Add
                                                More Size</i></a>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div> -->
                                </div>


                                <div class="fancy-checkbox ml-5">
                                    {{-- <label><input type="checkbox" id="checked2" onclick="valueChanged2()"><span
                                            style="font-size: 18px;">Allow Product Colors</span></label> --}}
                                </div>

                                @if (!empty($product->color))


                                <div class="my-3 col-md-12" id="field2">
                                    <label for="basic-url"><span style="font-size: 18px;"><b> Product Colors </b></span>
                                        (Choose
                                        Your Favorite Colors,Separate with comma)</label>
                                    <div class="input-group" >
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <div class="col-md-12" id="color">
                                            <div class="row" id="addMoreColor">
                                                <div class="col-md-7">
                                                    @foreach(explode(',', rtrim($product->color, ',')) as $fields)
                                                        <input type="text" width="80%" value="{{$fields}}" class="form-control" placeholder="Enter Product Color"
                                                               aria-label="Product Name" aria-describedby="basic-addon1" name="color[]" >
                                                    @endforeach
                                                </div>
                                                <div class="col-md-5">
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <button type="button" style="margin-left: 20%" class="btn btn-sm btn-success" id="moreColorBtn">Add more color <i class="fa fa-plus"></i></button>
                                        </div>
                                </div>
                                    <!-- <div class="row my-5">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            {{-- <button style="font-size: 18px;"
                                                class="btn btn-outline-primary" ><i class="fa fa-plus"> Add
                                                    More Color</i></button> --}}
                                                    <a id="addColor" class="btn btn-outline-primary"><i class="fa fa-plus"> Add
                                                        More Color</i></a>
                                                </div>
                                        <div class="col-md-3"></div>
                                    </div> -->
                                </div>
                                @endif
                                {{-- </div> --}}
                                {{-- <div class="col-md-4"></div> --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Current
                                                Price</b></span> (In
                                        BDT)</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <input type="number" min="0" step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product Name" aria-describedby="basic-addon1"
                                            name="price" value="{{$product->price}}" >
                                    </div>
                                     @error('price')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Offer
                                                Price</b></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">@</span> --}}
                                        </div>
                                        <input type="number" min="0"  step="0.01" class="form-control"
                                            placeholder="e.g 20" aria-label="Product" aria-describedby="basic-addon1"
                                            name="previous_price" value="{{$product->previous_price}}">
                                    </div>
                                     @error('previous_price')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><strong>Offer Product</strong></span>
                                        (amount)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="offerproduct" id="">
                                             @if($product->offer_product==1)
                                            <option value="1">Yes</option>
                                            @endif
                                            @if($product->offer_product==0)
                                            <option value="0">No</option>
                                            @endif
                                            <option disabled>Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product Stock</b></span> (Leave
                                        Empty
                                        will Show Always Available)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <input type="number" class="form-control" placeholder="e.g 20"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="stock" value="{{$product->stock}}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Want to Feature</b></span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <select class="form-control" name="feature">
                                            @if($product->featured==1)
                                            <option value="1">Yes</option>
                                            @endif
                                            @if($product->featured==0)
                                            <option value="0">No</option>
                                            @endif
                                            <option disabled>Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Product
                                                Description</b></span></label>
                                     <div class="form-floating">
                                        <textarea class="form-control" placeholder="Enter Description"
                                            id="summernote" name="details" s>{!! $product->details !!}</textarea>
                                    </div>
                                     @error('details')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12 ">

                                    <hr>
                                    @if($product->online_payment == 1)
                                        <label for="basic-url"><span style="font-size: 18px;"><b>Online Payment Only</b></span></label>
                                        <div class="fancy-checkbox mt-3">
                                            <input type="hidden" name="online_payment" value="0">
                                            <label><input type="checkbox" name="online_payment" value="1" checked><span>Check if only online payment is applicable</span></label>
                                        </div>
                                        @endif
                                    @if($product->online_payment == 0)
                                        <label for="basic-url"><span style="font-size: 18px;"><b>Online Payment Only</b></span></label>
                                        <div class="fancy-checkbox mt-3">
                                            <input type="hidden" name="online_payment" value="0">
                                            <label><input type="checkbox"  name="online_payment" value="1"><span>Check if only online payment is applicable</span></label>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Youtube Video URL</b></span>
                                        (Optional)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Youtube Video URL"
                                            aria-label="Product Name" aria-describedby="basic-addon1" name="youtube" value="{{$product->youtube}}">
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="basic-url"><span style="font-size: 18px;"><b>Tags</b></span> (Seperate with
                                        comma)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            {{-- <span class="input-group-text">Shirt</span> --}}
                                        </div>
                                        <input type="text" class="form-control" aria-label="Product Name"
                                            aria-describedby="basic-addon1" name="tags" value="{{$product->tags}}">
                                    </div>
                                     @error('tags')
                                        <p class="form-text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class=" col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary theme-bg gradient btn-round p-3 px-5"
                                        style="font-size: 22px;"><b>Update Product</b></button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <script>
            function valueChanged() {
                var checkBox = document.getElementById("checked");
                var text = document.getElementById("field");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
        <script>
            function valueChanged1() {
                var checkBox = document.getElementById("checked1");
                var text = document.getElementById("field1");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
        <script>
            function valueChanged2() {
                var checkBox = document.getElementById("checked2");
                var text = document.getElementById("field2");
                if (checkBox.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }
        </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
         $(document).ready(function() {
              $('#summernote').summernote();});
        </script>
    </div>
    <script type="text/javascript">
  fetureInput.onchange = evt => {
  const [file] = fetureInput.files
  if (file) {
          fetureImage.src = URL.createObjectURL(file)
  }
}
</script>

<script type="text/javascript">
  fetureInputGallery.onchange = evt => {
  const [file] = fetureInputGallery.files
  if (file) {
          galleryInput.src = URL.createObjectURL(file)
  }
}
</script>

    <script>
        $(function (){
            $('#addSizeBtn').on('click',function (){
                $('#size_name').append(`
                    <input type="text" class="form-control" placeholder="Size Name"
                     aria-label="Product Name" aria-describedby="basic-addon1" name="size[]" value=""><br>
                `);

                $('#size_qty').append(`
                    <input type="text" class="form-control" placeholder="Size Qty"
                         aria-label="Product Name" aria-describedby="basic-addon1"
                         name="size_qty[]" value=""> <br>
                `);

                $('#size_price').append(`
                <div class="col-md-9">
                <div>
                    <input type="txt" min="0"  step="0.01" class="form-control"
                           placeholder="0" aria-label="Product Name"
                           aria-describedby="basic-addon1" name="size_price[]"> <br>
                </div>
                </div>
                <div class="col-md-3">
                        <button type="button" class="btn btn-sm btn-danger remove-row"><i class="fa fa-minus"></i></button>
                </div>
                `);
            })
        });

        $(document).ready(function () {
            $(document).on('click','.remove-row',function (){
                let sizeName = $('#size_name input');
                let sizeBr = $('#size_name br');
                sizeName[$(sizeName).length -1].remove();
                sizeBr[$(sizeBr).length -1].remove();

                let sizeQty = $('#size_qty input');
                let sizeQtyBr = $('#size_qty br');
                sizeQty[$(sizeQty).length - 1].remove();
                sizeQtyBr[$(sizeQtyBr).length - 1].remove();

                $(this).parent().prev().remove();
                $(this).parent().remove();
            });
        });

        $(function (){
            $('#moreColorBtn').on('click', function () {
                $('#addMoreColor').append(`
                <div class="col-md-7 mt-2">
                <input type="text" width="80%" value="" class="form-control" placeholder="Enter Product Color"
                    aria-label="Product Name" aria-describedby="basic-addon1" name="color[]" >
                </div>
                <div class="col-md-5 mt-2">
                    <button type="button" class="btn btn-sm btn-danger removeColorBtn"><i class="fa fa-minus"></i></button>
                </div>
`);
            });

            $(document).on('click','.removeColorBtn',function(){
                $(this).parent().prev().remove();
                $(this).parent().remove();
            });
        })

    </script>
     <script>
           $(".alert:not(.not_hide)").delay(5000).slideUp(700, function () {
            $(this).alert('close');
        });
    </script>


@endsection
