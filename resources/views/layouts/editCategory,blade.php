@include('include.header')

<body>

    <!-- preloader area start -->
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
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('product_category.update', $product_category->P_Cat_Id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h4 class="header-title">Edit Category Name</h4>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Category Name:</label>
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        placeholder="Category Name"
                                                        value="{{ $product_category->P_Cat_Name }}"
                                                        aria-describedby="inputGroupPrepend" name="P_Cat_Name" Required>
                                                </div>
                                            </div>
                                            <button type="submit" style="float: right; margin-right: 10px"
                                                class="btn btn-success mb-3" name="upload">Edit</button>
                                            <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                                href="{{ route('product_category.index') }}">Back</a>
                                        </form>
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

    {{-- <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script> --}}

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

