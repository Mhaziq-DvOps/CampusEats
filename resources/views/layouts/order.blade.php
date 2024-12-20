@php use Carbon\Carbon; @endphp
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
                            <h4 class="page-title pull-left">Order</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.html">Home</a></li>
                                <li><span>Order</span></li>
                            </ul>
                        </div>
                    </div>
                    @include('include.managerBar')
                </div>
            </div>
            <!-- page title area end -->

            <div class="main-content-inner">
                <div class="row">
                    <!-- Buttons Items start -->
                    <!-- tab start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="col-md-4">
                                <form action="/searchTracking" method="get">
                                    <div class="input-group">
                                    <input type="search" name="search" placeholder="Search Tracking Number" style="margin-left: 15px; margin-top: 25px;" class="form-control">
                                    <span class="input-group-prepend"><button type="submit" class="btn btn-primary" style=" margin-top: 25px;"><i class="ti-search"></i></button></span>
                                </div>
                                </form>
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">New</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Preparing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-completed-tab" data-toggle="pill"
                                        href="#pills-completed" role="tab" aria-controls="pills-completed"
                                        aria-selected="false">Completed</a>
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-light">
                                                        <tr>
                                                            <th scope="col">Tracking Number</th>
                                                            <th scope="col">Contact No.</th>
                                                            <th scope="col">Total Item</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Time</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Remarks</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $New = App\Models\Order::where('O_Status', 1)->whereDate('created_at', Carbon::now())->get();
                                                    @endphp
                                                    @foreach ($New as $new)
                                                    @if($new->O_Type != 'booking')
                                                        <tbody>
                                                            <tr>
                                                            <td>{{ $new->Tracking_No }}</td>
                                                            <td>{{ $new->O_Phone }}</td>
                                                            <td>@php
                                                                $Total_Quantity = 0;
                                                                $quantity = App\Models\OrderProduct::where('Order_Id', $new->id)->get();
                                                                foreach ($quantity as $prod) {
                                                                    $Total_Quantity += $prod->Order_Quantity;
                                                                }
                                                                echo $Total_Quantity;
                                                            @endphp</td>
                                                            <td>
                                                                @php
                                                                    $date = Carbon::parse($new->created_at)->format('d-m-Y');
                                                                    echo $date;
                                                                @endphp</td>
                                                            <td>{{ $new->created_at = Carbon::parse($new->created_at)->format('H:i:s') }}
                                                            </td>
                                                            <td>RM
                                                                {{ number_format((float) $new->O_Total_Price, 2, '.', '') }}
                                                            </td>
                                                            <td>
                                                                {{$new->Remarks}}
                                                            </td>
                                                            <td><button type="button" class="btn btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{ $new->id }}">
                                                                    View Order
                                                                </button></td>
                                                            </tr>
                                                        </tbody>
                                                        @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-light">
                                                        <tr>
                                                            <th scope="col">Tracking Number</th>
                                                            <th scope="col">Contact No.</th>
                                                            <th scope="col">Total Item</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Time</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Remark</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $Preparing = App\Models\Order::where('O_Status', 2)->get();
                                                    @endphp
                                                    @foreach ($Preparing as $preparing)
                                                        <tbody>
                                                            <td>{{ $preparing->Tracking_No }}</td>
                                                            <td>{{ $preparing->O_Phone }}</td>
                                                            <td>@php
                                                                $Total_Quantity = 0;
                                                                $quantity = App\Models\OrderProduct::where('Order_Id', $preparing->id)->get();
                                                                foreach ($quantity as $prod) {
                                                                    $Total_Quantity += $prod->Order_Quantity;
                                                                }
                                                                echo $Total_Quantity;
                                                            @endphp</td>
                                                            <td>
                                                                @php
                                                                    $date = Carbon::parse($preparing->created_at)->format('d-m-Y');
                                                                    echo $date;
                                                                @endphp</td>
                                                            <td>{{ $preparing->created_at = Carbon::parse($preparing->created_at)->format('H:i:s') }}
                                                            </td>
                                                            <td>RM
                                                                {{ number_format((float) $preparing->O_Total_Price, 2, '.', '') }}
                                                            </td>
                                                            <td>{{$preparing->Remarks}}</td>
                                                            <td><button type="button" class="btn btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{ $preparing->id }}">
                                                                    View Order
                                                                </button></td>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-completed" role="tabpanel"
                                        aria-labelledby="pills-completed-tab">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-light">
                                                        <tr>
                                                            <th scope="col">Tracking Number</th>
                                                            <th scope="col">Contact No.</th>
                                                            <th scope="col">Total Item</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Time</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Remark</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $Completed = App\Models\Order::where('O_Status', 3)->get();
                                                    @endphp
                                                    @foreach ($Completed as $completed)
                                                        <tbody>
                                                            <td>{{ $completed->Tracking_No }}</td>
                                                            <td>{{ $completed->O_Phone }}</td>
                                                            <td>@php
                                                                $Total_Quantity = 0;
                                                                $quantity = App\Models\OrderProduct::where('Order_Id', $completed->id)->get();
                                                                foreach ($quantity as $prod) {
                                                                    $Total_Quantity += $prod->Order_Quantity;
                                                                }
                                                                echo $Total_Quantity;
                                                            @endphp</td>
                                                            <td>
                                                                @php
                                                                    $date = Carbon::parse($completed->created_at)->format('d-m-Y');
                                                                    echo $date;
                                                                @endphp</td>
                                                            <td>{{ $completed->created_at = Carbon::parse($completed->created_at)->format('H:i:s') }}
                                                            </td>
                                                            <td>RM
                                                                {{ number_format((float) $completed->O_Total_Price, 2, '.', '') }}
                                                            </td>
                                                            <td>{{$completed->Remarks}}</td>
                                                            <td><button type="button" class="btn btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{ $completed->id }}">
                                                                    View Order
                                                                </button></td>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- tab end -->

                    @foreach ($orders as $Order)
                        @include('layouts.modal.editOrder')
                    @endforeach
                    <!-- ********************* -->
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

    @include('include.script')


</body>

</html>
