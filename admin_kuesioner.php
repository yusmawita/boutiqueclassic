<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
	<?php
		include "header.php";
	?>
	
<div id="mainBody">
	<div class="container">
	<div class="row">
	<?php
		include "sidebar.php";
	?>
	
	<!-- Isi Website-->
		<div class="span9">
	<h3>  Kuesioner</h3>
	<div id="divnotif"></div>
	
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="block-content collapse in">
                                <div class="span7 chart">
                                    <div id="kuesioner"></div>
                                </div>
                                <div class="span5 chart">
									<div>
									<h4>Keterangan :</h4>
									<p>1. Sistem ini dapat mempermudah pengguna untuk melakukan proses order</p>
									<p>2. Kenyamanan dalam berbelanja secara online dengan menggunakan sistem</p>
									<p>3. Penyajian teks dapat dibaca dan dipahami</p>
									<p>4. Kualitas Tampilan Gambar</p>
									<p>5. Sistem ini mudah digunakan</p>
									<p>6. Penyajian informasi produk dan artikel pada website</p>
									<p>7. Sistem ini dapat menghemat waktu pengguna dalam melakukan proses pemesanan</p>
									</div>
                                </div>
                            </div>
                        </div>
					</div>

	</div>
	</div>
</div>

	<?php
		include "footer.php";
	?>
	
        <!--/.fluid-container-->
        <link rel="stylesheet" href="vendors/morris/morris.css">


        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/jquery.knob.js"></script>
        <script src="vendors/raphael-min.js"></script>
        <script src="vendors/morris/morris.min.js"></script>

        <script src="vendors/flot/jquery.flot.js"></script>
        <script src="vendors/flot/jquery.flot.categories.js"></script>
        <script src="vendors/flot/jquery.flot.pie.js"></script>
        <script src="vendors/flot/jquery.flot.time.js"></script>
        <script src="vendors/flot/jquery.flot.stack.js"></script>
        <script src="vendors/flot/jquery.flot.resize.js"></script>
        <script>
        $(function() {
        function doPlot(position) {
            $.plot("#timechart",{
                xaxes: [ { mode: "time" } ],
                yaxes: [ { min: 0 }, {
                    // align if we are to the right
                    alignTicksWithAxis: position == "right" ? 1 : null,
                    position: position,
                    tickFormatter: euroFormatter
                } ],
                legend: { position: "sw" }
            });
        }

        doPlot("right");

        });

        // Morris Bar Chart
        Morris.Bar({
            element: 'kuesioner',
            data: [
				<?php 
					echo kuesioner_chart("1")."\n"; 
					echo kuesioner_chart("2")."\n"; 
					echo kuesioner_chart("3")."\n"; 
					echo kuesioner_chart("4")."\n"; 
					echo kuesioner_chart("5")."\n"; 
					echo kuesioner_chart("6")."\n"; 
					echo kuesioner_chart("7")."\n"; 
				?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Total'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"],
            barColors: ["#0000ba"]
        });

        // Build jQuery Knobs
        $(".knob").knob();

        </script>
</body>
</html>