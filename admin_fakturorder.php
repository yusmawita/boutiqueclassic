<!DOCTYPE html>
<?php
//belum jalan : image belum OK, confirm dan cancel belum
// sewaktu confirm dan cancel, sms ke member
if(isset($_GET['id'])){
	$faktur_numberr=delete($_GET['id']);
	$member_name=membernamebyfakturnumber($faktur_numberr);
	$foto_bb=get_member_bb_faktur($faktur_numberr);
	$faktur_status=cekstatus_faktur($faktur_numberr);
	if($member_name==""){
		notifications("Page not found!!!","home");
	}
}else{
	notifications("Page not found!!!","home");
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order</title>
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
	
	<div class="span9">
			<div id="divnotif"></div>
	<h4>  Member Name : <?php echo $member_name; ?></h4>	
	<h4>  Number : <?php echo $faktur_numberr; ?></h4>
        <center><img  src="themes/images/bb/<?php echo $foto_bb; ?>" style="height:250px;width:200px;" /></center>
	<hr class="soft"/>
	<table class="table table-bordered pull-right ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Total Order</th>
				  <th>Price @</th>
                  <th>Total Price</th>
				</tr>
              </thead>
              <tbody>
                <tr>
				<?php echo order_list($faktur_numberr);?>
				</tbody>
            </table>
		<hr class="soft"/>
		<?php
		 if ($faktur_status=="order_ok"){
		?>
			<a class="btn btn-info pull-right" onclick="admin_confirm_order('<?php echo $faktur_numberr; ?>');"><i class="icon-ok"></i> Confirm </a>
			<a class="btn btn-danger pull-right" onclick="admin_cancel_order('<?php echo $faktur_numberr; ?>');" style="margin-right:10px;"><i class="icon-remove"></i> Cancel</a>
		<?php } ?>
</div>

</div></div>
</div>

	<?php
		include "footer.php";
	?>
</body>
</html>