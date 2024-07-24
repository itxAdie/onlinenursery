<?php 
	function u_signup(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		
		if(isset($_POST['signup'])){
			$u_name=$_POST['u_name'];
			$u_email=$_POST['u_email'];
			
			$u_passs=$_POST['u_pass'];
			$u_passs1=$_POST['u_pass1'];
			
			$u_question=$_POST['u_question']; 
			$u_ans=$_POST['u_ans']; 
			
			$u_city=$_POST['u_city'];
			$u_pincode=$_POST['u_pincode'];
			$u_add=$_POST['u_add'];
			$u_dob=$_POST['u_dob'];
			$u_phone=$_POST['u_phone'];
			$ip=getIp();
			
			$check_e=$con->prepare("select * from users where u_email='$u_email'");
			$check_e->execute();
			
			if($check_e->rowCount()==1){
				echo "<script>alert('Email Address Is Already Registered Please Try New Email');</script>";	
				echo"<script>window.open('../index.php','_self')</script>";
				exit();
			}
			else{
			
			}
				if($u_passs==$u_passs1){

			$u_signup=$con->prepare("INSERT INTO users(u_name,u_email,u_pass,u_question,u_ans,u_city,u_pincode,u_add,u_dob,u_phone,ip_add,u_reg_date)
			VALUES('$u_name','$u_email','$u_passs','$u_question','$u_ans','$u_city','$u_pincode','$u_add','$u_dob','$u_phone','$ip',NOW())");
				
			if($u_signup->execute()){

				echo"<script>alert('Congo You are registered Successfully, enter your email and password to login')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
			else{
				echo"<script>alert('Please Try Again')</script>";
			}
				
				}
				else {
echo"<script>alert('Password And Confirm Password Does Not Match Please Try Again !!!');</script>";	
									exit();}
		}	
	}

function u_login()
	{
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		
		if(isset($_POST['login'])){
				$u_email=$_POST['u_email'];
				$u_pass=$_POST['u_pass'];
				
				$u_login=$con->prepare("SELECT * from users where u_email='$u_email' AND u_pass='$u_pass'");
				$u_login->execute();
				$row_user=$u_login->fetch();
				$u_id=$row_user['u_id'];
				$ip=getIp();
				
				if($u_login->rowCount()==1){
					$ip=getIp();
					$_SESSION['u_email']=$u_email;
					
					$cart_to_user=$con->prepare("select * from cart where ip_add='$ip'");
					$cart_to_user->setFetchMode(PDO:: FETCH_ASSOC);
					$cart_to_user->execute();
						while($row_cart=$cart_to_user->fetch()):
							$pro_id=$row_cart['pro_id'];
							$qty=$row_cart['qty'];
							
							$check_u_cart=$con->prepare("select * from user_cart where pro_id='$pro_id' AND ip_add='$ip' AND u_id='$u_id'");
							$check_u_cart->setFetchMode(PDO:: FETCH_ASSOC);
							$check_u_cart->execute();
							
							if($check_u_cart->rowCount()==1){
								$delete_cart=$con->prepare("delete from cart where ip_add='$ip'");
								$delete_cart->execute();	
							}
							else{
								$insert_to_user_cart=$con->prepare("insert into user_cart(u_id,pro_id,qty,ip_add)values('$u_id','$pro_id','$qty','$ip')");
								$insert_to_user_cart->execute();
								
								$delete_cart=$con->prepare("delete from cart where ip_add='$ip'");
								$delete_cart->execute();
							}
						endwhile;
					echo"<script>window.open('".$_SESSION['redirectURL']."','_self');</script>";
				}
				else{
					echo"<script>alert('User Name Or Password Is Incorrect')</script>";	
				}
		}
	}

function forgot_pass(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['forgot_pass'])){
		$for_email=$_POST['forgot_email'];
		$u_question=$_POST['u_question']; 
			$u_ans=$_POST['u_ans'];
			
			
$for_pass=$con->prepare("select * from users where u_email='$for_email' && u_question ='$u_question' && u_ans ='$u_ans'");
		$for_pass->setFetchMode(PDO:: FETCH_ASSOC);
		$for_pass->execute();
		$row_user=$for_pass->fetch();
			$user_email=$row_user['u_email'];
		$new_pass=$_POST['u_pass'];
	    $new_pass1=$_POST['u_pass1'];
		
		if($new_pass==$new_pass1){
									if($for_pass->rowCount()==1){
			
			$update_pass=$con->prepare("update users set u_pass='$new_pass' where u_email='$user_email'");
			$update_pass->execute();	
			echo"<script>alert('Congratulation Password is reset')</script>";
			echo"<script>window.open('index.php','_self');</script>";
		}
		else{
			echo"<script>alert('Email is Incorrect/Not registered')</script>";
			echo"<script>window.open('".$_SESSION['redirectURL']."','_self');</script>";
		}
									
									}else{
			echo"<script>alert('New Password And Confirm Password Does Not Match Please Try Again !!!');</script>";	
									exit();
								}
}
}
function search(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		if(isset($_GET['search'])){
			$u_query=$_GET['user_query'];
	
			$search=$con->prepare("select * from product where pro_keyword like'%$u_query%' OR pro_name like'%$u_query%' OR pro_feature1 like'%$u_query%' OR pro_feature2 like'%$u_query%' OR pro_feature3 like'%$u_query%' OR pro_feature4 like'%$u_query%' OR pro_feature5 like'%$u_query%'");
			$search->setFetchMode(PDO:: FETCH_ASSOC);
			$search->execute();
			if($search->rowCount()==0){
	echo" <h2> sorry !!! Product not found with this keyword... !!</h2>";	
	}
	else
	{
			while($u_search=$search->fetch()):
				echo "<li>
						<a style='text-decoration:none' href='../webpages/pro_detail.php?pro_id=".$u_search['pro_id']."'>
							<h4>".$u_search['pro_name']."</h4>
							<img src='data:image;base64,".$u_search['pro_img1']."' />
							<center><button id='btn' name='shopnow'><a href='../webpages/pro_detail.php?pro_id=".$u_search['pro_id']."'>View</a></button>
							<button id='btn' name='add_cart'><a href='../index.php?cart=".$u_search['pro_id']."'>Cart</a></button>
							<button id='btn' name='add_cart'><a href='#'>Wishlist</a></button></center>
						</a>
					</li>";
			endwhile;}
		}if(isset($_GET['a_search'])){
			$a_search=$_GET['a_search'];
			$a_search_result=$con->prepare("select * from product where pro_id='$a_search'");
			$a_search_result->setFetchMode(PDO:: FETCH_ASSOC);
			$a_search_result->execute();
			
			$row_search=$a_search_result->fetch();
			
			echo "<li>
					<a href='../webpages/pro_detail.php?pro_id=".$row_search['pro_id']."'>
						<h4>".$row_search['pro_name']."</h4>
						<img src='data:image;base64,".$row_search['pro_img1']."' />
						<center><button id='btn' name='shopnow'><a href='../webpages/pro_detail.php?pro_id=".$row_search['pro_id']."'>View</a></button>
						<button id='btn' name='add_cart'><a href='#'>Cart</a></button>
						<button id='btn' name='add_cart'><a href='#'>WIshlist</a></button></center>
					</a>
				</li>";	
		}
		
		
	}


