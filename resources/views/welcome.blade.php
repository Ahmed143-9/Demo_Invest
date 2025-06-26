<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecom_Invest</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        #hero{
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 60px 0;
            border-radius: 20px 20px 20px 20px;
        }
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .product-img {
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .profit-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .investment-range {
            background: #f8f9fa;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: 500;
        }
        .footer {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 40px 0 20px 0;
        }
        .hero-section {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 60px 0;
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #007bff;
        }
        /* Cart notification styles */
        .cart-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1000;
            transform: translateY(-100px);
            opacity: 0;
            transition: all 0.3s ease;
        }
        .cart-notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-add-to-cart {
            transition: all 0.3s ease;
        }
        .btn-add-to-cart:hover {
            background-color: #0069d9;
            color: white;
        }
        .btn-add-to-cart.added {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Ecom_Invest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cartpage">CartPage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/task">About_Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cartpage">
                            <i class="fas fa-shopping-cart position-relative">
                                <span class="cart-count" id="cartCountNav">0</span>
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cart notification -->
    <div class="cart-notification" id="cartNotification">
        <i class="fas fa-check-circle me-2"></i> Product added to cart!
    </div>

    <!-- Rest of the hero section remains unchanged -->
    <div class="hero-section" id="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="display-4 fw-bold mb-4">Welcome to Ecom-Invest</h1>
                    <p class="lead mb-4">Ecom_invest is a modern investment platform in Bangladesh!</p>
                    <p class="mb-4">Join us today and start your investment journey with confidence!</p>
                    <p>Designed to empower everyday people to earn smartly by funding short-term, profit-driven projects. We specialize in micro and medium-scale capital collection (starting from ৳1000) and allocate funds into real, manageable, and transparent business opportunities across the country. Whether you're a student, a housewife, a service holder, or a small business enthusiast — Ecom_invest gives you a safe, low-entry way to be part of Bangladesh's growing economy.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="text-center mb-5">
            <a class="btn btn-primary btn-lg m-2 px-4" href="/main/primary">Primary</a>
            <a class="btn btn-primary btn-lg m-2 px-4" href="/main/medium">Medium</a>
            <a class="btn btn-primary btn-lg m-2 px-4" href="/main/secondary">Secondary</a>
        </div>

        <!-- Investment Opportunities Section -->
        <div class="container my-5">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold">Investment Opportunities</h2>
                <p class="text-muted">Discover profitable investment options tailored for Bangladesh's growing economy</p>
            </div>

            <div class="row g-4" id="productContainer">
                <!-- Product cards will be dynamically loaded here -->
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card border-0 shadow-sm position-relative" data-product-id="1">
                        <div class="profit-badge">15% ROI</div>
                        <img src="https://images.unsplash.com/photo-1586880244386-8b3e34c8382c?w=400&h=200&fit=crop" alt="Rice Export Business" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Rice Export Business</h5>
                            <p class="card-text text-muted">Premium quality rice export to Middle Eastern markets with guaranteed buyers.</p>
                            <div class="investment-range mb-3">
                                <small>Investment: ৳5,000 - ৳50,000</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-success">Duration: 6 months</small>
                                <button class="btn btn-outline-primary btn-sm btn-add-to-cart" data-product-id="1" data-product-name="Rice Export Business" data-product-price="5000" data-product-image="https://images.unsplash.com/photo-1586880244386-8b3e34c8382c?w=400&h=200&fit=crop">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card border-0 shadow-sm position-relative" data-product-id="2">
                        <div class="profit-badge">12% ROI</div>
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=200&fit=crop" alt="Garments Manufacturing" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Garments Manufacturing</h5>
                            <p class="card-text text-muted">Small-scale garment production for local and international markets.</p>
                            <div class="investment-range mb-3">
                                <small>Investment: ৳10,000 - ৳100,000</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-success">Duration: 8 months</small>
                                <button class="btn btn-outline-primary btn-sm btn-add-to-cart" data-product-id="2" data-product-name="Garments Manufacturing" data-product-price="10000" data-product-image="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=200&fit=crop">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card border-0 shadow-sm position-relative" data-product-id="3">
                        <div class="profit-badge">18% ROI</div>
                        <img src="https://images.unsplash.com/photo-1604719312566-8912e9227c6a?w=400&h=200&fit=crop" alt="Tech Startup Fund" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Tech Startup Fund</h5>
                            <p class="card-text text-muted">Invest in promising Bangladeshi tech startups with high growth potential.</p>
                            <div class="investment-range mb-3">
                                <small>Investment: ৳15,000 - ৳200,000</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-success">Duration: 12 months</small>
                                <button class="btn btn-outline-primary btn-sm btn-add-to-cart" data-product-id="3" data-product-name="Tech Startup Fund" data-product-price="15000" data-product-image="https://images.unsplash.com/photo-1604719312566-8912e9227c6a?w=400&h=200&fit=crop">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card border-0 shadow-sm position-relative" data-product-id="4">
                        <div class="profit-badge">10% ROI</div>
                        <img src="https://images.unsplash.com/photo-1560472354-ca281fa3d4a3?w=400&h=200&fit=crop" alt="Fisheries Investment" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Fisheries Investment</h5>
                            <p class="card-text text-muted">Sustainable fish farming projects in coastal areas of Bangladesh.</p>
                            <div class="investment-range mb-3">
                                <small>Investment: ৳3,000 - ৳30,000</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-success">Duration: 4 months</small>
                                <button class="btn btn-outline-primary btn-sm btn-add-to-cart" data-product-id="4" data-product-name="Fisheries Investment" data-product-price="3000" data-product-image="https://images.unsplash.com/photo-1560472354-ca281fa3d4a3?w=400&h=200&fit=crop">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Continue with the rest of the products, updating each "Invest Now" button to "Add to Cart" with appropriate data attributes -->
            <!-- ... existing code ... -->

            <!-- Call to Action -->
            <div class="text-center mt-5">
                <h3 class="mb-3">Ready to Start Your Investment Journey?</h3>
                <p class="text-muted mb-4">Join thousands of investors who are already earning with Ecom_Invest</p>
                <a href="/register" class="btn btn-primary btn-lg px-5">Get Started Today</a>
                <a href="/practice" class="btn btn-primary btn-lg px-5">Team Directory</a>
            </div>
        </div>
    </div>

    <!-- Footer remains unchanged -->
    <!-- ... existing code ... -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Cart Functionality JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize cart from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartCount();
            
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
            const cartNotification = document.getElementById('cartNotification');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = parseInt(this.getAttribute('data-product-price'));
                    const productImage = this.getAttribute('data-product-image');
                    
                    // Check if product already exists in cart
                    const existingProductIndex = cart.findIndex(item => item.id === productId);
                    
                    if (existingProductIndex > -1) {
                        // Product exists, increase quantity
                        cart[existingProductIndex].quantity += 1;
                    } else {
                        // Add new product to cart
                        cart.push({
                            id: productId,
                            name: productName,
                            price: productPrice,
                            image: productImage,
                            quantity: 1
                        });
                    }
                    
                    // Save cart to localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));
                    
                    // Update UI
                    updateCartCount();
                    showNotification();
                    
                    // Visual feedback on button
                    this.classList.add('added');
                    this.innerHTML = '<i class="fas fa-check"></i> Added';
                    
                    setTimeout(() => {
                        this.classList.remove('added');
                        this.innerHTML = 'Add to Cart';
                    }, 2000);
                });
            });
            
            // Update cart count in navbar
            function updateCartCount() {
                const cartCount = document.getElementById('cartCountNav');
                const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                cartCount.textContent = totalItems;
                
                // Show/hide count based on items
                if (totalItems > 0) {
                    cartCount.style.display = 'flex';
                } else {
                    cartCount.style.display = 'none';
                }
            }
            
            // Show notification when product is added
            function showNotification() {
                cartNotification.classList.add('show');
                
                setTimeout(() => {
                    cartNotification.classList.remove('show');
                }, 2000);
            }
        });
    </script>
</body>
</html>