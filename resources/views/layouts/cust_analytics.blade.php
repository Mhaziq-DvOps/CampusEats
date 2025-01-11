@include('include.header')

<head>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
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
                            <h4 class="page-title pull-left">Customer Analytics</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Customer Analytics</span></li>
                            </ul>
                        </div>
                    </div>
                    @include('include.managerBar')
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">


                    {{-- ADD FROM ADMINKIT-DEV --}}
                    <div class="row" style="padding: 30px 0px 0px 15px">

                        {{-- customer details start --}}
						<div class="col-xl-6 col-xxl-5 d-flex"  >
							<div class="w-100">                              
                    
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="header-title mb-0">Total Customer</h5>
													</div>

													<div class="col-auto">
														<div class="seofct-icon" style="padding: 4px 5px 0px 5px; color: rgba(98, 97, 167, 0.562)">
															<i class="fa fa-users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $totalCustomer?></h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
													<span class="text-muted">Since February 2021</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="header-title mb-0">Today's Customer</h5>
													</div>

													<div class="col-auto">
														<div class="seofct-icon" style="padding: 4px 5px 0px 5px; color: rgba(109, 167, 97, 0.562)">
															<i class="fa fa-calendar-plus-o"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $todayCustomer?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Since yesterday</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="header-title mb-0">New Cuctomer</h5>
													</div>

													<div class="col-auto">
														<div class="seofct-icon" style="padding: 4px 5px 0px 5px; color: rgba(167, 119, 97, 0.562)">
															<i class="fa fa-user-plus"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $newCustomer?></h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="header-title mb-0">Repeated Customer</h5>
													</div>

													<div class="col-auto">
														<div class="seofct-icon" style="padding: 4px 5px 0px 5px; color: rgba(177, 174, 174, 0.562)">
															<i class="fa fa-repeat"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $repeatCustomer?></h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

                        {{-- end customer details --}}
                    
                        {{-- customer line chart --}}
						<div class="col-xl-6 col-xxl-5 d-flex" >

							<div class="card flex-fill w-100">
								<div class="s-report-title d-flex justify-content-between" style="padding:25px 25px 0px 25px">
                                    <h4 class="header-title mb-0" style="padding:0px">Customer Analytics</h4>
                                    
                                </div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="customerChart" height="270"></canvas>
									</div>
								</div>
							</div>
						</div>

                        {{-- end customer line chart --}}
					
                   

                    <div class="row" style="padding: 30px 10px 0px 15px">

                        {{-- top popular customer --}}
						<div class="col-12 col-lg-6 col-xxl-6 d-flex">
							<div class="card flex-fill">
								<div class="s-report-title d-flex justify-content-between" style="padding:25px 25px 0px 25px">
                                    {{-- <h4 class="header-title mb-0">Top 5 Spender Customer</h4> --}}
                                    <select class="header-title mb-0" style="padding:6px; border:0;" onchange="drawStuff()" id="dataCustomerRank">
                                        <option value="0" selected="">Top Spender Customer</option>
                                        <option value="1">Top Frequent Customer</option>
                                    </select>
                                    
                                </div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100" style="padding:10px">	
                                        <div id="spendCust" style="height: 270px"></div>
									</div>
								</div>
							</div>
						</div>
                        {{-- end top popular customer --}}

                        {{-- Review Word Cloud chart start --}}
						<div class="col-12 col-lg-3 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="s-report-title d-flex justify-content-between" style="padding:25px 25px 0px 25px">
                                    <h4 class="header-title mb-0">Most Popular Word</h4>
                                    
                                </div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										
											
                                        <div id="wordCloud"></div>
											
										

										
									</div>
								</div>


							</div>
						</div>
                        {{-- Review Word Cloud chart end --}}

                        {{-- sentiment analysis chart start --}}
						<div class="col-12 col-lg-3 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="s-report-title d-flex justify-content-between" style="padding:25px 25px 0px 25px">
                                    <h4 class="header-title mb-0">Sentiment Analysis</h4>
                                    <select class="custome-select border-0 pr-3" onchange="filterDataSentiment()" id="dataSentiment">
                                        <option value="0" selected="">All Time</option>
                                        <option value="1">Last 7 Days</option>
                                        <option value="2">Last 2 Months</option>
                                        <option value="3">Annual</option>
                                    </select>
                                </div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="myChart"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Positive</td>
													<td class="text-end"><?php echo $sentimentPositive?></td>
												</tr>
												<tr>
													<td>Negative</td>
													<td class="text-end"><?php echo $sentimentNegative?></td>
												</tr>
												<tr>
													<td>Neutral</td>
													<td class="text-end"><?php echo $sentimentNeutral?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>


							</div>
						</div>
                        {{-- sentiment analysis chart end --}}
					</div>

                    
                    {{-- END FROM ADMINKIT-DEV --}}



                    {{-- customer breakdown area start --}}
                    <div class="sales-report-area sales-style-two" style="padding: 0px 25px 25px 25px">
                        <div class="row">
                            <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                                <div class="single-report">
                                    <div class="s-sale-inner pt--30 mb-3">
                                        <h4 class="header-title mb-0">Customer by </h4>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Gender</h4>
                                            <select class="customer-select border-0 pr-3" onchange="filterDataGender()" id="dataGender">
                                                <option value="0" selected="">All Time</option>
                                                <option value="1">Last 7 Days</option>
                                                <option value="2">Last 2 Months</option>
                                                <option value="3">Annual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="cust_jantina" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                                <div class="single-report">
                                    <div class="s-sale-inner pt--30 mb-3">
                                        <h4 class="header-title mb-0">Customer by </h4>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Age</h4>
                                            <select class="custome-select border-0 pr-3" onchange="filterDataAge()" id="dataAge">
                                                <option value="0" selected="">All Time</option>
                                                <option value="1">Last 7 Days</option>
                                                <option value="2">Last 2 Months</option>
                                                <option value="3">Annual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="cust_umur" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                                <div class="single-report">
                                    <div class="s-sale-inner pt--30 mb-3">
                                        <h4 class="header-title mb-0">Customer by </h4>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Marital</h4>
                                            <select class="custome-select border-0 pr-3" onchange="filterDataMarital()" id="dataMarital">
                                                <option value="0" selected="">All Time</option>
                                                <option value="1">Last 7 Days</option>
                                                <option value="2">Last 2 Months</option>
                                                <option value="3">Annual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="cust_marital" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                                <div class="single-report">
                                    <div class="s-sale-inner pt--30 mb-3">
                                        <h4 class="header-title mb-0">Customer by </h4>
                                        <div class="s-report-title d-flex justify-content-between">
                                            <h4 class="header-title mb-0">Race</h4>
                                            <select class="custome-select border-0 pr-3" onchange="filterDataRace()" id="dataRace">
                                                <option value="0" selected="">All Time</option>
                                                <option value="1">Last 7 Days</option>
                                                <option value="2">Last 2 Months</option>
                                                <option value="3">Annual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="cust_race" height="200"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- customer breakdown area end --}}



                </div>
            </div>
        </div>
        {{-- main content area end --}}
        {{-- footer area start--}}
        @include('include.footer')
        {{-- footer area end--}}
    </div>
    {{-- page container area end --}}
    {{-- offset area start --}}
    @include('include.offset')
    {{-- offset area end --}}

    @include('include.script')

    {{-- barchart customer segmentation --}}
    <script>
        var horizontalBarChart = new Chart("cust_segmentation", {
           type: 'horizontalBar',
           data: {
              labels: ["Platinum Customer", "Loyal Customer", "Recent Customer", "Potential Customer", "Loosing Customer", "Evasive Customer", "Lost Customer"],
              datasets: [{
                 data: [300, 320, 1000, 1100, 800, 600, 400],
                 backgroundColor: ["#004c6d", "#2d5f7e", "#4a7290", "#6486a2", "#7d9bb4", "#97b0c6", "#b1c6d9"], 
              }]
           },
           options: {
              tooltips: {
                enabled: false
              },
              responsive: true,
              legend: {
                 display: false,
                 position: 'bottom',
                 fullWidth: true,
                 labels: {
                   boxWidth: 10,
                   padding: 50
                 }
              },
              scales: {
                 yAxes: [{
                   barPercentage: 0.95,
                   gridLines: {
                     display: true,
                     drawTicks: true,
                     drawOnChartArea: false
                   },     
                    
                 }],
                 xAxes: [{
                     gridLines: {
                       display: true,
                       drawTicks: false,
                       tickMarkLength: 5,
                       drawBorder: false
                     },
                    ticks: {
                     padding: 5,
                     beginAtZero: true,  
                   },
                   
                 }]
              }
           }
        });
    </script>

    {{-- word cloud start --}}
    <script>
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
        zingchart.MODULESDIR = 'https://cdn.zingchart.com/modules/';
        var myConfig = {
        type: 'wordcloud',
        options: {
            text: 'The food was exposed, so many fly. Very expensive and taste dull..owner and staff never smile and take so long to take order. Seriously regret! Various traditional Malay dishes and you can eat almost everything here. There is also kueh, satay and so much more. Food is nice. Price is slightly on the high side. It costs us RM1133.00 today for 30 people dine. There were 6 pcs Siakap 3 rasa, 6 pcs Pari Sambal Petai, Lala sambal manis 5 full plate, Limau Ais 5 jugs, Sotong Goreng Tepung 1.3kg, Tom Yam for 30 people, Kailan ikan masin 5 set and Ikan merah 3 rasa 1 pcs. Affordable and service fast than expected. However, disappointed as they dont accept table reservation before orders been made. They even discounted and need to pay only RM1100 without even kami minta to be discounted. Thanks! Accept MAYBANK QR Pay',
            minLength: 4,
            maxItems: 30,           
    
            
        }
        };
        zingchart.render({
        id: 'wordCloud',
        data: myConfig,
        height: 300,
        width: '100%'
        });
  

    </script>
    {{-- word cloud end --}}



    {{-- sentiment analysis pie chart --}}
    <script>
        var xValues = ["Negative", "Neutral", "Positive"];
        var yValues = <?php echo $sentimentAnalysis; ?>;
        var barColors = [
            "#FA586D",
            "#FEAC00",
            "#11BA5D"
        ];

        var sentimentChart = new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {
                display: false
                },
            
            cutoutPercentage: 65
        }
        });

        function filterDataSentiment() {
            

            if (document.getElementById("dataSentiment").value == 0) {
                var sentimentAllTime = <?php echo $sentimentAnalysis; ?>;
                sentimentChart.data.datasets[0].data = sentimentAllTime;
            }
            else if (document.getElementById("dataSentiment").value == 1) {
                var sentimentWeekly = <?php echo $sentimentAnalysisWeek; ?>;
                sentimentChart.data.datasets[0].data = sentimentWeekly;
            }
            else if (document.getElementById("dataSentiment").value == 2) {
                var sentimentMonth = <?php echo $sentimentAnalysisMonth; ?>;
                sentimentChart.data.datasets[0].data = sentimentMonth;
            }
            else if (document.getElementById("dataSentiment").value == 3) {
                var sentimentAnnual = <?php echo $sentimentAnalysisYear; ?>;
                sentimentChart.data.datasets[0].data = sentimentAnnual;
            }

            sentimentChart.update();
            
        }
    </script>

    // <!-- end sentiment analysis pie chart -->

    // <!-- bar chart from google -->
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);
  
        function drawStuff() {

            if (document.getElementById("dataCustomerRank").value == 0) {
                var data = new google.visualization.arrayToDataTable([
                                            ['Customer', 'Total Spend (RM)'],
                                            <?php echo $topSpendCustomer; ?>
                                        ]);
                
            }
            else if (document.getElementById("dataCustomerRank").value == 1) {
                var data = new google.visualization.arrayToDataTable([
                                            ['Customer', 'Total Order '],
                                            <?php echo $topFrequentCustomer; ?>
                                        ]);
               
            }
  
          var options = {
            
            chartArea: {
                width: '70%'
            },
            colors: ['#D7E3F4'],
            hAxis: {
                title: 'Total Spend (RM)',
                minValue: 0,
                       
            },
            vAxis: {
                title: 'Customer Name'
            },
           
            legend: { position: 'none' },
            
            bars: 'horizontal', // Required for Material Bar Charts.
            width:540,
            height:250,
            bar: { groupWidth: "80%" }
          };
  
          var chart = new google.charts.Bar(document.getElementById('spendCust'));
          chart.draw(data, options);
        };

        
    </script>
    //<!-- end bar chart from google -->


    // <!-- customer by gender female male -->
       
    <script>
        
        var xValues = ["Female", "Male"];
        var yValues = <?php echo $custGender; ?>;

        var barColors = [
        "#FF7043",
        "#FFA726",
        ];

        
        var genderChart = new Chart("cust_jantina", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {
                position: 'bottom',
                align: 'start',
                labels: {
                    
                    boxWidth: 25,
                    padding: 20
                }
            },
            
        }
        });

        function filterDataGender() {
            

            if (document.getElementById("dataGender").value == 0) {
                var genderAllTime = <?php echo $custGender; ?>;
                genderChart.data.datasets[0].data = genderAllTime;
            }
            else if (document.getElementById("dataGender").value == 1) {
                var genderWeekly = <?php echo $custGenderWeek; ?>;
                genderChart.data.datasets[0].data = genderWeekly;
            }
            else if (document.getElementById("dataGender").value == 2) {
                var genderMonth = <?php echo $custGenderMonth; ?>;
                genderChart.data.datasets[0].data = genderMonth;
            }
            else if (document.getElementById("dataGender").value == 3) {
                var genderAnnual = <?php echo $custGenderYear; ?>;
                genderChart.data.datasets[0].data = genderAnnual;
            }

            genderChart.update();
           
        }
    </script>

    // <!-- customer by age -->
    <script>
        var xValues = ["<30 y/o", ">30 y/o"];
        var yValues = <?php echo $custAge; ?>;
        var barColors = [
        "#FFCA28",
        "#FFEE58",
        ];
        
        var ageChart = new Chart("cust_umur", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {
                position: 'bottom',
                labels: {
                    
                    boxWidth: 20,
                    padding: 20
                }
            }
        }
        });

        function filterDataAge() {
            

            if (document.getElementById("dataAge").value == 0) {
                var ageAllTime = <?php echo $custAge; ?>;
                ageChart.data.datasets[0].data = ageAllTime;
            }
            else if (document.getElementById("dataAge").value == 1) {
                var ageWeekly = <?php echo $custAgeWeek; ?>;
                ageChart.data.datasets[0].data = ageWeekly;
            }
            else if (document.getElementById("dataAge").value == 2) {
                var ageMonth = <?php echo $custAgeMonth; ?>;
                ageChart.data.datasets[0].data = ageMonth;
            }
            else if (document.getElementById("dataAge").value == 3) {
                var ageAnnual = <?php echo $custAgeYear; ?>;
                ageChart.data.datasets[0].data = ageAnnual;
            }

            ageChart.update();
            
        }
    </script>



    //<!-- customer by race -->
    <script>
            var xValues = ["Malay", "Chinese", "Indian", "Other"];
            var yValues = <?php echo $custRace; ?>;
            var barColors = [
            "#D4E157",
            "#9CCC65",
            "#66BB6A",
            ];
            
            var raceChart = new Chart("cust_race", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {
                position: 'bottom',
                align: 'start',
                labels: {
                    
                    boxWidth: 20,
                    padding: 20
                }
            }
            }
            });

            function filterDataRace() {
           

            if (document.getElementById("dataRace").value == 0) {
                var raceAllTime = <?php echo $custRace; ?>;
                raceChart.data.datasets[0].data = raceAllTime;
            }
            else if (document.getElementById("dataRace").value == 1) {
                var raceWeekly = <?php echo $custRaceWeek; ?>;
                raceChart.data.datasets[0].data = raceWeekly;
            }
            else if (document.getElementById("dataRace").value == 2) {
                var raceMonth = <?php echo $custRaceMonth; ?>;
                raceChart.data.datasets[0].data = raceMonth;
            }
            else if (document.getElementById("dataRace").value == 3) {
                var raceAnnual = <?php echo $custRaceYear; ?>;
                raceChart.data.datasets[0].data = raceAnnual;
            }

            raceChart.update();
            
            }
    </script>

    //<!-- customer line chart -->
    
    <script>
        
        var xValues = ["June '21", "Jul '21", "Aug '21", "Sept '21", "Oct '21", "Nov '21", "Dec '21", "Jan '22"];
        var yValues = <?php echo $customerChart; ?>;
        var ctx = document.getElementById("customerChart").getContext("2d");   
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            
            new Chart(document.getElementById("customerChart"), {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Customer",
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
                            max:10,
                            stepSize: 2
                        },   
                        gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
                                    
                        
                            
                    }]
                }
            }
            });
	</script>
        

    //<!-- customer by marital -->
    <script>
            var xValues = ["Single", "Married", "Widowed", "Divorced"];
            var yValues = <?php echo $custMarital; ?>;
            var barColors = [
            "#26C6DA",
            "#29B6F6",
            "#26A69A",
            "#b6cee3",
            ];
            
            var maritalChart = new Chart("cust_marital", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {
                position: 'bottom',
                labels: {
                    
                    boxWidth: 20,
                    padding: 20
                }
            }
            }
            });

            function filterDataMarital() {
            

            if (document.getElementById("dataMarital").value == 0) {
                var maritalAllTime = <?php echo $custMarital; ?>;
                maritalChart.data.datasets[0].data = maritalAllTime;
            }
            else if (document.getElementById("dataMarital").value == 1) {
                var maritalWeekly = <?php echo $custMaritalWeek; ?>;
                maritalChart.data.datasets[0].data = maritalWeekly;
            }
            else if (document.getElementById("dataMarital").value == 2) {
                var maritalMonth = <?php echo $custMaritalMonth; ?>;
                maritalChart.data.datasets[0].data = maritalMonth;
            }
            else if (document.getElementById("dataMarital").value == 3) {
                var maritalAnnual = <?php echo $custMaritalYear; ?>;
                maritalChart.data.datasets[0].data = maritalAnnual;
            }

            maritalChart.update();
            
            }
    </script>
    

</body>

   
</body>