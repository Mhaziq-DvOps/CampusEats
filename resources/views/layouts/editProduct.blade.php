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

                                    {{-- {{dd($product->category)}} --}}
                                    <form action="{{ route('catalogues.update', $product->P_Id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h4 class="header-title">Edit Product</h4>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Product Name:</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    placeholder="Product Name" value="{{ $product->P_Name }}"
                                                    aria-describedby="inputGroupPrepend" name="P_Name" Required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Short
                                                Description</label>
                                            <input class="form-control" type="text"
                                                placeholder="Enter Short Description"
                                                value="{{ $product->S_Description }}" id="example-text-input"
                                                name="S_Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Long
                                                Description</label>
                                            <textarea class="form-control" name="L_Description" rows="4"
                                                cols="50">{{ $product->L_Description }}</textarea>
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
                                                        value="{{ $product->P_Price }}"
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
                                                        value="{{ $product->P_Disc_Price }}"
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
                                                        value="{{ $product->P_Duration }}"
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
                                                    placeholder="Quantity" value="{{ $product->P_Quantity }}"
                                                    aria-describedby="inputGroupPrepend" name="P_Quantity">
                                            </div>
                                        </div>


                                        {{-- Add Features Attributes FORM --}}
                                        @for ($i=0; $i <= 4; $i++) <div class="form-row">

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Features</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    aria-describedby="inputGroupPrepend" name="features[{{ $i }}][0]"
                                                    placeholder="key">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustomUsername">Products Attributes</label>
                                                <input type="text" class="form-control" id="validationCustomUsername"
                                                    aria-describedby="inputGroupPrepend" name="features[{{ $i }}][1]"
                                                    placeholder="value">
                                            </div>



                                </div>
                                @endfor




                                {{-- END --}}


                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Availability:</label><br>
                                    <label class="switch">
                                        <input type="hidden" value="0" name="P_Status">
                                        <input value="1" type="checkbox" name="P_Status" {{ $product->P_Status == 1 ? '
                                        checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <label for="validationCustomUsername">Image:</label><br>
                                <div class="mb-3">
                                    @if ($product->P_Image)
                                    <img src="{{ asset('images/' . $product->P_Image) }}" width="200" height="200"
                                        alt="Product image">
                                    @endif
                                </div>
                                <input type="file" name="P_Image"><br>
                                <div class="form-group">
                                </div>
                                <label for="example-text-input" class="col-form-label">Category:</label><br>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        {{-- {{dd($product->category)}} --}}
                                        <select class="form-control" name="Cat_Id" style="height:50px">
                                            <option value="{{ $product->category->P_Cat_Id }}">
                                                {{ $product->category->P_Cat_Name }}</option>
                                            @foreach ($categories as $product_category)
                                            <option value="{{ $product_category->P_Cat_Id }}">
                                                {{ $product_category->P_Cat_Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" style="float: right; margin-right: 10px"
                                    class="btn btn-success mb-3" name="upload">Edit</button>
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