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
                @include("admin-include.adminbar")
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
                                    <form action="{{ route('data.store' ) }}" method="POST">
                                        @csrf
                                        
                                        <h4 class="header-title">Add New Expenses</h4>
                                        
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label>Category</label>
                                                <select  id="category" name= "category" class="form-control" Required>
                                                    <option value="Food">Food</option>
                                                    <option value="Beverage">Beverage</option>
                                                    <option value="Merchandise">Merchandise</option>
                                                    <option value="Marketing">Marketing</option>
                                                    <option value="Utilities">Utilities</option>
                                                    <option value="Repairs and Maintenance">Repairs & Maintenance</option> 
                                                    <option value="Others">Others</option>
                                                </select>
                                        
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label>Expenses Title</label>
                                                <textarea type="text" class="form-control" 
                                                 name="name" Required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label>Amount</label>
                                                <textarea type="text" class="form-control" 
                                                name="amount" Required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label>Date</label>
                                                <input type="date" class="form-control"
                                                    name="date"
                                                    Required>
                                            </div>
                                        </div>
                                        <button type="submit" style="float: right; margin-right: 10px"
                                            class="btn btn-primary mb-3" name="edit">Save</button>
                                        <a class="btn btn-danger" style="float: right; margin-right: 10px"
                                            href="{{ route('data.index') }}">Back</a>
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
</div>
</body>
