@include('include.header')
<head>
<style>
        * {
          box-sizing: border-box;
        }
        
        .heading {
          font-size: 25px;
          margin-right: 25px;
        }
        
        .checked {
          color: orange;
        }
        
        /* Three column layout */
        .side {
          float: left;
          width: 15%;
          margin-top:10px;
        }
        
        .middle {
          margin-top:10px;
          float: left;
          width: 70%;
        }
        
        /* Place text to the right */
        .right {
          text-align: right;
        }
        
        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        
        
        
        
    </style>
    </head>

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
                                    <h4 class="header-title">Product Details</h4>
                                    <img src = "{{asset('images/'. $product->P_Image)}}" class="center">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Name</th>
                                                        <td>{{ $product->P_Name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Price</th>
                                                        <td>RM
                                                            {{ number_format((float) $product->P_Price, 2, '.', '') }}
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Discount Price</th>
                                                        <td><?php
                                                            if (!$product->P_Disc_Price == 0) {
                                                                echo 'RM ' . number_format((float) $product->P_Disc_Price, 2, '.', '') . '';
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Duration</th>
                                                        <td>{{ $product->P_Duration }} Minutes</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Quantity</th>
                                                        <td>{{ $product->P_Quantity }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Short Description</th>
                                                        <td>{{ $product->S_Description }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Long Description</th>
                                                        <td>{{ $product->L_Description }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Rating</th>
                                                        <td><?php echo $avgRating?></td>
                                                    </tr>
                                                    <tr>
                                                    <th class="text-uppercase bg-light" scope="col"></th>
                                                        <td><div class="middle">
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><?php echo $fiveRating?></div>
                                                    </div></td>
                                                    </tr>
                                                    <tr>
                                                    <th class="text-uppercase bg-light" scope="col"></th>
                                                        <td><div class="middle">
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><?php echo $fourRating?></div>
                                                    </div></td>
                                                    </tr>
                                                    <tr>
                                                    <th class="text-uppercase bg-light" scope="col"></th>
                                                        <td><div class="middle">
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><?php echo $threeRating?></div>
                                                    </div></td>
                                                    </tr>
                                                    <tr>
                                                    <th class="text-uppercase bg-light" scope="col"></th>
                                                        <td><div class="middle">
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><?php echo $twoRating?></div>
                                                    </div></td>
                                                    </tr>
                                                    <tr>
                                                    <th class="text-uppercase bg-light" scope="col"></th>
                                                        <td><div class="middle">
                                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                        <span class="fa fa-star" style="font-size:27px"></span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><?php echo $oneRating?></div>
                                                    </div></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Reviews</th>
                                                        <td> <a class="btn btn-primary" style=" margin-right: 10px; margin-top: 10px"
                                            href="/catalogues/showReview/{{$product ->P_Id}}">See reviews here</a></td>
                                                    </tr>
                                                    
                                                    {{-- <tr>
                                                        <th class="text-uppercase bg-light" scope="col">Features</th>
                                                        <td>{{ $product->features }} </td>
                                                    </tr> --}}
                                            </table>

                                            
                                            <a class="btn btn-danger" style=" margin-right: 10px; margin-top: 10px"
                                            href="{{ route('catalogues.index') }}">Back</a>
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
