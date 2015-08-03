<?php
if (isset($_POST['ket'])){
	$ket=delete($_POST['ket']);
	if($ket=="login"){
	        //notifications($_POST['username']." ".$_POST['password'],"home");
		$username=delete($_POST['username']);
		$password=delete($_POST['password']);
		//$password=md5($password);
		if (loginadmin($username,$password) == true ){
			$_SESSION['type']="admin";
			header("location:?page=home");
		}else if (loginmember($username,$password) == true ){
			$member_id=get_member_id($username);
			$no_faktur=get_member_fakturnumber($member_id);
			if($no_faktur==""){
				$no_faktur=inserfaktur($member_id);
			}
			cekfaktur_aviable($no_faktur);
			$_SESSION['faktur_number']=$no_faktur;
			$_SESSION['userlogin']=$member_id;
			$_SESSION['type']="member";
			
		}else{
			notifications("Username and password didn't Match, Try again !.","home");
		}
	}else if($ket=="register"){
		$day=delete($_POST['day']);
		$month=delete($_POST['month']);
		$year=delete($_POST['year']);
		$birth=$year."-".$month."-".$day;
		$tbirth = checkdate ( $month , $day , $year );
		$username=delete($_POST['username']);
		$password=delete($_POST['password']);
		$name=delete($_POST['name']);
		$address=delete($_POST['address']);
		$phonenumber=delete($_POST['phonenumber']);
		$email=delete($_POST['email']);
		if ($tbirth==true){
			if (addmember($username,$password,ucwords($name),$address,$phonenumber,$email,$birth) == true ){
				notifications("Register Success!!! Login Please.","home");
			}else{
				notifications("Register Failed. Username $username Exist.","home");
			}
		}else{
				notifications("The selected date is not valid.","home");
		}
	}
}else{
	notifications("Page Doesn't Found!!!","home");
}
?>
