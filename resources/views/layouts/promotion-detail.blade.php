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
                                    <h4 class="header-title">Promotion Details</h4>
                                    <img src = "{{asset('images/'. $promotion->Promo_Image)}}" class="center">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Name</th>
                                                        <td>{{ $promotion->Promo_Name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Description</th>
                                                        <td>{{ $promotion->Promo_Descr }}
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Discount</th>
                                                        <td>{{ $promotion->Promo_Discount }} %
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Date created</th>
                                                        <td>{{ $promotion->created_at}} </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Start date</th>
                                                        <td>{{ $promotion->Promo_Start }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">End date</th>
                                                        <td>{{ $promotion->Promo_End }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Status</th>
                                                        <td>{{ $promotion->Promo_Status }} </td>
                                                    </tr>
                                            </table>
                                            <a class="btn btn-danger" style=" margin-right: 10px; margin-top: 10px"
                                            href="{{ route('promotion.index') }}">Back</a>
                                        </div>
                                    </div>
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