function searches(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		if(isset($_GET['search'])){
			$u_query=$_GET['user_query'];
			$u_query1=$_GET['user_query1'];
	
			$search=$con->prepare("select * from product where pro_keyword like'%$u_query%' OR pro_name like'%$u_query%' OR pro_feature1 like'%$u_query%' OR pro_feature2 like'%$u_query%' OR pro_feature3 like'%$u_query%' OR pro_feature4 like'%$u_query%' OR pro_feature5 like'%$u_query%') && (pro_feature1 like'%$u_query1%' OR pro_feature2 like'%$u_query1%' OR pro_feature3 like'%$u_query1%' OR pro_feature4 like'%$u_query1%' OR pro_feature5 like'%$u_query1%' OR pro_desc like'%$u_query1%' OR pro_color like'%$u_query1%' OR pro_price like'%$u_query1%' OR pro_model_no like'%$u_query1%')");
			$search->setFetchMode(PDO:: FETCH_ASSOC);
			$search->execute();
	if($search->rowCount()==0){
	echo" <h2> sorry !!! Product not found with this keyword... !!</h2>";	
	}
	else
	{		
			while($u_search=$search->fetch()):
				echo "<li>
						<a style='text-decoration:none' href='../webpages/pro_detail.php?pro_id=".$u_search['pro_id']."'>
							<h4>".$u_search['pro_name']."</h4>
							<img src='data:image;base64,".$u_search['pro_img1']."' />
							<center><button id='btn' name='shopnow'><a href='../webpages/pro_detail.php?pro_id=".$u_search['pro_id']."'>View</a></button>
							<button id='btn' name='add_cart'><a href='../index.php?cart=".$u_search['pro_id']."'>Cart</a></button>
							<button id='btn' name='add_cart'>Wishlist</a></button></center>
						</a>
					</li>";
			endwhile;
		}
		}
	}

function getIp(){
	
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function add_cart(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_GET['cart'])){
		$cart_id=$_GET['cart'];
		$ip=getIp();
		
		$qty_check=$con->prepare("select * from product where pro_id='$cart_id'");
		$qty_check->setFetchMode(PDO:: FETCH_ASSOC);
		$qty_check->execute();
		$row_pro=$qty_check->fetch();
			$pro_qty=$row_pro['pro_qty'];
		
		$cart=$con->prepare("select * from cart where pro_id='$cart_id' AND ip_add='$ip'");
		$cart->setFetchMode(PDO:: FETCH_ASSOC);
		$cart->execute();
		
		if($pro_qty<1){
			echo"<script>alert('This Product Is Out Of Stock Sorry')</script>";
			echo"<script>window.open('index.php','_self');</script>";
			exit();
		}	
		if($cart->rowCount()==1){
			echo"<script>alert('This Product Is Already Added In Your Cart')</script>";	
		}
		else{
			$add_cart=$con->prepare("insert into cart(pro_id,ip_add,qty)values('$cart_id','$ip','1')");
			$add_cart->execute();
			echo"<script>window.open('index.php','_self');</script>";
			exit();	
		}
	}
	if(isset($_GET['user_cart'])){
		$ip=getIp();
		$user_cart=$_GET['user_cart'];
		$u_email=$_SESSION['u_email'];

		$user_qty_check=$con->prepare("select * from product where pro_id='$user_cart'");
		$user_qty_check->setFetchMode(PDO:: FETCH_ASSOC);
		$user_qty_check->execute();
		$user_row_pro=$user_qty_check->fetch();
			$user_pro_qty=$user_row_pro['pro_qty'];
		
		$get_user=$con->prepare("select * from users where u_email='$u_email'");
		$get_user->setFetchMode(PDO:: FETCH_ASSOC);
		$get_user->execute();
		$row_user=$get_user->fetch();
			$user_id=$row_user['u_id'];
		
		$u_cart=$con->prepare("select * from user_cart where pro_id='$user_cart' AND u_id='$user_id'");
		$u_cart->setFetchMode(PDO:: FETCH_ASSOC);
		$u_cart->execute();
		
		if($user_pro_qty<1){
			echo"<script>alert('This Product Is Out Of Stock Sorry')</script>";
			echo"<script>window.open('index.php','_self');</script>";
			exit();
		}		
		if($u_cart->rowCount()==1){
			echo"<script>alert('This Product Is Already Added In Your Cart')</script>";	
		}
		else{
			$u_add_cart=$con->prepare("insert into user_cart(u_id,pro_id,ip_add,qty)values('$user_id','$user_cart','$ip','1')");
			$u_add_cart->execute();
			echo"<script>window.open('index.php','_self');</script>";
			exit();	
		}
	}	
}

function add_wishlist(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_GET['user_wishlist'])){
		if(!isset($_SESSION['u_email'])){
			echo"<script>alert('Please Login Or SignUp First');</script>";
			echo"<script>window.open('index.php','_self');</script>";	
		}
		else{
			$ip=getIp();
			$user_cart=$_GET['user_wishlist'];
			$u_email=$_SESSION['u_email'];
	
			$user_qty_check=$con->prepare("select * from product where pro_id='$user_cart'");
			$user_qty_check->setFetchMode(PDO:: FETCH_ASSOC);
			$user_qty_check->execute();
			$user_row_pro=$user_qty_check->fetch();
				$user_pro_qty=$user_row_pro['pro_qty'];
			
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
				$u_id=$row_user['u_id'];
			
			$cart=$con->prepare("select * from user_wishlist where pro_id='$user_cart' AND u_id='$u_id'");
			$cart->setFetchMode(PDO:: FETCH_ASSOC);
			$cart->execute();
				
			if($cart->rowCount()==1){
				echo"<script>alert('This Product Already Added In Your Wishlist');</script>";
				echo"<script>window.open('index.php','_self');</script>";
			}
			else{
				$add_cart=$con->prepare("insert into user_wishlist(pro_id,u_id,qty,ip_add)values('$user_cart','$u_id','1','$ip')");
				$add_cart->execute();
				echo"<script>alert('Product Added Successfully In Your Wishlist');</script>";
				echo"<script>window.open('index.php','_self');</script>";	
			}	
		}
	}
}

function user_add_cart(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_GET['checkout'])){
		$cart_id=$_GET['checkout'];
		
		$u_email=$_SESSION['u_email'];
		
		$check_cart=$con->prepare("select * from users where u_email='$u_email'");
		$check_cart->setFetchMode(PDO:: FETCH_ASSOC);
		$check_cart->execute();
		while($row_user_cart=$check_cart->fetch()):
			$u_id=$row_user_cart['u_id'];
		endwhile;
		
		$cart=$con->prepare("select * from user_cart where pro_id='$cart_id' AND u_id='$u_id'");
		$cart->setFetchMode(PDO:: FETCH_ASSOC);
		$cart->execute();
		
		if($cart->rowCount()==1){
	
		}
		else{
			$add_cart=$con->prepare("insert into user_cart(pro_id,u_id,qty)values('$cart_id','$u_id','1')");
			$add_cart->execute();	
		}
	}	
}

