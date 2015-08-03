function member_account(member_id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var uid = document.getElementById("datamember"+member_id+"uid").innerHTML;
		var pwd = document.getElementById("datamember"+member_id+"pwd").innerHTML;
		var name = document.getElementById("datamember"+member_id+"name").innerHTML;
		var address = document.getElementById("datamember"+member_id+"address").innerHTML;
		var hp = document.getElementById("datamember"+member_id+"hp").innerHTML;
		var email = document.getElementById("datamember"+member_id+"email").innerHTML;
		out+="<div class=\"modal\">"+
		"	  <div class=\"modal-header\">"+
		"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
		"		<h3>Account</h3>"+
		"	  </div>"+
		"		<form class=\"form-horizontal loginFrm\"  action='?page=member_proses' method=\"POST\">"+
		"	  <div class=\"modal-body\" style=\"text-align:center;\">"+
		"		  <div class=\control-group\">	"+
		"			<input type=\"hidden\" name=\"ket\" value=\"accountedit\">"+
		"			<input type=\"hidden\" name=\"member_id\" value=\""+member_id+"\">"+
		"			<input type=\"text\" name=\"username\" required  pattern=\"[0-z]*\" maxlength='20' placeholder=\"Username\" value='"+uid+"'>"+
		"		  </div>"+
		"		  <div class=\"control-group\">"+
		"			<input type=\"password\" name=\"password\" required maxlength='20' placeholder=\"Password\" value='"+pwd+"'>"+
		"		  </div>"+
		"		  <div class=\"control-group\">"+
		"			<input type=\"text\" name=\"name\" required maxlength='50' placeholder=\"Name\" value='"+name+"'>"+
		"		  </div>"+
		"		  <div class=\"control-group\">"+			
		"			<Textarea name=\"address\" required   placeholder=\"Address\">"+address+"</textarea>"+
		"		  </div>"+
		"		  <div class=\"control-group\">"+
		"			<input type=\"text\" name=\"phonenumber\" required pattern=\"[0-9]*\" maxlength='15' placeholder=\"Phone Number\" value='"+hp+"'>"+
		"		  </div>"+
		"		  <div class=\"control-group\">"+
		"			<input type=\"email\" name=\"email\" required   placeholder=\"E-mail\" value='"+email+"'>"+
		"		  </div>"+
		"	  </div>"+
			"<div class='modal-footer'>"+
		"			  <input type=\"submit\" class=\"btn btn-primary  pull-right\" value='Simpan'>"+
			"</div>"+
		"		</form>"+
		"</div>";
		namadiv.innerHTML = out;
}

function product_detail(id,count){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var name = document.getElementById("name"+id).innerHTML;
		var price = document.getElementById("price"+id).innerHTML;
		var image = document.getElementById("image"+id).innerHTML;
		var detail = document.getElementById("detail"+id).innerHTML;
		var stock = document.getElementById("stock"+id).innerHTML;
		out+="<div class=\"modal\">"+
				  "<div class=\"modal-header\">"+
				"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
				"	<h3>Products</h3>"+
				 " </div>"+
				"  <div class=\"modal-body\">"+
				"  <form action='?page=member_proses' method='POST'>"+
				"	  <div class=\"control-group\" >	"+
				"	  <div class=\"control\" >	"+
				"		<img src=\""+image+"\" class=\"pull-left\"title=\"aa\" style='height:200px;padding-right:50px;text-align:center;border:1px;'/>"+
				"	  </div>"+
				"	  </div>"+
				"	  <div class=\"control-group\" style='padding-top:230px;'>	"+
				"		<h3><i class=\"icon-th-list\"  style='padding-top:7px;'></i>&nbsp;&nbsp;"+name+"<small> [ "+price+" ]</small></h3>"+
				"			<div class=\"controls pull-right\">"+
				"			<input type=\"hidden\" name='product_id' value=\""+id+"\"/>"+
				"			<input type=\"hidden\" name='ket' value=\"neworder\"/>"+
				"			<input type=\"number\" class=\"span1\" min=\"1\" name='total_order' value='1'  required placeholder=\"Qty.\"/>&nbsp;"+
				"			  <input type=\"submit\" class=\"btn btn-primary  pull-right\" value='Add'>"+
				"			</div>			"+
				"		<hr class=\"soft\"/>"+
				"	  <div class=\"control-group\"><h4>Size Available : </h4>	";
				//var count = document.getElementById("totalnohp").textContent;
				for (var i=0;i<count;i++){
						 var color = "";
						 var size = "";
						 var stock = "";
						 var sid = "";
						try {
							 color = document.getElementById("color"+id+""+i).textContent;
							 size = document.getElementById("size"+id+""+i).textContent;
							 stock = document.getElementById("stock"+id+""+i).textContent;
							 sid = document.getElementById("s_id"+id+""+i).textContent;
					//alert(sid);
						}
						catch(err) {
						}
						if(color!="" && size>0){
						out+="<input type='radio' name='size' style='width:10px;margin:10px;' value='"+sid+"' checked>"+
								"<span class=\"label\" style='background-color:" + color + ";widht=30px;height:15px;border:2px solid #000000;'>&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;  "+size+" : "+stock+"</strong> Item's"+
								"</input><br/>";
						}
				}
		out+="		<h4><i class=\" icon-info-sign\" style='padding-top:3px;'></i> Detail</h4>"+
				"			<pre style='text-align:justify;'>"+detail+"</pre>"+
				"	  </div>"+
				 " </div>"+
				 " </form>"+
				"</div>";						
		namadiv.innerHTML = out;
}

