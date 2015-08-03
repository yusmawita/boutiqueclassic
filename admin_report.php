<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Report</title>
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
<body onload="categorychage();">
	<?php
		include "header.php";
	?>
	
<div id="mainBody">
	<div class="container">
	<div class="row">
	<?php
		include "sidebar.php";
		
			$datereport="";
			if (isset($_POST['month'])){
				$month=delete($_POST['month']);
				$year=delete($_POST['year']);
				$datereport=$year."-".$month."";
			}else{
				$datereport=date('Y-m');
			}
	?>
	
	<!-- Isi Website-->
		<div class="span9">
	<h3>  Report : <?php echo $datereport;?></h3>
						<select class='input' id='s_category' onchange='categorychage();'>
							  <option value='08'>All</option>
							  <option value='01'>Top Clothing</option>
							  <option value='02'>Bottom Clothing</option>
							  <option value='03'>Dress</option>
							  <option value='04'>Outwear</option>
							  <option value='05'>Bag</option>
							  <option value='06'>Shoe</option>
							  <option value='07'>Accessories</option>
						</select>	
					<div class="control-group  pull-right">
			<form class="form-horizontal loginFrm" method="POST" action="?page=admin_report">
						<select required class='input-small' name='month'>
						  <option value='' selected>Month :</option>
						  <option value='01'>January</option>
						  <option value='02'>February</option>
						  <option value='03'>March</option>
						  <option value='04'>April</option>
						  <option value='05'>May</option>
						  <option value='06'>June</option>
						  <option value='07'>July</option>
						  <option value='08'>August</option>
						  <option value='09'>September</option>
						  <option value='10'>October</option>
						  <option value='11'>November</option>
						  <option value='12'>December</option>
						</select>
						<select required class='input-small' name='year'>
						  <option value='' selected>Year :</option>
						  <option value='2013'>2013</option>
						  <option value='2014'>2014</option>
						  <option value='2015'>2015</option>
						  <option value='2016'>2016</option>
						  <option value='2017'>2017</option>
						  <option value='2018'>2018</option>
						  <option value='2019'>2019</option>
						  <option value='2020'>2020</option>
						  <option value='2021'>2021</option>
						</select>
						<input type="submit" class="btn btn-success" value='Submit'/>
			</form>	
					</div>
	<div id="divnotif"></div>
	<hr class="soft"/>
	
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="block-content collapse in">
                                <div id="divall" class="span12 chart" style="display:block;">
									<h4>All</h4>
                                    <div id="chartall" style="height: 350px;"></div>
                                </div>
                                <div id="divtop_clothing" class="span12 chart" style="display:block;">
									<h4>Top Clothing</h4>
                                    <div id="top_clothing" style="height: 350px;"></div>
                                </div>
                                <div id="divbottom_clothing" class="span12 chart" style="display:block;">
									<h4>Bottom Clothing</h4>
                                    <div id="bottom_clothing" style="height: 350px;"></div>
                                </div>
                                <div id="divdress" class="span12 chart" style="display:block;">
									<h4>Dress</h4>
                                    <div id="dress" style="height: 350px;"></div>
                                </div>
                                <div id="divoutwear" class="span12 chart" style="display:block;">
									<h4>Outwear</h4>
                                    <div id="outwear" style="height: 350px;"></div>
                                </div>
                                <div id="divbag" class="span12 chart" style="display:block;">
									<h4>Bag</h4>
                                    <div id="bag" style="height: 350px;"></div>
                                </div>
                                <div id="divshoe" class="span12 chart" style="display:block;">
									<h4>Shoe</h4>
                                    <div id="shoe" style="height: 350px;"></div>
                                </div>
                                <div id="divaccessories" class="span12 chart" style="display:block;">
									<h4>Accessories</h4>
                                    <div id="accessories" style="height: 350px;display:block;"></div>
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


        <script src="vendors/raphael-min.js"></script>
        <script src="vendors/morris/morris.min.js"></script>

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
            element: 'chartall',
            data: [
				<?php echo report_chart("all",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Data '],
            barRatio: 0.1,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });
        // Morris Bar Chart
        Morris.Bar({
            element: 'top_clothing',
            data: [
				<?php echo report_chart("Top Clothing",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#3d88ba"]
        });

        // Morris Bar Chart
        Morris.Bar({
            element: 'bottom_clothing',
            data: [
				<?php echo report_chart("Bottom Clothing",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });

        // Morris Bar Chart
        Morris.Bar({
            element: 'dress',
            data: [
				<?php echo report_chart("Dress",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });
		
        // Morris Bar Chart
        Morris.Bar({
            element: 'outwear',
            data: [
				<?php echo report_chart("Outwear",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });
		
        // Morris Bar Chart
        Morris.Bar({
            element: 'bag',
            data: [
				<?php echo report_chart("Bag",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });
		
        // Morris Bar Chart
        Morris.Bar({
            element: 'shoe',
            data: [
				<?php echo report_chart("Shoe",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });
		
        // Morris Bar Chart
        Morris.Bar({
            element: 'accessories',
            data: [
				<?php echo report_chart("Accessories",$datereport)."\n"; ?>
            ],
            xkey: 'device',
            ykeys: ['sells'],
            labels: ['Sells'],
            barRatio: 0.4,
            xLabelMargin: 10,
            hideHover: 'auto',
            barColors: ["#000fff"]
        });
        // Build jQuery Knobs
        $(".knob").knob();

        </script>
</body>
</html>