function cart_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(!isset($_SESSION['u_email'])){
	//start of update user_qty
		if(isset($_POST['update_qty'])){
			$qty=$_POST['qty'];
									
			foreach($qty as $key=>$value){
				$update_qty=$con->prepare("UPDATE cart SET qty='$value' WHERE cart_id='$key'");
				$update_qty->execute();
			}
		}
	//end of update user_qty
	
	$net_total=0;
	$ip=getIp();
	$cart_page=$con->prepare("SELECT * FROM cart WHERE ip_add='$ip'");
	$cart_page->setFetchMode(PDO:: FETCH_ASSOC);
	$cart_page->execute();
							
	while($cart=$cart_page->fetch()):
		$cart_id=$cart['pro_id'];
		$qty=$cart['qty'];
		$cart_pro=$con->prepare("SELECT * FROM product WHERE pro_id='$cart_id' AND pro_qty>1");
		$cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_pro->execute();
								
		while($cart_display=$cart_pro->fetch()):
			$pro_id=$cart_display['pro_id'];
			echo "<tr>
					<td style='font-size:13px; width:50px'><img src='data:image;base64,".$cart_display['pro_img1']."' style='height:40px; width:40px' /></td>
					<td><a href='pro_detail.php?pro_id=".$cart_display['pro_id']."'>".$cart_display['pro_name']."</a></td>
					<td>
						<input style='width:30px; height:30px' type='text' name='qty[".$cart['cart_id']."]' value='".$cart['qty']."' /> 
						<input type='submit' style='height:30px; width:40px; font-size:10px; margin-top:10px' id='btn' name='update_qty' value='Save' />
					</td>
					<td>".$cart_display['pro_dis_price']."</td>
					<td>";
						$sub_total=$qty*$cart_display['pro_dis_price'];
						echo $sub_total;
						$net_total=$net_total+$sub_total;
					echo"</td>
					<td style='text-align:center'>
						<a href='cart.php?remove=".$cart_display['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\"'>
							&#x2718;
						</a>
					</td>
				</tr>";
             endwhile; 
		endwhile;
		echo"<tr>
              	<td></td>
                <td>
                	<button style='height:35px; width:140px; margin-top:10px' id='btn' name='continue_shopping'>
                    	<a href='../index.php'>Continue Shopping</a>
                    </button>
                </td>
                <td></td>
				<td>
                	<input type='submit' style='height:35px; width:135px; margin-top:10px' id='btn' Value='Check Out' name='checkout' />";
					if(isset($_POST['checkout'])){
						if(!isset($_SESSION['u_email'])){
							echo "<script>alert('Please Login Or SignUp')</script>";	
						}
						else{
							echo "<script>window.open('user_add.php?cart_checkout','_self');</script>";	
						}	
					}
				echo"</td>
				<td>
                	<button id='btn' name='net_total' style='height:35px; width:135px; margin-top:10px'>
                    	<a href='#'>Net Total : $net_total</a>
                    </button>
                </td>
                <td></td>
			</tr>";
	}
	else{
		//start of update user_qty
			if(isset($_POST['update_qty'])){
				$qty=$_POST['qty'];
										
				foreach($qty as $key=>$value){
					$update_qty=$con->prepare("UPDATE user_cart SET qty='$value' WHERE u_cart_id='$key'");
					$update_qty->execute();
				}
			}
		//end of update user_qty
		
		$net_total=0;
		$u_email=$_SESSION['u_email'];
		$get_user=$con->prepare("select * from users where u_email='$u_email'");
		$get_user->setFetchMode(PDO:: FETCH_ASSOC);
		$get_user->execute();
		$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
		$cart_page=$con->prepare("SELECT * FROM user_cart WHERE u_id='$u_id'");
		$cart_page->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_page->execute();
								
		while($cart=$cart_page->fetch()):
			$cart_id=$cart['pro_id'];
			$qty=$cart['qty'];
			$cart_pro=$con->prepare("SELECT * FROM product WHERE pro_id='$cart_id' AND pro_qty>1");
			$cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
			$cart_pro->execute();
									
			while($cart_display=$cart_pro->fetch()):
				$pro_id=$cart_display['pro_id'];
				echo "<tr>
						<td style='font-size:13px; width:50px'><img src='data:image;base64,".$cart_display['pro_img1']."' style='height:40px; width:40px' /></td>
						<td><a href='pro_detail.php?pro_id=".$cart_display['pro_id']."'>".$cart_display['pro_name']."</a></td>
						<td>
							<input style='width:30px; height:30px' type='text' name='qty[".$cart['u_cart_id']."]' value='".$cart['qty']."' /> 
							<input type='submit' style='height:30px; width:40px; font-size:10px; margin-top:10px' id='btn' name='update_qty' value='Save' />
						</td>
						<td>".$cart_display['pro_dis_price']."</td>
						<td>";
							$sub_total=$qty*$cart_display['pro_dis_price'];
							echo $sub_total;
							$net_total=$net_total+$sub_total;
						echo"</td>
						<td style='text-align:center'>
							<a href='cart.php?remove=".$cart_display['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\"'>
								&#x2718;
							</a>
						</td>
					</tr>";
				 endwhile; 
			endwhile;
			echo"<tr>
					<td></td>
					<td>
						<button style='height:35px; width:140px; margin-top:10px' id='btn' name='continue_shopping'>
							<a href='../index.php'>Continue Shopping</a>
						</button>
					</td>
					<td></td>
					<td>
						<input type='submit' style='height:35px; width:135px; margin-top:10px' id='btn' Value='Check Out' name='checkout' />";
						if(isset($_POST['checkout'])){
							if(!isset($_SESSION['u_email'])){
								echo "<script>alert('Please Login Or SignUp')</script>";	
							}
							else{
								echo "<script>window.open('user_add.php?cart_checkout','_self');</script>";	
							}	
						}
					echo"</td>
					<td>
						<button id='btn' name='net_total' style='height:35px; width:135px; margin-top:10px'>
							<a href='#'>Net Total : $net_total</a>
						</button>
					</td>
					<td></td>
				</tr>";
	}
}

function wishlist_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	//start of update user_qty
			if(isset($_POST['update_qty'])){
				$qty=$_POST['qty'];
										
				foreach($qty as $key=>$value){
					$update_qty=$con->prepare("UPDATE user_wishlist SET qty='$value' WHERE u_wish_id='$key'");
					$update_qty->execute();
				}
			}
		//end of update user_qty
		
		$net_total=0;
		$u_email=$_SESSION['u_email'];
		$get_user=$con->prepare("select * from users where u_email='$u_email'");
		$get_user->setFetchMode(PDO:: FETCH_ASSOC);
		$get_user->execute();
		$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
		$cart_page=$con->prepare("SELECT * FROM user_wishlist WHERE u_id='$u_id'");
		$cart_page->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_page->execute();
								
		while($cart=$cart_page->fetch()):
			$cart_id=$cart['pro_id'];
			$qty=$cart['qty'];
			$cart_pro=$con->prepare("SELECT * FROM product WHERE pro_id='$cart_id'");
			$cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
			$cart_pro->execute();
									
			while($cart_display=$cart_pro->fetch()):
				$pro_id=$cart_display['pro_id'];
				echo "<tr>
						<td style='font-size:13px; width:50px'><img src='data:image;base64,".$cart_display['pro_img1']."' style='height:40px; width:40px' /></td>
						<td><a href='pro_detail.php?pro_id=".$cart_display['pro_id']."'>".$cart_display['pro_name']."</a></td>
						<td>
							<input style='width:30px; height:30px' type='text' name='qty[".$cart['u_wish_id']."]' value='".$cart['qty']."' /> 
							<input type='submit' style='height:30px; width:40px; font-size:10px; margin-top:10px' id='btn' name='update_qty' value='Save' />
						</td>
						<td>".$cart_display['pro_dis_price']."</td>
						<td>";
							$sub_total=$qty*$cart_display['pro_dis_price'];
							echo $sub_total;
							$net_total=$net_total+$sub_total;
						echo"</td>
						<td style='text-align:center'>
							<a href='user_profile.php?wish_remove=".$cart_display['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\"'>
								&#x2718;
							</a>
						</td>
					</tr>";
				 endwhile; 
			endwhile;
			echo"<tr>
					<td></td>
					<td>
						<button style='height:35px; width:135px; margin-top:10px' id='btn' name='continue_shopping'>
							<a href='../index.php'>Continue Shopping</a>
						</button>
					</td>
					<td></td>
					<td>
						<input type='submit' style='height:35px; width:135px; margin-top:10px' id='btn' Value='Check Out' name='checkout' />";
						if(isset($_POST['checkout'])){
							echo "<script>window.open('user_add.php?wish_checkout','_self');</script>";	
						}
					echo"</td>
					<td>
						<button id='btn' name='net_total' style='height:35px; width:135px; margin-top:10px'>
							<a href='#'>Net Total : $net_total</a>
						</button>
					</td>
					<td></td>
				</tr>";
}

