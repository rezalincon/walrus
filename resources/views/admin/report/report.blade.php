@extends('admin.layout.master.master')
@section('main-content')
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

</head>

<div class="d-flex flex-row-reverse bd-highlight">
    <div class="btn-group">
        <button class="btn btn-primary todaybtn">Today</button>
        <button class="btn btn-primary lastsevenbtn">Last 7 Days</button>
        <button class="btn btn-primary monthbtn">Last Month</button>
        <button class="btn btn-primary date">Total Sell</button>                          
   </div>
</div>
  

<div class="row">
<div class="col-md-12">

    <div class="row clearfix">
        <div id="all" class="col-lg-12 col-md-12">
                <h5>Total Sales Report</h5>
                <hr>
        <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['saleAll']}}<i class="fa fa-shopping-basket float-right"></i></h3>
                    <span>Products Sold</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['allp']}}<i class="fa fa-dollar float-right"></i></h3>
                    <span>Total Profit</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
            <div class="col-lg-4 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$data['allSellingAmount']}}<i class="fa fa-dollar float-right"></i></h3>
                        <span>Total Selling Amount</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                        <div class="progress-bar" data-transitiongoal="64"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



<div class="row clearfix">
<div id="today" class="col-lg-12 col-md-12">
        <h5>Today's Sales Report</h5>
        <hr>
<div class="row">
<div class="col-lg-4 col-md-6">
    <div class="card overflowhidden">
        <div class="body">
            <h3> {{$data['saleToday']}}<i class="fa fa-shopping-basket float-right"></i></h3>
            <span>Products Sold</span>
        </div>
        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
            <div class="progress-bar" data-transitiongoal="64"></div>
        </div>
    </div>
</div>
    <div class="col-lg-4 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['todayprofit']}} <i class="fa fa-dollar float-right"></i></h3>
                <span>Profit</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                <div class="progress-bar" data-transitiongoal="64"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['todaySellingAmount']}}<i class="fa fa-dollar float-right"></i></h3>
                <span>Total Selling Amount</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                <div class="progress-bar" data-transitiongoal="64"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="row clearfix">
<div id="lastseven" class="col-lg-12 col-md-12">
    <h5>Last 7 Days Sales Report</h5>
    <hr>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['sale7Days']}} <i class="fa fa-shopping-basket float-right"></i></h3>
                    <span>Products Sold</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['sevendayprofit']}} <i class="fa fa-dollar float-right"></i></h3>
                    <span>Profit</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['last7daySellingAmount']}}<i class="fa fa-dollar float-right"></i></h3>
                    <span>Total Selling Amount</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row clearfix">
<div id="month" class="col-lg-12 col-md-12">
    <h5>Last Month's Sales Report</h5>
    <hr>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3> {{$data['sale30Days']}}<i class="fa fa-shopping-basket float-right"></i></h3>
                    <span>Products Sold</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3> {{$data['monthprofit']}}<i class="fa fa-dollar float-right"></i></h3>
                    <span>profit</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3> {{$data['last1monthSellingAmount']}}<i class="fa fa-dollar float-right"></i></h3>
                    <span>Total Selling Amount</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div id="todayr" class="table mt-3">
    <table id="r"class="table table-striped table-hover dataTable js-exportable">

    <thead>
        <tr>
        <th>Order Code</th>
        <th>Date</th>
        <th>Biller Name</th>
        <th>Biller Phone</th>
        <th>Products</th>
        <th>Payment Method</th>
        <th>Shipping Method</th>
        <th>Total</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($today as $row)    
    <tr>   
        <td>{{$row->order_id}}</td>   
        <td>{{$row->created_at->format('d-m-Y') }}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->orderProduct->sum('qty')}}</td>
        <td>{{$row->payment_method}}</td>
        <td>{{$row->shipping_method}}</td>
        <td>{{$row->subtotal}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
<div id="sevenr" class="table mt-3">
    <table id="r"class="table table-striped table-hover dataTable js-exportable">

    <thead>
        <tr>
        <th>Order Code</th>
        <th>Date</th>
        <th>Biller Name</th>
        <th>Biller Phone</th>
        <th>Products</th>
        <th>Payment Method</th>
        <th>Shipping Method</th>
        <th>Total</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($seven as $row)    
    <tr>   
        <td>{{$row->order_id}}</td>   
        <td>{{$row->created_at->format('d-m-Y') }}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->orderProduct->sum('qty')}}</td>
        <td>{{$row->payment_method}}</td>
        <td>{{$row->shipping_method}}</td>
        <td>{{$row->subtotal}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
<div id="lastr" class="table mt-3">
    <table id="r"class="table table-striped table-hover dataTable js-exportable">

    <thead>
        <tr>
        <th>Order Code</th>
        <th>Date</th>
        <th>Biller Name</th>
        <th>Biller Phone</th>
        <th>Products</th>
        <th>Payment Method</th>
        <th>Shipping Method</th>
        <th>Total</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach ($last as $row)    
    <tr>   
        <td>{{$row->order_id}}</td>   
        <td>{{$row->created_at->format('d-m-Y') }}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->orderProduct->sum('qty')}}</td>
        <td>{{$row->payment_method}}</td>
        <td>{{$row->shipping_method}}</td>
        <td>{{$row->subtotal}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>

<script>
    $("#lastseven").hide();
    $("#month").hide();
    $("#sevenr").hide();
    $("#lastr").hide();
    $("#date").hide();
    $("#all").hide();

    

    $(".todaybtn").on("click", function() {
        $("#today").show();
        $("#todayr").show();
        $("#lastseven").hide();
        $("#month").hide();
        $("#sevenr").hide();
        $("#lastr").hide();
        $("#date").hide();
        $("#all").hide();



        });

        $(".lastsevenbtn").on("click", function() {
        $("#today").hide();
        $("#lastseven").show();
        $("#month").hide();
        $("#todayr").hide();
        $("#sevenr").show();
        $("#lastr").hide();
        $("#date").hide();
        $("#all").hide();



        });

        $(".monthbtn").on("click", function() {
        $("#today").hide();
        $("#lastseven").hide();
        $("#month").show();
        $("#todayr").hide();
        $("#sevenr").hide();
        $("#lastr").show();
        $("#date").hide();
        $("#all").hide();
        });
        $(".date").on("click", function() {
        $("#today").hide();
        $("#lastseven").hide();
        $("#month").hide();
        $("#todayr").hide();
        $("#sevenr").hide();
        $("#lastr").hide();
        $("#date").show();
        $("#all").show();
        });



</script>
@endsection