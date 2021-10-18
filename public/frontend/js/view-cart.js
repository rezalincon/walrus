$(function (){
    
        const userId = $('#viewCartUserId').val();
        if (!userId){
            const cartItems = JSON.parse(localStorage.getItem('items'));
            let totalPrice = 0;
            if (cartItems.length > 0){
                cartItems.map(item => {
                    totalPrice = totalPrice + parseInt(item.subtotal);
                    if (item.size != null){
                        var size1 = item.size;
                    }else{
                        size1 = '';
                    }
                    if (item.color != null){
                        var color = item.color;
                    }else{
                        color = '';
                    }
                    $('tbody').append(`
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="/productdetails/${item.slug}">
                                            <figure>
                                                <img src="${item.photo}" alt="product"
                                                    width="300" height="338">
                                            </figure>
                                        </a>
                                        <button data-id=${item.id} type="submit" class="btn view-cart btn-close"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="/productdetails/${item.slug}">
                                        ${item.name}
                                    </a>
                                </td>
                                <td>${size1}</td>
                                <td>${color}</td>
                                <td class="product-price"><span class="amount">${item.price}</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input type="text" class="form-control qt" value="${item.qty}" hidden>
                                        <input data-id="${item.id}" class="quantity form-control" type="number" value="${item.qty}" min="1" max="100000">
                                        <button data-id="${item.id}" class="quantity-plus w-icon-plus"></button>
                                        <button data-id="${item.id}" class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount subtotal">${item.subtotal * item.qty}</span>
                                </td>
                            </tr>
                `);
                })
                $('#totalPrice').text(totalPrice);
            }else {
                $('tbody').append(`
                <tr>
                    <td colspan="5"><h4 class="text-center">Your cart is empty</h4></td>
                </tr>
            `);
            }
        }else {
            
            $.ajax({
                type: 'GET',
                url: `/${userId}/cartData`,
                beforeSend: () => {
                    $('#pleaseWaitModal').modal('show');
                    setTimeout(()=>{
                        $('#pleaseWaitModal').modal('hide');
                    },2000)
                },
                success: (data) => {
                    let totalPrice = 0;
                    $('.cart-count').text(data.length);
                  
                    if (data.length > 0){
                    data.map(item => {
                        totalPrice = totalPrice + parseInt(item.subtotal);
                        if (item.size != null){
                            var size1 = item.size;
                        }else{
                            size1 = '';
                        }
                        if (item.color != null){
                            var color = item.color;
                        }else{
                            color = '';
                        }
                        $('tbody').append(`
                         <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="/productdetails/${item.slug}">
                                            <figure>
                                                <img src="${item.photo}" alt="product"
                                                    width="300" height="338">
                                            </figure>
                                        </a>
                                        <button data-id=${item.product_id} type="submit" class="btn view-cart btn-close"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="/productdetails/${item.slug}">
                                        ${item.name}
                                    </a>
                                </td>
                                <td>${size1}</td>
                                <td>${color}</td>
                                <td class="product-price"><span class="amount">${item.price}</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input type="text" class="form-control qt" value="${item.qty}" hidden>
                                        <input data-id="${item.product_id}" class="quantity form-control" type="number" value="${item.qty}" min="1" max="100000">
                                        <button data-id="${item.product_id}" class="quantity-plus w-icon-plus"></button>
                                        <button data-id="${item.product_id}" class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount subtotal">${item.subtotal}</span>
                                </td>
                            </tr>
                         `);
                    })
                    $('#totalPrice').text(totalPrice);
                    }else{
                        $('tbody').append(`
                            <tr>
                                <td colspan="5"><h4 class="text-center">Your cart is empty</h4></td>
                            </tr>
                        `);
                    }
                }
            })
        }
        

})

$(function (){
    $(document).on('click','.btn-clear',function (){
        const userId = $('#viewCartUserId').val();
        localStorage.setItem('items',JSON.stringify([]));
        $('tbody').html('');
        $('tbody').append(`
            <tr>
                <td colspan="5"><h4 class="text-center">Your cart is empty</h4></td>
            </tr>
        `);
        $('.cart-count').text(0);
        $('.cart-products').html('');
        $('#totalPrice').text('');
        if (userId){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'DELETE',
                url: `/${userId}/deleteAllCartItem`,
                success: (data) => {
                    toastr.options = {
                        "timeOut": "3000",
                        "closeButton": true,
                    };
                    toastr['success'](data);
                }
            })
        }
    });
})