function user_wish_delete(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['wish_remove'])){
			$remove=$_GET['wish_remove'];
			$u_email=$_SESSION['u_email'];
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
				$u_id=$row_user['u_id'];
			$delete_cart_item=$con->prepare("delete from user_wishlist where pro_id='$remove' and u_id='$u_id'");
			$delete_cart_item->execute();
			if($delete_cart_item){
				echo "<script>alert('Item Deleted Successfully');</script>";
				echo"<script>window.open('user_profile.php?my_wishlist','_self');</script>";	
			}
			else{
				echo "<script>alert('Please Try Again');</script>";
			}	
		}
}

function display_cart_item(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['cart'])){
		$ip=getIp();
		
		$cart_display=$con->prepare("select * from cart where ip_add='$ip'");
		$cart_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_display->execute();
		$count=$cart_display->rowCount();
	}
	else{
		$ip=getIp();
		
		$cart_display=$con->prepare("select * from cart where ip_add='$ip'");
		$cart_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_display->execute();	
		$count=$cart_display->rowCount();
	}
	echo $count;
}
function user_cart_count(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_GET['user_cart'])){
		$u_email=$_SESSION['u_email'];
		
		$get_user=$con->prepare("select * from users where u_email='$u_email'");
		$get_user->setFetchMode(PDO:: FETCH_ASSOC);
		$get_user->execute();
		$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
		
		$cart_display=$con->prepare("select * from user_cart where u_id='$u_id'");
		$cart_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_display->execute();
		$user_count=$cart_display->rowCount();
	}
	else{
		$u_email=$_SESSION['u_email'];
		
		$get_user=$con->prepare("select * from users where u_email='$u_email'");
		$get_user->setFetchMode(PDO:: FETCH_ASSOC);
		$get_user->execute();
		$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
		
		$cart_display=$con->prepare("select * from user_cart where u_id='$u_id'");
		$cart_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_display->execute();
		$user_count=$cart_display->rowCount();
	}
	echo $user_count;
}
function delete_cart_item(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['remove'])){
		if(!isset($_SESSION['u_email'])){
			$remove=$_GET['remove'];
			$ip=getIp();
			$delete_cart_item=$con->prepare("delete from cart where pro_id='$remove' and ip_add='$ip'");
			$delete_cart_item->execute();
			if($delete_cart_item){
				echo "<script>alert('Item Deleted Successfully');</script>";
				echo"<script>window.open('cart.php','_self');</script>";	
			}
			else{
				echo "<script>alert('Please Try Again');</script>";
			}
		}
		else{
			$remove=$_GET['remove'];
			$u_email=$_SESSION['u_email'];
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
				$u_id=$row_user['u_id'];
			$delete_cart_item=$con->prepare("delete from user_cart where pro_id='$remove' and u_id='$u_id'");
			$delete_cart_item->execute();
			if($delete_cart_item){
				echo "<script>alert('Item Deleted Successfully');</script>";
				echo"<script>window.open('".$_SESSION['redirectURL']."','_self');</script>";	
			}
			else{
				echo "<script>alert('Please Try Again');</script>";
			}	
		}
	}
}

function checkout_delete_cart_item(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['remove'])){
		$remove=$_GET['remove'];
			$u_email=$_SESSION['u_email'];
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
				$u_id=$row_user['u_id'];
			$delete_cart_item=$con->prepare("delete from user_cart where pro_id='$remove' and u_id='$u_id'");
			$delete_cart_item->execute();
			if($delete_cart_item){
				echo "<script>alert('Item Deleted Successfully');</script>";
				echo"<script>window.open('user_add.php?cart_checkout','_self');</script>";	
			}
			else{
				echo "<script>alert('Please Try Again');</script>";
			}	
	}
}
	
function nav_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		$cat_display=$con->prepare("select * from main_cat");
		$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cat_display->execute();
					
		while($row=$cat_display->fetch()):
			echo"<li><a style='font-size:14px;' href='webpages/categories.php?cat_page=".$row['pro_maincat_id']."'>".$row['pro_maincat_name']."</a></li>";
		endwhile;
}

function nav_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$cat_display=$con->prepare("select * from brand");
	$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
	$cat_display->execute();
					
	while($row=$cat_display->fetch()):
		echo"<li><a style='font-size:14px;' href='webpages/brands.php?brand_page=".$row['pro_brand_id']."'>".$row['pro_brand_name']."</a></li>";
	endwhile;
}

function main_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		$cat_display=$con->prepare("select * from main_cat");
		$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cat_display->execute();	
		while($row=$cat_display->fetch()):
			$cat_name=$row['pro_maincat_name'];
			echo"<li><a style='font-size:14px;' href='categories.php?cat_page=".$row['pro_maincat_id']."'>".$row['pro_maincat_name']."</a></li>";
		endwhile;
}

function sub_cat_items(){
	include("../inc/db.php");
		if(isset($_GET['sub_cat'])){
			$sub_cat_id=$_GET['sub_cat'];
			$sub_cat_display=$con->prepare("select * from product where pro_subcat_id='$sub_cat_id'");
			$sub_cat_display->setFetchMode(PDO:: FETCH_ASSOC);
			$sub_cat_display->execute();
								
			while($row_sub_cat=$sub_cat_display->fetch()):
				echo "<li>
						<a href='../webpages/pro_detail.php?pro_id=".$row_sub_cat['pro_id']."'>
							<h4>".$row_sub_cat['pro_name']."</h4>
							<img src='data:image;base64,".$row_sub_cat['pro_img1']."' />
							<center><button id='btn' name='shopnow'><a href='webpages/pro_detail.php?pro_id=".$row_sub_cat['pro_id']."'>View</a></button>
							<button id='btn' name='add_cart'><a href='../index.php?cart=".$row_sub_cat['pro_id']."'>Cart</a></button>
							<button id='btn' name='add_cart'><a href='#'>Wishlist</a></button></center>
						</a>
					</li>"; 
			endwhile;	
	}	
}

function display_all_sub_cat(){
	if(!isset($_GET['sub_cat'])){
		echo"<h4 style='margin-bottom:0;font-size:20px; font-weight:bold; border-radius:3px; color:#FFF; background:#636B46; height:40px; line-height:40px; padding-left:20px; text-shadow:5px 5px 5px #000; box-shadow:3px 3px 3px #2e2e2e '>Sub Category</h4>
			<ul>";
				include('../inc/db.php');
					$main_cat_id=$_GET['cat_page'];
					$sub_cat=$con->prepare("select * from sub_cat where pro_maincat_id='$main_cat_id'");
					$sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
					$sub_cat->execute();
					while($row_sub_cat=$sub_cat->fetch()):
						$sub_cat_id=$row_sub_cat['pro_subcat_id'];
						$sub_cat_name=$row_sub_cat['pro_subcat_name'];
						$count=$con->prepare("select * from product where pro_subcat_id='$sub_cat_id'");
						$count->setFetchMode(PDO:: FETCH_ASSOC);
						$count->execute();
						$sub_cat_count=$count->rowCount();
						echo "<li><a href='categories.php?sub_cat=$sub_cat_id'>$sub_cat_name ($sub_cat_count)</a></li>";
					endwhile;
			"</ul>";
	}
	if(isset($_GET['sub_cat'])){
		echo"<h4>Category</h4>";
		echo"<ul>";
		echo main_cat();
		echo"</ul>";
	}
}

