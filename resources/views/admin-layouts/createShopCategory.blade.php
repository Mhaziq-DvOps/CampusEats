<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('admin-assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin-assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
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
        @include('admin-include.sidebar')
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">

            <!-- header area start -->
            @include('admin-include.header')
            <!-- header area end -->

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Catalogue</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.html">Home</a></li>
                                <li><span>Catalogue</span></li>
                            </ul>
                        </div>
                    </div>
                    @include('admin-include.adminbar')
                </div>
            </div>
            <!-- page title area end -->

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('shopcategory.store') }}" method="POST">
                                            @csrf
                                            <h4 class="header-title">Edit Category</h4>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Add New Category:</label>
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        placeholder="Category Name" aria-describedby="inputGroupPrepend"
                                                        name="P_Cat_Name" Required>
                                                </div>
                                            </div>
                                            <button type="submit" style="float: right; margin-right: 10px"
                                                class="btn btn-success mb-3" name="upload">Add</button>
                                            <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                                href="{{ route('catalogues.index') }}">Back</a>
                                        
                                            </form>
                                            <div class="col-12 mt-5">
                                            <table class="table text-center">
                                                <thead class="text-uppercase bg-light">
                                                    <tr>
                                                        <th scope="col">Category Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                @foreach ($shop_category as $shopcategory)
                                                    <tbody>
                                                        <td>{{ $shopcategory->P_Cat_Name }}</td>
                                                        <td>
                                                        <form action="{{ route('shopcategory.destroy', $shopcategory->P_Cat_Id) }}"
                                                            method="POST">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('shopcategory.edit', $shopcategory->P_Cat_Id) }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        </td>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Textual inputs end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- *************************************************************************************************************************-->


        <!-- footer area start-->
        @include('include.footer')

        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- offset area start -->
    @include('include.offset')

    <!-- offset area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

