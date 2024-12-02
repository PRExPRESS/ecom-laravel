
$(document).ready(function () {

    $('.add-to-cart').on('click', function () {

        const item = $(this).data('product');

        addToCart(JSON.stringify(item));
    });
    $(window).on('load', function () {
        getCartCount();
        getCartItems();
        
        
    });
    
});



//add items to cart
function addToCart(item) {
    const itemId = JSON.parse(item).id;
    const itemName = JSON.parse(item).name;
    const price = JSON.parse(item).price;
    const quantity = JSON.parse(item).quantity;
    const color = JSON.parse(item).color;
    const size = JSON.parse(item).size;
    const image = JSON.parse(item).image;

    //console.log('item', JSON.parse(item))

    $.ajax({
        url: '/add-to-cart',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            item_id: itemId,
            item_name: itemName,
            price: price,
            quantity: quantity,
            color: color,
            size: size,
            image: image
        },
        success: function (response) {
            console.log(response);
            if (response.status === 'success') {
                updateCartUI(response.status);
            }
        },
        error: function (err) {
            console.error("Error updating cart", err);
        }
    })

}

//get cart count
function getCartCount() {
    $.ajax({
        url: '/get-cart-count',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            updateCartCount(response.count);
        },
        error: function (err) {
            console.error("Error getting cart count", err);
        }
    })
}

//get cart items
function getCartItems() {
    $.ajax({
        url: '/get-cart-items',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            const items = Object.values(response.items).map((item) => {
                return {
                    id: item.item_id,
                    name: item.item_name,
                    price: item.price,
                    quantity: item.quantity,
                    color: item.color,
                    size: item.size,
                    image: item.image
                }
            });
            console.log(items);
            updateMiniCartUI(items);
            setSubtotal(items);
        },
        error: function (err) {
            console.error("Error getting cart items", err);
        }
    })
}

// Update the cart quantity
function updateCartQuantity(productId, quantity) {
    $.ajax({
        url: '/cart-update',
        method: 'POST',
        data: {
            product_id: productId,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')  
        },
        success: function(response) {
            if (response.status === 'success') {
                getCartItems();
                
            }
        },
        error: function(err) {
            console.error("Error updating cart", err);
        }
    });
}

//remove item from cart
function removeItemFromCart(productId) {
    $.ajax({
        url: '/cart-update',
        method: 'POST',
        data: {
            product_id: productId,
            quantity: 0,
            _token: $('meta[name="csrf-token"]').attr('content')  
        },
        success: function(response) {
            if (response.status === 'success') {
                getCartItems();
                getCartCount();
            }
        },
        error: function(err) {
            console.error("Error removing item from cart", err);
        }
    });
}

//update cart UI
function updateCartUI(cart) {
    console.log('ui updated');
    $('#alert').append(`
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Item has been added to your cart.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `);
    
    setTimeout(() => {
        location.reload();
    },1000)


}

//update cart count
function updateCartCount(count) {
    $('.count-box').text(count);
}


//set subtotal
function setSubtotal(cart) {
    let subtotal = cart.reduce((total, item) => total + item.price * item.quantity, 0);
    $('.subtotal').text(subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}


function updateMiniCartUI(cartItems) {
    
    $('.tf-mini-cart-items').empty();

    
    cartItems.forEach(item => {
        $('.tf-mini-cart-items').append(`
            <div class="tf-mini-cart-item" data-product-id="${item.id}">
                <div class="tf-mini-cart-image">
                    <a href="product-detail.html">
                        <img src="/images/products/${item.image}" alt="">
                    </a>
                </div>
                <div class="tf-mini-cart-info">
                    <a class="title link" href="product-detail.html">${item.name}</a>
                    <div class="meta-variant">${item.color}</div>
                    <div class="price fw-6">${item.price}</div>
                    <div class="tf-mini-cart-btns">
                        <div class="wg-quantity small" id="cart-item-${item.id}">
                            <span class="btn-quantity minus-btn decrease-quantity" data-product-id="${item.id}">-</span>
                            <input type="text" name="number" class="quantity" value="${item.quantity}" min="1" data-item-id="${item.id}" >
                            <span class="btn-quantity plus-btn increase-quantity" data-product-id="${item.id}">+</span>
                        </div>
                        <div class="tf-mini-cart-remove remove-item" data-product-id="${item.id}">Remove</div>
                    </div>
                </div>
            </div>
        `);
    });

    
    updateCartCount(cartItems.length);
    setSubtotal(cartItems);

    // Re-bind events using event delegation
    bindCartItemEvents();
}

function bindCartItemEvents() {
    // Handle increase quantity button
    $('.increase-quantity').on('click', function() {
        let productId = $(this).data('product-id');
        let quantityInput = $('#cart-item-' + productId).find('.quantity');
        let currentQuantity = parseInt(quantityInput.val());
        let newQuantity = currentQuantity + 1;
        updateCartQuantity(productId, newQuantity);
    });

    // Handle decrease quantity button
    $('.decrease-quantity').on('click', function() {
        let productId = $(this).data('product-id');
        let quantityInput = $('#cart-item-' + productId).find('.quantity');
        let currentQuantity = parseInt(quantityInput.val());
        let newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;
        updateCartQuantity(productId, newQuantity);
    });

    // Handle remove item button
    $('.remove-item').on('click', function() {
        let productId = $(this).data('product-id');
        removeItemFromCart(productId);
    });
}

function checkout() {
    $('.tf-page-cart-checkout').submit();
}



