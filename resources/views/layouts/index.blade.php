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
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div class="page-container">
        @include('include.sidebar')

        <div class="main-content">
            @include('include.header_area')

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

            <div class="main-content-inner">
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Total Orders</div>
                                            <h2>{{ $totalOrder ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Pending</div>
                                            <h2>{{ $pendingOrder ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Completed</div>
                                            <h2>{{ $completeOrder ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mt-5">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon">Total Sales (RM)</div>
                                            <h2>{{ $totalSales ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-0">Sales</h4>
                                <div class="chart chart-sm">
                                    <canvas id="myChart" height=250></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-0">Rating</h4>
                                <h1>{{ $avgRating ?? 0 }}</h1>
                                <hr style="border:3px solid #f1f1f1">
                                <div>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <div class="row">
                                            <div class="side">{{ $i }} star</div>
                                            <div class="middle">
                                                @for ($j = 0; $j < $i; $j++)
                                                    <span class="fa fa-star checked" style="font-size:27px"></span>
                                                @endfor
                                                @for ($j = $i; $j < 5; $j++)
                                                    <span class="fa fa-star" style="font-size:27px"></span>
                                                @endfor
                                            </div>
                                            <div class="side right">{{ ${$i . 'Rating'} ?? 0 }}</div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more sections with similar conditional checks -->
            </div>
        </div>
    </div>

    @include('include.footer')
    @include('include.offset')
    @include('include.script')
</body>
