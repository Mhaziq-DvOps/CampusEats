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
                                    <form action="{{ route('promotion.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="header-title">Add Promotion</h4>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Promotion Name:</label>
                                                <input type="text" class="form-control" id="Promo_Name"
                                                    placeholder="Promotion Name" aria-describedby="inputGroupPrepend"
                                                    name="Promo_Name" Required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Promotion
                                                Description </label>
                                            <textarea class="form-control" name="Promo_Descr" rows="4"
                                                cols="50" required  placeholder="Promotion Description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Promotion
                                                Discount % </label>
                                            <input type="text" class="form-control" name="Promo_Discount" rows="4"
                                                cols="50" required>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Start date:</label>
                                                <div class="form-group">
                                                
                                                <input type="date" class="form-control" name="Promo_Start"  type="date" required >
                                                
                                                <span style="color:red"> @error ('start_date') {{ $message}} @enderror </span>
                                            </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">End date:</label>
                                                <div class="form-group">
                                                
                                                <input type="date" class="form-control" name="Promo_End"  type="date" required >
                                                
                                                <span style="color:red"> @error ('end_date') {{ $message}} @enderror </span>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="Promo_Status" >
                                            <option>Pending</option>
                                            <option>Ongoing</option>
                                            <option>Ended</option>
                                            </select>
                                            <span style="color:red"> @error ('gender') {{ $message}} @enderror </span>
                                        </div>
                                        <label for="validationCustomUsername">Promotion Banner:</label><br>
                                        <input type="file" name="Promo_Image" required/><br>
                                        
                                        <div class="form-row">
                                            
                                        </div>
                                        <button type="submit" style="float: right; margin-right: 10px"
                                            class="btn btn-success mb-3" name="upload">Add</button>
                                        <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                            href="{{ route('promotion.index') }}">Back</a>
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
