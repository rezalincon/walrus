
@extends('frontend.master.master')
@section('content')
<head>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.min.css')}}">

    </head>
</head>

<style>
    #oldPhoto{
        width: 100px;
        height: 100px;
    }
    .table100.ver1 th {
  font-size: 18px;
  color: #fff;
  line-height: 1.4;
  color:black;
  background-color: ghostwhite;
.table100.ver1 td{
  font-weight:900;
  font-size: 20px;
  color: #808080;
  line-height: 1.4;
  padding:22px !important;
}


.table100.ver1 .table100-body tr:nth-child(even) {
  background-color: #f8f6ff;
}

/*---------------------------------------------*/

.table100.ver1 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver1 .ps__rail-y {
  right: 5px;
}

.table100.ver1 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver1 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}

.limiter {
  width: 1366px;
  margin: 0 auto;
}

.container-table100 {
  width: 100%;
  min-height: 100vh;
  background: #fff;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}

.wrap-table100 {
  width: 1170px;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th, td {
  font-weight: unset;
  padding-right: 10px;
}

.column1 {
  width: 33%;
  padding-left: 40px;
}

.column2 {
  width: 13%;
}

.column3 {
  width: 22%;
}

.column4 {
  width: 19%;
}

.column5 {
  width: 13%;
}

.table100-head th {
  padding-top: 18px;
  padding-bottom: 18px;
}

.table100-body td {
  padding-top: 16px;
  padding-bottom: 16px;
}

/*==================================================================
[ Fix header ]*/
.table100 {
  position: relative;
  padding-top: 60px;
}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
  max-height: 585px;
  overflow: auto;
}

</style>
<div class="page-content mb-10 pb-2">
    <div class="container">
        <div class="title-link-wrapper appear-animate mt-2 container mb-4">
            <h2 class="title title-link pt-1">Order Details</h2>
            <a href="{{route('customer.profile')}}" class="ls-normal"><i class="w-icon-long-arrow-left"></i>Back </a>
        </div>

      
        <div class="row">
            <div class="col-lg-12">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                        Order Id : #{{$orders[0]->order->order_id}}
                        </h4>
                    </div>
                    <div class=" table100 ver1 m-b-110">
					

					<div style="width:100%;overflow-x:auto" class="table100-body mb-3">
						<table class="table bordered">
							<tbody>
								<tr class="row100 body">
									<th class="cell100 column1">Product Name</th>
									<th class="cell100 column2">Vendor</th>
									<th class="cell100 column3">Price</th>
									<th class="cell100 column4">Payment Method</th>
									<th class="cell100 column5">Qantity</th>
									<th class="cell100 column5">Color</th>
									<th class="cell100 column5">Size</th>
									<th class="cell100 column5">Order Status</th>
									<th class="cell100 column5">Order Date</th>
								</tr>
								 @foreach ($orders as $orders)

								<tr class="row100 body border-bottom">
									<td style="padding:22px" class="cell100 column1"><a href="#">{{$orders->product->name}}</a></td>
									<td style="padding:22px" class="cell100 column2">@if(isset($orders->vendor->shop_name))<a href="#">{{$orders->vendor->shop_name}}</a>@endif</td>
									<td style="padding:22px" class="cell100 column3">{{$orders->product->price}}</td>
									 
									<td style="padding:22px" class="cell100 column4">{{$orders->order->payment_method}}</td>
									<td style="padding:22px" class="cell100 column5">{{$orders->qty}}</td>
									<td style="padding:22px" class="cell100 column5">{{$orders->color}}</td>
									<td style="padding:22px" class="cell100 column5">{{$orders->size}}</td>
									<td style="padding:22px" class="cell100 column5">@if ($orders->order->status == 'pending')
                                                    <span id="order-status" class=" bg-warning text-white">Pending</span>
                                            @elseif($orders->order->status == 'Processing')-->
                                                    <span id="order-status" class=" bg-info text-white">Processing</span>
                                               @elseif($orders->order->status == 'Completed')-->
                                                    <span id="order-status" class=" bg-success text-white">Completed</span>
                                                    @elseif($orders->order->status == 'Declined')-->
                                                    <span id="order-status" class=" bg-danger text-white">Declined</span>
                                                    @elseif($orders->order->status == 'On Delivery')-->
                                                  <span id="order-status" class=" bg-dark text-white">On Delivery</span>
                                               @endif</td>
                                    <td style="padding:22px" class="cell100 column5">{{$orders->order->created_at->format('d-m-Y')}}</td>   
                                 
								</tr>
								   @endforeach

							
							</tbody>
						</table>
					</div>
				</div>
                   
                   
                </div>
            </div>
            <div class="col-lg-6">
                <div class="special-box">
                    <div  class="heading-area">
                        <h4 class="title">
                        Billing Details
                        </h4>
                    </div>
                    <div class="table-responsive-sm border shadow">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="45%">Name</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->name}}</td>
                                </tr>
                                <tr>
                                    <th width="45%">Email</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->email}}</td>
                                </tr>
                                <tr>
                                    <th width="45%">Phone</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->phone}}</td>
                                </tr>
                                <tr>
                                    <th width="45%">Address</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->address}}</td>
                                </tr>
                             
                                <tr>
                                    <th width="45%">City</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->city}}</td>
                                </tr>
                                <tr>
                                    <th width="45%">Zip Code</th>
                                    <th width="10%">:</th>
                                    <td width="45%">{{$orders->order->zip}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>


@endsection
