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
        
        <div class="welcome-header text-center">
            <h1>WELCOME TO CampusEats</h1>

        <p class="lead">Hassle-free to Eat at Campus</p>

        </div>
        

<!-- Carousel Start -->
<div class="slideshow-container">

    <div class="mySlides fade" style="display:none; text-align:center;">
    {{-- <img src="asset/img/carousel-4.jpg" style="=height: 100rem; width: 50rem !important;"> --}}
        <img src="Banner/1.png" style="=height: 100rem; width: 70rem !important;">

    </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/2.png" style="=height: 100rem; width: 70rem !important;">
    </div>

    </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/3.png" style="=height: 100rem; width: 70rem !important;">
    </div>

      </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/4.png" style="=height: 100rem; width: 70rem !important;">
    </div>

     </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/5.png" style="=height: 100rem; width: 70rem !important;">
    </div>


      </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/6.png" style="=height: 100rem; width: 70rem !important;">
    </div>

     </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/7.png" style="=height: 100rem; width: 70rem !important;">
    </div>

    </div>
        <div class="mySlides fade" style="display:none; text-align:center;">
        <img src="Banner/8.png" style="=height: 100rem; width: 70rem !important;">
    </div>
 <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>


</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
    <span class="dot" onclick="currentSlide(6)"></span> 
  <span class="dot" onclick="currentSlide(7)"></span> 
    <span class="dot" onclick="currentSlide(8)"></span>
</div>
<!-- Carousel End -->


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

{{-- ------------------------------------------------------- --}}
                    
                        <div class="about-img">
                            {{-- <img src="asset/img/CampusEatsLogo.png" alt="Image"> --}}
                            <img src="asset/img/CampusEatsLogo.png" alt="Image" width="70" height="auto">

                        </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header">
                                <strong>About Us</strong>
                                <h2>Online Dynamic Ordering System</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    CampusEats is an Online Dynamic Ordering system that allows food Ordering Through Online Platform. 
                                </p>
                                <p>
                                    CampusEats provide with various kinds of payment methods to ease the customer when making order. 
                                </p>
                                <a class="btn custom-btn" href="/about">More Info</a>
                                <!-- <a class="btn custom-btn" href="about.html">More Info</a> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->




        <!-- Most Ordered Food -->

<!-- POPULAR DISHES -->
{{-- <section id="popular" style="background-color: white; padding: 2.5rem 0;">
    <div style="max-width: 56rem; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; text-align: center;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 1.5rem; text-align: center;">Popular Menu</h2>

        @if($popularProducts ?? [] && count($popularProducts) > 0)
            <div style="display: flex; justify-content: center;">
                <div style="overflow-x: auto; width: 100%; max-width: 56rem;">
                    <table style="min-width: 100%; background-color: white; border: 1px solid #e5e7eb; margin: 0 auto;">
                        <thead style="background-color: #f9fafb;">
                            <tr>
                                <th style="padding: 0.5rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Image</th>
                                <th style="padding: 0.5rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Product</th>
                                <th style="padding: 0.5rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Description</th>
                                <th style="padding: 0.5rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Status</th>
                                <th style="padding: 0.5rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Price</th>
                                <th style="padding: 0.5rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="divide-y: 1px solid #e5e7eb;">
                            @foreach ($popularProducts as $product)
                            <tr style="hover:background-color: #f9fafb;">
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; text-align: center;">
                                    <div style="display: flex; justify-content: center;">
                                        <img src="{{ asset('images/' . $product->P_Image) }}" 
                                             alt="{{ $product->P_Name }}" 
                                             style="height: 15rem; width: 15rem; object-fit: cover;">
                                    </div>
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap;">
                                    <div style="font-size: 0.875rem; font-weight: 500; color: #111827;">{{ $product->P_Name }}</div>
                                </td>
                                <td style="padding: 0.75rem 1rem;">
                                    <div style="font-size: 0.875rem; color: #6b7280;">{{ $product->S_Description }}</div>
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; text-align: center;">
                                    @if($product->P_Status == 1)
                                        <span style="padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #dcfce7; color: #166534;">In Stock</span>
                                    @else
                                        <span style="padding: 0.25rem 0.5rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #fee2e2; color: #991b1b;">Out of Stock</span>
                                    @endif
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; text-align: center;">
                                    <div style="font-size: 0.875rem; font-weight: 700; color: #1d4ed8;">RM{{ number_format($product->P_Price, 2) }}</div>
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; text-align: center;">
                                    @if($product->P_Status == 1)
                                        <a href="{{ url('catalogue', $product->P_Id) }}" style="font-size: 0.75rem; background-color: #1d4ed8; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; hover:background-color: #1e40af; transition: background-color 0.2s;">Order</a>
                                    @else
                                        <span style="font-size: 0.75rem; background-color: #d1d5db; color: #4b5563; padding: 0.25rem 0.75rem; border-radius: 0.25rem; cursor: not-allowed;">Unavailable</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p style="text-align: center; color: #6b7280;">No popular products for now</p>
        @endif
    </div>
</section> --}}

