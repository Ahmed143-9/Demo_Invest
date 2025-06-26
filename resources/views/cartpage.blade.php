<!-- ... existing code ... -->

<!-- Replace the static cart items with a dynamic container -->
<div class="container cart-container">
    <h2 class="mb-4">Your Shopping Cart</h2>
    
    <!-- Cart Items -->
    <div class="row">
        <div class="col-lg-8">
            <div id="cartItemsContainer">
                <!-- Cart items will be loaded dynamically here -->
            </div>
            
            <!-- Empty Cart (Hidden by default, show when cart is empty) -->
            <div class="empty-cart" id="emptyCartMessage">
                <i class="fas fa-shopping-cart"></i>
                <h3>Your cart is empty</h3>
                <p class="text-muted">Looks like you haven't added any investments to your cart yet.</p>
                <a href="/" class="btn btn-primary mt-3">Continue Shopping</a>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card summary-card">
                <div class="card-body">
                    <h4 class="summary-title">Order Summary</h4>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal (<span id="itemCount">0</span> items)</span>
                        <span id="subtotal">৳0</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Processing Fee</span>
                        <span id="processingFee">৳0</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax</span>
                        <span id="tax">৳0</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-3 fw-bold">
                        <span>Total</span>
                        <span class="text-primary" id="total">৳0</span>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="checkoutBtn">Proceed to Checkout</button>
                        <a href="/" class="btn btn-outline-secondary">Continue Shopping</a>
                    </div>
                    
                    <div class="mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="termsCheck" checked>
                            <label class="form-check-label small" for="termsCheck">
                                I agree to the <a href="#">Terms & Conditions</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Methods -->
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">We Accept</h5>
                    <div class="d-flex justify-content-between mt-2">
                        <i class="fab fa-cc-visa fa-2x text-primary"></i>
                        <i class="fab fa-cc-mastercard fa-2x text-danger"></i>
                        <i class="fab fa-cc-paypal fa-2x text-info"></i>
                        <i class="fab fa-cc-apple-pay fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ... existing code ... -->

<!-- Replace the existing JavaScript with this updated version -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load cart from localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        // Render cart items
        renderCart();
        
        function renderCart() {
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const emptyCartMessage = document.getElementById('emptyCartMessage');
            
            // Clear container
            cartItemsContainer.innerHTML = '';
            
            if (cart.length === 0) {
                // Show empty cart message
                emptyCartMessage.classList.remove('d-none');
                document.getElementById('checkoutBtn').disabled = true;
            } else {
                // Hide empty cart message
                emptyCartMessage.classList.add('d-none');
                document.getElementById('checkoutBtn').disabled = false;
                
                // Render each cart item
                cart.forEach(item => {
                    const cartItemHTML = `
                        <div class="card mb-3 cart-item" data-product-id="${item.id}">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="${item.image}" class="img-fluid" alt="${item.name}">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">${item.name}</h5>
                                        <p class="card-text text-muted">Premium investment opportunity</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="text-primary fw-bold">৳${item.price.toLocaleString()}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="quantity-control">
                                            <button class="btn-quantity-minus" data-product-id="${item.id}"><i class="fas fa-minus"></i></button>
                                            <input type="number" class="form-control" value="${item.quantity}" min="1" max="10" data-product-id="${item.id}">
                                            <button class="btn-quantity-plus" data-product-id="${item.id}"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <i class="fas fa-trash remove-item" data-product-id="${item.id}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    cartItemsContainer.innerHTML += cartItemHTML;
                });
                
                // Add event listeners to the newly created elements
                addEventListeners();
            }
            
            // Update summary
            updateSummary();
        }
        
        function addEventListeners() {
            // Quantity minus buttons
            document.querySelectorAll('.btn-quantity-minus').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productIndex = cart.findIndex(item => item.id === productId);
                    
                    if (productIndex > -1 && cart[productIndex].quantity > 1) {
                        cart[productIndex].quantity -= 1;
                        saveCartAndUpdate();
                    }
                });
            });
            
            // Quantity plus buttons
            document.querySelectorAll('.btn-quantity-plus').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productIndex = cart.findIndex(item => item.id === productId);
                    
                    if (productIndex > -1 && cart[productIndex].quantity < 10) {
                        cart[productIndex].quantity += 1;
                        saveCartAndUpdate();
                    }
                });
            });
            
            // Quantity input fields
            document.querySelectorAll('.quantity-control input').forEach(input => {
                input.addEventListener('change', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productIndex = cart.findIndex(item => item.id === productId);
                    const newQuantity = parseInt(this.value);
                    
                    if (productIndex > -1 && newQuantity >= 1 && newQuantity <= 10) {
                        cart[productIndex].quantity = newQuantity;
                        saveCartAndUpdate();
                    } else {
                        // Reset to valid value
                        this.value = cart[productIndex].quantity;
                    }
                });
            });
            
            // Remove item buttons
            document.querySelectorAll('.remove-item').forEach(icon => {
                icon.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productIndex = cart.findIndex(item => item.id === productId);
                    
                    if (productIndex > -1) {
                        const cartItem = this.closest('.cart-item');
                        cartItem.style.opacity = 0;
                        
                        setTimeout(() => {
                            // Remove from array
                            cart.splice(productIndex, 1);
                            saveCartAndUpdate();
                        }, 300);
                    }
                });
            });
        }
        
        function updateSummary() {
            const subtotalElement = document.getElementById('subtotal');
            const processingFeeElement = document.getElementById('processingFee');
            const taxElement = document.getElementById('tax');
            const totalElement = document.getElementById('total');
            const itemCountElement = document.getElementById('itemCount');
            
            // Calculate totals
            const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            const processingFee = subtotal > 0 ? 500 : 0;
            const tax = Math.round(subtotal * 0.025); // 2.5% tax
            const total = subtotal + processingFee + tax;
            const itemCount = cart.reduce((count, item) => count + item.quantity, 0);
            
            // Update UI
            subtotalElement.textContent = `৳${subtotal.toLocaleString()}`;
            processingFeeElement.textContent = `৳${processingFee.toLocaleString()}`;
            taxElement.textContent = `৳${tax.toLocaleString()}`;
            totalElement.textContent = `৳${total.toLocaleString()}`;
            itemCountElement.textContent = itemCount;
            
            // Update cart count in navbar if it exists
            const navCartCount = document.querySelector('.nav-link .badge');
            if (navCartCount) {
                navCartCount.textContent = itemCount;
            }
        }
        
        function saveCartAndUpdate() {
            // Save to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Re-render cart
            renderCart();
        }
        
        // Checkout button
        document.getElementById('checkoutBtn').addEventListener('click', function() {
            if (cart.length > 0) {
                alert('Thank you for your order! This is a demo checkout process.');
                // In a real application, you would redirect to a checkout page or process the order
            }
        });
    });
</script>