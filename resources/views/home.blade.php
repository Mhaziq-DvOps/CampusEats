@extends('master')

@section("content")
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head> 
    <div class="py-5 text-center bg-light border-bottom shadow-sm">
        <h1 class="display-3 fw-bold mb-3">Welcome to <span class="text-warning">CampusEats</span></h1>
        <p class="lead mb-4">Your hassle-free solution for delicious campus dining</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/catalogue" class="btn btn-light btn-lg px-4">Order Now</a>
            <a href="#features" class="btn btn-light btn-lg px-4">Learn More</a>
            <h1>Welcome to CampusEats</h1>
        </div>
    </div>


        
          <!-- Top Promoted Start -->

<section class="py-5 bg-white bg-opacity-10">
    <div class="container">
        <div class="text-center mb-5">
            {{-- <h2 class="fw-bold text-warning">Pomotions</h2> --}}
            <section class="position-relative">
        <span class="badge bg-danger position-absolute top-0 start-0 m-3 fs-6 fw-bold" style="animation: pulse 1.5s infinite;">
            🔥 Now On Promotion!
        </span>
<br>
<br>
           <h2 class="fw-bold text-primary">Pomotions</h2> 

        <p class="lead mb-4">Items currently on promotioning</p>
        

        @if($promotedProducts && count($promotedProducts) > 0)
        <div class="row g-4">
            @foreach ($promotedProducts as $product)
            <div class="col-lg-3 col-md-6">
                {{-- <div class="card h-100 border-0 shadow"> --}}
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                    <img src="{{ asset('images/' . $product->P_Image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->P_Name }}" 
                         style="height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title text-danger">{{ $product->P_Name }}</h5>
                        <p class="card-text">{{ Str::limit($product->S_Description, 70) }}</p>
                        <p class="mb-1 text-decoration-line-through text-muted">RM{{ number_format($product->P_Price, 2) }}</p>
                        <h5 class="text-success">Now on Promotion! Only RM{{ number_format($product->P_Disc_Price, 2) }}</h5>
                        <a href="{{ url('catalogue', $product->P_Id) }}" class="btn btn-danger btn-sm mt-2">Get Deal</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="text-center">No promotions available now.</div>
        @endif
    </div>
</section>
<style>
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }
</style>
  <!-- Top Rated -->

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            {{-- <h2 class="fw-bold text-success">Top Rated Foods</h2> --}}
            <h2 class=" fw-bold text-primary">Top Rated Foods</h2>

           
            <p class="lead mb-4">Highly rated by students</p>
        </div>

        @if($topRatedProducts && count($topRatedProducts) > 0)
        <div class="row g-4">
            @foreach ($topRatedProducts as $product)
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow">
                    <img src="{{ asset('images/' . $product->P_Image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->P_Id }}" 
                         style="height: 200px;">
                    <div class="card-body">
                               <h5 class="card-title">{{ $product->P_Name ?? 'Product' }}</h5>
                        <p class="card-text">{{ Str::limit($product->R_Comment, 70) }}</p>
                        <div class="mb-2">
                            <span class="text-warning fs-6">
                                @for($i = 0; $i < round($product->avg_rating); $i++) ★ @endfor
                            </span>
                        </div>
                        {{-- <h5 class="card-title">{{ $product->P_Id }}</h5>
                        <p class="card-text">{{ Str::limit($product->R_Comment, 70) }}</p> --}}
                        {{-- <div class="mb-2">
                            <span class="text-warning">
                                @for($i = 0; $i < 5; $i++) ★ @endfor
                            </span>
                        </div> --}}
                   
                        <h5 class="text-primary">RM{{ number_format($product->P_Price, 2) }}</h5>
                        <a href="{{ url('catalogue', $product->P_Id) }}" class="btn btn-primary btn-sm">Order Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
 

        @else
            <div class="text-center">No top-rated items found.</div>
        @endif
    </div>
</section>


        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                    </div>          

<!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Customer Satisfaction</h5>
                                <p>The selected quality foods to serve you goods</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>Freshly cooked food</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>Avaiable for online order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>Service Methods</h5>
                                <p>Offers a fast service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

                </div>
            </div>
        </div>

<!-- Popular Menu Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Popular Menu Items</h2>
            <p class="lead mb-4">Our most ordered dishes by students</p>
        </div>

        @if($popularProducts && count($popularProducts) > 0)
        <div class="row g-4">
            @foreach ($popularProducts as $product)
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('images/' . $product->P_Image) }}" 
                             class="card-img-top object-fit-cover" 
                             alt="{{ $product->P_Name }}"
                             style="height: 200px; width: 100%;">
                             <br>
                        <div class="position-absolute top-0 end-0 m-2">
                            @if($product->P_Status == 1)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Sold Out</span>
                            @endif
                        </div>
                         <br>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $product->P_Name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($product->S_Description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="text-primary mb-0">RM{{ number_format($product->P_Price, 2) }}</h5>
                            @if($product->P_Status == 1)
                                <a href="{{ url('catalogue', $product->P_Id) }}" 
                                   class="btn btn-sm btn-primary">Order Now</a>
                            @else
                                <button class="btn btn-sm btn-danger" disabled>Unavailable</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-4">
            <p class="text-muted">No popular items available at the moment</p>
        </div>
        @endif
    </div>
</section>


<!-- Features Section -->
<!-- Features Section -->
<section id="features" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary position-relative d-inline-block">
                <span class="bg-white px-3">Why Choose Us</span>
                <span class="position-absolute top-50 start-0 end-0 border-top border-primary z-index--1"></span>
            </h2>
            <p class="lead text-muted mt-3">What makes CampusEats the best choice for campus dining</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-stopwatch fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Fast Service</h5>
                    <p class="text-muted">Get your food quickly with our efficient ordering.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-mobile-alt fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Easy Ordering</h5>
                    <p class="text-muted">Simple and intuitive interface for hassle-free ordering.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-leaf fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Fresh Ingredients</h5>
                    <p class="text-muted">Locally-sourced ingredients prepared fresh daily.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-credit-card fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Flexible Payment</h5>
                    <p class="text-muted">Multiple payment options including cash, and Stripe payments.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Real-Time Tracking</h5>
                    <p class="text-muted">Track your order from kitchen in real-time.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card p-4 rounded-3 shadow-sm h-100 text-center border-0 bg-light">
                    <div class="mb-3">
                        <i class="fas fa-heart fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Student Focused</h5>
                    <p class="text-muted">Menu and pricing designed specifically for student needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature End -->

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Ready to Order Your Next Meal?</h2>
        <p class="lead mb-4">Join our students enjoying hassle-free campus dining</p>
        <div class="text-center mt-5">
            <a href="/catalogue" class="btn btn-primary px-4 py-2">
                <i class="fas fa-utensils me-2"></i> View Full Menu
            </a>
        </div>

    </div>
</section>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    
<script>
    // Auto-reload the page every 2 minutes (120000 milliseconds)
    //60000 milliseconds = 1 minute
    setInterval(function () {
        location.reload();
    }, 60000); // 1 minutes
</script>
@endsection