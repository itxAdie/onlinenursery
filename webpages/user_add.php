<html>
	<head>
		<link rel="icon" href="../img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

	</head>
	<body>
    	<div><?php include("../inc/header2.php"); ?></div>
        <div><?php include("nav.php"); ?></div>
		<div id="wrapper">
        	<div id="u_add">
            	<h4>Your Login Id : <?php echo $_SESSION['u_email']; echo user_add_cart(); ?></h4>
                <h3>Delivery Address</h3>
                <div id="add1">
                	<?php echo user_add(); if(!isset($_POST['new_add'])){?>
                    <form method="POST">
                    	<button id="btn" name="new_add" style="width:150px; margin-top:5px">Update Address</button>
                    </form>
                    <?php } ?>
                </div><!--end of add1-->
                
                <div id="add2">
                	<?php 
						if(isset($_POST['new_add'])){
						$u_email=$_SESSION['u_email'];
						$select=$con->prepare("select * from users where u_email='$u_email'");
						$select->setFetchMode(PDO:: FETCH_ASSOC);
						$select->execute();
						$row=$select->fetch();
						$u_name=$row['u_name'];
						$u_city=$row['u_city'];
						$u_add=$row['u_add'];
						$u_pin=$row['u_pincode'];
						$u_phone=$row['u_phone'];
					 ?>
                     	<form method="post">
                		<table>
                        	<tr>
                            	<td style="padding-top:2%"> Enter Name :</td>
                                <td style="padding-top:2%"><input type="text" name="new_name" value="<?php echo $u_name; ?>" /></td>
                             </tr>
                             <tr>
                            	<td> Enter City :</td>
                                <td><input type="text" name="new_city" value="<?php echo $u_city; ?>" /></td>
                             </tr>
                             <tr>
                                <td> Enter New Address :</td>
                                <td><textarea name="new_uadd"><?php echo $u_add; ?></textarea></td>
                            </tr>
                             <tr>
                            	<td>Enter Pincode :</td>
                                <td><input type="text" name="new_pincode" value="<?php echo $u_pin; ?>" /></td>
                             </tr>
                            <tr>
                            	<td>Enter Phone No :</td>
                                <td><input type="text" name="new_phone" pattern="[0-9]{10}" value="<?php echo $u_phone; ?>" /></td>
                             </tr>
                             <tr>
                             	<td colspan="2">
                                	<center><button style="width:150px;margin-top:10px" id="btn" name="insert_add">Update Adddress</button>
                                </td>
                             </tr>
                        </table>
                        <?php } ?>
 					  </form>  
                </div><!--end of add2--><br clear="all" />
                <!--single order-->
					<?php include("../inc/single_order.php"); ?>
                <!--end of single order-->
                    
                <!--start of multi order-->
					<?php include("../inc/multi_order.php"); ?>
				<!--end of multi order-->
                
                 <!--start of wish order-->
					<?php include("../inc/wishlist_order.php"); ?>
				<!--end of wish order-->
                
                </div><!--end of item-->
            </div><!--end of u_add-->
            <div><?php include("../inc/footer.php"); ?></div>
        </div><!--End Of Wrapper-->
	</body>
</html>
<?php 
	echo new_u_add();
?>