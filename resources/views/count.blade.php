<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
	<title>Kalkulasi Pemilihan Presiden dan Wakil Presiden Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
    	/**
    	 * My Style
    	 */
        body {
            background: url({{ asset('uploads/b1.jpg') }}) no-repeat center top;
            background-size: cover;
            max-width: 100%;
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

        /**
         * Scroll Effects
         */
        html, body {
			overflow: hidden;
		}

		.background {
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
			overflow: hidden;
			will-change: transform;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			height: 120vh;
			position: fixed;
			width: 100%;
			-webkit-transform: translateY(30vh);
			transform: translateY(30vh);
			-webkit-transition: all 1.2s cubic-bezier(0.22, 0.44, 0, 1);
			transition: all 1.2s cubic-bezier(0.22, 0.44, 0, 1);
		}
		.background:before {
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: rgba(0, 0, 0, 0.3);
		}
		.background:first-child {
			background-image: url({{ asset('uploads/b1.jpg') }});
			-webkit-transform: translateY(-15vh);
			transform: translateY(-15vh);
		}
		.background:first-child .content-wrapper {
			-webkit-transform: translateY(15vh);
			transform: translateY(15vh);
		}
		.background:nth-child(2) {
			background-image: url({{ asset('uploads/b1.jpg') }});
		}
		.background:nth-child(3) {
			background-image: url({{ asset('uploads/b1.jpg') }});
		}
		.background:nth-child(4) {
			background-image: url({{ asset('uploads/b1.jpg') }});
		}

		/* Set stacking context of slides */
		.background:nth-child(1) {
			z-index: 4;
		}

		.background:nth-child(2) {
			z-index: 3;
		}

		.background:nth-child(3) {
			z-index: 2;
		}

		.background:nth-child(4) {
			z-index: 1;
		}

		.content-wrapper {
			height: 100vh;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			text-align: center;
			-ms-flex-flow: column nowrap;
			flex-flow: column nowrap;
			color: #fff;
			/*font-family: Montserrat;*/
			text-transform: uppercase;
			-webkit-transform: translateY(40vh);
			transform: translateY(40vh);
			will-change: transform;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			-webkit-transition: all 1.7s cubic-bezier(0.22, 0.44, 0, 1);
			transition: all 1.7s cubic-bezier(0.22, 0.44, 0, 1);
		}
		.content-title {
			font-size: 12vh;
			line-height: 1.4;
		}

		.background.up-scroll {
			-webkit-transform: translate3d(0, -15vh, 0);
			transform: translate3d(0, -15vh, 0);
		}
		.background.up-scroll .content-wrapper {
			-webkit-transform: translateY(15vh);
			transform: translateY(15vh);
		}
		.background.up-scroll + .background {
			-webkit-transform: translate3d(0, 30vh, 0);
			transform: translate3d(0, 30vh, 0);
		}
		.background.up-scroll + .background .content-wrapper {
			-webkit-transform: translateY(30vh);
			transform: translateY(30vh);
		}

		.background.down-scroll {
			-webkit-transform: translate3d(0, -130vh, 0);
			transform: translate3d(0, -130vh, 0);
		}
		.background.down-scroll .content-wrapper {
			-webkit-transform: translateY(40vh);
			transform: translateY(40vh);
		}
		.background.down-scroll + .background:not(.down-scroll) {
			-webkit-transform: translate3d(0, -15vh, 0);
			transform: translate3d(0, -15vh, 0);
		}
		.background.down-scroll + .background:not(.down-scroll) .content-wrapper {
			-webkit-transform: translateY(15vh);
			transform: translateY(15vh);
		}
    </style>
</head>
<body>
	<br>
	<br>
	<div class="">
		{{-- <div class="row"> --}}
			<section class="background">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="content-wrapper">
							<h1>PEMILIHAN PRESIDEN MAHASISWA TAHUN 2017</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="background">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="content-wrapper">
		        		<div class="panel panel-default">
		        			<div class="panel-body">
            					<h1 class="white text-center">Jumlah Mahasiswa<br> {{ count($mhs) }}</h1>
		        			</div>
		        		</div>
	        		</div>
				</div>
			</div>
			</section>
			<section class="background">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 col-sm-6 col-md-offset-1">
					<div class="content-wrapper">
		                <div class="panel panel-default">
		                	<div class="panel-body height">
		                		<canvas id="barChart" style="height:230px"></canvas>
		                	</div>
		                </div>
	                </div>
				</div>
			</div>
			</section>
			<section class="background">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 col-sm-6 col-md-offset-1">
					<div class="content-wrapper">
		                <div class="panel panel-default">
		                	<div class="panel-body height">
		                		<canvas id="pieChart" style="height:250px"></canvas>
		                	</div>
		                </div>
	                </div>
				</div>
			</div>
			</section>
		{{-- </div> --}}
	</div>


	<script src='http://test.dev/lodash.min.js'></script>
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
				labels: ["PEMILIHAN PRESIDEN MAHASISWA USM"],
				datasets: [
					{
						label: "Calon 1",
						fillColor: "#aaa111",
						pointColor: "#aaa111",
						pointStrokeColor: "#c1c7d1",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [700]
					},
					{
						label: "Calon 2",
						fillColor: "#222bbb",
						pointColor: "#222bbb",
						pointStrokeColor: "#c1c7d1",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [550]
					},
					{
						label: "Golput",
						fillColor: "#c3c3c3",
						pointColor: "#c3c3c3",
						pointStrokeColor: "#c1c7d1",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [200]
					}
				]
			};
		    var barChartCanvas = $("#barChart").get(0).getContext("2d");
		    var barChart = new Chart(barChartCanvas);
		    var barChartData = areaChartData;
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
    <script>
		// ------------- VARIABLES ------------- //
		var ticking = false;
		var isFirefox = (/Firefox/i.test(navigator.userAgent));
		var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
		var scrollSensitivitySetting = 30; //Increase/decrease this number to change sensitivity to trackpad gestures (up = less sensitive; down = more sensitive) 
		var slideDurationSetting = 600; //Amount of time for which slide is "locked"
		var currentSlideNumber = 0;
		var totalSlideNumber = $(".background").length;

		// ------------- DETERMINE DELTA/SCROLL DIRECTION ------------- //
		function parallaxScroll(evt) {
			if (isFirefox) {
				//Set delta for Firefox
				delta = evt.detail * (-120);
			} else if (isIe) {
				//Set delta for IE
				delta = -evt.deltaY;
			} else {
				//Set delta for all other browsers
				delta = evt.wheelDelta;
			}

			if (ticking != true) {
				if (delta <= -scrollSensitivitySetting) {
					//Down scroll
					ticking = true;
					if (currentSlideNumber !== totalSlideNumber - 1) {
						currentSlideNumber++;
						nextItem();
					}
					slideDurationTimeout(slideDurationSetting);
				}
				if (delta >= scrollSensitivitySetting) {
					//Up scroll
					ticking = true;
					if (currentSlideNumber !== 0) {
						currentSlideNumber--;
					}
					previousItem();
					slideDurationTimeout(slideDurationSetting);
				}
			}
		}

		// ------------- SET TIMEOUT TO TEMPORARILY "LOCK" SLIDES ------------- //
		function slideDurationTimeout(slideDuration) {
			setTimeout(function() {
				ticking = false;
			}, slideDuration);
		}

		// ------------- ADD EVENT LISTENER ------------- //
		var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
		window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);

		// ------------- SLIDE MOTION ------------- //
		function nextItem() {
			var $previousSlide = $(".background").eq(currentSlideNumber - 1);
			$previousSlide.removeClass("up-scroll").addClass("down-scroll");
		}

		function previousItem() {
			var $currentSlide = $(".background").eq(currentSlideNumber);
			$currentSlide.removeClass("down-scroll").addClass("up-scroll");
		}
    </script>
</body>
</html>