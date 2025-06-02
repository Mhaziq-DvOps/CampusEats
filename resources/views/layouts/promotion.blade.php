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
        @include('include.sidebar')
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">

            <!-- header area start -->
            @include('include.header_area')
            <!-- header area end -->

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Promotion</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.html">Home</a></li>
                                <li><span>Catalogue</span></li>
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
                            <hr>
                                        @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success')}}
                                        </div>
                                        @endif
                                        @if(Session::get('fail'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('fail')}}
                                        </div>
                                        @endif
                                <a href="{{ route('promotion.create') }}"><input type="button" value="Add Promotion"
                                        class="button1"></a>

                                        
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                        
                                    </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="table-responsive">
                                        <table class="table text-center" >
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Start</th>
                                                    <th scope="col">End</th>
                                                    <th scope="col">Date created</th>
                                                    <th scope="col">Banner Image</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($list as $promotion)
                                                <tbody>
                                                    <td>{{ $promotion->Promotion_Id }}</td>
                                                    <td>{{ $promotion->Promo_Name }}</td>
                                                    <td>{{ $promotion->Promo_Descr }}</td>
                                                    <td>{{ $promotion->Promo_Discount }}%</td>
                                                    <td>{{ $promotion->Promo_Status }}</td>
                                                    <td>{{ $promotion->Promo_Start }}</td>
                                                    <td>{{ $promotion->Promo_End }}</td>
                                                    <td>{{ $promotion->created_at }}</td>
                                                    
                                                    <td><img src = "{{asset('images/'. $promotion->Promo_Image)}}" height=70 width=70></td>
                                                   
                                                    
                                                    <td>
                                                        <form action="{{ route('promotion.destroy', $promotion->Promotion_Id) }}"
                                                            method="POST">
                                                            <a class="btn btn-secondary text-white" href="{{ route('promotion.show', $promotion->Promotion_Id) }}">View</a>

                                                            <a class="btn btn-primary"
                                                                href="{{ route('promotion.edit', $promotion->Promotion_Id) }}">Edit</a>

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
                        </div>
                        <!-- table primary start -->
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

