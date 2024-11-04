let currentAbortController = null;
function debounce(func, delay) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), delay);
    };
}

$('.btn-cart').click(function () {
    // Check if the target has the required attribute
    if (this.matches('.btn-cart') && this.hasAttribute('data-product-uuid')) {
        const productUUID = this.getAttribute('data-product-uuid');
        const quantity = $(this).siblings('.product-quantity').find('.quantity').val();
        if (productUUID) {
            // Access CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const data = { uuid: productUUID, quantity: quantity };
            console.log("data", data);
            this.blur();
            // Example of using the CSRF token in a fetch request
            fetch('/addToCart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Use the CSRF token here
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        $('.cart-count').html(data.cartItemsCount);
                        $('.cart-price span').html(data.subTotal);
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

    } else {
        console.warn('data-product-uuid attribute is missing');
    }
})

$('.product-remove').click(function () {
    if (this.matches('.product-remove') && this.hasAttribute('data-cart-row-id')) {
        const cartRowId = this.getAttribute('data-cart-row-id');
        if (cartRowId) {
            // Access CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const data = { rowId: cartRowId };
            console.log("data", data);
            // Example of using the CSRF token in a fetch request
            fetch('/removeFromCart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Use the CSRF token here
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    }
});

function updateCartItem(rowId, quantity) {
    if (rowId) {
        // Access CSRF token from the meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const data = { rowId: rowId, quantity: quantity };
        // Abort the previous request if it's still running
        if (currentAbortController) {
            currentAbortController.abort();
        }

        // Create a new AbortController for the current request
        currentAbortController = new AbortController();
        const signal = currentAbortController.signal;
        fetch('/updateCart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken // Use the CSRF token here
            },
            body: JSON.stringify(data),
            signal: signal // Attach the signal to the request
        })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}

// Debounced updateCartItem function
const debouncedUpdateCartItem = debounce(function (cartRowId, quantity) {
    updateCartItem(cartRowId, quantity);
}, 300); // Adjust the delay as needed

// Decrease quantity
$('.quantity-minus').click(function () {
    // Find the input within the same .input-group
    let $input = $(this).siblings('.quantity');
    let currentValue = parseInt($input.val(), 10);

    // Check if the current value is greater than 1
    if (currentValue > 1) {
        $input.val(currentValue - 1); // Decrease the value
        if ($(this).hasClass('cartItemDesc')) {
            if (this.matches('.quantity-minus') && this.hasAttribute('data-cart-row-id')) {
                const cartRowId = this.getAttribute('data-cart-row-id');
                if (cartRowId) {
                    let $input = $(this).siblings('.quantity');
                    debouncedUpdateCartItem(cartRowId, parseInt($input.val(), 10));
                }
            }
        }
    }


});

// Increase quantity
$('.quantity-plus').click(function () {
    // Find the input within the same .input-group
    var $input = $(this).siblings('.quantity');
    var currentValue = parseInt($input.val(), 10);

    // You can set a maximum limit here if needed
    var maxValue = 1000000; // or any other value you want
    if (currentValue < maxValue) {
        $input.val(currentValue + 1); // Increase the value
        if ($(this).hasClass('cartItemInc')) {
            if (this.matches('.quantity-plus') && this.hasAttribute('data-cart-row-id')) {
                const cartRowId = this.getAttribute('data-cart-row-id');
                if (cartRowId) {
                    let $input = $(this).siblings('.quantity');
                    debouncedUpdateCartItem(cartRowId, parseInt($input.val(), 10));
                }
            }
        }
    }
});