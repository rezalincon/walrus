@extends('vendor.layout.master.master')
@section('main-content')

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <h1>
                <strong>All Orders</strong></h1>
            <span>Dashboard</span> <i class="fa fa-angle-right"></i>
            <span>All Orders</span>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">

            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Customer Email</th>
                                <th>Order Code</th>
                                <th>Total QTY</th>
                                <th>Total Cost</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Update Status</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                 <th>#ID</th>
                                <th>Customer Email</th>
                                <th>Order Code</th>
                                <th>Total QTY</th>
                                <th>Total Cost</th>
                                <th>Status</th>
                                <th>Update Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($orders as $order)
                                <tr data-id="{{$order->order_id}}">
                                     <td>{{$order->order_id}}</td>
                                    <td>{{$order->order->email}}

                                    <td>{{$order->order->order_id}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->qty*$order->product->price}}</td>
                                    <td>
                                        @if ($order->vendor_status == 'Pending')
                                            <span class="badge bg-warning text-white">Pending</span>
                                        @elseif($order->vendor_status =='On Delivery')
                                            <span class="badge bg-primary text-white">On Delivery</span>
                                        @elseif($order->vendor_status =='Declined')
                                            <span class="badge bg-danger text-white">Declined</span>
                                        @endif
                                    </td>

                                    <td>
                                        <input type="hidden" id="email" name="email" value="{{$order->order->email}}">
                                        <select name="" class="theme-bg " data-id="{{$order->id}}" id="selectStatus" >
                                            <option class="text-dark" value="pending" {{$order->vendor_status == "pending" ? 'selected' : ''}}>Pendi'ng</option>
                                            <option class="text-dark" value="On Delivery" {{$order->vendor_status == "On Delivery" ? 'selected' : ''}}>On Deli'very</option>
                                            <option class="text-dark" value="Declined" {{$order->vendor_status == "Declined" ? 'selected' : ''}}>Decli'ned</option>
                                        </select>

                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/vendor/orders/{{$order->id}}/vendorOrderDetails">View Details</a>
                                                <a class="dropdown-item" href="{{route('vendor.invoice',$order->id)}}">View Invoice</a>
                                            </div>
                                        </div>


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

        //Status update ajax
        $(document).ready(function () {
        $(document).on('change','#selectStatus',function () {
        let status = $(this).val();
        let id = $(this).attr('data-id');
        let email = $(this).prev().val();
        let selectUpdate = $(this).parent().prev();
        $.ajax({
            type: 'GET',
            url: `/vendor/orders/${id}/vendorupdateOrderStatus`,
            data: {'vendor_status': status,
                 'email':email},
            success: (data) => {
                toastr.options = {
                    "timeOut": "2000",
                    "closeButton": true,
                };
                toastr['success'](data);

                if (status == 'pending'){
                    $(selectUpdate).html(`
                            <span class="badge bg-warning text-white">${status}</span>
                        `)
                }else if (status == 'Processing') {
                    $(selectUpdate).html(`
                            <span class="badge bg-info text-white">${status}</span>
                        `)
                }else if (status == 'Completed') {
                    $(selectUpdate).html(`
                            <span class="badge bg-success text-white">${status}</span>
                        `)
                }else if (status == 'On Delivery') {
                    $(selectUpdate).html(`
                            <span class="badge bg-primary text-white">${status}</span>
                        `)
                }else if (status == 'Declined') {
                    $(selectUpdate).html(`
                            <span class="badge bg-danger text-white">${status}</span>
                        `)
                }
            },
            error: (error) => {
                console.log(error);
                }
            })
        });
        });
    </script>



@endsection