function update_productorder(order_id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var product_name = document.getElementById("product_name"+order_id).innerHTML;
		var product_total_order = document.getElementById("product_total_order"+order_id).innerHTML;
		out+="<div class=\"modal\">"+
		"<div class=\"modal-header\">"+
		"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
		"	<h3> Product : "+product_name+"</h3>"+
		"</div>"+
		"	<div class=\"modal-body\">"+
		"  			<form action='?page=member_proses' method='POST'>"+
		"			<div class=\"controls\">"+
			"			<input type=\"hidden\" name='order_id' value=\""+order_id+"\"/>"+
			"			<input type=\"hidden\" name='ket' value=\"update_productorder\"/>"+
			"			<h4> Total Order : "+
			"			<input type=\"number\" class=\"span1\" min=\"1\" name='total_order' value='"+product_total_order+"' required placeholder=\"Qty.\"/>&nbsp;</h4>"+
		"			  <input type=\"submit\" class=\"btn btn-primary  pull-right\" value='Update'>"+
		"			</div>			"+
		"	</div>			"+
		"			</form>"+
		"		<hr class=\"soft\"/>"+
		"</div>";				
		namadiv.innerHTML = out;
}


function delete_productorder(order_id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var product_name = document.getElementById("product_name"+order_id).innerHTML;
		var product_total_order = document.getElementById("product_total_order"+order_id).innerHTML;
		out+="<div class=\"modal\">"+
		"<div class=\"modal-header\">"+
		"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
		"	<h3> Product : "+product_name+"</h3>"+
		"</div>"+
		"	<div class=\"modal-body\">"+
		"  			<form action='?page=member_proses' method='POST'>"+
		"			<div class=\"controls\">"+
			"			<input type=\"hidden\" name='order_id' value=\""+order_id+"\"/>"+
			"			<input type=\"hidden\" name='ket' value=\"delete_productorder\"/>"+
			"			<h4> Are you sure to delete "+product_name+" ?</h4>"+
		"			  <input type=\"submit\" class=\"btn btn-danger  pull-right\" value='delete'>"+
		"			</div>			"+
		"	</div>			"+
		"			</form>"+
		"		<hr class=\"soft\"/>"+
		"</div>";				
		namadiv.innerHTML = out;
}

function kuesioner(){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div class=\"modal\" style='margin-top:-300px;'>"+
		"<div class=\"modal-header\">"+
		"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
		"	<h3> Kuesioner </h3>"+
		"</div>"+
		"  		<form action='?page=member_proses' method='POST' enctype='multipart/form-data'>"+
			"			<input type=\"hidden\" name='ket' value=\"kuesoner\"/>"+
		"	<div class=\"modal-body\">"+
		"			<div class=\"controls\">"+
			"			<table width=100% border=1px>"+
				"			<tr>"+
					"			<th width='5%'>#</th>"+
					"			<th width='80%'>Question</th>"+
					"			<th  width='15%'>Answer</th>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>1</td>"+
					"			<td>Sistem ini dapat mempermudah pengguna untuk melakukan proses order.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal1'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>2</td>"+
					"			<td>Kenyamanan dalam berbelanja secara online dengan menggunakan sistem.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal2'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>3</td>"+
					"			<td>Penyajian teks dapat dibaca dan dipahami.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal3'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>4</td>"+
					"			<td>Kualitas Tampilan Gambar.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal4'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>5</td>"+
					"			<td>Sistem ini mudah digunakan.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal5'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>6</td>"+
					"			<td>Penyajian informasi produk dan artikel pada website.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal6'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
				"			<tr>"+
					"			<td>7</td>"+
					"			<td>Sistem ini dapat menghemat waktu pengguna dalam melakukan proses pemesanan.</td>"+
					"			<td>"+
						"			<select class='span2' required name='soal7'>"+
							"			<option value=''>Choose : </option>"+
							"			<option value='5'>Sangat Baik</option>"+
							"			<option value='4'>Baik</option>"+
							"			<option value='3'>Cukup Baik</option>"+
							"			<option value='2'>Buruk</option>"+
							"			<option value='1'>Sangat Buruk</option>"+
						"			</select>"+
					"			</td>"+
				"			</tr>"+
			"			</table>"+
		"			</div>			"+
		"	</div>			"+
			"<div class='modal-footer'>"+
		"			  <input type=\"submit\" class=\"btn btn-primary  pull-right\" value='Update'>"+
			"</div>"+
		"		</form>"+
		"</div>";				
		namadiv.innerHTML = out;
}

function uploadbukti(){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div class=\"modal\" style='margin-top:-150px;'>"+
		"<div class=\"modal-header\">"+
		"	<button type=\"button\" class=\"close\" onclick='admin_notif_close();'>x</button>"+
		"	<h3> Kuesioner </h3>"+
		"</div>"+
		"  		<form action='?page=member_proses' method='POST' enctype='multipart/form-data'>"+
			"			<input type=\"hidden\" name='ket' value=\"uploadbukti\"/>"+
		"	<div class=\"modal-body\">"+
			"			<h4> Upload Bukti (Image) : "+
			"			<input type=\"file\" class=\"pull-right\" min=\"1\" name='photo' required>&nbsp;</h4>"+
		"	</div>			"+
			"<div class='modal-footer'>"+
		"			  <input type=\"submit\" class=\"btn btn-primary  pull-right\" value='Update'>"+
			"</div>"+
		"		</form>"+
		"</div>";				
		namadiv.innerHTML = out;
}

function admin_notif_close(){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+=""						
		namadiv.innerHTML = out;
    }