
<div id="header">
<div class="container">
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="?page=home"><img src="themes/images/logo.png" title="Home"/></a>
	<form class="form-inline navbar-search" method="post" action="?page=listproduct" >
		<input id="srchFld" placeholder="Search Product" type="text" name="id" required style="padding-left:30px"/>
		   <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="?page=video">Video Tutorial</a></li>
	 <li class=""><a href="?page=howtobuy">How To Buy</a></li>
	 <li class=""><a href="?page=about">About</a></li>
	 <li class=""><a href="?page=contact">Contact</a></li>
	
	 <?php
		if (empty($_SESSION['userlogin'])){
		echo "<li class=\"\"><a href=\"#register\" data-toggle=\"modal\">Sign Up</a></li>";
		echo "<li class=\"\"><a href=\"#login\" role=\"button\" data-toggle=\"modal\" style=\"padding-right:0\"><span class=\"btn btn-large btn-success\">Login</span></a></li>";
	 ?>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h3>Login</h3>
			  </div>
			  <div class="modal-body">
				<form class="form-horizontal loginFrm" method="POST" action="?page=ceklogin">
				  <div class="control-group">								
					<input type="hidden" name="ket" value="login">
					<input type="text" name="username" required  maxlength='20' pattern="[0-z]*" placeholder="Username">
				  </div>
				  <div class="control-group">
					<input type="password" name="password"  maxlength='20' required placeholder="Password">
				  </div>
				  <div class="control-group">
					<input type="submit" class="btn btn-success" value='Login'/>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				  </div>
				</form>		
			  </div>
		</div>
	<div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h3>Sign Up</h3>
			  </div>
			  <div class="modal-body" style="text-align:center;">
				<form class="form-horizontal loginFrm" method="POST" action="?page=ceklogin">
				  <div class="control-group">	
					<input type="hidden" name="ket" value="register">
					<input type="text" name="username" required  pattern="[0-z]*" maxlength='20' placeholder="Username">
				  </div>
				  <div class="control-group">
					<input type="password" name="password" required maxlength='20' placeholder="Password">
				  </div>
				  <div class="control-group">								
					<input type="text" name="name" required maxlength='50' placeholder="Name">
				  </div>
				  <div class="control-group">								
					<Textarea name="address" required   placeholder="Address"></textarea>
				  </div>
				  <div class="control-group">								
					<input type="text" name="phonenumber" required pattern="[0-9]*" maxlength='15' placeholder="Phone Number">
				  </div>
				  <div class="control-group">
					<input type="email" name="email" required   placeholder="E-mail">
				  </div>
				  <div class="control-group">	
					<h5>asdasd</h5>
						<select required class='input-small' name='day'>
						  <option value='' selected>Day :</option>
						  <option value='01'>01</option>
						  <option value='02'>02</option>
						  <option value='03'>03</option>
						  <option value='04'>04</option>
						  <option value='05'>05</option>
						  <option value='06'>06</option>
						  <option value='07'>07</option>
						  <option value='08'>08</option>
						  <option value='09'>09</option>
						  <option value='10'>10</option>
						  <option value='11'>11</option>
						  <option value='12'>12</option>
						  <option value='13'>13</option>
						  <option value='14'>14</option>
						  <option value='15'>15</option>
						  <option value='16'>16</option>
						  <option value='17'>17</option>
						  <option value='18'>18</option>
						  <option value='19'>19</option>
						  <option value='20'>20</option>
						  <option value='21'>21</option>
						  <option value='22'>22</option>
						  <option value='23'>23</option>
						  <option value='24'>24</option>
						  <option value='25'>25</option>
						  <option value='26'>26</option>
						  <option value='27'>27</option>
						  <option value='28'>28</option>
						  <option value='29'>29</option>
						  <option value='30'>30</option>
						  <option value='31'>31</option>
						</select>
						<select required class='input-small' name='month'>
						  <option value='' selected>Month :</option>
						  <option value='1'>January</option>
						  <option value='2'>February</option>
						  <option value='3'>March</option>
						  <option value='4'>April</option>
						  <option value='5'>May</option>
						  <option value='6'>June</option>
						  <option value='7'>July</option>
						  <option value='8'>August</option>
						  <option value='9'>September</option>
						  <option value='10'>October</option>
						  <option value='11'>November</option>
						  <option value='12'>December</option>
						</select>
						<select required class='input-small' name='year'>
						  <option value='' selected>Year :</option>
						  <option value='1970'>1970</option>
						  <option value='1971'>1971</option>
						  <option value='1972'>1972</option>
						  <option value='1973'>1973</option>
						  <option value='1974'>1974</option>
						  <option value='1975'>1975</option>
						  <option value='1976'>1976</option>
						  <option value='1977'>1977</option>
						  <option value='1978'>1978</option>
						  <option value='1979'>1979</option>
						  <option value='1980'>1980</option>
						  <option value='1981'>1981</option>
						  <option value='1982'>1982</option>
						  <option value='1983'>1983</option>
						  <option value='1984'>1984</option>
						  <option value='1985'>1985</option>
						  <option value='1986'>1986</option>
						  <option value='1987'>1987</option>
						  <option value='1988'>1988</option>
						  <option value='1980'>1989</option>
						  <option value='1990'>1990</option>
						  <option value='1991'>1991</option>
						  <option value='1992'>1992</option>
						  <option value='1993'>1993</option>
						  <option value='1994'>1994</option>
						  <option value='1995'>1995</option>
						  <option value='1996'>1996</option>
						  <option value='1997'>1997</option>
						  <option value='1998'>1998</option>
						  <option value='1999'>1999</option>
						  <option value='2000'>2000</option>
						  <option value='2001'>2001</option>
						  <option value='2002'>2002</option>
						  <option value='2003'>2003</option>
						  <option value='2004'>2004</option>
						  <option value='2005'>2005</option>
						  <option value='2006'>2006</option>
						  <option value='2007'>2007</option>
						  <option value='2008'>2008</option>
						  <option value='2009'>2009</option>
						  <option value='2000'>2010</option>
						  <option value='2001'>2011</option>
						  <option value='2002'>2012</option>
						  <option value='2003'>2013</option>
						  <option value='2004'>2014</option>
						</select>
				  </div>
				  <div class="control-group">
					<input type="submit" class="btn btn-success" value='Register'/>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				  </div>
				</form>		
			  </div>
		</div>
	 <?php } ?>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
