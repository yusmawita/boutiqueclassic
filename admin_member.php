<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Member</title>
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
	<h3>  Member [ <small><?php echo member_count();?> </small>]</h3>	
	<hr class="soft"/>
		
			<div id="divnotif"></div>
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>E-mail</th>
				  <th width="5%">Action</th>
				</tr>
              </thead>
              <tbody>
                <?php
					echo admin_memberList();
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