<!-- Popular Menu Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Popular Menu Items</h2>
            <p class="text-muted ">Our most loved dishes by students</p>
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


        <!-- Feature Start -->
        {{-- <div class="feature">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-header">
                            <p>Why Choose Us</p>
                            <h2>Our Key Features</h2>
                        </div>
                        <div class="feature-text">
                            <div class="feature-img">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="asset/img/feature-1.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="asset/img/feature-2.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="asset/img/feature-3.jpg" alt="Image">
                                    </div>
                                    <div class="col-6">
                                        <img src="asset/img/feature-4.jpg" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <p>
                                CampusEats provide many key features which is the main services that is needed during ordering. 
                            </p>
                            <a class="btn custom-btn" href="">Let's find out more</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-cooking"></i>
                                    <h3>Avaiability</h3>
                                    <p>
                                        CampusEats transparent to the customer who want to use the system.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-vegetable"></i>
                                    <h3>Ordering services</h3>
                                    <p>
                                        CampusEats provide Ordering services.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-medal"></i>
                                    <h3>Best quality products</h3>
                                    <p>
                                        The product sold in CampusEats is guaranteed to be the best in quality.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-meat"></i>
                                    <h3>Freshly cooked Food </h3>
                                    <p>
                                        Order Fresh food in CampusEat. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-courier"></i>
                                    <h3>Varities of Payment Methods</h3>
                                    <p>
                                        Easy payment through COD or Online Payment.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-fruits-and-vegetables"></i>
                                    <h3>Friendly User Interface</h3>
                                    <p>
                                        It made easy for the customer to use the system.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        <!-- Features Section -->
<!-- Features Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Our Key Features</h2>
            <p class="lead text-muted">What makes CampusEats the best choice for campus dining</p>
        </div>
        
        <div class="row g-4">
            <!-- Feature 1: Fast Service -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
                        <i class="fas fa-stopwatch text-primary fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Fast Service</h5>
                    <p class="text-muted">Fast service for food ordering.</p>
                </div>
            </div>
            
            <!-- Feature 2: Website Ordering -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
            <i class="fas fa-laptop fs-1 text-primary"></i> <!-- Correct laptop icon -->
                    </div>
                    <h5 class="fw-bold mb-3">Easy Website Ordering</h5>
                    <p class="text-muted">Simple and user-friendly website lets you order easily.</p>
                </div>
            </div>
            
            <!-- Feature 3: Fresh Meals -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
                        <i class="fas fa-leaf text-primary fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Freshly Prepared Meals</h5>
                    <p class="text-muted">Locally-sourced ingredients prepared fresh foods.</p>
                </div>
            </div>
            
            <!-- Feature 4: Payment Options -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
                        <i class="fas fa-credit-card text-primary fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Flexible Payment</h5>
                    <p class="text-muted">Cash and card payment</p>
                </div>
            </div>
            
            <!-- Feature 5: Order Tracking -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt text-primary fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Real-Time Tracking</h5>
                    <p class="text-muted">Track your order from kitchen to delivery with live GPS updates.</p>
                </div>
            </div>
            
            <!-- Feature 6: Dietary Options -->
            <div class="col-md-4">
                <div class="feature-card p-4 rounded shadow-sm h-100 text-center border-0">
                    <div class="mb-3">
                        <i class="fas fa-allergies text-primary fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Dietary Options</h5>
                    <p class="text-muted">Filter by dietary needs: vegan, gluten-free, halal, kosher, nut-free and more.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="/catalogue" class="btn btn-primary btn-lg px-4">
                <i class="fas fa-list me-2"></i> Explore All Menus
            </a>
        </div>
    </div>
</section>

        <!-- Feature End -->


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

    
@endsection

{{-- @section('scripts')
<script>
var slideIndex = 1;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" activer", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " activer";
  setTimeout(showSlides, 8000); // Change image every 8 seconds
}
</script> 
 @endsection  --}}

@section('scripts')
<script>
// Initialize slide index
var slideIndex = 1;
var slideInterval;

// Start the slideshow
startSlideshow();

function startSlideshow() {
    showSlides(slideIndex);
    slideInterval = setInterval(() => {
        plusSlides(1); // Advance to next slide
    }, 8000); // 8 seconds interval
}

// Next/previous controls
function plusSlides(n) {
    clearInterval(slideInterval); // Reset timer when manually changing slides
    showSlides(slideIndex += n);
    slideInterval = setInterval(() => {
        plusSlides(1);
    }, 8000);
}

// Thumbnail image controls
function currentSlide(n) {
    clearInterval(slideInterval);
    showSlides(slideIndex = n);
    slideInterval = setInterval(() => {
        plusSlides(1);
    }, 8000);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" activer", "");
    }
    
    // Add fade animation
    slides[slideIndex-1].style.opacity = 0;
    slides[slideIndex-1].style.display = "block";
    
    // Smooth fade in effect
    let opacity = 0;
    const fadeIn = setInterval(() => {
        if (opacity >= 1) {
            clearInterval(fadeIn);
        } else {
            opacity += 0.1;
            slides[slideIndex-1].style.opacity = opacity;
        }
    }, 50);
    
    dots[slideIndex-1].className += " activer";
}
</script>
@endsection