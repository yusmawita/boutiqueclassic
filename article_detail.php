<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['id'])){
	$id=delete($_GET['id']);
	$articlename=ucwords(articlenamebyid($id));
	$articlimage=ucwords(articleimagebyid($id));
	$articlcontent=ucwords(articlecontentbyid($id));
	if($articlename==""){
		notifications("Page not found!!!","home");
	}
}else{
	notifications("Page not found!!!","home");
}
?>
  <head>
    <meta charset="utf-8">
    <title><?php echo $articlename;?></title>
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
			<div class="span9" id="mainCol">
			<div id="divnotif"></div>
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a> <span class="divider">/</span></li>
					<li class="active">Article / <?php echo $articlename;?></li>
				</ul>
												
				<h3> <?php echo $articlename;?></h3>	
				<hr class="soft"/>
				<div class="span2"></div>
				<img src="themes/images/article/<?php echo $articlimage;?>" style="height:300px;width:400px;"/>
				<hr class="soft"/>
				<pre style="align:justify;"> <?php echo $articlcontent;?></pre>
				<hr class="soft"/>
				<h3>Comment : </H3>
				<?php
				 echo list_comment($id);
				 $typelogin="";
				 if (isset($_SESSION['type'])){
				 $typelogin=$_SESSION['type'];
				 }
				 if ($typelogin=="member"){
				?>
				<p class="span9"><h4 class="span4 pull-right">Add Comment : </h4></p>
				<form action='?page=member_proses' method='POST'>
					<input type="hidden" name="ket" value="addcomment"/>
					<input type="hidden" name="member_id" value="<?php echo $userlogin; ?>"/>
					<input type="hidden" name="article_id" value="<?php echo $id; ?>"/>
					<p class="span9 "><textarea name="article_content" class="span4 pull-right" required></textarea></p>
					<p class="span9 "><input type="submit" class="btn btn-info pull-right" value="Add"/></p>
				</form>
				<?php
				}else{
				?>
				<p class="span9"><h4 class="span4 pull-right">Add Comment : </h4></p>
				<form action='?page=adminprocess' method='POST'>
					<input type="hidden" name="ket" value="addcomment"/>
					<input type="hidden" name="member_id" value="1"/>
					<input type="hidden" name="article_id" value="<?php echo $id; ?>"/>
					<p class="span9 "><textarea name="article_content" class="span4 pull-right" required></textarea></p>
					<p class="span9 "><input type="submit" class="btn btn-info pull-right" value="Add"/></p>
				</form>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->

	<?php
		include "footer.php";
	?>
</body>
</html>