<script>if (!window.jQuery) { document.write('<script src="<?php echo base_url('assets/js/bin/jquery-2.1.4.min.js')?>"><\/script>'); }</script>
<!-- jQuery Plugins -->

<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/prism.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/simplebar.min.js')?>"></script>
<!--materialize js-->
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/materialize.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/initialize.js')?>"></script>
<!-- chart js-->
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/charts/chart.core.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/charts/chart.line.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/charts/chart.doughnut.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/charts/chart.bar.min.js')?>"></script>
<!-- count to js-->
<script type="text/javascript" src="<?php echo base_url('assets/js/bin/plugins/jquery.countTo.js')?>"></script>
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(99,129,143,0.2)",
					strokeColor : "rgba(99,129,143,1)",
					pointColor : "rgba(99,129,143,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(99,129,143,1)",
					data : [24,37,52,45,68,72,85]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(150,203,0,0.2)",
					strokeColor : "rgba(150,203,0,1)",
					pointColor : "rgba(150,203,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(150,203,0,1)",
					data : [31,42,58,35,60,80,95]
				}
			]
		}

		var doughnutData = [
				{
					value: 42,
					color:"#00b8d4",
					label: "New"
				},
				{
					value: 58,
					color:"#ff8f00",
					label: "Returning"
				}

			];

		var barChartData1 = {
		labels : ["2010","2011","2012","2013","2014","2015"],
		datasets : [
			{
				fillColor : "rgba(255,255,255,0.5)",
				strokeColor : "rgba(255,255,255,0.8)",
				highlightFill : "rgba(255,255,255,0.75)",
				highlightStroke : "rgba(255,255,255,1)",
				data : [380,900,1600,2300,4000,4800]
			}
		]

	}
		var barChartData2 = {
		labels : ["1","2","3","4","5","6"],
		datasets : [
			{
				fillColor : "rgba(255,255,255,0.5)",
				strokeColor : "rgba(255,255,255,0.8)",
				highlightFill : "rgba(255,255,255,0.75)",
				highlightStroke : "rgba(255,255,255,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}
	var barChartData3 = {
		labels : ["1","2","3","4","5","6"],
		datasets : [
			{
				fillColor : "rgba(255,255,255,0.5)",
				strokeColor : "rgba(255,255,255,0.8)",
				highlightFill : "rgba(255,255,255,0.75)",
				highlightStroke : "rgba(255,255,255,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}
	var barChartData4 = {
		labels : ["1","2","3","4","5","6"],
		datasets : [
			{
				fillColor : "rgba(255,255,255,0.5)",
				strokeColor : "rgba(255,255,255,0.8)",
				highlightFill : "rgba(255,255,255,0.75)",
				highlightStroke : "rgba(255,255,255,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}

	window.onload = function(){


	/* Hide Preloader */
	$('.preloader-wrapper').css({ display: "none" });

	/* Fade to page */
	$('.stage').velocity({ opacity: 0 }, 1000, function() {
		$('body').removeClass('loading');
	});

	/* Display Graphs and Counting with delay */
	}


	</script>
	<script type="text/javascript">
		<?php if ($this->session->flashdata('sukses')): ?>
			$('.success').html('<?php echo $this->session->flashdata('sukses') ?>').fadeIn();
		<?php endif ?>
	</script>
</body>

<!-- Mirrored from mate.creatingo.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2017 09:49:43 GMT -->
</html>