function cat_name(){
	include("../inc/db.php");
		if(isset($_GET['cat_page'])){
			$catdisplay=$_GET['cat_page'];
       		$cat_name=$con->prepare("select * from main_cat where pro_maincat_id='$catdisplay'");
			$cat_name->setFetchMode(PDO:: FETCH_ASSOC);
			$cat_name->execute();
			while($procat_name=$cat_name->fetch()):
				echo"<h3 style='margin-top:0px'>".$procat_name['pro_maincat_name']."</h3>";
			endwhile;
	 	}	
}
function brand_name(){
	include("../inc/db.php");
		if(isset($_GET['brand_page'])){
			$catdisplay=$_GET['brand_page'];
       		$cat_name=$con->prepare("select * from brand where pro_brand_id='$catdisplay'");
			$cat_name->setFetchMode(PDO:: FETCH_ASSOC);
			$cat_name->execute();
			while($procat_name=$cat_name->fetch()):
				echo"<h3 style='margin-top:0px'>".$procat_name['pro_brand_name']."</h3>";
			endwhile;
	 	}	
}

function sub_cat_name(){
	include("../inc/db.php");
		if(isset($_GET['sub_cat'])){
			$catdisplay=$_GET['sub_cat'];
       		$cat_name=$con->prepare("select * from sub_cat where pro_subcat_id='$catdisplay'");
			$cat_name->setFetchMode(PDO:: FETCH_ASSOC);
			$cat_name->execute();
			while($procat_name=$cat_name->fetch()):
				echo"<h3 style='margin-top:0px'>".$procat_name['pro_subcat_name']."</h3>";
			endwhile;
	 	}		
}

function cat_page(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['cat_page'])){
		$cat_id=$_GET['cat_page'];
		$cat_display=$con->prepare("select * from product where pro_maincat_id='$cat_id'");
		$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cat_display->execute();
		
		while($row=$cat_display->fetch()):
					
			echo "<li>
						<a style='text-decoration:none' href='pro_detail.php?pro_id=".$row['pro_id']."'>
							<h4>".$row['pro_name']."</h4>
							<img src='data:image;base64,".$row['pro_img1']."' />
							<center><a href='pro_detail.php?pro_id=".$row['pro_id']."'><button id='btn' name='shopnow'>View</button></a>
							<a href='../index.php?user_cart=".$row['pro_id']."'><button id='btn' name='add_cart'>Cart</span></button></a>
							<a href='../index.php?user_wishlist=".$row['pro_id']."'><button id='btn' name='add_cart'>Wishlist</button></a></center>
						</a>
					</li>";
		endwhile;	
	}	
}

function brand_page(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_GET['brand_page'])){
		$brand_id=$_GET['brand_page'];
		$cat_display=$con->prepare("select * from product where pro_brand_id='$brand_id'");
		$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
		$cat_display->execute();
		
		while($row=$cat_display->fetch()):
					
			echo "<li>
					<a style='text-decoration:none;' href='pro_detail.php?pro_id=".$row['pro_id']."'>
						<h4>".$row['pro_name']."</h4>
						<img src='data:image;base64,".$row['pro_img1']."' />
						<center><button id='btn' name='shopnow'><a href='pro_detail.php?pro_id=".$row['pro_id']."'>View</a></button>
						<button id='btn' name='add_cart'><a href='../index.php?cart=".$row['pro_id']."'>Cart</a></button>
						<button id='btn' name='add_cart'><a href='../index.php?user_wishlist=".$row['pro_id']."'>Wishlist</a></button></center>
					</a>
				</li>";
		endwhile;	
	}	
}

function img_slider(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$slide=$con->prepare("select * from img_slider");
	$slide->setFetchMode(PDO:: FETCH_ASSOC);
	$slide->execute();
			
	while($row_slide=$slide->fetch()):
		echo"<img src='data:image;base64,".$row_slide['img1']."' />";
	endwhile;
}

function offer_zone(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$select_pro=$con->prepare("select * from product where pro_dis>0 AND pro_qty>0");
	$select_pro->setFetchMode(PDO:: FETCH_ASSOC);
	$select_pro->execute();
	
	while($row=$select_pro->fetch()):
		echo "<li style='width:22%;'>
				<a style='text-decoration:none;' href='pro_detail.php?pro_id=".$row['pro_id']."'>
					<h4>".$row['pro_name']."</h4>
					<img src='data:image;base64,".$row['pro_img1']."' />
					<center><button id='btn' name='shopnow'><a href='pro_detail.php?pro_id=".$row['pro_id']."'>View</a></button>
					<button id='btn' name='add_cart'><a href='../index.php?cart=".$row['pro_id']."'>Cart</a></button>
					<button id='btn' name='add_cart'><a href='../index.php?user_wishlist=".$row['pro_id']."'>Wishlist</a></button></center>
				</a>
			</li>";
	endwhile;	
		
}

function display_pros(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		$cat=$con->prepare("select * from main_cat where pro_maincat_id='4'");
		$cat->setFetchMode(PDO:: FETCH_ASSOC);
		$cat->execute();
		$row_cat=$cat->fetch();
		echo"<h3>".$row_cat['pro_maincat_name']."</h3>";
		$cat_id=$row_cat['pro_maincat_id'];		
		$pro=$con->prepare("select * from product where pro_maincat_id='$cat_id' ORDER BY 1 DESC LIMIT 0,3");
		$pro->setFetchMode(PDO:: FETCH_ASSOC);
		$pro->execute();
			while($row=$pro->fetch()):
				echo "<li>
						<a style='text-decoration:none' href='webpages/pro_detail.php?pro_id=".$row['pro_id']."'>
						<h4>".$row['pro_name']."</h4>
						<img src='data:image;base64,".$row['pro_img1']."' />
						<center ><a href='webpages/pro_detail.php?pro_id=".$row['pro_id']."'><button id='btn' name='shopnow' data-toggle='tooltip' data-placement='top' title='Quick View'>View</button></a>";
						if(!isset($_SESSION['u_email'])){
							echo" <a href='index.php?cart=".$row['pro_id']."'><button id='btn' name='add_cart' data-toggle='tooltip' data-placement='top' title='Add To Cart'>Cart</button></a>";
						}
						else{
							echo" <a href='index.php?user_cart=".$row['pro_id']."'><button id='btn' name='add_cart' data-toggle='tooltip' data-placement='top' title='Add To Cart'>Cart</button></a>";
						}
						echo " <a href='index.php?user_wishlist=".$row['pro_id']."'><button id='btn' name='add_wishlist' data-toggle='tooltip' data-placement='top' title='Add To Wishlist'>wishlist</button></a>
						</center>
					</a>
				</li>";
			endwhile;
	}
	
function display_pros1(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		$cat=$con->prepare("select * from main_cat where pro_maincat_id='7'");
		$cat->setFetchMode(PDO:: FETCH_ASSOC);
		$cat->execute();
		$row_cat=$cat->fetch();
		$cat_id=$row_cat['pro_maincat_id'];	
		$pro=$con->prepare("select * from product where pro_maincat_id='$cat_id' ORDER BY 1 DESC LIMIT 0,3");
		$pro->setFetchMode(PDO:: FETCH_ASSOC);
		$pro->execute();
			echo"<h3>".$row_cat['pro_maincat_name']."</h3>";
			while($row=$pro->fetch()):
				echo "<ul><li>
						<a style='text-decoration:none' href='webpages/pro_detail.php?pro_id=".$row['pro_id']."'>
						<h4>".$row['pro_name']."</h4>
						<img src='data:image;base64,".$row['pro_img1']."' />
						<center><a href='webpages/pro_detail.php?pro_id=".$row['pro_id']."'><button id='btn' name='shopnow' data-toggle='tooltip' data-placement='top' title='Quick View'>View</button></a>";
						if(!isset($_SESSION['u_email'])){
							echo" <a href='index.php?cart=".$row['pro_id']."'><button id='btn' name='add_cart' data-toggle='tooltip' data-placement='top' title='Add To Cart'>Cart</button></a>";
						}
						else{
							echo" <a href='index.php?user_cart=".$row['pro_id']."'><button id='btn' name='add_cart' data-toggle='tooltip' data-placement='top' title='Add To Cart'>Cart</button></a>";
						}
						echo " <a href='index.php?user_wishlist=".$row['pro_id']."'><button id='btn' name='add_wishlist' data-toggle='tooltip' data-placement='top' title='Add To Wishlist'>Wishlist</button></a>
						</center>
					</a>
				</li></ul>";
			endwhile;
	}

