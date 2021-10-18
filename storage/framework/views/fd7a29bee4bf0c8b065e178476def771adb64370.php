
<?php $__env->startSection('content'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo e(('frontend/assets/css/style.min.css')); ?>">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
</head>


<main class="main cart">
     <input type="text" id="viewCartUserId" value="<?php echo e(isset(Auth::user()->id) ? Auth::user()->id : ''); ?>" hidden>
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li ><h3 class="text-dark">Shopping Cart</h3></li>
            </ul>
        </div>
    </nav>
    <?php if(Session::get('success')): ?>
    <div class="alert text-white container" style="background: #da1630;">
        <?php echo e(Session::get('success')); ?>

    </div>
    <?php endif; ?>
<div class="page-content">
    <div class="container">
        <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
                <table class="shop-table cart-table">
                    <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th>Size</th>
                            <th>Color</th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-quantity"><span>Quantity</span></th>
                            <th class="product-subtotal"><span>Subtotal</span></th>
                        </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>

                <div class="cart-action mb-6">
                    <a href="/" class="btn btn-primary btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                    <button type="submit" class="btn  btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                </div>

            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
                <div class="sticky-sidebar">
                        <hr class="divider mb-6">
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <label>Total</label>
                            <span class="ls-50" id="totalPrice"><?php echo e($sum); ?></span>
                        </div>
                        <a href="<?php echo e(route('checkout')); ?>"
                            class="btn btn-block btn-primary btn-icon-right btn-rounded  btn-checkout" id="btn-checkout">
                            Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of PageContent -->
</main>


    <div class="modal fade bd-example-modal-sm" id="pleaseWaitModal" tabindex="-1" role="dialog" aria-labelledby="pleaseWaitModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content m-0 p-0 text-center" style="background-color: transparent !important; border: none !important;">
                <div>
                    <div class="spinner-grow text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>    

<script src="<?php echo e(asset('frontend/js/view-cart.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('view-cart-script'); ?>

    <script !src="">
        $(document).on('click','.quantity-plus', function () {
            let id = $(this).attr('data-id');
            let a = $(this).parent().find('.quantity').val();
            const userId = $('#viewCartUserId').val();
            productStock(id,(stock) => {

                if(parseInt(a) < parseInt(stock)) {
                    $(this).parent().find('.quantity').val(parseInt(a) + 1);
                    let quantity = $(this).parent().find('.quantity').val();
                    let price = $(this).parent().parent().prev().find('.amount').text();
                    let subtotal = $(this).parent().parent().next().find('.subtotal').text(parseInt(quantity) * parseInt(price));
                    let total = $('#totalPrice').text();
                    $('#totalPrice').text(parseInt(total) + parseInt(price));
                    
                    let qty = $(this).parent().find('.quantity').val();
                    if(userId){
                        storeProductQuantity(userId,id,qty);
                    }
                }else{
                    $(this).attr('disabled',true);
                }
                
            });
        });

        $(document).on('click','.quantity-minus', function () {
            const userId = $('#viewCartUserId').val();
            let id = $(this).attr('data-id');
            $('.quantity-plus').attr('disabled',false);
            let a = $(this).parent().find('.quantity').val();
            if (parseInt(a) > 1){
                $(this).parent().find('.quantity').val(parseInt(a) - 1);
            }
            let quantity = $(this).parent().find('.quantity').val();
            let price = $(this).parent().parent().prev().find('.amount').text();
            let subtotal = $(this).parent().parent().next().find('.subtotal').text();
            let total = $('#totalPrice').text();
            if (parseInt(subtotal) > parseInt(price)){
                $('#totalPrice').text(parseInt(total) - parseInt(price));
            }
            $(this).parent().parent().next().find('.subtotal').text(parseInt(quantity) * parseInt(price));
            
            let qty = $(this).parent().find('.quantity').val();
            if(userId){
                storeProductQuantity(userId,id,qty);
            }
        });

        $(document).on('blur','.quantity',function (){
            let id = $(this).attr('data-id');
            let quantity = $(this).val();
            const userId = $('#viewCartUserId').val();
            productStock(id,(stock)=>{
                if(parseInt(quantity) < parseInt(stock)){
                     if (parseInt(quantity) < 1){
                        $(this).val(1);
                        quantity = 1;
                        }
                        let price = $(this).parent().parent().prev().find('.amount').text();
                        let subtotal = $(this).parent().parent().next().find('.subtotal').text(parseInt(quantity) * parseInt(price));
                        let total = $('#totalPrice').text();
                        let subtotal1 = $('.subtotal');
                        let totalAmount = 0;
                        subtotal1.each(function (index, value){
                            totalAmount = totalAmount + parseInt($(value).text());
                        });
                        $('#totalPrice').text(totalAmount);
                }else{
                    $(this).val(1);
                }
            });
            
            let qty = $(this).val();
            if(userId){
                storeProductQuantity(userId,id,qty);
            }
           
        })

        $(function (){
            $(document).on('click','.view-cart.btn-close', function (){
                let subtotal = $(this).parent().parent().parent().find('.subtotal').text();
                $('#totalPrice').text(parseInt($('#totalPrice').text()) - parseInt(subtotal));
                const cartCount = $('.cart-count');
                const product_id = $(this).attr('data-id');
                const userId = $('#userId').val();
                console.log(product_id, userId)
                let localItems = JSON.parse(localStorage.getItem('items'));
                const filtered = localItems.filter(item => item.id != product_id);
                localStorage.setItem('items',JSON.stringify(filtered));
                $(this).parent().parent().parent().remove();
                $(cartCount).text(parseInt($(cartCount[0]).text()) -1);
                if (userId !== ''){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'DELETE',
                        url: `/${userId}/${product_id}/deleteCartItem`,
                        success: (data)=> {
                            toastr.options = {
                                "timeOut": "3000",
                                "closeButton": true,
                            };
                            toastr['success']('Successfully Removed Cart');
                        },
                        error: (error) => {console.log(error)}
                    })
                }else{
                    toastr.options = {
                                "timeOut": "3000",
                                "closeButton": true,
                            };
                            toastr['success']('Successfully Removed Cart');
                }

            });
        });
        
        function productStock(id,quantity)
        {
            $.ajax({
                type: 'GET',
                url: `/${id}/product-quantity`,
                success: (data) => {
                    quantity(data);
                },
                error: (error) => {
                    console.log(error)
                }
            });
        }
        
        
        function storeProductQuantity(userId, productId, qty)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: `/${userId}/${productId}/storeQuantity`,
                data: {quantity: qty},
                success: (data) => {
                    console.log(data);
                },
                error: (error) => {
                    console.log(error);
                }
            })
        }
        
        $(document).on('click','#btn-checkout',function(e){
           let userId =  $('#userId').val();
           if(!userId){
               e.preventDefault();
                toastr.options = {
                    "timeOut": "3000",
                    "closeButton": true,
                    };
                toastr['error']('You have to login first!!!');
           }
        });
      
        
       
    </script>

    <script>
           $(".alert:not(.not_hide)").delay(5000).slideUp(500, function () {
            $(this).alert('close');
        });
    </script>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/frontend/viewcart.blade.php ENDPATH**/ ?>