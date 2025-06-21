@extends('master')

@section('content')
<!-- Page Header Start -->
<div class="page-header-partner mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>About Us</h2>
            </div>
            <div class="col-12">
                <a href="/">Home</a>
                <a href="/about">About Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="about my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="about-img">
                    <img src="{{ asset('asset/img/CampusEatsLogo.png') }}" alt="Image" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-header">
                        <p>About Us</p>
                        <h2>CampusEats Ordering System</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            CampusEats Online Dynamic Ordering System provides a convenient way for customers to order and purchase products without traditional wait time. This automation system is designed for campus-based users to ensure smooth ordering and management.
                        </p>
                        <p>
                            CampusEats provides various payment options such as credit, debit card, and cash.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection
