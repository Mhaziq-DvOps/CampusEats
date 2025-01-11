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
                            <h4 class="page-title pull-left">Catalogue</h4>
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
                                <form action="/searchProduct" method="get">
                                    <div class="input-group">
                                    <input type="search" name="search" placeholder="Search Product Name" style="margin-left: 15px; margin-top: 25px;" class="form-control">
                                    <span class="input-group-prepend"><button type="submit" class="btn btn-primary" style=" margin-top: 25px;"><i class="ti-search"></i></button></span>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('product_category.index') }}"><input type="button"
                                        value="Edit Category" class="button1"></a>
                                <a href="{{ route('catalogues.create') }}"><input type="button" value="Add Product"
                                        class="button1"></a>
                                <nav>
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                        @foreach ($category as $Category)
                                        <a class="nav-item nav-link" id="{{$Category->P_Cat_Id}}" data-toggle="tab"
                                            href="#category{{$Category->P_Cat_Id}}" role="tab" aria-controls="nav-home"
                                            aria-selected="true">{{$Category->P_Cat_Name}}</a>
                                            @endforeach  
                                    </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="single-table ">
                                        <table class="table text-center" >
                                            <thead class="text-uppercase bg-light">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Discount Price</th>
                                                    <th scope="col">Duration</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Availability</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($products as $product)
                                                <tbody>
                                                <tr>
                                                    <td>{{ $product->P_Id }}</td>
                                                    <td>{{ $product->P_Name }}</td>
                                                    <td>RM
                                                        {{ number_format((float) $product->P_Price, 2, '.', '') }}
                                                    </td>
                                                    <td><?php
                                                    if (!$product->P_Disc_Price == 0) {
                                                        echo 'RM ' . number_format((float) $product->P_Disc_Price, 2, '.', '') . '';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?></td>
                                                    <td>{{ $product->P_Duration}} Minutes</td>
                                                    <td><img src = "{{asset('images/'. $product->P_Image)}}" height=70 width=70></td>
                                                    <td>{{ $product->P_Quantity}}</td>
                                                    <td>
                                                        @if ($product->P_Status == '1')
                                                            <label class="switch">
                                                                <input type="checkbox" checked onclick="return false;">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" onclick="return false;">
                                                                <span class="slider round"></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('catalogues.destroy', $product->P_Id) }}"
                                                            method="POST">
                                                            <a class="btn btn-secondary text-white" href="{{ route('catalogues.show', $product->P_Id) }}">View</a>

                                                            <a class="btn btn-primary"
                                                                href="{{ route('catalogues.edit', $product->P_Id) }}">Edit</a>

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                    @foreach ($category as $P_Cat)
                                    <div class="tab-pane fade show " id="category{{$P_Cat->P_Cat_Id}}" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="table-responsive">
                                        <table class="table text-center" >
                                            <thead class="text-uppercase bg-light">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Discount Price</th>
                                                    <th scope="col">Duration</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Availability</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                            $catProduct = App\Models\Product::where('Cat_id',$P_Cat->P_Cat_Id)->orderBy('Cat_id','DESC')->get();
                                            @endphp
                                            @foreach ($catProduct as $product)
                                                <tbody>
                                                    <td>{{ $product->P_Id }}</td>
                                                    <td>{{ $product->P_Name }}</td>
                                                    <td>RM
                                                        {{ number_format((float) $product->P_Price, 2, '.', '') }}
                                                    </td>
                                                    <td><?php
                                                    if (!$product->P_Disc_Price == 0) {
                                                        echo 'RM ' . number_format((float) $product->P_Disc_Price, 2, '.', '') . '';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?></td>
                                                    <td>{{ $product->P_Duration}} Minutes</td>
                                                    <td><img src = "{{asset('images/'. $product->P_Image)}}" height=50 width=70></td>
                                                    <td>{{ $product->P_Quantity}}</td>
                                                    <td>
                                                        @if ($product->P_Status == '1')
                                                            <label class="switch">
                                                                <input type="checkbox" checked onclick="return false;">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch">
                                                                <input type="checkbox" onclick="return false;">
                                                                <span class="slider round"></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('catalogues.destroy', $product->P_Id) }}"
                                                            method="POST">
                                                            <a class="btn btn-secondary text-white" href="{{ route('catalogues.show', $product->P_Id) }}">View</a>

                                                            <a class="btn btn-primary"
                                                                href="{{ route('catalogues.edit', $product->P_Id) }}">Edit</a>

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tbody>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                    @endforeach
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

