@include('include.header')

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
                        <h4 class="page-title pull-left">Dashboard</h4>
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
                                    <form action="{{ route('catalogues.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="header-title">Add Product</h4>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Product Name:</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="Product Name" aria-describedby="inputGroupPrepend"
                                                    name="P_Name" Required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Short
                                                Description</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Short Description" id="example-text-input"
                                                name="S_Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Long
                                                Description (optional)</label>
                                            <textarea class="form-control" name="L_Description" rows="4"
                                                cols="50"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Price:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">RM</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        id="validationCustomUsername" placeholder="Price"
                                                        aria-describedby="inputGroupPrepend" name="P_Price" Required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Discount Price (optional):</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">RM</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        id="validationCustomUsername" placeholder="Discount Price"
                                                        aria-describedby="inputGroupPrepend" name="P_Disc_Price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Duration:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        id="validationCustomUsername" placeholder="Duration"
                                                        aria-describedby="inputGroupPrepend" name="P_Duration">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                            id="inputGroupPrepend">Minutes</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Quantity (optional):</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="Quantity" aria-describedby="inputGroupPrepend"
                                                    name="P_Quantity">
                                            </div>
                                        </div>

                                        {{-- Add Features Attributes FORM --}}
                                        @for ($i=0; $i <= 4; $i++) <div class="form-row">

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Features</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="Key" aria-describedby="inputGroupPrepend"
                                                    name="features[{{ $i }}][0]">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustomUsername"> Products Attributes</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="Value" aria-describedby="inputGroupPrepend"
                                                    name="features[{{ $i }}][1]">
                                            </div>

                                        </div>
                                        @endfor




                                <label for="validationCustomUsername">Image:</label><br>
                                <input type="file" name="P_Image" /><br>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Availability:</label><br>
                                    <label class="switch">
                                        <input type="hidden" value="0" name="P_Status">
                                        <input value="1" type="checkbox" name="P_Status" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <label for="example-text-input" class="col-form-label">Category:</label><br>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <select class="form-control" name="Cat_Id" style="height:50px">
                                            <option disabled selected>Select One</option>
                                            @foreach ($product_category as $product_category)
                                            <option value="{{ $product_category->P_Cat_Id }}">
                                                {{ $product_category->P_Cat_Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" style="float: right; margin-right: 10px"
                                    class="btn btn-success mb-3" name="upload">Add</button>
                                <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                    href="{{ route('catalogues.index') }}">Back</a>
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

<!-- footer area start-->
<footer>
    @include('include.footer')
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->