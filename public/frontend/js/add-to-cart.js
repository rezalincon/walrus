$(document).ready(function () {
    $(window).on('load',function(){
         // localStorage.clear();
        $('.cart-count').text(0);
        $('.price').text(0);
        const userId = $('#userId').val();
        if (userId === ''){
            let localData = JSON.parse(localStorage.getItem('items'));
            if (localData !== null){
                settingCartFromLocalStorage();
            }
        }else{
            // localStorage.clear();
            // settingCartFromDatabase(userId);
            let localItems = JSON.parse(localStorage.getItem('items'));
            if (localItems !== null){
                localItems.map(pd => {
                    saveCartToDatabase(userId,pd);
                });
                settingCartFromDatabase(userId);
            }
        }
    });
   

});

$(document).ready(function () {
    $(document).on('click', '.btn-cart', function () {
        let userId = $('#userId').val();
        let id = $(this).attr('data-id');

        if (userId !== ''){
            getProductData(id,(data)=>{
                if (data.stock > 0){
                    saveLocalStorage(data);
                    settingCartFromLocalStorage();
                    let localItems = JSON.parse(localStorage.getItem('items'));
                    localItems.map(product => {
                        saveCartToDatabase(userId,product);
                    });
                    $('.cart-count').text(data.length);
                }else{
                    alert('Out of Stock')
                }
            });
        }else{
            getProductData(id,(data)=>{
                    saveLocalStorage(data);
                    settingCartFromLocalStorage();
                    $('.cart-count').text(data.length);
            });
        }
        $('.mfp-close').click();
    });
});

$(document).ready(function () {
    $(document).on('click','.btn-link.btn-close',function () {
        const productId = $(this).attr('data-id');
        deleteCartItem(productId);
        $(this).parent().remove();
    });
});

function saveLocalStorage(data,productId) {
    let id = '';
    if (productId === undefined){
        id = data.id;
    }else{
        id = productId;
    }

    //If color is selected
    let color = '';
    if ($('#productColor').val() === ''){
        color = data.color;
    }else{
        color = $('#productColor').val();
    }

    //if size is selected
    let size = '';
    if ($('#productSize').val() === ''){
        size = data.size;
    }else{
        size = $('#productSize').val();
    }

    //if qty given
    let quantity = '';
    if ($('#productQty').val() === ''){
        quantity = 1;
    }else{
        quantity = $('#productQty').val();
    }
    
    //if price is changed by size
    let price = '';
    if ($('#productPrice').val() === ''){
        price = data.price;
    }else{
        price = $('#productPrice').val();
    }

    let items = [];
    if (typeof (Storage) !== 'undefined') {
        let item = {
            id: id,
            name: data.name,
            price: price,
            size: size,
            color: color,
            photo: data.photo,
            qty: quantity,
            subtotal: data.price,
            vendor_id: data.vendor_id,
            slug: data.slug
        };
        if (JSON.parse(localStorage.getItem('items')) === null) {
            items.push(item);
            localStorage.setItem('items', JSON.stringify(items));
        } else {
            const localItems = JSON.parse(localStorage.getItem("items"));
            let flag = 0;
            localItems.map(product => {
                if (item.id == product.id) {
                    if($('#productQty').val()){
                        item.qty = parseInt(quantity);
                        item.subtotal = parseInt(item.qty) * parseFloat(item.price);
                    }
                    else if (product.qty < data.stock) {
                        item.qty = parseInt(product.qty) + parseInt(quantity);
                        if(parseInt(item.qty) > parseInt(data.stock)){
                            item.qty = parseInt(quantity);
                        }
                        item.subtotal = parseInt(item.qty) * parseFloat(item.price);
                    }else{
                        // toastr.options = {
                        //     "timeOut": "3000",
                        //     "closeButton": true,
                        // };
                        // toastr['success']('Product Stock Limit Exceeded');
                        flag = 1;
                    }
             
                }else{
                    items.push(product);
                }
            });
            if(flag === 0){
                items.push(item);
                localStorage.setItem('items', JSON.stringify(items));
            }
            
        }
    } else {
        alert('Local storage is not working on your browser');
    }
    $('#productQty').val('');
    $('#productPrice').val('');
    $('#productColor').val('');
    $('#productSize').val('');
}



function getProductData(id,productData) {
     $.ajax({
        type: 'GET',
        url: '/' + id + '/product-details',
        success: (data) => {
            productData(data);
        },
        error: (error) => {return 'No data found'}
    });
}

function settingCartFromDatabase(userId) {
    $.ajax({
        type: 'GET',
        url: `/${userId}/cartData`,
        success: (data) => {
            if (data.length > 0){
                let items = [];
                for (let i = 0; i < data.length; i++){
                    if (typeof (Storage) !== 'undefined') {
                        let item = {
                            id: data[i].product_id,
                            name: data[i].name,
                            price: data[i].price,
                            size: data[i].size,
                            color: data[i].color,
                            photo: data[i].photo,
                            qty: data[i].qty,
                            subtotal: data[i].subtotal,
                            vendor_id: data[i].vendor_id,
                            slug: data[i].slug

                        };

                            items.push(item);
                            localStorage.setItem('items', JSON.stringify(items));
                    } else {
                        alert('Local storage is not working on your browser');
                    }
                }
                settingCartFromLocalStorage();
            }
        },
        error: (error) => {console.log(error)}
    })
}

function saveCartToDatabase(id,product) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/'+id+'/saveCart',
            data: {
                name: product.name,
                size: product.size,
                color: product.color,
                price: product.price,
                qty: product.qty,
                photo: product.photo,
                user_id: id,
                product_id: product.id,
                vendor_id:product.vendor_id,
                subtotal: parseInt(product.qty) * parseFloat(product.price),
                slug: product.slug
            },
            success: (data) => {
                 
            },
            error: (error) => console.log(error)
        });
}

function settingCartFromLocalStorage() {
    const localItems = JSON.parse(localStorage.getItem("items"));
    $('.cart-products').html('');
    let subtotal = 0;
    if (localItems !== null) {
        $('.cart-count').text(localItems.length);
        localItems.map(product => {
            subtotal = subtotal + parseInt(product.price) * parseInt(product.qty);
            $('.cart-products').append(`
            <div style="width:240px" class="product product-cart">
                                    <div class="product-detail">
                                        <a  href="../../productdetails/${product.slug}" class="product-name">${product.name}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">${product.qty}</span>
                                            <span class="product-price">Tk. ${product.price}</span>
                                        </div>
                                    </div>
                                    <figure class="product-media">
                                        <a href="../../productdetails/${product.slug}">
                                            <img src="${'../../' + product.photo}" alt="product" height="84"
                                                width="94" />
                                        </a>
                                    </figure> 
                                    <button data-id="${product.id}" class="btn btn-link btn-close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
        `)
        });
    }

    $('.price').text('tk. '+subtotal);
}

function deleteCartItem(product_id) {
    const userId = $('#userId').val();
    let localItems = JSON.parse(localStorage.getItem('items'));
    const filtered = localItems.filter(item => item.id != product_id);
    const item = localItems.filter(item => item.id == product_id);
    const cartCount = $('.cart-count');
    const subtotal = $('.price').text();
    const subtotalPrice = subtotal.split(' ');
    const newSubtotal = parseInt(subtotalPrice[1]) - (parseInt(item[0].qty) * parseInt(item[0].price));
    $('.price').text('tk. '+newSubtotal);
    $(cartCount).text(parseInt($(cartCount[0]).text()) -1);
    localStorage.setItem('items',JSON.stringify(filtered));
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
}
