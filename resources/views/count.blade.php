<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
	<title>Kalkulasi Pemilihan Presiden dan Wakil Presiden Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        body {
            background: url({{ asset('uploads/b1.jpg') }}) no-repeat center top;
            background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            min-height: 700px;
            background-attachment: fixed;
        }
        h1 {
            font-size: 43px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            word-spacing: 11px;
            letter-spacing: 6px;
            margin: 1.1em 0;
            text-align: center;
        }
        .white {
            color: #fff;
        }
        .tengah {
            width: 200px;
            margin: 0px auto;
        }
        .panel {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 0px;
        }
        .height {
            height: auto;
        }
        .form-control, .alert, .btn {
            border-radius: 0px;
        }
        .content {
            line-height: 1.5;
        }
    </style>
</head>
<body>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
        		<div class="panel panel-default">
        			<div class="panel-body">
        				<div class="row">
		        			<div class="col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body">
		                				<h2 class="white"><i class="fa fa-users"></i> Jumlah Mahasiswa</h2>
		                			</div>
		            			</div>
		        			</div>
		        			<div class="col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body">
		                				<div class="row">
						        			<div class="col-sm-12">
												<div class="panel panel-default">
													<div class="panel-body">
						                				<p class="white">
						                					<strong>Calon No 1</strong><span class="pull-right">50%</span>
						                				</p>
						                			</div>
						            			</div>
						        			</div>
						        			<div class="col-sm-12">
												<div class="panel panel-default">
													<div class="panel-body">
						                				<p class="white">
						                					<strong>Calon No 2</strong><span class="pull-right">50%</span>
						                				</p>
						                			</div>
						            			</div>
						        			</div>
						        			<div class="col-sm-12">
												<div class="panel panel-default">
													<div class="panel-body">
						                				<p class="white">
						                					<strong>Golput</strong><span class="pull-right">50%</span>
						                				</p>
						                			</div>
						                		</div>
											</div>
										</div>
		                			</div>
		            			</div>
		        			</div>
        				</div>
        			</div>
        		</div>
			</div>
			<div class="col-md-6 col-sm-6">
                <div class="panel panel-default">
                	<div class="panel-body height">
                		<canvas id="barChart" style="height:230px"></canvas>
                	</div>
                </div>
			</div>
			<div class="col-md-6 col-sm-6">
                <div class="panel panel-default">
                	<div class="panel-body height">
                		<canvas id="pieChart" style="height:250px"></canvas>
                	</div>
                </div>
			</div>
		</div>
	</div>


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('chartjs/Chart.min.js') }}"></script>
    <script>
    	$(document).ready(function() {
			//-------------
			//- PIE CHART -
			//-------------
			// Get context with jQuery - using jQuery's .get() method.
			var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
			var pieChart = new Chart(pieChartCanvas);
			var PieData = [
				{
					value: 700,
					color: "#f56954",
					highlight: "#f56954",
					label: "Calon No 1"
				},
				{
					value: 500,
					color: "#00a65a",
					highlight: "#00a65a",
					label: "Calon No 2"
				},
				{
					value: 100,
					color: "#00ffff",
					highlight: "#00ffff",
					label: "Golput"
				}
			];
			var pieOptions = {
				//Boolean - Whether we should show a stroke on each segment
				segmentShowStroke: false,
				//String - The colour of each segment stroke
				segmentStrokeColor: "rgba(255, 255, 255, 0.5)",
				//Number - The width of each segment stroke
				segmentStrokeWidth: 2,
				//Number - The percentage of the chart that we cut out of the middle
				percentageInnerCutout: 0, // This is 0 for Pie charts
				//Number - Amount of animation steps
				animationSteps: 100,
				//String - Animation easing effect
				animationEasing: "easeOutBounce",
				//Boolean - Whether we animate the rotation of the Doughnut
				animateRotate: true,
				//Boolean - Whether we animate scaling the Doughnut from the centre
				animateScale: false,
				//Boolean - whether to make the chart responsive to window resizing
				responsive: true,
				// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio: true,
				//String - A legend template
				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			};
			//Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			pieChart.Doughnut(PieData, pieOptions);

			//-------------
		    //- BAR CHART -
		    //-------------
		    var areaChartData = {
				labels: ["Calon No 1", "Calon No 2", "Golput"],
				datasets: [
					{
						label: "Electronics",
						fillColor: "rgba(0, 204, 153, 1)",
						// strokeColor: "rgba(210, 214, 222, 1)",
						pointColor: "rgba(210, 214, 222, 1)",
						pointStrokeColor: "#c1c7d1",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [700, 500, 100]
					},
					{
						label: "Digital Goods",
						fillColor: "rgba(60, 141, 188, 1)",
						strokeColor: "rgba(60, 141, 188, 1)",
						pointColor: "#3b8bba",
						pointStrokeColor: "rgba(60, 141, 188, 1)",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(60, 141, 188, 1)",
						data: [200, 400, 75]
					},
					{
						label: "Tech and Dig",
						fillColor: "rgba(0, 153, 0, 1)",
						strokeColor: "rgba(0, 153, 0, 1)",
						pointColor: "#3b8bba",
						pointStrokeColor: "rgba(0, 153, 0, 1)",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(0, 153, 0, 1)",
						data: [1000, 300, 650]
					}
				]
			};
		    var barChartCanvas = $("#barChart").get(0).getContext("2d");
		    var barChart = new Chart(barChartCanvas);
		    var barChartData = areaChartData;
		    // barChartData.datasets[1].fillColor = "#00a65a"; // green
		    // barChartData.datasets[1].strokeColor = "#00a65a"; // green
		    // barChartData.datasets[1].pointColor = "#00a65a"; // green
		    var barChartOptions = {
				//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
				scaleBeginAtZero: true,
				//Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines: false,
				//String - Colour of the grid lines
				scaleGridLineColor: "rgba(255, 255, 255, 0.05)",
				//Number - Width of the grid lines
				scaleGridLineWidth: 1,
				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines: true,
				//Boolean - If there is a stroke on each bar
				barShowStroke: true,
				//Number - Pixel width of the bar stroke
				barStrokeWidth: 2,
				//Number - Spacing between each of the X value sets
				barValueSpacing: 5,
				//Number - Spacing between data sets within X values
				barDatasetSpacing: 1,
				//String - A legend template
				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
				//Boolean - whether to make the chart responsive
				responsive: true,
				maintainAspectRatio: true
			};

		    barChartOptions.datasetFill = false;
		    barChart.Bar(barChartData, barChartOptions);
    	});
    </script>
</body>
</html>