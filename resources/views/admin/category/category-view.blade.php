@extends('admin.layout.master.master')

@section('main-content')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h1><strong>Main Categories</strong></h1>
                <span>Dashboard</span> <i class="fa fa-angle-right"></i>
                <span>Manage Categories</span> <i class="fa fa-angle-right"></i>
                <span>Categories</span>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <button class="btn btn-success btn-round" id="addCategoryBtn" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus"></i> Add Category</button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Commission</th>
                                <th>Status</th>
                                <th>Is Featured</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Commission</th>
                                <th>Status</th>
                                <th>Is Featured</th>
                                <th>Options</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($categories as $row)
                            <tr data-id="{{$row->id}}">
                                <td>{{$row->name}}</td>
                                <td>{{$row->slug}}</td>
                                <td>{{$row->commision}} %</td>

                                <td>
                                    <select class="theme-bg" name=""  data-id="{{$row->id}}" id="selectStatus">
                                        <option value="1" {{$row->status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$row->status == 0 ? 'selected' : ''}}>Deactive</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="theme-bg" name=""  data-id="{{$row->id}}" id="isFeatured">
                                        <option value="1" {{$row->is_featured == 1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$row->is_featured == 0 ? 'selected' : ''}}>No</option>
                                    </select>
                                </td>
                                <td>
                                    <button data-id="{{$row->id}}" data-toggle="modal" data-target="#editCategoryModal" class="btn btn-primary btn-round mr-1 editBtn" style="cursor: pointer" type="button"><i class="fa fa-edit"></i> Edit</button>
                                    <button data-id="{{$row->id}}" class="btn btn-danger btn-round deleteBtn" style="cursor: pointer" type="submit"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5" class="text-center">No data Available</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{--Add category Modal starts--}}
    <div class="modal ml-5 fade bd-example-modal-lg" tabindex="-1" id="addCategoryModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel"><strong>ADD NEW CATEGORY</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form action="" id="add-category-form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default" ><strong>Category Name*</strong></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Enter Category Name" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default" ><strong>Slug*</strong></span>
                                    </div>
                                    <input type="text" class="form-control" id="slug" name="slug" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Enter Slug" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Commision By Category Parcentage*</strong></span>
                                    </div>
                                    <input type="number" step="0.01"class="form-control" id="commision" name="commision" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Commision Parcent" required>
                                    <span style="font-size: 30px;">%</span>
                                </div>

                                <span style="color: red" class="catImageError"></span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Category Image *</strong></span>
                                    </div>
                                    <input type="file" name="photo" class="dropify photo" required>
                                </div>

                                <!-- <div class="input-group mb-3">
                                    <div class="fancy-checkbox">
                                        <label><input type="checkbox" class="is_featured" id="is_featured" name="is_featured" value="0"><span>Allow Featured Category</span></label>
                                    </div>
                                </div> -->

                                <!-- <div class="feature-category" hidden>
                                    <span style="color: red" class="featuredImageError"></span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Featured Image *</span>
                                        </div>
                                        <input type="file" name="image" class="dropify image">
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary theme-bg gradient">Save Category</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closeBtn" data-dismiss="modal"><b>Close</b></button>
                </div>
            </div>
        </div>
    </div>
    {{--Add Category Modal ends--}}

    {{--Edit Category modal starts--}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="editCategoryModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="myLargeModalLabel"><strong>EDIT CATEGORY</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <form action="" id="edit-category-form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Category Name*</strong></span>
                                    </div>
                                    <input type="text" class="form-control" id="edit-name" name="name" placeholder="Enter Category Name" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                </div>

                                {{--category id input file--}}
                                <input type="text" id="category-id" name="id" hidden>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Slug*</strong></span>
                                    </div>
                                    <input type="text" class="form-control" id="edit-slug" name="slug" placeholder="Enter Slug" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><strong>Commision By Category Parcentage*</strong></span>
                                    </div>
                                    <input type="number" step="0.01"class="form-control" id="edit-commision" name="commision" placeholder="Commision Parcent" aria-label="Default" aria-describedby="inputGroup-sizing-default" required><span style="font-size: 30px;">%</span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <span style="color: red" class="editCatImageError"></span>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Category Image *</strong></span>
                                            </div>
                                            <input type="file" name="photo" class="dropify edit-photo">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="100%" height="200px" id="oldPhoto" style="margin-top: 37px" src="" alt="">
                                    </div>
                                </div>


                                <!-- <div class="input-group mb-3">
                                    <div class="fancy-checkbox">
                                        <label><input type="checkbox" class="is_featured" id="is_featured" name="is_featured" value="0"><span>Allow Featured Category</span></label>
                                    </div>
                                </div> -->

                                <!-- <div class="feature-category" hidden>
                                    <div class="row">
                                        <div class="col-6">
                                            <span style="color: red" class="editFeaturedImageError"></span>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Featured Image *</span>
                                                </div>
                                                <input type="file" name="image" class="dropify edit-image">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <img width="100%" height="200px" id="oldImage" style="margin-top: 37px" src="" alt="">
                                        </div>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary theme-bg gradient">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closeBtn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Edit Category modal ends--}}


@endsection
@section('page-stylesheet')
    <!--<link rel="stylesheet" href="{{asset('/backend/assets/css/nice-select.css')}}">-->

@endsection
@section('page-scripts')
    <!--<script src="{{asset('/backend/assets/js/jquery.nice-select.js')}}"></script>-->
    <script !src="">
        // $(document).ready(function () {
        //     $('select').niceSelect();
        // });
    </script>
    <script src="{{asset('/backend/js/category.js')}}"></script>

@endsection
