<?php 
session_start();
if(!empty($_GET['page'])){
	$_SESSION['page'] = delete($_GET['page']);
}else{
	$_SESSION['page']="home";
}

$page=$_SESSION['page'];

if($page=="home"){
	include "home.php";	
}else if($page=="video"){
	include "video.php";
}else if($page=="ceklogin"){
	include "control/ceklogin.php";
}else if($page=="listproduct"){
	include "products.php";
}else if($page=="contact"){
	include "contact.php";
}else if($page=="about"){
	include "about.php";
}else if($page=="howtobuy"){
	include "howtobuy.php";
}else if($page=="articledetail"){
	include "article_detail.php";
}else if(empty($_SESSION['userlogin']) or empty($_SESSION['type'])){
//Halaman Yang dapat Diakses Guest/Tamu
	if (empty($_SESSION['page'])){
		session_destroy();
		include "home.php";
		exit;
	}else{
		if($page=="home"){
			include "home.php";	
		}else if($page=="ceklogin"){
			include "control/ceklogin.php";
		}else{
			notifications("Page not Found!!!","home");
		}
	}
}else{
//Halaman Yang dapat Diakses Jika Telah melakukan Login
	$userlogin=$_SESSION['userlogin'];
	$typelogin=$_SESSION['type'];
	if($page=="logout"){
		include "control/logout.php";
	//Halaman Yang dapat Diakses Admin
	}else if ($typelogin=='admin'){
		if($page=="admin_product"){
			include "admin_product.php";
		}else if($page=="admin_article"){
			include "admin_article.php";
		}else if($page=="admin_member"){
			include "admin_member.php";
		}else if($page=="admin_faktur"){
			include "admin_faktur.php";
		}else if($page=="admin_fakturorder"){
			include "admin_fakturorder.php";
		}else if($page=="admin_kuesioner"){
			include "admin_kuesioner.php";
		}else if($page=="admin_report"){
			include "admin_report.php";
		}else if($page=="admin_fakturconfirm"){
			include "admin_fakturconfirm.php";
		}else if($page=="admin_sms"){
			include "admin_sms.php";
		}else if($page=="adminprocess"){
			include "control/adminprocess.php";
		}
	//Halaman Yang dapat Diakses Member
	}else if ($typelogin=='member'){
		if($page=="productdetail"){
			include "product_details.php";
		}else if($page=="orders"){
			include "product_order.php";
		}else if($page=="member_proses"){
			include "control/member_proses.php";
		}
	}else{
		notifications("Page not Found!!!","home");
	}
}

?>
