@extends('vendor.layout.master.master')


@section('main-content')

    <div class="row my-4">
        <div class="col-md-12">
            <h3><b>Products</b></h3>
        </div>
        <div class="col-md-12">
            <h6><a href="">Dashboard ></a> <a href="">Products ></a> <a href="">All Products > </a> <a href="">Add
                    Product</a></h6>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="body">
                    <div class="row my-3">
                        <div class="col-md-5"></div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-4 d-flex flex-row-reverse">
                            <a href="{{ route('vendor.addproduct') }}" class="btn btn-primary theme-bg gradient btn-round"><i
                                    class="fa fa-plus"></i><b>
                                    Add New Product</b></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                    {{-- <th class="text-right">Sales</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $row)
                                    <tr>
                                        <td>{{ $row->name }}<br> <small>Id: {{ $row->id }}</small> <small>SKU:
                                                {{ $row->sku }}</small> <small>Vendor: </small></td>
                                        <td>Physical</td>
                                        <td>{{ $row->stock }}</td>
                                        <td>{{ $row->price }}BDT</td>
                                        <td>
                                            <span class="badge bg-{{ $row->status == 1 ? 'warning' : 'danger' }} text-white">
                                                {{ $row->status == 1 ? 'Active' : 'Deactive' }}</span>
                                        </td>
                                        <td>
                                            {{-- <button data-id="{{$row->id}}" data-toggle="modal" data-target="#editProductModal" class="btn btn-primary btn-round mr-1 editBtn" style="cursor: pointer" type="button"><i class="fa fa-edit"></i> Edit</button> --}}
                                            <a  href="{{ route('vendor.productEdit', $row->id) }}"
                                                class="btn btn-primary btn-round deleteBtn" style="cursor: pointer"
                                                type="submit"><i class="fa fa-edit"></i> Edit</a>
                                            <a  href="{{ route('vendor.productDelete', $row->id) }}"
                                                class="btn btn-danger btn-round deleteBtn" style="cursor: pointer"
                                                type="submit"><i class="fa fa-trash"></i></a>

                                            <a href="{{ route('vendor.productView', $row->id) }}"
                                                class="btn btn-info btn-round deleteBtn" style="cursor: pointer"
                                                type="submit"><i class="fa fa-eye"></i></a>
                                        </td>
                                    @empty
                                        <td colspan="5" class="text-center">No data Available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>


    {{-- Edit Product modal starts --}}
    {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" id="editProductModal" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel">EDIT PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form method="post" id="edit-product-form" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card">

                                            <div class="body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"><span style="font-size: 18px;"><b>Product
                                                                    Name</b></span>
                                                        </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <span class="input-group-text">Shirt</span> --}}
                                                            {{-- </div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Product Name" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="name" id="edit-name">

                                                        </div>
                                                    </div> --}}

                                                    {{-- product id input file --}}
                                                    {{-- <input type="text" id="product-id" name="id" hidden>

                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"> <span style="font-size: 18px;"><b>Product
                                                                    Sku</b></span></label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <span class="input-group-text">@</span> --}}
                                                            {{-- </div>
                                                            <input type="text" class="form-control" placeholder="dRE6871FNk"
                                                                aria-label="Product" aria-describedby="basic-addon1"
                                                                name="sku" id="edit-sku">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"><span
                                                                style="font-size: 18px;"><b>Category</b></span></label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                                                            {{-- </div>
                                                            <select class="form-control" name="category_id"
                                                                id="edit-categoryId">
                                                                <option value="" data-display="Select">Select Category
                                                                </option>
                                                                @forelse($categories as $row)
                                                                    <option value="{{ $row->id }}">
                                                                        {{ $row->name }}</option>
                                                                @empty
                                                                    <option value="">No Categories Added</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"><span style="font-size: 18px;"><b>Sub
                                                                    Category</b></span></label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                                                            {{-- </div>
                                                            <select class="form-control" name="subcategory_id"
                                                                id="edit-subcategoryId">
                                                                <option value="" data-display="Select">Select Subcategory
                                                                </option>
                                                                @forelse($subcategories as $row)
                                                                    <option value="{{ $row->id }}">
                                                                        {{ $row->name }}</option>
                                                                @empty
                                                                    <option value="">No Subcategories Added</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <span style="color: red" class="editCatImageError"></span>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroup-sizing-default">Featured Image *</span>
                                                            </div>
                                                            <input type="file" name="photo" class="dropify edit-photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <img width="100%" height="200px" id="oldPhoto"
                                                            style="margin-top: 37px" src="" alt="">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-6">
                                                        <span style="color: red" class="editCatImageError"></span>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="inputGroup-sizing-default">Product Gallery Image
                                                                </span>
                                                            </div>
                                                            <input type="file" name="file" class="dropify edit-photo"
                                                                multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <img width="100%" height="200px" id="oldPhoto"
                                                            style="margin-top: 37px" src="" alt="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"><span style="font-size: 18px;"><b>Product
                                                                    Current
                                                                    Price</b></span></label>
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <span class="input-group-text">Shirt</span> --}}
                                                            {{-- </div>
                                                            <input type="number" min="0" value="0" step="0.01"
                                                                class="form-control" placeholder="e.g 20"
                                                                aria-label="Product Name" aria-describedby="basic-addon1"
                                                                name="price" id="edit-price">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12">
                                                        <label for="basic-url"><span style="font-size: 18px;"><b>Product
                                                                    Stock</b></span> </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"> --}}
                                                                {{-- <span class="input-group-text">Shirt</span> --}}
                                                            {{-- </div>
                                                            <input type="number" class="form-control" placeholder="e.g 20"
                                                                aria-label="Product Name" aria-describedby="basic-addon1"
                                                                name="stock" id="edit-stock">
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>

                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default closeBtn" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}

    @endsection


    @section('page-stylesheet')
        <!--<link rel="stylesheet" href="{{ asset('/backend/assets/css/nice-select.css') }}">-->

    @endsection
    @section('page-scripts')
        <!--<script src="{{ asset('/backend/assets/js/jquery.nice-select.js') }}"></script>-->
        <script !src="">
            // $(document).ready(function() {
            //     $('select').niceSelect();
            // });
        </script>
        <script src="{{ asset('/backend/js/product.js') }}"></script>

    @endsection
