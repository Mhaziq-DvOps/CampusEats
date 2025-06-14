@extends('master')
@include('managerBar')  <!-- This will include the manager's name dropdown -->

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="admin-assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="admin-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin-assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin-assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin-assets/css/metisMenu.css">
    <link rel="stylesheet" href="admin-assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="admin-assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="admin-assets/css/typography.css">
    <link rel="stylesheet" href="admin-assets/css/default-css.css">
    <link rel="stylesheet" href="admin-assets/css/test.css">
    <link rel="stylesheet" href="admin-assets/css/responsive.css">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>
    <!-- modernizr css -->
    <script src="admin-assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
 
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="admin-assets/asset/img/CampusEatsLogo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="dashboard.html"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                            <li><a href="Order.php"><i class="fa fa-shopping-cart"></i><span>Order</span></a>
                            </li>
                            <li><a href="Catalogue.php"><i class="fa fa-file"></i><span>Catalogue</span></a></li>
                            <li><a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>
                                        Booking
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="bookinglist.php">Reservation List</a></li>
                                    <li><a href="seatmap.php">Seat Map</a></li>
                                </ul>
                            </li>
                            <li><a href="invoice.html"><i class="ti-time"></i> <span>Customer Analytics</span></a></li>
                            <li><a href="invoice.html"><i class="ti-signal"></i> <span>Ordering Trends</span></a></li>
                            <li><a href="invoice.html"><i class="ti-signal"></i> <span>Feedback</span></a></li>
                            <li><a href="invoice.html"><i class="ti-signal"></i> <span>Report</span></a></li>
                            <li><a href="shopInfo.php"><i class="fa fa-info-circle"></i> <span>Shop Information</span></a></li>
                            <li><a href="businesshour.php"><i class="fa fa-clock-o"></i> <span>Business Hour</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include 'header.php' ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="admin-assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                          {{ $managerName ?? 'Farah' }} <i class="fa fa-angle-down"></i>
                              </h4>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Orders</h4>
                                        <select class="custome-select border-0 pr-3">
                                            <option selected="">Current</option>
                                            <option value="0">Today</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <h1>10</h1>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Dine In</h4>
                                        <select class="custome-select border-0 pr-3">
                                            <option selected="">Current</option>
                                            <option value="0">Today</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <h1>2</h1>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Booking</h4>
                                        <select class="custome-select border-0 pr-3">
                                            <option selected="">Current</option>
                                            <option value="0">Today</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <h1>3</h1>
                            </div>
                        </div>

                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Delivery</h4>
                                        <select class="custome-select border-0 pr-3">
                                            <option selected="">Current</option>
                                            <option value="0">Today</option>
                                            <option value="0">Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <h1>5</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- product sold area start -->
                    <div class="col-xl-8 col-lg-7 col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Recent Order List</h4>
                                    <a href="Order.php"><button type="button" class="button1" style="float: right;">View Details</button></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-secondary">
                                            <tr class="text-white">
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Order Time</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>John</td>
                                                <td>07-12-2024 01:22:12</td>
                                                <td>RM 10</td>
                                                <td style="color:#00D905;">New</td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>Ali</td>
                                                <td>06-12-2024 01:22:12</td>
                                                <td>RM 11</td>
                                                <td style="color:#00D905;">New</td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Mahmud</td>
                                                <td>27-08-2024 01:22:12</td>
                                                <td>RM 18</td>
                                                <td style="color:#00D905;">New</td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>Sulaiman</td>
                                                <td>27-08-2024 01:22:12</td>
                                                <td>RM 17</td>
                                                <td style="color:#00D905;">New</td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td>Kamaruzzaman</td>
                                                <td>27-08-2018 01:22:12</td>
                                                <td>RM 13</td>
                                                <td style="color:#00D905;">New</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="pagination_area pull-right mt-5">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                        </ul><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- team member area start -->
                    <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center">
                                    <h4 class="header-title mb-0">Product Rating</h4>
                                </div>
                                <div class="member-box">
                                    <div class="s-member">
                                        <div class="media align-items-center">
                                        <img src="admin-assets/images/team/team-author5.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                            <div class="media-body ml-5">
                                                <p>Nasi Lemak</p><span>Main Dish</span>
                                            </div>
                                            <div class="tm-social">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-member">
                                        <div class="media align-items-center">
                                        <img src="admin-assets/images/team/team-author5.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                            <div class="media-body ml-5">
                                                <p>Nasi Goreng</p><span>Main Dish</span>
                                            </div>
                                            <div class="tm-social">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-member">
                                        <div class="media align-items-center">
                                        <img src="admin-assets/images/team/team-author5.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                            <div class="media-body ml-5">
                                                <p>Mee Goreng</p><span>Main Dish</span>
                                            </div>
                                            <div class="tm-social">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-member">
                                        <div class="media align-items-center">
                                        <img src="admin-assets/images/team/team-author5.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                            <div class="media-body ml-5">
                                                <p>Iced Tea</p><span>Beverage</span>
                                            </div>
                                            <div class="tm-social">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-member">
                                        <div class="media align-items-center">
                                        <img src="admin-assets/images/team/team-author5.jpg" class="d-block ui-w-30 rounded-circle" alt="">
                                            <div class="media-body ml-5">
                                                <p>Pudding</p><span>Dessert</span>
                                            </div>
                                            <div class="tm-social">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- team member area end -->
                </div>
                <!-- sales report area end -->
                <!-- order list area start -->
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Today's Promotion</h4>
                        <div class="table-responsive">
                            <table class="dbkit-table">
                                <tbody>
                                    <tr>
                                        <td>Promotion Name</td>
                                        <td>Promotion Desription</td>
                                        <td style="text-align:center">Discount</td>
                                        <td>Promotion Date</td>
                                    </tr>
                                    <tr>
                                        <td>Ramadhan Special</td>
                                        <td style="text-align:left">20% off from selected product. Enjoy !!!</td>
                                        <td>20%</td>
                                        <td>4/10/2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- order list area end -->

            </div>
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
        <p>© Copyright 2025. All rights reserved. Template by  
            <a href="https://colorlib.com/wp/" target="_blank">Colorlib</a>
        </p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="admin-assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="admin-assets/js/popper.min.js"></script>
    <script src="admin-assets/js/bootstrap.min.js"></script>
    <script src="admin-assets/js/owl.carousel.min.js"></script>
    <script src="admin-assets/js/metisMenu.min.js"></script>
    <script src="admin-assets/js/jquery.slimscroll.min.js"></script>
    <script src="admin-assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="admin-assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="admin-assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="admin-assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="admin-assets/js/plugins.js"></script>
    <script src="admin-assets/js/scripts.js"></script>
</body>

</html>