function pro_detail(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_GET['pro_id'])){
		$pro_id=$_GET['pro_id'];
		
		$update_view=$con->prepare("update product set pro_view=pro_view+1 where pro_id='$pro_id'");
		$update_view->execute();
		
		$pro_detail=$con->prepare("select * from product where pro_id='$pro_id'");
		$pro_detail->setFetchMode(PDO:: FETCH_ASSOC);
		$pro_detail->execute();
						
		while($row=$pro_detail->fetch()):
			$pro_dis=$row['pro_dis'];
			$pro_price=$row['pro_price'];
			echo"<div class='pro_imgs'>
	<li><img src='data:image;base64,".$row['pro_img1']."' /></li>
					<ul>
				
		<li><a href='data:image/jpg;base64,".$row['pro_img2']."'><img src='data:image;base64,".$row['pro_img2']."' /></a></li>
       <li><a href='data:image/jpg;base64,".$row['pro_img3']."'><img src='data:image;base64,".$row['pro_img3']."' /></a></li>
	   <li><a href='data:image/jpg;base64,".$row['pro_img4']."'> <img src='data:image;base64,".$row['pro_img4']."' /></a></li>
					</ul>
					
                </div><!--end of pro_imgs-->
                <div class='pro_feature'>
					<h4>".$row['pro_name']."</h4>
					<hr />
					<ul>
						<li>".$row['pro_feature1']."</li>
						<li>".$row['pro_feature2']."</li>
						<li>".$row['pro_feature3']."</li>
						<li>".$row['pro_feature4']."</li>
						<li>".$row['pro_feature5']."</li>
					</ul>
                    <ul>
						<li>Color : ".$row['pro_color']."</li>
						<li>Model : ".$row['pro_model_no']."</li>
						<li>In Box : ".$row['pro_box']."</li>
					
						<li>Warranty Type : ".$row['pro_warranty_type']."</li>
					</ul><br clear='all' />
					<hr />";
					$pro_sell_price =($pro_price * $pro_dis/100);
					if($pro_dis<1){
						echo "<center><h3>Price : Rs. ".$row['pro_dis_price']."</h3></center>";
					}
					else{
						echo "<center><h3><span style='text-decoration:line-through; color:red'>MRP Price : Rs. ".$row['pro_price']."</span><br /><br />	
						<span style='color:green'>Discount : $pro_dis% <br />Total Saving : Rs. $pro_sell_price</span><br /><br />Selling Price : Rs. ".$row['pro_dis_price']."</h3></center>";
					}
					echo "<center>This Product Is Viewed By ".$row['pro_view']." People</center>";
					$pro_qty=$row['pro_qty'];
					if($pro_qty<1){
						echo"<center><a href='../index.php?user_wishlist=".$row['pro_id']."'><button id='buy_now' width='200px' name='add_wish'>Add To Wishlist</button></a></center>";
						echo"<center><h4>In Stock : <span style='color:red'>Out Of Stock</span></h4></center>";	
					}
					else{
						echo"<center><button id='buy_now' name='buy_now'>Buy Now</button>";
						if(isset($_POST['buy_now'])){
							if(!isset($_SESSION['u_email'])){
								echo "<script>alert('Please Login Or SignUp')</script>";
							}
							else{
								echo "<script>window.open('user_add.php?checkout=".$row['pro_id']."','_self')</script>";
								echo" <button id='buy_now' name='add_cart'><a href='../index.php?user_cart=".$row['pro_id']."'> Add To Cart</a></button></center>";
							}	
					}
					if(!isset($_SESSION['u_email'])){
						echo" <button id='buy_now' name='add_cart'><a href='../index.php?cart=".$row['pro_id']."'> Add To Cart</a></button></center>";	
						echo add_cart();
					}
					else{
						echo" <button id='buy_now' name='add_cart'><a href='../index.php?user_cart=".$row['pro_id']."'> Add To Cart</a></button></center>";
						echo user_add_cart();
					}
					
					echo add_wishlist();
					
					echo"<center><h4>In Stock : <span style='color:green'>Available</span></h4></center>";
				}
		endwhile;
	}	
}

function similler_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$pro_id=$_GET['pro_id'];
	$pro_detail=$con->prepare("select * from product where pro_id='$pro_id'");
	$pro_detail->setFetchMode(PDO:: FETCH_ASSOC);
	$pro_detail->execute();
						
	while($row=$pro_detail->fetch()):
		$pro_main_cat_id=$row['pro_maincat_id'];
        $similler_cat=$con->prepare("select * from product where pro_maincat_id='$pro_main_cat_id' ORDER BY 1 DESC LIMIT 0,8");
		$similler_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$similler_cat->execute();
						
		while($cat_name=$similler_cat->fetch()):
			$p_id=$cat_name['pro_id'];
			echo"<ul>
					<li>
						<a href='pro_detail.php?pro_id=$p_id'>
							<img src='data:image;base64,".$cat_name['pro_img1']."' />
							<h5>".$cat_name['pro_name']."</h5>
							<h5 style='margin-top:0px'>Price : ".$cat_name['pro_price']."</h5>
						</a>
					</li>
				</ul>";
		endwhile;
	endwhile;	
}
	
function check_pin(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['submit'])){
		$pincode=$_POST['pincode'];
		$pin_check=$con->prepare("select * from pincode where pincode='$pincode'");
		$pin_check->setFetchMode(PDO:: FETCH_ASSOC);
		$pin_check->execute();
								
		if($pin_check->rowCount()==1){
			echo "<script>alert('Shipping Is Available on Your Location Please Proceed')</script>";	
		}
		else{
			echo "<script>alert('Shipping Is Not Available On Your Location Sorry')</script>";	
		}
	}	
}

function user_add(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		$u_email=$_SESSION['u_email'];
        $select_add=$con->prepare("Select * from users where u_email='$u_email'");
		$select_add->setFetchMode(PDO:: FETCH_ASSOC);
		$select_add->execute();
						
		while($row=$select_add->fetch()):
			echo"<h4>".$row['u_name']."</h4>
				<h5>".$row['u_add'].",</h5>
				<h5>".$row['u_city'].",</h5>
				<h5>".$row['u_pincode'].".</h5>
				<h6>Phone No. : ".$row['u_phone']."</h6>";
		endwhile;	
}
	
function new_u_add(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['insert_add'])){
		$u_new_name=$_POST['new_name'];
		$u_new_city=$_POST['new_city'];
		$u_new_add=$_POST['new_uadd'];
		$u_new_pin=$_POST['new_pincode'];
		$u_new_phone=$_POST['new_phone'];
		$u_email=$_SESSION['u_email'];
		
		$new_add=$con->prepare("update users set u_name='$u_new_name',u_city='$u_new_city',u_add='$u_new_add',u_pincode='$u_new_pin',u_phone='$u_new_phone' where u_email='$u_email'");

		if($new_add->execute()){
			echo "<script>alert('Address Updated Sucessfully')</script>";	
		}
	}		
}

