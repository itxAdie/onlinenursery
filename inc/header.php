
<?php 
	session_start();
	if(!isset($_SESSION['u_email'])){
		$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
	}
	include("function.php");
?>
<div id="header">
	<div id="logo">
		<a href="index.php"><img src="img/logo1.gif" /></a>
    </div><!--End Of Logo-->
                
    <div id="link">
     	<ul>
        	<?php if(isset($_SESSION['u_email'])){ ?>
           	<li><a href="webpages/user_profile.php?my_order=my_order"> Track Orders</a> |</li>
           	<?php } ?>
           <li><a href="webpages/contact_us.php"> 24x7 Customer Care</a><span style="color:#fff"> |</span></li>
		   <?php if(!isset($_SESSION['u_email'])){?>
           <li class="link-active" style="width:70px;">
               <a href="#">SignUp</a><span style="color:#fff"> |</span>
                  <center>
                            <form method="post" id="u_signup">
                            	<table>
                                	<tr>
										<th style="padding-top:20px;"> Enter Your Name :</th>
                                        <td style="padding-top:20px;"><input type="text" id="name" onblur="checkTextField(this);" name="u_name" required="required" placeholder="Enter Your Name" /></td>
                                    </tr>
                                    <tr>
                                    	<th> Enter Your E-Mail :</th>
                                        <td><input type="email" name="u_email" onblur="checkTextField(this);" required="required" placeholder="Enter Your E-mail" /></td>
                                    </tr>
                                    <tr>
												<th> Enter Your Password : </th>
												<td><input type='password' name='u_pass' placeholder='Enter Your Password' /></td>
											</tr>
                                            <tr>
												<th> Retype Your Password : </th>
												<td><input type='password' name='u_pass1' placeholder='Retype Your Password' /></td>
											</tr>
                                             <tr> 
                   <th>Security Questions :</th>
                   <td> <select name="u_question" onblur="checkTextField(this);">
                   <option >What was the name of your primary school?</option>
                   <option >In what city does your nearest sibling live?</option>
                   <option >What time of the day were you born? (hh:mm)</option>
                    <option>In what year was your father born?</option>
                    <option>What is your favorite dish?</option>
                   
                    </select> </td>
           </tr>
           
                                    <tr>
                                    	<th> Enter Your Answer :</th>
                                        <td><input type="text" onblur="checkTextField(this);" name="u_ans" required="required" placeholder="Enter Your Answer" /></td>
                                    </tr>
                                    <tr>
                                    	<th> Enter Your City :</th>
                                        <td><input type="text" onblur="checkTextField(this);" name="u_city" required="required" placeholder="Enter Your City" /></td>
                                    </tr>
                                    <tr>
                                    	<th> Enter Your Pincode :</th>
                                        <td><input name="u_pincode" type="text" required="required" placeholder="Enter Your Pincode" pattern="[0-9]{5}" onblur="checkTextField(this);" maxlength="5" /></td>
                                    </tr>
                                    <tr>
                                    	<th> Enter Your Address :</th>
                                        <td><textarea onblur="checkTextField(this);" name="u_add" required="required" placeholder="Enter Your Address"></textarea></td>
                                    </tr>
                                    <tr>
                                    	<th> Select Your DOB :</th>
                                        <td><input onblur="checkTextField(this);" type="date" name="u_dob" required="required" placeholder="Enter Your DOB" /></td>
                                    </tr>
                                    <tr>
                                    	<th> Enter Your Phone No :</th>
                                        <td><input type="tel" onblur="checkTextField(this);" name="u_phone" required="required" pattern="[0-9]{11}" placeholder="Enter Your Phone No" /></td>
                                    </tr>
                                    <tr>
										<td align="right"><input id="signup_btn" style=" color:#FFF;border:2px solid #CDA34F" type="submit" name="signup" value="SignUp" /></td>
										<td><input id="signup_btn" style=" color:#FFF;border:2px solid #CDA34F" type="reset" value="Reset" /></td>
                                    </tr>
                                    
								</table>
                            </form>
                            </center>
                        </li>
						<li class="link-active" style="width:70px;">
							<a href="#"> Login</a><span style="color:#fff"></span>
							<form method="post" id="u_login">
								<ul>
									<li style="margin-top:20px">Enter Your Email</li>
									<li><input style="height:30px" type="email" name="u_email" required="required" placeholder="Enter Your Email" /></li>
									
									<li>Enter Your Password</li>
									<li><input style="height:30px; color:#000" type="password" name="u_pass" required="required" placeholder="*********" /></li>
									<li style="width:30px">
										<input id="signup_btn" style="color:#FFF; border:2px solid #CDA34F; height:30px;" value="Login" type="submit" name="login" />
									</li>
                                   	<li style="margin-top:70px; text-align:center"><a id="dialog" href="forget.php" >Forgot Password ?</a></li>
								</ul>
							</form>
						</li>
						<div title="Forgot Password" style=" display:none;" id="dialog_open">
                            
                        </div>
                        <?php }else{ ?>
                        <li class="link-active" style="min-width:220px">
                        	<a href="#"><?php echo $_SESSION['u_email']; ?></a>
							<form method="post" class="user_drp">
                                <ul>
                                    <li><a href="webpages/user_profile.php"> My Account</a></li>
                                    <li><a href="webpages/user_profile.php?my_order=my_order">My Order</a></li>
                                    <li><a href="webpages/user_profile.php?my_cart"> My Shopping Cart <span class="db_row"><?php echo user_cart_count(); ?></span></a></li>
                                    <li><a href="webpages/user_profile.php?my_wishlist"> My Wishlist</a></li>
                                    <li><a href="webpages/user_profile.php?my_pass"> Change Password</a></li>
                                    <li><a href="webpages/logout.php"> Logout</a></li>
                                </ul>
                            </form>
						</li>
                        <?php } ?>
                    </ul>
       			 </div><!--End Of link-->
                 
                 <div id="search">
        				<form method="GET" name="a_search" action="webpages/search.php" enctype="multipart/form-data">
                        	<input class="search_text" type="text" id="search_text" name="user_query" onKeyUp="ad();" required placeholder="Search Product From Here" />               
                            <button class="search_btn" name="search"> Search</button>
                            </form>
                            <form style="margin-top:-41px !important; margin-left:87% !important;" method="GET" name="a_search" action="webpages/cart.php" enctype="multipart/form-data">
                            <?php if(!isset($_SESSION['u_email'])){?>
                                <button class="cart_btn" name="search_cart">
                                	<a href="webpages/cart.php">Cart <?php echo display_cart_item(); ?></a>
                                </button>
                            <?php }else{?>
                            	<button class="cart_btn" name="search_cart">
                                	<a href="webpages/cart.php">Cart <?php echo user_cart_count(); ?></a>
                                </button>
                            <?php } ?>
                            <?php 
								if(isset($_GET['search_cart'])){
									echo"<script>window.open('webpages/cart.php','_self');</script>";	
								} 
							?>
                            <div id="d1"></div>
                        </form>
                        <script type="text/javascript">
                        	function ad(){
								xmlhttp=new XMLHttpRequest();
								xmlhttp.open("GET","webpages/a_search2.php?uq="+document.a_search.user_query.value,false);
								xmlhttp.send(null);
								document.getElementById("d1").innerHTML=xmlhttp.responseText;	
							}
                        </script>
        		 </div><!--End Of Search-->
                
        	</div><!--End Of Header-->
            
<?php
	echo forgot_pass();
	echo u_signup();
	echo u_login();
?>