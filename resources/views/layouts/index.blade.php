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
            margin-top: 10px;
        }

        .middle {
            margin-top: 10px;
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

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
                            <h4 class="page-title pull-left">Dashboard</h4>
                        </div>
                    </div>
                    @include('include.managerBar')
                </div>
            </div>
            <!-- page title area end -->

            <!-- main content inner start -->
            <div class="main-content-inner">
                <!-- dashboard content start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Total Orders</div>
                                            <h2>
                                                <?php echo $totalOrder?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Pending</div>
                                            <h2>
                                                <?php echo $pendingOrder?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Completed</div>
                                            <h2>
                                                <?php echo $completeOrder?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Total Sales (RM)</div>
                                            <h2>
                                                <?php echo $totalSales?>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Statistics area start -->
                    <div class="col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Sales</h4>

                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm">
                                        <canvas id="myChart" height=250></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Statistics area end -->
                    <!-- rating customer area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card h-full">
                            <div class="card-body" style="padding:25px, 25px, 25px, 25px">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Rating</h4>
                                    <h1>
                                        <?php echo $avgRating?>
                                    </h1>


                                </div>
                                <hr style="border:3px solid #f1f1f1">

                                <div class="row" style="padding:5px">
                                    <div class="side">
                                        <div>5 star</div>
                                    </div>
                                    <div class="middle">
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                    </div>
                                    <div class="side right">
                                        <div>
                                            <?php echo $fiveRating?>
                                        </div>
                                    </div>
                                    <div class="side">
                                        <div>4 star</div>
                                    </div>
                                    <div class="middle">
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                    </div>
                                    <div class="side right">
                                        <div>
                                            <?php echo $fourRating?>
                                        </div>
                                    </div>
                                    <div class="side">
                                        <div>3 star</div>
                                    </div>
                                    <div class="middle">
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                    </div>
                                    <div class="side right">
                                        <div>
                                            <?php echo $threeRating?>
                                        </div>
                                    </div>
                                    <div class="side">
                                        <div>2 star</div>
                                    </div>
                                    <div class="middle">
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                    </div>
                                    <div class="side right">
                                        <div>
                                            <?php echo $twoRating?>
                                        </div>
                                    </div>
                                    <div class="side">
                                        <div>1 star</div>
                                    </div>
                                    <div class="middle">
                                        <span class="fa fa-star checked" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                        <span class="fa fa-star" style="font-size:27px"></span>
                                    </div>
                                    <div class="side right">
                                        <div>
                                            <?php echo $oneRating?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- rating customer area end -->
                </div>

                <div class="row">
                    <!-- recent order start -->
                    <div class="col-xl-8 col-lg-7 col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Most Popular Products</h4>
                                    <a class="btn btn-primary mb-3" href="/order_trends" role="button">View Details</a>
                                </div>
                                <div class="align-self-center w-100" style="padding:10px">
                                    <div id="popularChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- recent order end -->
                    <!-- popular product start -->
                    <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Top Customer</h4>
                                    <a class="btn btn-primary mb-3" href="/cust_analytics" role="button">View
                                        Details</a>
                                </div>
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Total Spend</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popularCustomer as $popularCustomer)
                                        <tr height="60px">

                                            <td>{{ $popularCustomer->name }}</td>
                                            <td>{{ $popularCustomer->total_spend }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- popular product end -->
                </div>

                <div class="row">
                    <!-- recent order start -->
                    <div class="col-xl-12 col-lg-7 col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="header-title mb-0">Sales vs Expenses Comparison</h4>
                                    <a class="btn btn-primary mb-3" href="/report" role="button">View Details</a>
                                </div>
                                <div class="align-self-center w-100" style="padding:10px">
                                    <canvas id="comparelinechart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- recent order end -->

                </div>


                <!-- dashboard content end -->

            </div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- container content area end -->

    <!-- footer area start-->
    @include('include.footer')
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- offset area start -->
    @include('include.offset')
    <!-- offset area end -->

    @include('include.script')

    <script>
        var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var yValues = <?php echo $salesChart; ?>;
        var ctx = document.getElementById("myChart").getContext("2d");   
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            
            new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Sales",
                    fill: true,
                    lineTension: 0.4,
                    backgroundColor: gradient,
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {display: false},
                maintainAspectRatio: false,
                tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                scales: {
                    xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                    yAxes: [{
                        ticks: {
                            min: 0, 
                            max:50,
                            stepSize: 10
                        },   
                        gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                                    
                        
                            
                    }]
                }
            }
            });
    </script>

    //
    <!-- bar chart from google -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);
  
        function drawStuff() {

           
                var data = new google.visualization.arrayToDataTable([
                                            ['Product', 'Total Order'],
                                            <?php echo $popularChart; ?>
                                        ]);
            
  
          var options = {
            
            chartArea: {
                width: '70%'
            },
            colors: ['#D7E3F4'],
            hAxis: {
                title: 'Total Spend (RM)',
                minValue: 0,
                maxValue: 40,
                       
            },
            vAxis: {
                title: 'Customer Name'
       
            
            },
           
            legend: { position: 'none' },
            
            bars: 'vertical', // Required for Material Bar Charts.
            width:600,
            height:300,
            bar: { groupWidth: "50%" }
          };
  
          var chart = new google.charts.Bar(document.getElementById('popularChart'));
          chart.draw(data, options);
        };

        
    </script>
    //
    <!-- end bar chart from google -->

    // LINE CHART 2
    <script>
        var xValues = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var yValues = <?php echo $salesChart; ?>;
        
        var yValues2 = <?php echo $expensesChart; ?>;

        new Chart("comparelinechart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0.4,
                backgroundColor: "rgba(6, 109, 255, 0.9)",
                borderColor: "rgba(6, 109, 255, 0.4)",
                data: yValues
            },
            {
                fill: false,
                lineTension: 0.4,
                backgroundColor: "rgba(255, 99, 71, 1)",
                borderColor: "rgba(255, 99, 71, 0.8)",
                data: yValues2
            },
            ]
        },
        options: {
            legend: {display: false},
            scales: {
            yAxes: [{ticks: {min: 0, max:100}}],
            }
        }
        });
    </script>


</body>