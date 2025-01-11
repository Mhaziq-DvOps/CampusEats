@include('include.header')

<body>
    
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('include/sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            @include('include/header_area')
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"> Report</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Report / </span></li>
                                <li><span>Sales</span></li>
                            </ul>
                        </div>
                    </div>
                    @include('include.managerBar')
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">

                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="col-md-4">
                                <form action="/search" method="get">
                                    <div class="input-group">
                                    <input type="search" name="search" placeholder="Search..." style="margin-left: 15px; margin-top: 25px;" class="form-control">
                                    <span class="input-group-prepend"><button type="submit" class="btn btn-primary" style=" margin-top: 25px;"><i class="ti-search"></i></button></span>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                               

                                
                                    <div>
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-light">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Payment Type</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Order Date</th>

                                                   
                                                  

                                                </tr>
                                            </thead>
                                            @foreach ($Report as $report)
                                                <tbody>
                                                    <td>{{ $report->id }}</td>
                                                    <td>{{ $report->O_Name}}</td>
                                                    <td>{{ $report->O_Payment}}</td>

                                                    <td>{{ $report->O_Total_Price}}</td>

                                                    <td>{{ $report->created_at}}</td>
                                             
                                             
                                                </tbody>
                                            @endforeach
                                        </table>

                                    </div>
                                  
                                
                            </div>
                        </div>
                        <!-- table primary start -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        @include('include/footer')
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    @include('include/offset')
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>