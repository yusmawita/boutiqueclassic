<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
	<?php
		if (!empty($_SESSION['userlogin'])){
			$userlogin=$_SESSION['userlogin'];
			$usertype=$_SESSION['type'];
			$product_member=  admin_product_count();
			if($usertype=="admin"){
				$username=ucwords(get_admin_name($userlogin));
				$count_article=  article_count();
				$count_member=  member_count()-1;
				$count_sms=  sms_count();
				$count_faktur_order=  count_faktur_order();
				$count_faktur_confirm =  count_faktur_confirm();
				echo "<div class=\"well well-small\">
					<h4>Administrator</h4>
					<a id=\"myCart\" href=\"#adminaccount\" data-toggle=\"modal\"><img src=\"themes/images/ico-user.png\"> $username - $usertype</a><br/>
					<div id=\"adminaccount\" class=\"modal hide fade in\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"login\" aria-hidden=\"false\" >
						  <div class=\"modal-header\">
							<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">X</button>
							<h3>Account</h3>
						  </div>
						  <div class=\"modal-body\">
							<form class=\"form-horizontal loginFrm\" method=\"POST\" action=\"?page=adminprocess\">
							<input type=\"hidden\" name=\"ket\" value=\"admin_account_update\">
							<input type=\"hidden\" name=\"id\" value='$userlogin'>
							  <div class=\"control-group\">								
								<input type=\"text\" name=\"username\" required autofocus placeholder=\"Username\" value='$username'>
							  </div>
							  <div class=\"control-group\">
								<input type=\"password\" name=\"password\" required placeholder=\"Password\">
							  </div>
							  <div class=\"control-group\">
							  </div>
							  <div class=\"control-group\">
								<input type=\"submit\" class=\"btn btn-success\" value='Save'/>
								<button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
							  </div>
							</form>		
						  </div>
					</div>
					<a id=\"myCart\" href=\"?page=admin_member\"><img src=\"themes/images/ico-member.png\">Member<span class=\"badge badge-warning pull-right\">$count_member</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_product\"><img src=\"themes/images/ico-product.png\">Product<span class=\"badge badge-warning pull-right\">$product_member</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_faktur\"><img src=\"themes/images/ico-faktur.png\">Faktur<span class=\"badge badge-warning pull-right\">$count_faktur_order</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_fakturconfirm\"><img src=\"themes/images/visa.png\">Faktur Confirm<span class=\"badge badge-warning pull-right\">$count_faktur_confirm</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_article\"><img src=\"themes/images/ico-article.png\">Article<span class=\"badge badge-warning pull-right\">$count_article</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_sms\"><img src=\"themes/images/message.png\">SMS<span class=\"badge badge-warning pull-right\">$count_sms</span></a><br/>
					<a id=\"myCart\" href=\"?page=admin_kuesioner\"><img src=\"themes/images/ico-kuesioner.png\">Kuesioner</a><br/>
					<a id=\"myCart\" href=\"?page=admin_report\"><img src=\"themes/images/ico-faktur.png\">Report</a><br/>
					<a id=\"myCart\" href=\"?page=logout\"><img src=\"themes/images/ico-off.png\">Logout</a><br/>
				</div>
				";
			}else if($usertype=="member"){
				$username=ucwords(get_member_name($userlogin));
				$faktur_number = $_SESSION['faktur_number'];
				$total_order=total_orderbyfaktur($faktur_number);
				echo data_member($userlogin);
				echo "<div class=\"well well-small\">
					<h4>Member</h4>
					<a id=\"myCart\" href=\"#\"  onclick=\"member_account('$userlogin');\"><img src=\"themes/images/ico-user.png\"> $username - $usertype </a><br/>
					<a id=\"myCart\" href=\"?page=orders\"><img src=\"themes/images/ico-cart1.png\">$total_order Items in your cart</a><br/>
					<a id=\"myCart\" href=\"?page=logout\"><img src=\"themes/images/ico-off.png\">Logout</a><br/>
				</div>
				";
			?>
			
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a href="#"><i class="icon-random"></i>  CLOTHES [ <?php echo clothes_count();?> ] </a>
				<ul>
					<li><a href="?page=listproduct&id=Top Clothing"><i class="icon-share"></i>Top Clothing [ <?php echo topclothes_count();?> ]</a></li>
					<li><a href="?page=listproduct&id=Bottom Clothing"><i class="icon-share"></i>Bottom Clothing [ <?php echo bottomclothes_count();?> ]</a></li>												
					<li><a href="?page=listproduct&id=Dress"><i class="icon-share"></i>Dress [ <?php echo dress_count();?> ]</a></li>	
					<li><a href="?page=listproduct&id=Outwear"><i class="icon-share"></i>Outwear  [ <?php echo outwear_count();?> ]</a></li>												
				</ul>
			</li>
			
			<li><a href="?page=listproduct&id=Bag"><i class="icon-briefcase"></i> BAG [ <?php echo bag_count();?> ]</a></li>
			<li><a href="?page=listproduct&id=Shoe"><i class="icon-hdd"></i>SHOE [ <?php echo shoe_count();?> ]</a></li>
			<li><a href="?page=listproduct&id=Accessories"><i class="icon-star"></i>ACCESSORIES [ <?php echo accessories_count();?> ]</a></li>
			<?php
			}
		}else{
			?>
			
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a href="#"><i class="icon-random"></i>  CLOTHES [ <?php echo clothes_count();?> ] </a>
				<ul>
					<li><a href="?page=listproduct&id=Top Clothing"><i class="icon-share"></i>Top Clothing [ <?php echo topclothes_count();?> ]</a></li>
					<li><a href="?page=listproduct&id=Bottom Clothing"><i class="icon-share"></i>Bottom Clothing [ <?php echo bottomclothes_count();?> ]</a></li>												
					<li><a href="?page=listproduct&id=Dress"><i class="icon-share"></i>Dress [ <?php echo dress_count();?> ]</a></li>	
					<li><a href="?page=listproduct&id=Outwear"><i class="icon-share"></i>Outwear  [ <?php echo outwear_count();?> ]</a></li>												
				</ul>
			</li>
			
			<li><a href="?page=listproduct&id=Bag"><i class="icon-briefcase"></i> BAG [ <?php echo bag_count();?> ]</a></li>
			<li><a href="?page=listproduct&id=Shoe"><i class="icon-hdd"></i>SHOE [ <?php echo shoe_count();?> ]</a></li>
			<li><a href="?page=listproduct&id=Accessories"><i class="icon-star"></i>ACCESSORIES [ <?php echo accessories_count();?> ]</a></li>
			<?php
			}
	 ?>
			<li class="subMenu"><a href="#"> <i class="icon-book"></i> Article [ <?php echo article_count();?> ]</a>
				<ul style="display:none">
					<?php echo article_list();?>
				</ul>
			</li>
		</ul>
		
		<br/>
	</div>
<!-- Sidebar end=============================================== -->