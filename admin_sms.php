<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SMS</title>
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
		
	<h3>  SMS [ <small><?php echo sms_count();?> Item(s) </small>]
	<a href="#" onclick="sendsms('');" class="btn btn-info pull-right" style="margin-left:10px;"> Send <i class="icon-envelope"></i></a>
	<a href="#" onclick="admin_smsadd_show('smsadd','a');" class="btn btn-success pull-right">Add <i class="icon-envelope"></i></a></h3>
	<div id="divnotif"></div>
	<hr class="soft"/>
	<?php echo member_phone_list(); ?>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th width="20%">Title</th>
                  <th>Message</th>
				  <th width="10%">Action</th>
				</tr>
              </thead>
              <tbody>
                <?php
					echo sms_list();
				?>
				</tbody>
            </table>
		
</div>

	</div>
	</div>
</div>

	<?php
		include "footer.php";
	?>
</body>
</html>