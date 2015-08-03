function admin_articleadd_show(ket,id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var dtitle;
		var dcontent ;
		if(id=="a"){
			dtitle="";
			dcontent="";
		}else{
		 dtitle = document.getElementById("t"+id).textContent;
		 dcontent = document.getElementById("c"+id).textContent;
		}
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Article</h3>"+
			"</div>"+
			"<form class='form-horizontal' action='?page=adminprocess' method='POST' enctype='multipart/form-data'>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Title</label>"+
			"<div class='controls'>"+
			"<input name='id' type='hidden' value='"+id+"'>"+
			"<input  name='ket' type='hidden' value='"+ket+"'>"+
			"<input class='input-xlarge' name='title' type='text' placeholder='Title' maxlength='30' required value='"+dtitle+"'>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Image</label>"+
			"<div class='controls'>"+
			"<input type='file' name='image' required>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Content</label>"+
			"<div class='controls'>"+
			"<textarea class='input-xlarge' rows='8' placeholder='Content' name='content' required >"+dcontent+"</textarea>"+
			"</div>"+
			"</div>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<input class='btn btn-primary' type='submit' value='Save'/>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</form>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_articledelete_show(id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var dtitle = document.getElementById("t"+id).textContent;
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Delete Article</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Delete Article <b>"+dtitle+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a href='?page=adminprocess&ket=articledelete&id="+id+"' class='btn btn-danger'/>Delete</a>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_commentdelete_show(id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Delete comment</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Delete this comment </b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a href='?page=adminprocess&ket=commentdelete&id="+id+"' class='btn btn-danger'/>Delete</a>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_memberdelete_show(id,uid){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Delete Member</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Delete Member <b>"+uid+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a href='?page=adminprocess&ket=memberdelete&id="+id+"'  class='btn btn-danger'/>Delete</a>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_confirm_order(faktur_number){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Confirm Order</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Confirm Order To Faktur Number : <b>"+faktur_number+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a class='btn btn-danger' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"<a href='?page=adminprocess&ket=confirm_faktur&id="+faktur_number+"'  class='btn btn-success'/>Confirm</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_cancel_order(faktur_number){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Cancel Order</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Cancel Order To Faktur Number : <b>"+faktur_number+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a class='btn btn-danger' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"<a href='?page=adminprocess&ket=cancel_faktur&id="+faktur_number+"'  class='btn btn-success'/>Submit</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_productadd_show(ket,id){ //proses
		var out="";
		var namadiv = document.getElementById("divnotif");
		var pname=""
		var pstock="";
		var pprice="";
		var pdetail="";
		var pimage="";
		var required="";
		if(id==""){
			 required="required";
			 pname=""
			 pstock="";
			 pprice="";
			 pdetail="";
			 pimage="";
		}else{
			required="";
			pname = document.getElementById("name"+id).textContent;
			pstock = document.getElementById("stock"+id).textContent;
			pprice = document.getElementById("price"+id).textContent;
			pdetail = document.getElementById("detail"+id).textContent;
			pimage="none";
		}
		out+="<div  class='modal' style='margin-top:-270px;'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Product</h3>"+
			"</div>"+
			"<form class='form-horizontal' action='?page=adminprocess' method='POST' enctype='multipart/form-data'>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Category</label>"+
			"<div class='controls'>"+
				"<select required class='input-xlarge' name='category'>"+
				  "<option value='' selected>Please choose :</option>"+
				  "<option value='Top Clothing'>Top Clothing</option>"+
				  "<option value='Bottom Clothing'>Bottom Clothing</option>"+
				  "<option value='Dress'>Dress</option>"+
				  "<option value='Outwear'>Outwear</option>"+
				  "<option value='Bag'>Bag</option>"+
				  "<option value='Shoe'>Shoe</option>"+
				  "<option value='Accessories'>Accessories</option>"+
				"</select>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Name</label>"+
			"<div class='controls'>"+
			"<input name='ket' type='hidden' value='"+ket+"' />"+
			"<input name='id' type='hidden' value='"+id+"' />"+
			"<input class='input-xlarge' name='name' type='text' placeholder='Name' maxlength='20' required value='"+pname+"'/>"+
			"</div>"+
			"</div>"+
			"<input type='hidden' name='stock' type='hidden'value='0'/>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Price (Rp.)</label>"+
			"<div class='controls'>"+
			"<input class='input-xlarge' name='price' type='text' placeholder='Price' pattern='[0-9]*' maxlength='12' minvalue='1000'  value='"+pprice+"' required />"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Image</label>"+
			"<div class='controls'>"+
			"<input class='control-label' type='file' name='image_product' value='"+pimage+"' style='width:80%;align:left'>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Detail</label>"+
			"<div class='controls'>"+
			"<textarea class='input-xlarge' rows='8' placeholder='Detail Product' name='detail' required >"+pdetail+"</textarea>"+
			"</div>"+
			"</div>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<input class='btn btn-primary' type='submit' value='Save'/>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</form>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_productaddstock_show(ket,s_id,p_id,color,size,stock){ //proses
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Product</h3>"+
			"</div>"+
			"<form class='form-horizontal' action='?page=adminprocess' method='POST' enctype='multipart/form-data'>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<input name='ket' type='hidden' value='"+ket+"'/>"+
			"<input name='p_id' type='hidden' value='"+p_id+"'/>"+
			"<input name='s_id' type='hidden' value='"+s_id+"'/>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Color</label>"+
			"<div class='controls'>"+
			"<input  name='color' class='input-xlarge' type='color' value='"+color+"' />"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Size</label>"+
			"<div class='controls'>"+
			"<input class='input-xlarge' name='size' type='text' placeholder='Size' pattern='[0-Z]*' value='"+size+"' maxlength=3 required />"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Stock</label>"+
			"<div class='controls'>"+
			"<input class='input-xlarge' name='stock' type='Number' placeholder='Stock' min='1' value='"+stock+"' required />"+
			"</div>"+
			"</div>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<input class='btn btn-primary' type='submit' value='Save'/>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</form>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_productdelete_show(id){//belum jalan
		var out="";
		var namadiv = document.getElementById("divnotif");
		var name = document.getElementById("name"+id).innerHTML;
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Delete Product</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Delete Product <b>"+name+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a href='?page=adminprocess&ket=productdelete&id="+id+"'  class='btn btn-danger'/>Delete</a>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_smsadd_show(ket,id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var dtitle;
		var dcontent ;
		if(id=="a"){
			dtitle="";
			dcontent="";
		}else{
		 dtitle = document.getElementById("t"+id).textContent;
		 dcontent = document.getElementById("c"+id).textContent;
		}
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>SMS</h3>"+
			"</div>"+
			"<form class='form-horizontal' action='?page=adminprocess' method='POST'>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Title</label>"+
			"<div class='controls'>"+
			"<input name='id' type='hidden' value='"+id+"'>"+
			"<input  name='ket' type='hidden' value='"+ket+"'>"+
			"<input class='input-xlarge' name='title' type='text' placeholder='Title' maxlength='30' required value='"+dtitle+"'>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Message</label>"+
			"<div class='controls'>"+
			"<textarea class='input-xlarge' rows='8' placeholder='Content' name='content' required >"+dcontent+"</textarea>"+
			"</div>"+
			"</div>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<input class='btn btn-primary' type='submit' value='Save'/>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</form>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function admin_smsdelete_show(id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var dtitle = document.getElementById("t"+id).textContent;
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Delete SMS</h3>"+
			"</div>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<label class='control-label' >Delete SMS <b>"+dtitle+"</b> ??</label>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<a href='?page=adminprocess&ket=smsdelete&id="+id+"' class='btn btn-danger'/>Delete</a>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</div>"						
		namadiv.innerHTML = out;
}

function sendsms(id){
		var out="";
		var namadiv = document.getElementById("divnotif");
		var disable;
		var content ;
		if(id==''){
			disable='';
			content ='';
		}else{
			disable='disabled';
			content=document.getElementById("c"+id).textContent;
		}
		out+="<div  class='modal'>"+
			"<div class='modal-header'>"+
			"<button   class='close' type='button' onclick='admin_notif_close();'>&times;</button>"+
			"<h3>Send SMS</h3>"+
			"</div>"+
			"<form class='form-horizontal' action='?page=adminprocess' method='POST'>"+
			"<div class='modal-body'>"+
			"<fieldset>"+
			"<div class='control-group'>"+
			"<label class='control-label' >To</label>"+
			"<div class='controls'>"+
			"<input  name='ket' type='hidden' value='sendsms'>"+
			"<input  name='contentmsg' type='hidden' value='"+content+"'>"+
			"<select class='input-xlarge' id='selectError1' multiple data-rel='chosen' required name='source[]'>";
				var count = document.getElementById("totalnohp").textContent;
				for (var i=0;i<count;i++){
				 var name = document.getElementById("name"+i).textContent;
				 var nohp = document.getElementById("nohp"+i).textContent;
						out+="<option value='"+nohp+"'><b>"+name+"</b></option>";
				}
		out+="</select>"+
			"</div>"+
			"</div>"+
			"<div class='control-group'>"+
			"<label class='control-label' >Message</label>"+
			"<div class='controls'>"+
			"<textarea class='input-xlarge' rows='8' placeholder='Content' "+disable+" name='contentmsg' required >"+content+"</textarea>"+
			"</div>"+
			"</div>"+
			"</fieldset>"+
			"</div>"+
			"<div class='modal-footer'>"+
			"<input class='btn btn-primary' type='submit' value='Send'/>"+
			"<a class='btn' href='#' onclick='admin_notif_close();'>Cancel</a>"+
			"</div>"+
			"</form>"+
			"</div>";				
		namadiv.innerHTML = out;
}

function categorychage(){
	var choose=document.getElementById("s_category").value;
	
	var divall = document.getElementById("divall");
	var divtop_clothing = document.getElementById("divtop_clothing");
	var divbottom_clothing = document.getElementById("divbottom_clothing");
	var divdress = document.getElementById("divdress");
	var divoutwear = document.getElementById("divoutwear");
	var divbag = document.getElementById("divbag");
	var divshoe = document.getElementById("divshoe");
	var divaccessories = document.getElementById("divaccessories");
	
	divall.style.display="none";
	divtop_clothing.style.display="none";
	divbottom_clothing.style.display="none";
	divdress.style.display="none";
	divoutwear.style.display="none";
	divbag.style.display="none";
	divshoe.style.display="none";
	divaccessories.style.display="none";
	
	if (choose==01){
	divtop_clothing.style.display="block";
	}else if (choose==02){
	divbottom_clothing.style.display="block";
	}else if (choose==03){
	divdress.style.display="block";
	}else if (choose==04){
	divoutwear.style.display="block";
	}else if (choose==05){
	divbag.style.display="block";
	}else if (choose==06){
	divshoe.style.display="block";
	}else if (choose==07){
	divaccessories.style.display="block";
	}else if (choose==08){
	divall.style.display="block";	
	}else{
	divtop_clothing.style.display="block";
	}
}

function admin_notif_close(){
		var out="";
		var namadiv = document.getElementById("divnotif");
		out+=""						
		namadiv.innerHTML = out;
}