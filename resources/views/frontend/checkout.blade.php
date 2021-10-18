@extends('frontend.master.master')
@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{('frontend/assets/css/style.min.css')}}">
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

</head>

        <main class="mains checkouts">
            <nav class="breadcrumb-navs">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="{{route('view.cart')}}">Shopping Cart</a></li>
                        <li class="active"><a href="#">checkouts</a></li>
                    </ul>
                </div>
            </nav>

            <div class="page-content">
                <div class="container">


                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation" id="checkout-form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Billing Details
                                </h3>
                                <div class="row gutter-sm">

                                    <div class="">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Name *</label>
                                            <input  placeholder="Enter your name"  value="{{$users->name }}"  style="border: 1px solid gray" type="text" id="customer_name" class="form-control form-control-md text-dark" name="name"
                                            required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Street address *</label>
                                    <input style="border: 1px solid gray" type="text" placeholder="House number and street name"
                                        class="form-control text-dark form-control-md mb-2" name="address" value="{{$users->address }}" required>

                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">Town / City *</label>
                                            <input placeholder="Enter city" value="{{$users->city}}" style="border: 1px solid gray" type="text" class="form-control text-dark form-control-md" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark">ZIP *</label>
                                            <input placeholder="Enter Zip" value="{{$users->zip}}" style="border: 1px solid gray" type="text" class="form-control  text-darkform-control-md" name="zip" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input style="border: 1px solid gray" type="number" class="form-control form-control-md" name="phone" required id="phone">
                                            <small id="phoneError" style="color: red"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-7">
                                    <label class="font-weight-bold text-dark">Email address *</label>
                                    <input style="border: 1px solid gray" value="{{$users->email}}" placeholder="Enter email" type="email" class="form-control  text-darkform-control-md" name="email" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label  class="font-weight-bold text-dark"for="order-notes">Order notes (optional)</label>
                                    <textarea style="border: 1px solid gray" class="form-control mb-0 text-dark" id="note" name="note" cols="30"
                                        rows="4"
                                        placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="order-summary-wrapper sticky-sidebar">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table style="table-layout: fixed; width: 100%" class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($carts as $item)
                                                <tr class="bb-no">
                                                    <td style="word-wrap: break-word"  class="product-name">{{$item->name}}<i
                                                            class="fas fa-times"></i> <span
                                                            class="product-quantity">{{$item->qty}}</span></td>
                                                    <td  class="product-total">{{$item->qty*$item->price}}</td>
                                                </tr>
                                                @empty
                                                    <p class="text-danger">Product Not Found</p>
                                                @endforelse


                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Subtotal</b>
                                                    </td>
                                                    <td>
                                                        <b>{{$sum}}</b>
                                                        <input type="text" value="{{$sum}}" name="subtotal" hidden id="subtotal">
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="shipping-methods">
                                                    <td colspan="2" class="text-lefts">
                                                        <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                        </h4>
                                                           @forelse ($ship as $item)
                                                           <li>
                                                                <input type="radio" value="{{$item->price}}{{$item->title}}" class="ship" id="ship" name="ship">
                                                                <label class="color-dark">{{$item->title}}: {{$item->price}}</label>
                                                            </div>
                                                        </li>
                                                           @empty

                                                           @endforelse

                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>
                                                        <b id="total"></b>
                                                        <input id="t"  value=" " hidden name="total">

                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                            <div class="accordion payment-accordion">
                                                @if($isOnlinePayment == 0)
                                                <div class="cards">
                                                    <input id="cashOnCheckBox" type="radio" value="cash on" name="payment" checked>
                                                    <label class="color-dark">Cash On Delivery</label>
                                                </div>
                                                <div class="cards">
                                                    <input id="onlinePayChackBox"  type="radio" value="online" name="payment">
                                                    <label class="color-dark">Online Payment</label>
                                                    <button hidden id="onlinepay" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>

                                                </div>
                                                @else
                                                <div class="cards">
                                                    <button id="onlinepay" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                                </div>
                                                @endif

                                            </div>
                                        </div>

                                   @if($isOnlinePayment == 0)
                                        <div class="form-group place-order pt-6">
                                            
                                            <button type="submit" class="btn btn-primary btn-block btn-rounded" id="place-orderBtn">Place Order</button>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>


  <script>

 //$("#place-orderBtn").attr("disabled","disabled");




 $("input:radio").first().click();

 $("input:radio:first").prop("checked:true",function() {
var amount = parseInt($(this).val()) + parseInt($("#subtotal").val());
$("#total").text(amount);
$("#t").val(amount);


});

$('.ship').on("change", function() {
 var amount = parseInt($(this).val()) + parseInt($("#subtotal").val());
$("#total").text(amount);
$("#t").val(amount);

});

$('#place-orderBtn').on('click',function (e) {
    $('#checkout-form').attr('action',"{{ url('/ordercompelete') }}");

})
$('#onlinepay').on('click',function (e) {
    $('#checkout-form').attr('action',"{{ url('/amarpayment') }}");

})

$('#onlinePayChackBox').on('change',function(e){
    if($(this).prop('checked') == true){
        $('#phonenum').attr('hidden',true);
        $('#tranid').attr('hidden',true);
        $('#place-orderBtn').attr('hidden',true);
        $('#onlinepay').attr('hidden',false);
    }
});

$('#cashOnCheckBox').on('change',function() {
    if($(this).prop('checked') == true){
        $('#place-orderBtn').attr('hidden',false);
        $('#phonenum').attr('hidden',false);
        $('#tranid').attr('hidden',false);
        $('#onlinepay').attr('hidden',true);
    }
})


 $(document).on('submit','#checkout-form',function (e){
     let phone = $('#phone').val();
     let regex = new RegExp(/^(?:\+88|88)?(01[3-9]\d{8})$/);
     if (phone){
         if (regex.test(phone)){
             $('#phoneError').text('');
         }else{
             e.preventDefault();
             $('#phoneError').text('Your phone number is invalid!!');
         }
     }

     if (!navigator.onLine){
         toastr.options = {
             "timeOut": "3000",
             "closeButton": true,
         };
         toastr['error']('You are in Offline!!!');
         e.preventDefault();
     }
 })

</script>

@endsection