function single_order(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	//updating qty from user_cart
		if(isset($_POST['update_qty'])){
			//getting u_id
				$user_email=$_SESSION['u_email'];
				$p_id=$_GET['checkout'];
				$user_id=$con->prepare("select * from users where u_email='$user_email'");
				$user_id->setFetchMode(PDO:: FETCH_ASSOC);
				$user_id->execute();
				$p_id=$_GET['checkout'];
				while($row_user_id=$user_id->fetch()):
					$u_id=$row_user_id['u_id'];
				endwhile;
			//end of getting u_id
				$qty=$_POST['qty'];
										
				$update_qty=$con->prepare("update user_cart set qty='$qty' where u_id='$u_id' AND pro_id='$p_id'");
				$update_qty->execute();
				if($update_qty){
					echo"<script>window.open('user_add.php?checkout=$p_id','_self');</script>";	
				}
		}
	//end of updating qty from user_cart
	if(isset($_GET['checkout'])){
		$pro_id=$_GET['checkout'];
		$net_total=0;
									
		$display_item=$con->prepare("select * from product where pro_id='$pro_id' AND pro_qty>1");
		$display_item->setFetchMode(PDO:: FETCH_ASSOC);
		$display_item->execute();
									
		while($row_item=$display_item->fetch()):
			$pro_name=$row_item['pro_name'];
			$pro_price=$row_item['pro_dis_price'];
			//getting u_id
				$user_email=$_SESSION['u_email'];
				$user_id=$con->prepare("select * from users where u_email='$user_email'");
				$user_id->setFetchMode(PDO:: FETCH_ASSOC);
				$user_id->execute();
				$row_user_id=$user_id->fetch();
				$u_id=$row_user_id['u_id'];
				$u_name=$row_user_id['u_name'];
				$user_mail=$row_user_id['u_email'];
			//end of getting u_id
			//get user_cart_qty
				$get_qty=$con->prepare("select * from user_cart where pro_id='$pro_id' AND u_id='$u_id'");
				$get_qty->setFetchMode(PDO:: FETCH_ASSOC);
				$get_qty->execute();
				$row_user_qty=$get_qty->fetch();
				$qty_id=$row_user_qty['qty'];
			//end of user_cart_qty
			//getting product
				echo"<tr>
            			<td><img src='data:image;base64,".$row_item['pro_img1']."' /></td>
                		<td>".$row_item['pro_name']."</td>
						<td>
                			<input type='text' name='qty' value='$qty_id' style='width:50px; height:32px; font-size:11px; padding-left:5%' />
                    		<button style='font-size:10px' name='update_qty' id='btn'>Save</button>
               			</td>
						<td>Deliverd In 2-3 Working Days</td>
						<td>".$row_item['pro_dis_price']."</td>
						<td>";
                    		$sub_total=$qty_id*$row_item['pro_dis_price'];
							echo $sub_total;
							$net_total=$net_total+$sub_total;
               				echo 
						"</td>
					</tr>
					<tr>
            			<td style='text-align:right; height:30px' colspan='6'>Amout Payable : $net_total</td>
            		</tr>";
			//end of getting product
		endwhile; 
	}
	if(isset($_POST['payment'])){
		$trx_id="PYT".mt_rand()."RSC";
		$invoice="ODR".mt_rand()."RSC";
		//start of insert into payment			
			$insert_payment=$con->prepare("INSERT INTO payment(u_id,pro_id,amount,trx_id,payment_date)VALUES('$u_id','$pro_id','$net_total','$trx_id',NOW())");
			if($insert_payment->execute()){
				echo"<script>window.open('../webpages/checkout.php','_self');</script>";
			}
			else{
				echo"<script>alert('Please Try Again');</script>";	
			}
		//end of insert into payment
		//start of insert into order
			$insert_order=$con->prepare("INSERT INTO order_detail(pro_id,u_id,qty,invoice_no,status,order_date)VALUES('$pro_id','$u_id','$qty_id','$invoice','In Process',NOW())");
			if($insert_order->execute()){
				echo"<script>window.open('../webpages/checkout.php','_self');</script>";
			}
			else{
				echo"<script>alert('Please Try Again');</script>";	
			}
		//end of insert into order
		//update product table qty
			$select_pro_qty=$con->prepare("select * from product where pro_id='$pro_id'");
			$select_pro_qty->setFetchMode(PDO:: FETCH_ASSOC);
			$select_pro_qty->execute();
			$row_pro_qty=$select_pro_qty->fetch();
			$pro_qty=$row_pro_qty['pro_qty'];
						
			$update_pro_qty=$pro_qty - $qty_id;
						
			$update_pro_qty_p=$con->prepare("update product set pro_qty='$update_pro_qty' where pro_id='$pro_id'");
			$update_pro_qty_p->execute();
		//end of update product qty
		//deleting items from user cart table
			$delete_cart=$con->prepare("delete from user_cart where pro_id='$pro_id' AND u_id='$u_id'");	
			$delete_cart->execute();
		//end of deleting items from user_cart table
	} 
}
//end of single order get

