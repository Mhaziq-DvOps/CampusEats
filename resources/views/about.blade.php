@extends('master')
@section("content")

    <body>
        <!-- Page Header Start -->
        <div class="page-header-partner mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>About Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="/">Home</a>
                        <a href="about">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
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
                                <h2>CampusEats Ordering System</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    CampusEats Online Dynamic Ordering System provides a convenient way for customers to order and purchase product without having to leave the house. Online Dynamic Ordering System is an automation system that designed for a restaurant to ensure a systematic in ordering and management.
                                </p>
                                <p>
                                    Being a dynamic is having a lot of categories and continuously changing. This system is characterized as dynamic because the system is an open source that allow many industries to collab with AppXilon.
                                </p>
                                <p>
                                CampusEats allows the system to accept multiple catalogues from multiple industries and use the system as the medium for ordering a product online. 
                                </p>
                                <p>
                                CampusEats provide various kinds of payment options such as credit and debit card, online banking, e-wallets and paypal for international transaction.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        
        <!-- Video Modal Start-->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Video Modal End -->

