<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['id'])){
	$id=delete($_GET['id']);
	$product_name=productname_byid($id);
	$product_stock=productstock_byid($id);
	$product_price=productprice_byid($id);
	$product_detail=productdetail_byid($id);
	$product_image=productimage_byid($id);
	$product_category=productcategory_byid($id);
	$image_product="";
	if ($product_name==""){
		notifications("Page not found!!!","home");
	}
	if($product_image==""){
		$image_product="themes/images/products/noimage.jpg";
	}else{
		$image_product="themes/images/products/$product_name.$product_image";
	}
}else{
	notifications("Page not found!!!","home");
}
?>
  <head>
    <meta charset="utf-8">
    <title><?php echo $product_name;?></title>
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
	<div class="container">
	<div class="row">
		<?php
			include "sidebar.php";
		?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active"><?php echo $product_name;?></li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="<?php echo $image_product;?>" title="<?php echo $product_name;?>" style="height:100px;">
				<center><img src="<?php echo $image_product;?>" style="height:150px;" alt="Fujifilm FinePix S2950 Digital Camera" /></center>
            </a>
			  
			</div>
			<div class="span6">
				<h3><u><?php echo $product_name;?></u></h3>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>Rp. <?php echo $product_price;?></span></label>
					<div class="controls">
					<input type="number" class="span1" placeholder="Qty."/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4><?php echo $product_stock;?> items in stock</h4>
				<hr class="soft clr"/>
				<h4>Information :</h4>
				<pre style="text-align:justify;"><?php echo $product_detail;?></pre>
			
			<hr class="soft"/>
			</div>
			

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->

	<?php
		include "footer.php";
	?>
</body>
</html>