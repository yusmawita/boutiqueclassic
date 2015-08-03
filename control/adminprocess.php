<?php
if (isset($_POST['ket'])){
	$ket=delete($_POST['ket']);
	//echo $ket;
	if($ket=="articleadd"){
		$title=ucwords(delete($_POST['title']));
		$content=delete($_POST['content']);
		
		// mulai query untuk upload foto
		$imagename=$_FILES['image']['name'];
		$imagesize=$_FILES['image']['size'];
		$imagesrc=$_FILES['image']['tmp_name'];
		$imagetype=substr($imagename,-3);
		$imagedest="themes/images/article/$title.".$imagetype;
		move_uploaded_file($imagesrc, $imagedest);	
		if(admin_articleadd($title,$content,$title.".$imagetype")==true){
			notifications("Add Article $title Success","admin_article");
		}else{
			//notifications("Article $title exist. Try other title.","admin_article");
		}
	}else if($ket=="articleedit"){
		$id=delete($_POST['id']);
		$title=ucwords(delete($_POST['title']));
		$content=ucwords(delete($_POST['content']));
		
		// mulai query untuk upload foto
		$imagename=$_FILES['image']['name'];
		$imagesize=$_FILES['image']['size'];
		$imagesrc=$_FILES['image']['tmp_name'];
		$imagetype=substr($imagename,-3);
		$imagedest="themes/images/article/$title.".$imagetype;
		move_uploaded_file($imagesrc, $imagedest);
		if(admin_articleedit($id,$title,$content,$title.".$imagetype")==true){
			notifications("Article $title Update.","admin_article");
		}else{
			notifications("Article $title Not Update","admin_article");
		}
	}else if($ket=="addcomment"){ // admin add comment to article
		$member_id=delete($_POST['member_id']);
		$article_id=delete($_POST['article_id']);
		$article_content=delete($_POST['article_content']);
		if(insert_comment($member_id,$article_id,$article_content)==true){
			notifications("Comment has been Add","articledetail&id=$article_id");
		}else{
			notifications("Comment not Add","articledetail&id=$article_id");
		}
	}else if($ket=="smsadd"){
		$title=ucwords(delete($_POST['title']));
		$content=delete($_POST['content']);
		if(add_sms($title,$content)==true){
			notifications("Add SMS $title Success","admin_sms");
		}else{
			notifications("SMS $title exist. Try other title.","admin_sms");
		}
	}else if($ket=="smsedit"){
		$id=delete($_POST['id']);
		$title=ucwords(delete($_POST['title']));
		$content=ucwords(delete($_POST['content']));
		if(update_sms($id,$title,$content)==true){
			notifications("SMS $title Update.","admin_sms");
		}else{
			notifications("SMS $title Not Update","admin_sms");
		}
	}else if($ket=="sendsms"){ //Masih error sms BC
		$source=delete($_POST['source']);
		$content="L";
		$content=delete($_POST['contentmsg']);
		foreach ($source as $nohp) {
			sendSMS($nohp,$content);
			echo $nohp." - $content<br>";
			notifications("Sms Terkirim.","admin_sms");
		}
	}else if($ket=="admin_account_update"){
		$id=delete($_POST['id']);
		$username=delete($_POST['username']);
		$password=delete($_POST['password']);
		if(admin_editaccount($id,$username,$password)==true){
			notifications("Your Account Change.","home");
		}else{
			notifications("Your Account not Change.","home");
		}
	}else if($ket=="productadd"){
		$category=delete($_POST['category']);
		$name=ucwords(delete($_POST['name']));
		$stock=delete($_POST['stock']);
		$price=delete($_POST['price']);
		//$image=delete($_POST['image_product']);;
		$detail=ucwords(delete($_POST['detail']));
		
		// mulai query untuk upload foto
		$imagename=$_FILES['image_product']['name'];
		$imagesize=$_FILES['image_product']['size'];
		$imagesrc=$_FILES['image_product']['tmp_name'];
		$imagetype=substr($imagename,-3);
		$imagedest="themes/images/products/$name.".$imagetype;
		move_uploaded_file($imagesrc, $imagedest);	
		if(addproduct($name,$stock,$price,$detail,"$name.".$imagetype,$category)==true){
			$e_message="<h1>New Product</h1><h2>$name [Rp. $price]</h2> 
						<h3><pre>$detail</pre></h3>
						<p>Cek Product Terbaru Kami <a href='localhost/maria/'>disini</a></p>";
			$emailstatus=broadcarstemail($e_message,"$name.".$imagetype);
			if($emailstatus==true){
				notifications("Add $name Success","admin_product");
			}else{
				notifications("Broadcast Email Failed.","admin_product");
			}
		}else{
			notifications("Add $name not Success","admin_product");
		}
	}else if($ket=="editproduct"){
		$id=delete($_POST['id']);
		$category=delete($_POST['category']);
		$name=ucwords(delete($_POST['name']));
		$stock=delete($_POST['stock']);
		$price=delete($_POST['price']);
		//$image=delete($_POST['image_product']);;
		$detail=ucwords(delete($_POST['detail']));
		
		// mulai query untuk upload foto
		$imagename=$_FILES['image_product']['name'];
		$imagesize=$_FILES['image_product']['size'];
		$imagesrc=$_FILES['image_product']['tmp_name'];
		$imagetype=substr($imagename,-3);
		$image="";
		if ($imagename<>""){
			$imagedest="themes/images/products/$name.".$imagetype;
			move_uploaded_file($imagesrc, $imagedest);
			$image="$name.".$imagetype;
		}		
		if(editproduct($id,$name,$stock,$price,$detail,$image,$category)==true){
			notifications("Update Success","admin_product");
		}else{
			notifications("Update Failed","admin_product");
		}
	}else if($ket=="addsize"){
		$s_id=delete($_POST['s_id']);
		$p_id=delete($_POST['p_id']);
		$color=delete($_POST['color']);
		$size=delete($_POST['size']);
		$stock=delete($_POST['stock']);
		if(admin_addsize($p_id,$color,$size,$stock)==true){
			notifications("Add Success.","admin_product");
		}else{
			notifications("Add Failed.","admin_product");
		}
	}else if($ket=="editsize"){
		$s_id=delete($_POST['s_id']);
		$p_id=delete($_POST['p_id']);
		$color=delete($_POST['color']);
		$size=delete($_POST['size']);
		$stock=delete($_POST['stock']);
		if(admin_updatesize($s_id,$color,$size,$stock)==true){
			notifications("Update Success.","admin_product");
		}else{
			notifications("Update Failed.","admin_product");
		}
	}else{
		notifications("Page Not Found!!!","home");
	}
}else if(isset($_GET['ket'])){
	$ket=delete($_GET['ket']);
	if($ket=="articledelete"){
		$id=delete($_GET['id']);
		if(admin_articledelete($id)==true){
			notifications("Delete Success.","admin_article");
		}else{
			notifications("Delete Failed.","admin_article");
		}
	}else if($ket=="smsdelete"){
		$id=delete($_GET['id']);
		if(delete_sms($id)==true){
			notifications("Delete Success.","admin_sms");
		}else{
			notifications("Delete Failed.","admin_sms");
		}
	}else if($ket=="memberdelete"){
		$id=delete($_GET['id']);
		$name=get_member_name($id);
		if(admin_memberdelete($id)==true){
			notifications("Delete Success.","admin_member");
		}else{
			notifications("Delete Failed.","admin_member");
		}
	}else if($ket=="productdelete"){
		$id=delete($_GET['id']);
		if(admin_product_delete($id)==true){
			notifications("Delete Success.","admin_product");
		}else{
			notifications("Delete Failed.","admin_product");
		}
	}else if($ket=="commentdelete"){
		$id=delete($_GET['id']);
		$articleid=articleidbycomentid($id);
		if(delete_comment($id)==true){
			notifications("Delete Success.","articledetail&id=$articleid");
		}else{
			notifications("Delete Failed.","articledetail&id=$articleid");
		}
	}else if($ket=="confirm_faktur"){
		//Update faktur(faktur_ket) - OK, update product(product_stoct),update rating(count+total order) - OK ,sms member
		$id=delete($_GET['id']);
		//echo $id." OK";
		confirm_faktur($id);//OK
		$no_hp=get_memberhp_byfakturnumber($id);
		$message="Faktur anda dengan nomor $id telah dikonfirmasi oleh Admin. Product yang anda pesan akan segera dikirim.";
		$status_sms=sendSMS($no_hp,$message);//membaca status kirim sms (terkirim / tidak)
		notifications("Order has been confirm.","admin_faktur");
	}else if($ket=="cancel_faktur"){
		$id=delete($_GET['id']);
		if(cancel_faktur($id)==true){
			$no_hp=get_memberhp_byfakturnumber($id);
			$message="Faktur anda dengan nomor $id telah dibatalkan oleh Admin dikarenakan salah dalam foto Bukti transfer.";
			$status_sms=sendSMS($no_hp,$message);//membaca status kirim sms (terkirim / tidak)
			notifications("Faktur Number $id has been cancel","admin_faktur");
		}else{
			notifications("Faktur failed to cancel, Try again.","admin_faktur");
		}
	}else{
		notifications("Page Not Found!!!","home");
	}
}else{
	notifications("Page Not Found!!!","home");
}
?>