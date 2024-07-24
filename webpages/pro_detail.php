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
            <div class="detail">
            <form method="post" enctype="multipart/form-data">
            	<?php echo pro_detail();?>
                    <center>
                    	<form method="post">
                            <input style="border-radius:3px; outline:none; border:1px solid #400040; padding-left:2%; height:30px; width:70%" type="text" name="pincode" placeholder="Check Your Pincode" />
                            <input id="buy_now" style="border-radius:3px; outline:none; height:30px; width:15%" type="submit" name="submit" value="Check" />
                    	</form>
                        <?php echo check_pin(); ?>
                    </center>
                    <ul id="cod">
                    	<li>Cash On Delivery Available</li>
                    	<li>30 day Replacement Guarantee.</li>
                        <li>Delivered In 2-3 Working Days</li>
                    </ul>
                    <hr />
                </div><!--end of pro_feature--><br clear="all" />
				
                <div class="similler_pro">
                	<h3>Similler Products</h3>
                    <?php echo similler_pro(); ?>	
                </div><!--end of similer_pro--><br clear="all" />
                </form>
            </div><!--end of detail-->
            <div><?php include("../inc/footer.php"); ?></div>
        </div><!--End Of Wrapper-->
        
	</body>
</html>