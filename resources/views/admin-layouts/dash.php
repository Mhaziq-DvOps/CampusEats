<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AppXilon</title>
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
    <link rel="stylesheet" href="admin-assets/css/styles.css">
    <link rel="stylesheet" href="admin-assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="admin-assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include 'sidebar.php';?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include 'header.php';?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="admin-assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai<i class="fa fa-angle-down"></i></h4>
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai<i class="fa fa-angle-down"></i></h4>
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Total User</div>
                                        <h2>24</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Pending Request</div>
                                        <h2>5</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Banned User</div>
                                        <h2>7</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg4">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">New Partners</div>
                                        <h2>4</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order list area start -->
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Pending Partners List</h4>
                        <div class="table-responsive">
                            <table class="dbkit-table">
                                <tbody>
                                    <tr class="heading-td">
                                        <td>Company Name</td>
                                        <td>Category</td>
                                        <td>Manager Name</td>
                                        <td>Date Registered</td>
                                    </tr>
                                    <tr>
                                        <td>Rizal Corner</td>
                                        <td>Food & Beverages</td>
                                        <td>Rizal</td>
                                        <td>2020-03-25 12:30:00</td>
                                    </tr>
                                    <tr>
                                        <td>Santai Pagi</td>
                                        <td>Food & Beverages</td>
                                        <td>Ariff</td>
                                        <td>2020-01-25 15:20:00</td>
                                    </tr>
                                    <tr>
                                        <td>Salt & Pepper</td>
                                        <td>Food & Beverages</td>
                                        <td>Zamarul</td>
                                        <td>2020-11-18 15:20:00</td>
                                    </tr>
                                    <tr>
                                        <td>Warung Pak Man</td>
                                        <td>Food & Beverages</td>
                                        <td>Lukman</td>
                                        <td>2020-12-12 16:20:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- order list area end -->
            </div>
        </div>
        <!-- main content area end -->
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
