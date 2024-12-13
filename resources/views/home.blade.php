@extends('master')

@section("content")

<!-- Carousel Start -->
<div class="slideshow-container">

    <div class="mySlides fade">
    <img src="asset/img/carousel-4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <img src="asset/img/carousel-5.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
    <img src="asset/img/carousel-1.jpg" style="width:100%">
    </div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<!-- Carousel End -->
        
        <div class="welcome-header text-center">
            <h1>WELCOME TO CampusEats</h1>
        </div>
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="asset/img/CampusEatsLogo.png" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-header">
                                <p>About Us</p>
                                <h2>Online Dynamic Ordering System</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    CampusEats is an Online Dynamic Ordering system that provide various kinds of features such as delivery and booking. CampusEats also will provide promotion from time to time. 
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
        

        <!-- Feature Start -->
        <div class="feature">
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
                                    <h3>Various of industry's categories</h3>
                                    <p>
                                        CampusEats is for The campus that would like to use our services.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-vegetable"></i>
                                    <h3>Booking services</h3>
                                    <p>
                                        CampusEats provide booking services.
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
                                        The product sold in AppXilon is guaranteed to be the best in quality.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-meat"></i>
                                    <h3>Fresh vegetables & Meet</h3>
                                    <p>
                                        Order groceries from our app is the best. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-courier"></i>
                                    <h3>Fastest door delivery</h3>
                                    <p>
                                        Delivery is done as soon as possible.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item">
                                    <i class="flaticon-fruits-and-vegetables"></i>
                                    <h3>Online 24 hours</h3>
                                    <p>
                                        CampusEats is available for 24 hours but services is made during business hours.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->


@endsection

@section('scripts')
<script>
var slideIndex = 0;
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
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
@endsection

