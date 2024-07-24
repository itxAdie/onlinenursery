<html>
	<head>
		<link rel="icon" href="../img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
    <script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>    
	</head>
	<body>
    	<div><?php include("../inc/header2.php"); ?></div>
        <div><?php include("nav.php"); ?></div>
		<div id="wrapper">
            <div class="cart">
            	<form method="post" enctype="multipart/form-data">
                	<h3>My Cart</h3>
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
            </div><!--end of cart-->
        </div><!--End Of Wrapper-->
	</body>
</html>
<?php echo delete_cart_item(); ?>