<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>


<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!-- start amcharts -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<!-- all line chart activation -->
<script src="assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="assets/js/pie-chart.js"></script>
<!-- all bar chart -->
<script src="assets/js/bar-chart.js"></script>
<!-- all map chart -->
<script src="assets/js/maps.js"></script>
<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 js-->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstrap bundle js-->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js-->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- chartjs js-->
<script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>

<!-- main js-->
<script src="assets/libs/js/main-js.js"></script>
<!-- jvactormap js-->
<script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- sparkline js-->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<script src="assets/vendor/charts/sparkline/spark-js.js"></script>
<!-- dashboard sales js-->
<script src="assets/libs/js/dashboard-sales.js"></script>
<!-- barchart customer segmentation -->
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


<!-- half doughnut sentiment analysis -->
<script>
  var ctx = document.getElementById("sent_analysis");
        var dashboardChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Negative", "Neutral", "Positive"],
            datasets: [{
                label: '# of Votes',
                data: [33, 12, 55],
                backgroundColor: [
                    'rgba(231, 76, 60, 1)',
                    'rgba(255, 164, 46, 1)',
                    'rgba(46, 204, 113, 1)'
                ],
                borderColor: [
                    'rgba(255, 255, 255 ,1)',
                    'rgba(255, 255, 255 ,1)',
                    'rgba(255, 255, 255 ,1)'
                ],
                borderWidth: 10
            }]

        },
        options: {
            rotation: 1 * Math.PI,
            circumference: 1 * Math.PI,
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            },
            cutoutPercentage: 60,
        }
    });
</script>




