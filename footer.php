
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div id="socialMedia" class="span3 pull-left">
				<h5>&copy; Butik Classic</h5>
			 </div> 
		 </div>
		<p class="pull-right">PA 2014 | Maria Vewiliya | Sistem Informasi</p>
		<br>
                <p class="pull-right"> Server Node 1 Xen </p>

	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<?php
	if (isset($_SESSION['type'])){
			if($_SESSION['type']=="admin"){
				echo "<script src=\"bootstrap/js/admin.js\" type=\"text/javascript\"></script>";
			}else{
				echo "<script src=\"bootstrap/js/member.js\" type=\"text/javascript\"></script>";
			}
	}
	?>
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	
