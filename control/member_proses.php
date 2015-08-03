<?php
if (isset($_POST['ket'])){
	$ket=delete($_POST['ket']);
	if($ket=="neworder"){ //member order product
		$no_faktur=$_SESSION['faktur_number'];
		$total_order=delete($_POST['total_order']);
		$id_product=delete($_POST['product_id']);
		$id_size=delete($_POST['size']);
		$product_name=productname_byid($id_product);
		$faktur_id=get_fakturid($no_faktur);
		$product_price=get_productprice($id_product);
		$product_stock=get_productstock($id_size);
		$total_price=$product_price*$total_order;
		//echo $no_faktur ." - ".$total_order ." - ".$id_product ." - ".$product_stock ;
		if(check_product_order($id_size,$no_faktur)==true){
			$old_order=get_totalorder($no_faktur,$id_size);
			$total_order=$old_order+$total_order;
			$total_price=$product_price*$total_order;
			$order_id=get_orderid($id_size,$no_faktur);
			if($total_order <= $product_stock){
				if(updateorder($order_id,$total_order,$total_price)==true){
					notifications("$product_name has add to chart","orders");
				}else{
					notifications("$product_name not add to chart","home");
				}
			}else{
				notifications("Stock Not Enough.","home");
			}
		}else{
			if($total_order <= $product_stock){
				if(insertorder($id_size,$faktur_id,$total_order,$total_price)==true){
					notifications("$product_name has add to chart","orders");
				}else{
					notifications("$product_name not add to chart","home");
				}
			}else{
				notifications("Stock Not Enough.","home");
			}
		}
	}else if($ket=="update_productorder"){ //member update total order
		$order_id=delete($_POST['order_id']);
		$total_order=delete($_POST['total_order']);
		$id_product=get_productidbyorderid($order_id);
		$product_price=get_productprice($id_product);
		$total_price=$product_price*$total_order;
		$product_stock=get_productstock($id_product);
		if($total_order <= $product_stock){
			if(updateorder($order_id,$total_order,$total_price)==true){
				notifications("Product has been update","orders");
			}else{
				notifications("Product not update","home");
			}
		}else{
			notifications("Stock Not Enough.","home");
		}
	}else if($ket=="uploadbukti"){ // member konfirmasi pembayaran dan isi kuesioner
		//insert kuisoner, update fakturket,upload foto
		$no_faktur=$_SESSION['faktur_number'];
		$member_id=$_SESSION['userlogin'];
		// mulai query untuk upload foto
		$imagename=$_FILES['photo']['name'];
		$imagesize=$_FILES['photo']['size'];
		$imagesrc=$_FILES['photo']['tmp_name'];
		$imagetype=substr($imagename,-3);

		$imagedest="themes/images/bb/$no_faktur.".$imagetype;
		move_uploaded_file($imagesrc, $imagedest);
			$foto=$no_faktur.".".$imagetype;
			if(updatefaktur($no_faktur,$foto)==true){
				$new_no_faktur=inserfaktur($member_id);
				$_SESSION['faktur_number']=$new_no_faktur;
				//kirim sms disini
				$no_hp=get_member_nohp($member_id);
				$message="Terima kasih telah berbelanja di Butik Classic.\n No Faktur Anda : $no_faktur.";
				$status_sms=sendSMS($no_hp,$message);//membaca status kirim sms (terkirim / tidak)
				if($status_sms=="Success"){ // cek sms terkirim
					notifications("terima kasih telah berbelanja di Butik Classic. No Faktur Anda : $no_faktur.","home");
				}else{
					notifications("Gagall","home");
				}
			}else{
				notifications("Gagaal","home");
			}
	}else if($ket=="kuesoner"){ // member konfirmasi pembayaran dan isi kuesioner -> OK
		//insert kuisoner
		$no_faktur=$_SESSION['faktur_number'];
		$member_id=$_SESSION['userlogin'];
		$soal1=delete($_POST['soal1']);
		$soal2=delete($_POST['soal2']);
		$soal3=delete($_POST['soal3']);
		$soal4=delete($_POST['soal4']);
		$soal5=delete($_POST['soal5']);
		$soal6=delete($_POST['soal6']);
		$soal7=delete($_POST['soal7']);

		if(inserkuesioner($member_id,$soal1,$soal2,$soal3,$soal4,$soal5,$soal6,$soal7)==true){
			notifications("Terima Kasih Telah Mengisi kuesioner","home");
		}else{
			notifications("Gagall","home");
		}
	}else if($ket=="delete_productorder"){ // member delete /  cancel product order
		$order_id=delete($_POST['order_id']);
		if(deleteorder($order_id)==true){
			notifications("Product has been delete","orders");
		}else{
			notifications("Product not delete","home");
		}
	}else if($ket=="addcomment"){ // member add comment to article
		$member_id=delete($_POST['member_id']);
		$article_id=delete($_POST['article_id']);
		$article_content=delete($_POST['article_content']);
		if(insert_comment($member_id,$article_id,$article_content)==true){
			notifications("Comment has been Add","articledetail&id=$article_id");
		}else{
			notifications("Comment not Add","articledetail&id=$article_id");
		}
	}else if($ket=="accountedit"){ // member account update
		$member_id=delete($_POST['member_id']);
		$username=delete($_POST['username']);
		$password=delete($_POST['password']);
		$name=delete($_POST['name']);
		$address=delete($_POST['address']);
		$phonenumber=delete($_POST['phonenumber']);
		$email=delete($_POST['email']);
		if(updatemember($member_id,$username,$password,$name,$address,$phonenumber,$email)==true){
			notifications("Your Account has been Update","home");
		}else{
			notifications("Account not Update","home");
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
	}else{
		notifications("Page Not Found!!!","home");
	}
}else{
	notifications("Page Not Found!!!","home");
}
?>