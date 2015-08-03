<?php
include "koneksi.php";
include("class.phpmailer.php");// mail
include("class.smtp.php"); // mail
//application
function delete($val){
	$arr=array("'");
	return $new=str_replace($arr,"\'",$val);
}

//all_control

function notifications($message,$page){ //Notifications
	echo "<script language=\"javascript\"> alert (\"$message\");window.location=\"?page=$page\"; </script>";
}

// Admin Conrol

function loginadmin($uid,$pwd){
	$data = null;
	$query="select * from admin where admin_username='$uid' and admin_password='$pwd'";
	$data=mysql_fetch_row(mysql_query($query));
	if ($data == null) {
		return false;
	}else{
		if($data[2]==$pwd){
			$_SESSION['userlogin']=$data[0];
			return true;
		}else{
			return false;
		}
	}
}

function admin_articleadd($title,$content,$image){
	$query="insert into article values('','$title','$content',now(),'$image')";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_articleedit($id,$title,$content,$image){
	$query="update article set article_title='$title',article_content='$content',article_date=now(),article_img='$image'
			where article_id=$id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_product_count(){
	$out="";
	$query="SELECT count(*)
			FROM product";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function admin_product_stock($id){
	$out="";
	$query="SELECT product_stock
			FROM product
			where product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function admin_update_product_stock($id,$stock){
	$out="";
	$query="update ukuran set stock=$stock where ukuran_id=$id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_addsize($p_id,$pcolor,$p_size,$stock){
	$out="";
	$query="insert into ukuran values('','$p_id','$pcolor','$p_size','$stock')";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_updatesize($s_id,$pcolor,$p_size,$stock){
	$out="";
	$query="update ukuran set warna='$pcolor',ukuran='$p_size',stock='$stock' where ukuran_id=$s_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_product_delete($id){
	$out="";
	$query="delete from product where product_id=$id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_editaccount($id,$uid,$pwd){
	$query="update admin set admin_username='$uid',admin_password='$pwd'
			where admin_id='$id'";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_articledelete($id){
	$query="delete from article where article_id='$id'";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function admin_memberdelete($id){
	$query="delete from member where member_id='$id'";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

// Admin view
function get_admin_name($id){
	$out="";
	$query="SELECT *
			FROM admin
			where admin_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="$data[1]";
	}
	return $out;
}

function admin_faktur_list(){//daftarfakturuntuk admin, data member yang telah upload bukti pembayaran
	$i=1;
	$out="";
	$query="select *,sum(o.total_price),count(o.ukuran_id)
			from faktur f, member m, orders o
			where m.member_id=f.member_id and f.faktur_id=o.faktur_id and faktur_ket='order_ok'
			group by o.faktur_id
			order by f.faktur_id desc;";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if($data[5]==""){
			$image="noimage.jpg";
		}else{
			$image="$data[5]";
		}
		$out.="<tr>
                  <td>$i</td>
                  <td><a href=\"?page=admin_fakturorder&id=$data[2]\" class=\"btn btn-success btn-mini\" title='Detail'>$data[8]</a></td>
                  <td><a href=\"?page=admin_fakturorder&id=$data[2]\" class=\"btn btn-success btn-mini\" title='Detail'>$data[2]</a></td>
                  <td><span class=\"btn btn-success btn-mini\">$data[21]</span> Item's</td>
                  <td>Rp. $data[20]</td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_faktur_confirm_list(){//daftarfakturuntuk admin, data member yang telah upload bukti pembayaran
	$i=1;
	$out="";
	$query="select *,sum(o.total_price),count(o.ukuran_id)
			from faktur f, member m, orders o
			where m.member_id=f.member_id and f.faktur_id=o.faktur_id and faktur_ket='order_confirm'
			group by o.faktur_id
			order by f.faktur_id desc;";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if($data[5]==""){
			$image="noimage.jpg";
		}else{
			$image="$data[5]";
		}
		$out.="<tr>
                  <td>$i</td>
                  <td><a href=\"?page=admin_fakturorder&id=$data[2]\" class=\"btn btn-success btn-mini\" title='Detail'>$data[8]</a></td>
                  <td><a href=\"?page=admin_fakturorder&id=$data[2]\" class=\"btn btn-success btn-mini\" title='Detail'>$data[2]</a></td>
                  <td><span class=\"btn btn-success btn-mini\">$data[21]</span> Item's</td>
                  <td>Rp. $data[20]</td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_faktur_order($faktur_number){//daftarfakturuntuk admin, data member yang telah upload bukti pembayaran
	$i=1;
	$out="";
	$query="select * 
			from faktur f, orders o, product p
			where o.faktur_id=f.faktur_id and p.product_id=o.product_id and f.faktur_number='$faktur_number';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if($data[5]==""){
			$image="noimage.jpg";
		}else{
			$image="$data[5]";
		}
		$out.="<tr>
                  <td>$i</td>
                  <td><a href=\"#\" class=\"btn btn-success btn-mini\" title='Detail'>$data[8]</a></td>
                  <td><a href=\"#\" class=\"btn btn-success btn-mini\" title='Detail'>$data[2]</a></td>
                  <td><span class=\"btn btn-success btn-mini\">$data[19]</span> Item's</td>
                  <td>Rp. $data[18]</td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_product_list(){
	$i=1;
	$out="";
	$query="SELECT *
			FROM ukuran
			ORDER BY product_id";
	$query = mysql_query($query);
	$s_id="";
	$p_id="";
	$p_color="";
	$p_size="";
	$p_stock="";
	$_p=0;
	while($data=mysql_fetch_row($query)){
		$s_id[$_p]="$data[0]";
		$p_id[$_p]="$data[1]";
		$p_color[$_p]="$data[2]";
		$p_size[$_p]="$data[3]";
		$p_stock[$_p]="$data[4]";
		$_p = $_p + 1;
	}
	$query="SELECT *
			FROM product
			ORDER BY product_name";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if($data[5]==""){
			$image="noimage.jpg";
		}else{
			$image="$data[5]";
		}
		$out.="<tr>
                  <td style='display:none;'>
				  <p id='name$data[0]'>$data[1]</p>
				  <p id='stock$data[0]'>$data[2]</p>
				  <p id='price$data[0]'>$data[3]</p>
				  <p id='detail$data[0]'>$data[4]</p>
				  <p id='image$data[0]'>$image</p>
				  <p id='category$data[0]'>$data[6]</p>
				  </td>
                  <td> <center><img width=\"32px\" height=\"32px\" src=\"themes/images/products/$image\" title=\"$data[4]\"/></center></td>
                  <td>$data[1]</td>
				  <td>
				  <p  onclick='admin_productaddstock_show(\"addsize\",\"0\",$data[0],\"#000000\",30,1)' class=\"btn btn-info btn-mini\" style='width:90%;margin-bottom:5px;'>
					New Size
					</p>";
		$p_=0;
		$total=0;
	while($p_ < $_p){
		if($p_id[$p_]==$data[0]){
			if ($p_stock[$p_] > 0){
				$out.="<p  onclick='admin_productaddstock_show(\"editsize\",\"$s_id[$p_]\",$data[0],\"$p_color[$p_]\",\"$p_size[$p_]\",\"$p_stock[$p_]\")' class=\"btn btn-success btn-mini\" style='width:90%;margin-bottom:5px;'>
								<span class=\"label\"style='background-color:$p_color[$p_];widht=30px;height:15px;border:2px solid #000000;'>&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;  $p_size[$p_] : $p_stock[$p_]</strong> Item's
								</p>";
			}else{
				$out.="<p  onclick='admin_productaddstock_show(\"editsize\",\"$s_id[$p_]\",$data[0],\"$p_color[$p_]\",\"$p_size[$p_]\",\"$p_stock[$p_]\")' class=\"btn btn-danger btn-mini\" style='width:90%;margin-bottom:5px;'>
								<span class=\"label\"style='background-color:$p_color[$p_];widht=30px;height:15px;border:2px solid #000000;'>&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;  $p_size[$p_] : $p_stock[$p_]</strong> Item's
								</p>";
			}
			$total+=$p_stock[$p_];
		}
		$p_ = $p_ + 1;
	}
        $out.="
				  </td><td>Rp. $data[3]</td>
                  <td>$data[6]</td>
                  <td>
				  <div class=\"input-append\" style=\"text-align:center\">
					<a href=\"#\" class=\"btn btn-success btn-mini\" onclick=\"admin_productadd_show('editproduct','$data[0]');\"><i class=\"icon-pencil\" title=\"Update $data[1]\"></i></a>
				</div>
				  </td>
				  <td>";
        if ($total>0){
			$out.="<span class=\"label label-info\">Ready</span><br/>";
		}else{
			$out.="<span class=\"label label-important\">Not Ready</span><br/>";
		}
        $out.="</td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_articleList(){
	$i=1;
	$out="";
	$query="SELECT *
			FROM article
			ORDER BY article_date desc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$content=substr($data[2],0,100)."...";
		$out.="<tr>
                  <td>$i</td>
                  <td>
				  <a href='?page=articledetail&id=$data[0]'><b class='btn btn-mini btn-success' id='t$data[0]'>$data[1]</b></a>
				  </td>
				  <td>
					<p>$content</p>
					<pre id='c$data[0]' style='display:none;'>$data[2]</pre>
				  </td>
                  <td>
					<a  onclick=\"admin_articleadd_show('articleedit','$data[0]');\"><img width=\"16\" src=\"themes/images/lightbox/edit16.png\" title=\"edit\"/></a>&nbsp;&nbsp;&nbsp;
					<a  onclick=\"admin_articledelete_show('$data[0]');\"><img width=\"16\" src=\"themes/images/lightbox/delete16.png\" title=\"Delete\"/></a>
				  </td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_memberList(){
	$i=1;
	$out="";
	$query="SELECT *
			FROM member
			where member_id<>1
			ORDER BY member_name asc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="<tr>
                  <td>$i</td>
                  <td><h5 id='id$data[0]'>$data[1]</h5></td>
				  <td>$data[2]</td>
				  <td>$data[3]</td>
				  <td>$data[4]</td>
				  <td>$data[5]</td>
				  <td>$data[6]</td>
                  <td>
					<a onclick=\"admin_memberdelete_show('$data[0]','$data[1]')\"><img width=\"16\" src=\"themes/images/lightbox/delete16.png\" title=\"Delete\"/></a>
				  </td>
                </tr>";
		$i++;
	}
	return $out;
}

function admin_articleEditForm($id){
	$out="";
	$query="SELECT *
			FROM article
			where article_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="<div class=\"control-group\">
				<p>Title :</p>
				<input type=\"hidden\" name=\"id\" value=\"$id\">
              <input type=\"text\" placeholder=\"Title\" name=\"title\" class=\"input-xxlarge\" required value='$data[1]'/>           
          </div>
          <div class=\"control-group\">
				<p>Content :</p>
              <textarea rows=\"10\"  placeholder=\"Content\" name=\"content\" class=\"input-xxlarge\" required >$data[2]</textarea>           
          </div>";
		$i++;
	}
	return $out;
}


//_____________Member Conrol

function loginmember($uid,$pwd){
	$out="";
	$data = null;
	$query="select * from member where member_username='$uid' and member_password='$pwd'";
	$data=mysql_fetch_row(mysql_query($query));
	if ($data == null) {
		return false;
	}else{
		if($data[2]==$pwd){
			return true;
		}else{
			return false;
		}
	}
}

function addmember($username,$password,$name,$address,$phonenumber,$email,$birthday){
	$query="insert into member values('','$username','$password','$name','$address','$phonenumber','$email','$birthday')";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function updatemember($member_id,$username,$password,$name,$address,$phonenumber,$email){
	$query="update member set member_username='$username',member_password='$password',member_name='$name',
			member_address='$address',member_no_telp='$phonenumber',member_email='$email'
			where member_id='$member_id'";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

//____member view

function data_member($id){
	$out="";
	$query="SELECT *
			FROM member
			where member_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="<div style='display:none;'>
				<p id='datamember$data[0]uid'>$data[1]<p>
				<p id='datamember$data[0]pwd'>$data[2]<p>
				<p id='datamember$data[0]name'>$data[3]<p>
				<p id='datamember$data[0]address'>$data[4]<p>
				<p id='datamember$data[0]hp'>$data[5]<p>
				<p id='datamember$data[0]email'>$data[6]<p>
				</div>";
	}
	return $out;
}

function get_member_nohp($id){
	$out="";
	$query="SELECT member_no_telp
			FROM member
			where member_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="$data[0]";
	}
	return $out;
}

function get_member_name($id){
	$out="";
	$query="SELECT *
			FROM member
			where member_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="$data[3]";
	}
	return $out;
}

function get_member_id($uid){
	$out="";
	$query="SELECT member_id
			FROM member
			where member_username='$uid'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="$data[0]";
	}
	return $out;
}

function member_count(){
	$out="";
	$query="SELECT count(*)
			FROM member";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

//Product
//control
function addproduct($name,$stock,$price,$detail,$image,$category){
	$query="insert into product values('','$name','$stock','$price','$detail','$image','$category',now())";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function editproduct($pid,$name,$stock,$price,$detail,$image,$category){
	$query="";
	if($image==""){
		$query="update product set product_name='$name',product_stock='$stock'
		,product_price='$price',product_detail='$detail',product_category='$category',product_date=now() where product_id=$pid;";
	}else{
		$query="update product set product_name='$name',product_stock='$stock'
		,product_price='$price',product_detail='$detail',product_image='$image',product_category='$category',product_date=now() where product_id=$pid;";
	}
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function update_stock($pid,$stock){
	$query="update product set product_stock='$stock' where product_id=$pid;";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

//view
function product_listbyrating(){
	
	$query="SELECT *
			FROM ukuran
			ORDER BY product_id";
	$query = mysql_query($query);
	$s_id="";
	$p_id="";
	$p_color="";
	$p_size="";
	$p_stock="";
	$_p=0;
	while($data=mysql_fetch_row($query)){
		$s_id[$_p]="$data[0]";
		$p_id[$_p]="$data[1]";
		$p_color[$_p]="$data[2]";
		$p_size[$_p]="$data[3]";
		$p_stock[$_p]="$data[4]";
		echo "<p id='s_id$p_id[$_p]$_p' style='display:none'>$s_id[$_p]</p>\n";
		echo "<p id='color$p_id[$_p]$_p' style='display:none'>$p_color[$_p]</p>\n";
		echo "<p id='size$p_id[$_p]$_p' style='display:none'>$p_size[$_p]</p>\n";
		echo "<p id='stock$p_id[$_p]$_p' style='display:none'>$p_stock[$_p]</p>\n";
		$_p = $_p + 1;
	}
	
	$no_faktur="";
	if (isset($_SESSION['faktur_number'])){
		$no_faktur=$_SESSION['faktur_number'];
	}
	$out="";
	$query="SELECT *
			FROM product p,rating r
			where p.product_id=r.product_id
			order by r.rating_count desc,product_name
			LIMIT 0 , 4";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$image="";
		if ($data[5]==""){
			$image="themes/images/products/noimage.jpg";
		}else{
			$image="themes/images/products/$data[5]";
		}
		$out.="<li class=\"span3\" style=\"width:190px\">
				  <div class=\"thumbnail\">
				  
					<a   onclick=\"product_detail('$data[0]','$_p')\"><img src=\"$image\" style=\"height:100px\" /></a>
					<div class=\"caption\">
					  <h5 id='name$data[0]'>$data[1] ( $data[10] )</h5>
					  <p id='price$data[0]'>Rp. $data[3]</p>
					  <p id='stock$data[0]' style='display:none;'>$data[2]</p>
					  <p id='image$data[0]' style='display:none;'> $image</p>
					  <p id='detail$data[0]' style='display:none;'> $data[4]</p>					 
					  <h4 style=\"text-align:center\">
					  <a class=\"btn\"  onclick=\"product_detail('$data[0]','$_p')\">Add to <i class=\"icon-shopping-cart\"></i></a></h4>
					</div>
				  </div>
				</li>";
	}
	return $out;
}

function newproduct_list(){
	$no_faktur="";
	if (isset($_SESSION['faktur_number'])){
		$no_faktur=$_SESSION['faktur_number'];
	}
	$out="";
	$query="SELECT *
			FROM `product`
			order by product_date desc,product_name
			LIMIT 0 , 6";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$image="";
		if ($data[5]==""){
			$image="themes/images/products/noimage.jpg";
		}else{
			$image="themes/images/products/$data[5]";
		}
		$out.="<li class=\"span3\"  style=\"width:190px\">
				  <div class=\"thumbnail\">
				  <i class=\"tag\"></i>
					<a   onclick=\"product_detail('$data[0]','5')\"><img src=\"$image\" style=\"height:100px\" /></a>
					<div class=\"caption\">
					  <h5 id='name$data[0]'>$data[1]</h5>
					  <p id='price$data[0]'>Rp. $data[3]</p>
					  <p id='stock$data[0]'  style='display:none;'>$data[2]</p>
					  <p id='image$data[0]' style='display:none;'> $image</p>
					  <p id='detail$data[0]' style='display:none;'> $data[4]</p>
					 
					  <h4 style=\"text-align:center\">
					  <a class=\"btn\"  onclick=\"product_detail('$data[0]','5')\">Add to <i class=\"icon-shopping-cart\"></i></a></h4>
					</div>
				  </div>
				</li>";
	}
	return $out;
}

function productlistbycategory($category){
	$query="SELECT *
			FROM ukuran u,product p
            where u.product_id=p.product_id and  p.product_category='$category'
			ORDER BY u.product_id, p.product_date desc,p.product_name";
	$query = mysql_query($query);
	$s_id="";
	$p_id="";
	$p_color="";
	$p_size="";
	$p_stock="";
	$_p=0;
	while($data=mysql_fetch_row($query)){
		$s_id[$_p]="$data[0]";
		$p_id[$_p]="$data[1]";
		$p_color[$_p]="$data[2]";
		$p_size[$_p]="$data[3]";
		$p_stock[$_p]="$data[4]";
		echo "<p id='s_id$p_id[$_p]$_p' style='display:none'>$s_id[$_p]</p>\n";
		echo "<p id='color$p_id[$_p]$_p' style='display:none'>$p_color[$_p]</p>\n";
		echo "<p id='size$p_id[$_p]$_p' style='display:none'>$p_size[$_p]</p>\n";
		echo "<p id='stock$p_id[$_p]$_p' style='display:none'>$p_stock[$_p]</p>\n";
		$_p = $_p + 1;
	}
	
	$no_faktur="";
	if (isset($_SESSION['faktur_number'])){
		$no_faktur=$_SESSION['faktur_number'];
	}
	$out="";
	$query="SELECT *
			FROM product p
			where p.product_category='$category'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$image="";
		if ($data[5]==""){
			$image="themes/images/products/noimage.jpg";
		}else{
			$image="themes/images/products/$data[5]";
		}
		$out.="<li class=\"span3\" style=\"width:190px\">
				  <div class=\"thumbnail\">
				  
					<a   onclick=\"product_detail('$data[0]','$_p')\"><img src=\"$image\" style=\"height:100px\" /></a>
					<div class=\"caption\">
					  <h5 id='name$data[0]'>$data[1] </h5>
					  <p id='price$data[0]'>Rp. $data[3]</p>
					  <p id='stock$data[0]' style='display:none;'>$data[2]</p>
					  <p id='image$data[0]' style='display:none;'> $image</p>
					  <p id='detail$data[0]' style='display:none;'> $data[4]</p>					 
					  <h4 style=\"text-align:center\">
					  <a class=\"btn\"  onclick=\"product_detail('$data[0]','$_p')\">Add to <i class=\"icon-shopping-cart\"></i></a></h4>
					</div>
				  </div>
				</li>";
	}
	return $out;
}

function productlistbyname($name){
	$out="";
	$query="SELECT *
			FROM `product`
			where product_name like '%$name%'
			order by product_date desc,product_name";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$image="";
		if ($data[5]==""){
			$image="themes/images/products/noimage.jpg";
		}else{
			$image="themes/images/products/$data[5]";
		}
		$out.="
		<li class=\"span3\">
				  <div class=\"thumbnail\">
					<a   onclick=\"product_detail('$data[0]')\"><img src=\"$image\" style=\"height:100px\" /></a>
					<div class=\"caption\">
					  <h5 id='name$data[0]'>$data[1]</h5>
					  <p id='price$data[0]'>Rp. $data[3]</p>
					  <p id='image$data[0]' style='display:none;'> $image</p>
					  <p id='detail$data[0]' style='display:none;'> $data[4]</p>
					 
					  <h4 style=\"text-align:center\">
					  <a class=\"btn\" onclick=\"product_detail('$data[0]')\">Add to <i class=\"icon-shopping-cart\"></i></a></h4>
					</div>
				  </div>
				</li>";
	}
	return $out;
}

function clothes_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where product_category='Top Clothing' or product_category='Bottom Clothing'
			or product_category='Dress'  or product_category='Outwear'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function topclothes_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where product_category='Top Clothing'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function bottomclothes_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where product_category='Bottom Clothing'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function dress_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where product_category='Dress' ";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function outwear_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where  product_category='Outwear'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function bag_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where  product_category='Bag'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function shoe_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where  product_category='Shoe'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function accessories_count(){
	$out="";
	$query="SELECT count(*)
			FROM `product`
			where  product_category='Accessories'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productname_byid($id){
	$out="";
	$query="SELECT product_name
			FROM `product`
			where  product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_productprice($id){
	$out="";
	$query="SELECT product_price
			FROM `product`
			where  product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_productstock($id){
	$out="";
	$query="SELECT stock
			FROM `ukuran`
			where  ukuran_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productstock_byid($id){
	$out="";
	$query="SELECT product_stock
			FROM `product`
			where  product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productprice_byid($id){
	$out="";
	$query="SELECT product_price
			FROM `product`
			where  product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productdetail_byid($id){
	$out="";
	$query="SELECT product_detail
			FROM `product`
			where  product_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productimage_byid($id){
	$out="";
	$query="SELECT product_image
			FROM `product`
			where  product_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function productcategory_byid($id){
	$out="";
	$query="SELECT product_category
			FROM `product`
			where  product_id='$id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

//Article view
function article_count(){
	$out="";
	$query="SELECT count(*)
			FROM article";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function article_list(){
	$out="";
	$query="SELECT *
			FROM `article`
			order by article_date desc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="<li><a href=\"?page=articledetail&id=$data[0]\"><i class=\"icon-file\"></i>".ucwords($data[1])." </a></li>";
	}
	return $out;
}

function articleimagebyid($id){
	$out="";
	$query="SELECT article_img
			FROM `article` where article_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="$data[0]";
	}
	return $out;
}

function articlenamebyid($id){
	$out="";
	$query="SELECT article_title
			FROM `article` where article_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="$data[0]";
	}
	return $out;
}


function articlecontentbyid($id){
	$out="";
	$query="SELECT article_content
			FROM `article` where article_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="$data[0]";
	}
	return $out;
}

// Order - Control

function check_product_order($ukuran_id,$faktur_number){ // mengambil no faktur member untuk order barang
	$out=false;
	$query="select *
			from orders o , faktur f
			where o.faktur_id=f.faktur_id and f.faktur_number='$faktur_number' and o.ukuran_id='$ukuran_id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=true;
	}
	return $out;
}

function get_productidbyorderid($order_id){ // mengambil product_id berdasarkan order id
	$out=false;
	$query="select product_id
			from orders
			where order_id=$order_id ";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_orderid($ukuran_id,$faktur_number){ // mengambil no faktur member untuk order barang
	$out=false;
	$query="select o.order_id
			from orders o , faktur f
			where o.faktur_id=f.faktur_id and f.faktur_number='$faktur_number' and o.ukuran_id='$ukuran_id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_totalorder($faktur_number,$ukuran_id){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select o.order_total
			from orders o , faktur f
			where o.faktur_id=f.faktur_id and f.faktur_number='$faktur_number' and o.ukuran_id='$ukuran_id'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function total_orderbyfaktur($faktur_number){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select count(*)
			from orders o , faktur f
			where o.faktur_id=f.faktur_id and f.faktur_number='$faktur_number'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function insertorder($ukuranid,$faktur_id,$totalorder,$totalprice){
	$query="insert into orders values('','$ukuranid','$faktur_id','$totalorder',now(),'$totalprice')";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function updateorder($order_id,$totalorder,$totalprice){
	$query="update orders set order_total='$totalorder',order_date=now(),total_price='$totalprice'
			where order_id=$order_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function deleteorderbyfakturid($fid){
	$out="";
	$query="delete from orders where faktur_id=$fid";
	$query = mysql_query($query);
}

function deleteorder($order_id){
	$out="";
	$query="delete from orders where order_id=$order_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

//view 

function order_list($faktur_number){ // mengambil no faktur member untuk order barang
	$i=1;
	$out="";
	$query="select *
			from orders o ,product p, faktur f,ukuran u
			where o.faktur_id=f.faktur_id and p.product_id=u.product_id and o.ukuran_id=u.ukuran_id
			 and f.faktur_number='$faktur_number'";
	$query = mysql_query($query);
	$all_total=0;
	while($data=mysql_fetch_row($query)){
		$all_total=$all_total+$data[5];
		$out.="<tr>
                  <td>$i</td>
                  <td id='product_name$data[0]'>$data[7]</td>
				  <td>
					  <strong id='product_total_order$data[0]'>$data[3]</strong> Item's
					  <a href=\"#\" class=\"btn btn-danger btn-mini pull-right\" onclick=\"delete_productorder($data[0])\"><i class=\"icon-remove\" title=\"Delete\"></i></a>
					  <a href=\"#\" class=\"btn btn-success btn-mini pull-right\" onclick=\"update_productorder($data[0])\"><i class=\"icon-pencil\" title=\"Update\"></i></a>
				  </td>
                  <td>Rp. <strong>$data[9]</strong></td>
                  <td>Rp. <strong>$data[5]</strong></td>
                </tr>";
				$i+=1;
	}
	$out.="
				 <tr>
                  <td colspan=\"4\" style=\"text-align:right\"><strong>TOTAL Rp.</strong></td>
                  <td class=\"label label-important\" style=\"display:block\"> <strong> $all_total </strong></td>
                </tr>";
	return $out;
}

//faktur
//faktur ket = orderer : sewaktu member order barang,order_ok : sewaktu member telah upload bukti ,order_confirm : sewaktu di confirm admin
function cekstatus_faktur($nofaktur){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select faktur_ket
			from faktur
			where  faktur_number='$nofaktur';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function notif_faktur(){
	$datedif=0;
	$f_id=-1;
	$query="select f.faktur_id,f.faktur_date,now(),m.member_no_telp
			from faktur f,member m
            where f.member_id=m.member_id  and f.faktur_ket='orderer';;";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$f_id=$data[0];
		$date1=substr("$data[1]",0,10);
		$date2=substr("$data[2]",0,10);
		$datedif=round(abs(strtotime($date1)-strtotime($date2))/86400);
		if($datedif==1){
			$msg="Pesan Dari Butik Classic. Silahkan Upload Bukti Transfer anda untuk faktur no $data[0]. waktu upload anda kurang dari 24 jam.";
			sendSMS($data[3],$msg);
		}
	}
}

function cekfaktur_aviable($nofaktur){
	$datedif=0;
	$f_id=-1;
	$query="select faktur_id,faktur_date,now()
			from faktur
			where  faktur_number='$nofaktur'  and faktur_ket='orderer';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$f_id=$data[0];
		$date1=substr("$data[1]",0,10);
		$date2=substr("$data[2]",0,10);
		$datedif=round(abs(strtotime($date1)-strtotime($date2))/86400);
	}
	if($datedif>2){
		deleteorderbyfakturid($f_id);
		updatefaktur_date($f_id);
		notifications("Your Order Expired.","home");
	}else{
		updatefaktur_date($f_id);
		header("location:?page=home");
	}
}

function count_faktur_order(){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select count(*)
			from faktur
			where  faktur_ket='order_ok';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function count_faktur_confirm(){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select count(*)
			from faktur
			where  faktur_ket='order_confirm';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_fakturid($no_faktur){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select faktur_id
			from faktur
			where faktur_number='$no_faktur';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function membernamebyfakturnumber($no_faktur){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select m.member_name
			from faktur f, member m
			where f.member_id=m.member_id and f.faktur_number='$no_faktur';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_member_fakturnumber($member_id){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select faktur_number
			from faktur
			where member_id='$member_id' and faktur_ket='orderer';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_memberhp_byfakturnumber($faktur_number){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select m.member_no_telp
			from member m,faktur f
			where m.member_id=f.member_id and f.faktur_number='$faktur_number';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}


function get_member_bb_faktur($faktur_number){ // mengambil no faktur member untuk order barang
	$out="";
	$query="select faktur_fotobukti
			from faktur
			where faktur_number='$faktur_number';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0];
	}
	return $out;
}

function get_random_faktur_number(){ 
	$timenow = date('l j F Y h:i:s A'); // ambil waktu sekarang
	$time_enkrip = md5($timenow); // enkrip waktu
	$fakturnumber = substr($time_enkrip, -10); // ambil 10 length terakhir text
	return $fakturnumber;
}

function inserfaktur($member_id){// faktur member untuk order baru
	$f_ket="orderer";
	$faktur_number = $member_id.get_random_faktur_number();
	$query="insert into faktur values('','$member_id','$faktur_number','','$f_ket',now())";
	$query = mysql_query($query);
		return $faktur_number;
}

function updatefaktur_date($fid){
	$query="update faktur set faktur_date=now()";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function updatefaktur($faktur_number,$foto){
	if ($foto==""){
		$ket="order_confirm";
		$query="update faktur set faktur_ket='$ket'
			where faktur_number='$faktur_number'";
	}else{
		$ket="order_ok";
		$query="update faktur set faktur_ket='$ket',faktur_fotobukti='$foto'
			where faktur_number='$faktur_number'";
	}
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function confirm_faktur($faktur_number){//add rating, product stock,
	$i=0;
	$ket="order_confirm";
	$query="update faktur set faktur_ket='order_confirm' where faktur_number='$faktur_number'";
	$query = mysql_query($query);
	$query="select * from faktur f,orders o, product p,ukuran u
			where u.ukuran_id=o.ukuran_id and f.faktur_id=o.faktur_id and u.product_id=p.product_id
			and f.faktur_number='$faktur_number';";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$product_id[$i]=$data[12];
		$product_stock[$i]=$data[24];
		$count_order[$i]=$data[9];
		$ukuran_id[$i]=$data[20];
		$i+=1;
	}
		$i -=1;
	while ($i >= 0){
		update_rating($product_id[$i],$count_order[$i]);
		admin_update_product_stock($ukuran_id[$i],($product_stock[$i]-$count_order[$i]));
		$i -=1;
	}
}

function cancel_faktur($faktur_number){
	$ket="order_cancel";
	$query="update faktur set faktur_ket='$ket'
			where faktur_number='$faktur_number'";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

//Rating

function insert_rating($productid,$count){ 
	$query="insert into rating values('','$productid','$count')";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function update_rating($productid,$count){
	$count_db = get_ratingcount($productid);
	$total_count = $count + $count_db;
	if($count_db==""){
		insert_rating($productid,$count);
	}else{
		$query="update rating set rating_count='$total_count' where product_id='$productid'";
		$query = mysql_query($query);
		if ($query){
			return true;
		}else{
			return false;
		}
	}
}

function get_ratingcount($productid){
	$out="";
	$query="select rating_count from rating where product_id='$productid'";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out="$data[0]";
	}
	return $out;
}

//kuisoner
function inserkuesioner($member_id,$soal1,$soal2,$soal3,$soal4,$soal5,$soal6,$soal7){
	$faktur_number = $member_id.get_random_faktur_number();
	$query="insert into kuesioner values('','$member_id','$soal1','$soal2','$soal3','$soal4','$soal5','$soal6','$soal7',now())";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function kuesioner_chart($soal){ //Menggunakan Perhitungan persentasi
	$i=0;
	$total=0;
	$out="";
	$value= 0;
	$query="select soal$soal, count(soal$soal) from kuesioner group by soal$soal order by soal$soal desc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$value += ($data[0]*$data[1]);
		$total+=$data[1];
		$i+=1;
	}
	if ($value==0){
		$data1=0;
	}else{
		$data1=($value * 100) / ($total*5);
	}
	if($soal=="7"){
		$out.="{device: 'Soal $soal', sells: $data1 }";
	}else{
		$out.="{device: 'Soal $soal', sells: $data1 },";
	}
	return $out;
}


function cekkuesionermember($memberid){ //cek apakah member sudah isi kuesioner atau belum
	$cek="";
	$query="select member_id from kuesioner where member_id=$memberid";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$cek=$data[0];
	}
		if($cek<>""){
			$cek = "OK";
		}else{
			$cek = "NOT";
		}
	return $cek;
}

//Comment
//control
function insert_comment($member_id,$article_id,$content){
	$query="insert into comment values('','$member_id','$article_id','$content',now())";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}


function articleidbycomentid($id){
	$out="";
	$query="SELECT article_id
			FROM `comment` where coment_id=$id";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="$data[0]";
	}
	return $out;
}

function delete_comment($comment_id){
	$out="";
	$query="delete from comment where coment_id=$comment_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

//view
function list_comment($article_id){
	$out="";
	$typelogin="";
	$btn_delete="";
	if(isset($_SESSION['type'])){
		$typelogin=$_SESSION['type'];
	}
	$query="SELECT *
			FROM comment c,member m,article a
			where c.member_id=m.member_id and c.article_id=a.article_id and a.article_id=$article_id
			order by c.comment_date desc
			LIMIT 0 , 10";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
	if($typelogin=="admin"){
		$btn_delete="<a href=\"#\" class=\"btn btn-danger btn-mini pull-right\" onclick=\"admin_commentdelete_show($data[0])\"><i class=\"icon-remove\" title=\"Delete\"></i></a>";
	}
		$out.="<p><pre style=\"align:justify;\">$data[8] - [ $data[4] ]  : $data[3] $btn_delete</pre></p>";
	}
	return $out;
}

// Report
function report_chart($category,$date){
	$out="";
	if($category=="all"){
		$query="select p.product_category,sum(o.order_total)
				from product p, orders o, faktur f,ukuran u
				where u.ukuran_id=o.ukuran_id and f.faktur_id=o.faktur_id and f.faktur_ket='order_confirm' and o.order_date like '%$date%' 
				 and u.product_id=p.product_id
				group by p.product_category order by p.product_category asc";
	}else{
		$query="select p.product_name,sum(o.order_total)
				from product p, orders o, faktur f,ukuran u
				where u.ukuran_id=o.ukuran_id and f.faktur_id=o.faktur_id and f.faktur_ket='order_confirm' and o.order_date like '%$date%' 
				and p.product_category='$category' and u.product_id=p.product_id
				group by p.product_id order by p.product_name asc";
	}
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out.="{device: '$data[0]', sells: $data[1]},";
	}
	if($out==""){
		$out.="{device: 'No Data', sells: 0},";
	}
	return $out;
}


//sms 

function add_sms($sms_title,$sms_content){
	$out="";
	$query="insert into sms values('','$sms_title','$sms_content',date(now()))";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function update_sms($sms_id,$sms_title,$sms_content){
	$out="";
	$query="update sms set sms_title='$sms_title', sms_content='$sms_content' where sms_id=$sms_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function delete_sms($sms_id){
	$out="";
	$query="delete from sms where sms_id=$sms_id";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}
//view

function member_phone_list(){
	$i=0;
	$out="";
	$query="SELECT member_name,member_no_telp
			FROM member
			where member_id<>1
			ORDER BY member_name asc";
	$query = mysql_query($query);
	$out.="<div style='display:none;'>";
	while($data=mysql_fetch_row($query)){
		$out.="<p id='name$i'>$data[0]</p>";
		$out.="<p id='nohp$i'>$data[1]</p>";
		$i+=1;
	}
		$out.="<p id='totalnohp'>$i</p>";
	$out.="</div>";
	return $out;
}

function sms_count(){
	$out="";
	$query="SELECT count(*)
			FROM sms
			ORDER BY sms_title asc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$out=$data[0]-1;
	}
	return $out;
}

function sms_list(){
	$i=1;
	$out="";
	$query="SELECT *
			FROM sms
			where sms_id<>1
			ORDER BY sms_title asc";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$content=substr($data[2],0,100)."...";
		$out.="<tr>
                  <td>$i</td>
                  <td><h5 id='t$data[0]'>$data[1]</h5></td>
				  <td>
					<p>$content</p>
					<pre id='c$data[0]' style='display:none;'>$data[2]</pre>
				  </td>
                  <td>
					<a  onclick=\"admin_smsadd_show('smsedit','$data[0]');\"><img width=\"16\" src=\"themes/images/lightbox/edit16.png\" title=\"edit\"/></a>&nbsp;&nbsp;&nbsp;
					<a  onclick=\"admin_smsdelete_show('$data[0]');\"><img width=\"16\" src=\"themes/images/lightbox/delete16.png\" title=\"Delete\"/></a>
					<a  onclick=\"sendsms('$data[0]');\"><img width=\"16\" src=\"themes/images/message.png\" title=\"Send\"/></a>
				  </td>
                </tr>";
		$i++;
	}
	return $out;
}

//send sms
function broadcarstsms($message){
	$out="";
	$query="SELECT member_no_telp
			FROM member";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		sendSMS($data[0],$message);
	}
	return $out;
}
function broadcarstemail($e_message,$p_image){

	$mail             = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port

	$mail->Username   = "cvmyuni@gmail.com";  // GMAIL username
	$mail->Password   = "wahyuniutami";            // GMAIL password

	//$mail->From       = "rizkihamdani01@gmail.com";
	$mail->FromName   = "Butik Classic";
	$mail->Subject    = "Newsletter";
	$mail->WordWrap   = 50; // set word wrap
	$mail->MsgHTML($e_message);

	//send mail too
	//$mail->AddAddress("memberemail","Membername");	
	$query="SELECT *
			FROM member";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		$mail->AddAddress("$data[6]","$data[3]");
	}

	$mail->AddAttachment("themes/images/products/$p_image", "$p_image"); // attachment

	$mail->IsHTML(true); // send as HTML

	if(!$mail->Send()) {
		return false;
	} else {
		return true;
	}
}

function update_smsultahdate(){
	$out="";
	$query="update sms set sms_date=date(now()) where sms_id=1";
	$query = mysql_query($query);
	if ($query){
		return true;
	}else{
		return false;
	}
}

function sendSMSultahmember(){
	$query="select *,date(now()) from member";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if(substr($data[8],5)==substr($data[7],5)){
			$age=substr($data[8],0,4)-substr($data[7],0,4);
			$message="Butik Classic Mengucapkan Selamat Ulang Tahun $data[3] yang Ke-$age.";
			sendSMS($data[5],$message);
		}
	}
}

function ceksmsultah(){
	$query="select sms_date,date(now()) from sms where sms_id=1";
	$query = mysql_query($query);
	while($data=mysql_fetch_row($query)){
		if($data[0]<>$data[1]){
			sendSMSultahmember();
			notif_faktur();
			update_smsultahdate();
		}
	}
}
function sendSMS($number,$message){
	$link = "https://reguler.zenziva.net/apps/smsapi.php?userkey=nz1ct5&passkey=1234&nohp=$number&pesan=$message";
	$xml=simplexml_load_file($link);
	$ket =  $xml->message[0]->text; 
	return $ket;
}

?>