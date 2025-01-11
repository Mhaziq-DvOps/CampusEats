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
                            <h4 class="page-title pull-left">Shop Information</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.html">Home</a></li>
                                <li><span>Shop Information</span></li>
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
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        @foreach ($shop as $shopInfo)
                                            <form action="{{ route('shopInfo.update', $shopInfo->Shop_Id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-row">
                                                    @if ($shopInfo->S_Image)
                                                    <img src="{{ asset('images/' . $shopInfo->S_Image) }}"
                                                    class="shop"><br>
                                                    @endif
                                                    @if ($shopInfo->S_Banner)
                                                    <img src="{{ asset('images/' . $shopInfo->S_Banner) }}"
                                                        class="banner"><br>
                                                    @endif
                                                    
                                                    
                                                </div>
                                                <label for="validationCustomUsername">Shop Image:</label><br>
                                                <input type="file" name="S_Image" /><br><br>
                                                <label for="validationCustomUsername">Shop Banner:</label><br>
                                                <input type="file" name="S_Banner" /><br>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="col-form-label">Shop Industry Category</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomUsername"
                                                            value="{{ $shopInfo->S_Category }}"
                                                            aria-describedby="inputGroupPrepend" readonly>
                                                        {{-- <select class="form-control">
                                                <option>Select</option>
                                                <option>Restaurant</option>
                                                <option>Chain Mart</option>
                                                <option>OffShore</option>
                                            </select> --}}
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">Shop Name:</label>
                                                        <input type="text" class="form-control"
                                                            id="validationCustomUsername"
                                                            value="{{ $shopInfo->S_Name }}" placeholder="Shop Name"
                                                            aria-describedby="inputGroupPrepend" name="S_Name" Required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Shop
                                                        Description</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter Shop Description"
                                                        value="{{ $shopInfo->S_Description }}" id="example-text-input"
                                                        name="S_Description" placeholder="Shop Description" Required>
                                                </div>
                                                <div class="form-group">
                                                    <h4 class="header-title">Functionality</h4>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mb-3">
                                                            <label for="example-text-input" class="col-form-label">Dine
                                                                In:</label><br>
                                                            <label class="switch">
                                                                <input type="hidden" value="0" name="Dine_In">
                                                                <input value="1" type="checkbox" name="Dine_In"
                                                                    {{ $shopInfo->Dine_In == 1 ? ' checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <br>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Booking:</label><br>
                                                            <label class="switch">
                                                                <input type="hidden" value="0" name="Booking">
                                                                <input value="1" type="checkbox" name="Booking"
                                                                    {{ $shopInfo->Booking == 1 ? ' checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="example-text-input"
                                                                class="col-form-label">Delivery:</label><br>
                                                            <label class="switch">
                                                                <input type="hidden" value="0" name="Delivery">
                                                                <input value="1" type="checkbox" name="Delivery"
                                                                    {{ $shopInfo->Delivery == 1 ? ' checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="example-text-input" class="col-form-label">Pick
                                                                Up:</label><br>
                                                            <label class="switch">
                                                                <input type="hidden" value="0" name="Pick_Up">
                                                                <input value="1" type="checkbox" name="Pick_Up"
                                                                    {{ $shopInfo->Pick_Up == 1 ? ' checked' : '' }}>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" style="float: right; margin-right: 10px"
                                                        class="btn btn-success mb-3" name="upload">Update</button>
                                            </form>
                                        @endforeach
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
        <!-- footer area start-->
        @include('include.footer')
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
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

</html>
