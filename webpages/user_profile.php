<html>
	<head>
		<link rel="icon" href="../img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

	</head>
	<body style="width:96.5%;"
    	<div><?php include("../inc/header2.php"); ?></div>
        <div><?php include("navs.php"); ?></div>
		<div style="background:#e6e6e6 !important" id="wrapper">
            <div id="bodyleft" style="background:#FFF; height:500px; width:68%; margin-left:1%">
            	<?php
					if(!isset($_GET['my_order'])){
						if(!isset($_GET['my_cart'])){
						if(!isset($_GET['my_pass'])){
						if(!isset($_GET['my_wishlist'])){
						include("../inc/db.php");
						$u_email=$_SESSION['u_email'];
						$u_data=$con->prepare("select * from users where u_email='$u_email'");
						$u_data->setFetchMode(PDO:: FETCH_ASSOC);
						$u_data->execute();
						while($row_user=$u_data->fetch()):
				?>
            	<h3 style="margin-top:0px">My Account</h3>
                <center>
                    <form id="my_ac" method="POST" action="user_profile.php?u_update=<?php echo $row_user['u_id']; ?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td> Your Name :</td>
                                <td><input type="text" name="u_name" value="<?php echo $row_user['u_name'] ?>" /></td>
                            </tr>
                            <tr>
                                <td> Your City :</td>
                                <td><input type="text" name="u_city" value="<?php echo $row_user['u_city'] ?>" /></td>
                            </tr>
                            <tr>
                                <td> Your Address :</td>
                                <td><textarea name="u_add"><?php echo $row_user['u_add'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td> Your Pincode :</td>
                                <td><input type="text" name="u_pincode" value="<?php echo $row_user['u_pincode'] ?>" /></td>
                            </tr>
                            <tr>
                                <td> Your Phone No :</td>
                                <td><input type="text" name="u_phone" value="<?php echo$row_user['u_phone'] ?>" /></td>
                            </tr>
                            <tr>
                                <td> Your security question :</td>
      <td><input type="text" name="u_question" value=" <?php echo $row_user['u_question'] ?>" /></td>
                            </tr>
                            <tr>
                                <td> Your  answer :</td>
                                <td><input type="text" name="u_ans" value="<?php echo $row_user['u_ans'] ?>" /></td>
                            </tr>
                        </table>
                        <input type="submit" id="btn" name="update_user" value="Save" style="width:100px; margin-left:250px" />
                    </form>
                </center>
                <?php endwhile; } } } } //end of unset my_order ?>
                <?php if(isset($_GET['my_order'])){?>
                <h3 style="margin-top:0px">My Order's</h3>
                <center>
                    <form id="my_order" method="POST" enctype="multipart/form-data">
                        	<table>
                            	<tr>
                                	<th>Invoice No.</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Order Date</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Cancel Order</th>
                                    
                                </tr>
                                <?php
									include("../inc/db.php");
									if(isset($_GET['my_order'])){
									//getting user_id
										$u_email=$_SESSION['u_email'];
										$get_user=$con->prepare("select * from users where u_email='$u_email'");
										$get_user->setfetchMode(PDO:: FETCH_ASSOC);
										$get_user->execute();
										$row_user=$get_user->fetch();
										$u_id=$row_user['u_id'];
									//end of getting user_id
									//geting order_detail
										$get_order=$con->prepare("select * from order_detail where u_id='$u_id'");
										$get_order->setFetchMode(PDO:: FETCH_ASSOC);
										$get_order->execute();
										while($row_order=$get_order->fetch()):
											$pro_id=$row_order['pro_id'];
											//getting pro
												$get_pro=$con->prepare("select * from product where pro_id='$pro_id'");
												$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
												$get_pro->execute();
												$row_pro=$get_pro->fetch();
											//end of getting pro
											//getting total price
												$get_amount=$con->prepare("select * from payment where u_id='$u_id' AND pro_id='$pro_id'");
												$get_amount->setFetchMode(PDO:: FETCH_ASSOC);
												$get_amount->execute();
												$row_amount=$get_amount->fetch();
											//end of getting total price
									//end of order detail
								?>
                                <tr>
                                	<td><?php echo $row_order['invoice_no']; ?></td>
                                    <td><img src="data:image;base64,<?php echo $row_pro['pro_img1']; ?>" style="height:40px; width:40px" /></td>
                                    <td><?php echo $row_pro['pro_name']; ?></td>
                                    <td><?php echo $row_order['order_date']; ?></td>
                                    <td style="text-align:center"><?php echo $row_order['qty']; ?></td>
                                    <td><?php echo $row_amount['amount']; ?></td>
                                	<td><?php echo $row_order['status']; ?></td>
                                    <td style="text-align:center"><a href='update_order.php?up_order=<?php echo $row_order['order_id']; ?>' onClick="return confirm('Are You Sure !!!')">remove</a></td>
                                </tr>
                                <?php endwhile; } ?>
                            </table>
                    </form>
                    <?php } ?>
                    <?php if(isset($_GET['my_cart'])){?>
                    	<h3 style="margin-top:0px">My Cart</h3>
                        <form id="my_order" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Items</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th>Remove</th>
                                </tr>
                                <?php echo cart_pro(); ?> 
                            </table>
                    	</form>
                    <?php } ?>
                    <?php if(isset($_GET['my_wishlist'])){?>
                    	<h3 style="margin-top:0px">My Wishlist</h3>
                        <form id="my_order" method="post" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Items</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th>Remove</th>
                                </tr>
                                <?php echo wishlist_pro();?> 
                            </table>
                    	</form>
                    <?php } ?>
                    <?php 
						if(isset($_GET['my_pass'])){
							$u_email=$_SESSION['u_email'];
							echo"<h3 style='margin-top:0px'>Change Account Password</h3>
									<form id='my_pass' method='post'>
										<table>
											<tr>
												<td>Enter Your Current Password : </td>
												<td><input type='password' name='old_pass' placeholder='Enter Your Current Password' /></td>
											</tr>
											<tr>
												<td>Enter Your New Password : </td>
												<td><input type='password' name='new_pass1' placeholder='Enter Your New Password' /></td>
											</tr>
											<tr>
												<td>Confirm Your New Password : </td>
												<td><input type='password' name='new_pass2' placeholder='Confirm Your New Password' /></td>
											</tr>
										</table>
										<input type='submit' id='btn' name='update_pass' value='Change' style='width:100px; margin-left:250px' />
									</form>";
									
							if(isset($_POST['update_pass'])){
								include("../inc/db.php");
								$c_pass=$_POST['old_pass'];
								$new_pass1=$_POST['new_pass1'];
								$new_pass2=$_POST['new_pass2'];
								
								$pass_check=$con->prepare("select * from users where u_email='$u_email' AND u_pass='$c_pass'");
								$pass_check->setFetchMode(PDO:: FETCH_ASSOC);
								$pass_check->execute();
								
								if(strlen($new_pass1)<8){
									echo"<script>alert('Please Enter Above 8 Digit Password');</script>";
									exit();	
								}
								if($new_pass1==$new_pass2){}else{
									echo"<script>alert('New Password And Confirm Password Does Not Match Please Try Again !!!');</script>";	
									exit();
								}
								
								if($pass_check->rowCount()==1){
									$update_pass=$con->prepare("update users set u_pass='$new_pass2' where u_email='$u_email'");
									if($update_pass->execute()){
										echo"<script>alert('Password Change Successfully');</script>";
										echo"<script>window.open('user_profile.php','_self');</script>";
									}
								}
								else{
									echo"<script>alert('You Enter Current Password Wrong Please Try Again !!!');</script>";	
								}
							}
							
					?>
								
					<?php } ?>
            </div><!--end of bodyleft-->
			<div id="bodyright" style="background:#FFF !important; height:500px; margin-top:140px; width:29%; margin-left:0%">
            	<h3>Welcome</h3>
                <ul id="user_ac">
                	<li><a href="user_profile.php"> My Account</a></li>
                    <li><a href="user_profile.php?my_order"> My Orders</a></li>
                    <li><a href="user_profile.php?my_cart"> My Shopping Cart</a></li>
                    <li><a href="user_profile.php?my_wishlist"> My Wishlist</a></li>
                    <li><a href="user_profile.php?my_pass"> Change My Password</a></li>
                    
                </ul>
            </div><br clear="all" /><!--end of bodyright-->
        </div><!--End Of Wrapper-->
        <div><?php include("../inc/footer.php"); ?></div>
	</body>
</html>
<?php 
	include("../inc/db.php");
	if(isset($_POST['update_user'])){
		$u_update=$_GET['u_update'];
		$u_name=$_POST['u_name'];
		$u_city=$_POST['u_city'];
		$u_add=$_POST['u_add'];
		$u_pincode=$_POST['u_pincode'];
		$u_phone=$_POST['u_phone'];
		
		$user_update=$con->prepare("update users set u_name='$u_name',u_city='$u_city',u_add='$u_add',u_pincode='$u_pincode',u_phone='$u_phone' where u_id='$u_update'");
		$user_update->execute();
		
		if($user_update){
			echo "<script>window.open('user_profile.php','_self')</script>";	
		}
		else{
			echo "<script>alert('Something Wrong Please Try Again')</script>";	
		}
	}
	echo user_wish_delete();
?>