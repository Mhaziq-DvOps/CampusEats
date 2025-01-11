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
                                <li><span>Expenses</span></li>
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
                                <a href="{{ route('data.create') }}"><input type="button" value="Add data"
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
                                            <thead class="text-uppercase bg-light">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Expense Category</th>
                                                    <th scope="col">Expense Title</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>

                                             
                                                </tr>
                                            </thead>
                                            @foreach ($list as $listdata)
                                                <tbody>
                                                
                                                    <td>{{ $listdata->id}}</td>
                                                    <td>{{ $listdata->category}}</td>
                                                    <td>{{ $listdata->name}}</td>
                                                    <td>{{ $listdata->amount}}</td>
                                                    <td>{{ $listdata->date}}</td>

                                           
                                                    
                                                   
                                                    
                                                    <td>
                                                        <form action="{{ route('data.destroy', $listdata->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-secondary text-white" href="{{ route('data.show', $listdata->id) }}">View</a>

                                                            <a class="btn btn-primary"
                                                                href="{{ route('data.edit', $listdata->id) }}">Edit</a>

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