function multi_order(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	//start of update user_qty
    	if(isset($_POST['update_user_qty'])){
			$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	   		$qty=$_POST['qty_user'];
						
			foreach($qty as $key=>$value){
				$update_qty=$con->prepare("UPDATE user_cart SET qty='$value' WHERE u_cart_id='$key'");
				$update_qty->execute();
			}
		}
	//end of update user_qty
	$net_total=0;
	$u_email=$_SESSION['u_email'];
	$get_user=$con->prepare("select * from users where u_email='$u_email'");
	$get_user->setFetchMode(PDO:: FETCH_ASSOC);
	$get_user->execute();
	$row_user=$get_user->fetch();
	$u_id=$row_user['u_id'];
	$cart_page=$con->prepare("SELECT * FROM user_cart WHERE u_id='$u_id'");
	$cart_page->setFetchMode(PDO:: FETCH_ASSOC);
	$cart_page->execute();
							
	while($cart=$cart_page->fetch()):
		$cart_id=$cart['pro_id'];
		$qty=$cart['qty'];
		$cart_pro=$con->prepare("SELECT * FROM product WHERE pro_id='$cart_id' AND pro_qty>0");
		$cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_pro->execute();
								
		while($cart_display=$cart_pro->fetch()):
			$pro_id=$cart_display['pro_id'];
			echo"<tr>
					<td style='font-size:13px; width:50px'><img src='data:image;base64,".$cart_display['pro_img1']."' /></td>
					<td><a href='pro_detail.php?pro_id=".$cart_display['pro_id']."'>".$cart_display['pro_name']."</a></td>
					<td>
						<input style='width:40px; height:30px; padding-left:5%' type='text' name='qty_user[".$cart['u_cart_id']."]' value='".$cart['qty']."' />
						<input type='submit' style='margin-top:10px; height:30px; width:40px; font-size:10px;' id='btn' name='update_user_qty' value='Save' />
					</td>
					<td>".$cart_display['pro_dis_price']."</td>
					<td>";
						$sub_total=$qty*$cart_display['pro_dis_price'];
						echo $sub_total;
													
						$net_total=$net_total+$sub_total;
						$net_total;
					echo"</td>
					<td style='display:none'><input type='checkbox' name='multi_order[$pro_id]' value='".$cart['qty']."' checked /></td>
					<td style='display:none'><input type='checkbox' name='multi_amt[$pro_id]' value='$sub_total' checked /></td>
					<td>
						<a href='user_add.php?remove=".$cart_display['pro_id']."' onClick='return confirm('Are You Sure ???');' style='margin-left:30px'>
							remove
						</a>
					</td>
				</tr>";
		endwhile; 
	endwhile; //end of getting cart items
			echo "<tr>
                	<td></td>
                	<td>
                    	<button name='continue_shopping' style='margin-top:10px; height:35px; width:135px' id='btn'>
                        	<a href='../index.php'>Continue Shopping</a>
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                    	<button style='margin-top:10px; height:35px; width:135px' id='btn' name='net_total'>
                        	<a href='#'>Net Total : $net_total</a>
                        </button>
                    </td>
                	<td></td>
                </tr>";
				
	//start of cod button script
		if(isset($_POST['cart_payment'])){
			$u_email=$_SESSION['u_email'];
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
			foreach($_POST['multi_order'] as $multi_order_id=>$cart_qty){
				$invoice_no="ORD".mt_rand()."RSC";
				$date=date("Y-m-d");
				$insert_multi_order=$con->prepare("insert into order_detail(pro_id,u_id,qty,invoice_no,status,order_date)
					values('$multi_order_id','$u_id','$cart_qty','$invoice_no','In Process','$date')");
				$insert_multi_order->execute();
				if($insert_multi_order){
					echo "<script>window.open('../webpages/checkout.php','_self')</script>";	
				}
				else{
					echo "<script>alert('please try again')</script>";
				}
				$select_pro_qty=$con->prepare("select * from product where pro_id='$multi_order_id'");
				$select_pro_qty->setFetchMode(PDO:: FETCH_ASSOC);
				$select_pro_qty->execute();
				$row_pro_qty=$select_pro_qty->fetch();
				$pro_name=$row_pro_qty['pro_name'];
				$pro_price=$row_pro_qty['pro_dis_price'];
				$pro_qty=$row_pro_qty['pro_qty'];
					
				$update_pro_qty=$pro_qty - $cart_qty;
					
				$update_pro_qty_p=$con->prepare("update product set pro_qty='$update_pro_qty' where pro_id='$multi_order_id'");
				$update_pro_qty_p->execute();
			}
			foreach($_POST['multi_amt'] as $multi_amt_id=>$cart_amt){
				$trx_id="PYM".mt_rand()."RSC";
				$insert_multi_payment=$con->prepare("insert into payment(pro_id,u_id,amount,trx_id,payment_date)
					values('$multi_amt_id','$u_id','$cart_amt','$trx_id',NOW())");
				$insert_multi_payment->execute();
			}
				
			$delete_cart=$con->prepare("delete from user_cart where u_id='$u_id'");
			$delete_cart->execute();
		
		}
    //end of cod button script
}
function wish_order(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	//start of update user_qty
    	if(isset($_POST['update_user_qty'])){
			$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	   		$qty=$_POST['qty_user'];
						
			foreach($qty as $key=>$value){
				$update_qty=$con->prepare("UPDATE user_wishlist SET qty='$value' WHERE u_wish_id='$key'");
				$update_qty->execute();
			}
		}
	//end of update user_qty
	$net_total=0;
	$u_email=$_SESSION['u_email'];
	$get_user=$con->prepare("select * from users where u_email='$u_email'");
	$get_user->setFetchMode(PDO:: FETCH_ASSOC);
	$get_user->execute();
	$row_user=$get_user->fetch();
		$u_id=$row_user['u_id'];
	$cart_page=$con->prepare("SELECT * FROM user_wishlist WHERE u_id='$u_id'");
	$cart_page->setFetchMode(PDO:: FETCH_ASSOC);
	$cart_page->execute();
							
	while($cart=$cart_page->fetch()):
		$cart_id=$cart['pro_id'];
		$qty=$cart['qty'];
		$cart_pro=$con->prepare("SELECT * FROM product WHERE pro_id='$cart_id' AND pro_qty>1");
		$cart_pro->setFetchMode(PDO:: FETCH_ASSOC);
		$cart_pro->execute();
								
		while($cart_display=$cart_pro->fetch()):
			$pro_id=$cart_display['pro_id'];
			echo"<tr>
					<td style='font-size:13px; width:50px'><img src='data:image;base64,".$cart_display['pro_img1']."' /></td>
					<td><a href='pro_detail.php?pro_id=".$cart_display['pro_id']."'>".$cart_display['pro_name']."</a></td>
					<td>
						<input style='width:40px; height:30px; padding-left:5%' type='text' name='qty_user[".$cart['u_wish_id']."]' value='".$cart['qty']."' />
						<input type='submit' style='margin-top:10px; height:30px; width:40px; font-size:10px;' id='btn' name='update_user_qty' value='Save' />
					</td>
					<td>".$cart_display['pro_dis_price']."</td>
					<td>";
						$sub_total=$qty*$cart_display['pro_dis_price'];
						echo $sub_total;
													
						$net_total=$net_total+$sub_total;
						$net_total;
					echo"</td>
					<td style='display:none'><input type='checkbox' name='multi_order[$pro_id]' value='".$cart['qty']."' checked /></td>
					<td style='display:none'><input type='checkbox' name='multi_amt[$pro_id]' value='$sub_total' checked /></td>
					<td>
						<a href='user_add.php?remove=".$cart_display['pro_id']."' onClick='return confirm('Are You Sure ???');' style='margin-left:30px'>
							&#x2718;
						</a>
					</td>
				</tr>";
		endwhile; 
	endwhile; //end of getting cart items
			echo "<tr>
                	<td></td>
                	<td>
                    	<button name='continue_shopping' style='margin-top:10px; height:35px; width:135px' id='btn'>
                        	<a href='../index.php'>Continue Shopping</a>
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                    	<button style='margin-top:10px; height:35px; width:135px' id='btn' name='net_total'>
                        	<a href='#'>Net Total : $net_total</a>
                        </button>
                    </td>
                	<td></td>
                </tr>";
				
	//start of cod button script
		if(isset($_POST['wish_payment'])){
			$u_email=$_SESSION['u_email'];
			$get_user=$con->prepare("select * from users where u_email='$u_email'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$row_user=$get_user->fetch();
			$u_id=$row_user['u_id'];
			foreach($_POST['multi_order'] as $multi_order_id=>$cart_qty){
				$invoice_no="ORD".mt_rand()."RSC";
				$insert_multi_order=$con->prepare("insert into order_detail(pro_id,u_id,qty,invoice_no,status)
					values('$multi_order_id','$u_id','$cart_qty','$invoice_no','In Process')");
				$insert_multi_order->execute();
				if($insert_multi_order){
					echo "<script>window.open('../webpages/checkout.php','_self')</script>";	
				}
				else{
					echo "<script>alert('please try again')</script>";
				}
				$select_pro_qty=$con->prepare("select * from product where pro_id='$multi_order_id'");
				$select_pro_qty->setFetchMode(PDO:: FETCH_ASSOC);
				$select_pro_qty->execute();
				$row_pro_qty=$select_pro_qty->fetch();
				$pro_qty=$row_pro_qty['pro_qty'];
					
				$update_pro_qty=$pro_qty - $cart_qty;
					
				$update_pro_qty_p=$con->prepare("update product set pro_qty='$update_pro_qty' where pro_id='$multi_order_id'");
				$update_pro_qty_p->execute();
			}
			foreach($_POST['multi_amt'] as $multi_amt_id=>$cart_amt){
				$trx_id="PYM".mt_rand()."RSC";
				$insert_multi_payment=$con->prepare("insert into payment(pro_id,u_id,amount,trx_id)
					values('$multi_amt_id','$u_id','$cart_amt','$trx_id')");
				$insert_multi_payment->execute();
			}
				
			$delete_cart=$con->prepare("delete from user_wishlist where u_id='$u_id'");
			$delete_cart->execute();
		}
    //end of cod button script
}
?>