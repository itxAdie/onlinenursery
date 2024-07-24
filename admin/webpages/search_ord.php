<?php session_start(); ?>
<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
       
    </head>
    <body>
    	<div id="wrapper">
    	<div><?php include("../inc/header.php"); ?></div>
        <div><?php include("../inc/bodyleft.php"); ?></div>
        <div class="bodyright">
    	<h4 class="title">View All Orders</h4>
        <center>
        <form id="viewallcustomer" method="post">
        	<?php
				include("../inc/function.php"); 
					include("../inc/db.php");
					$invoice_no=$_GET['search_ord'];
						
					$display_ord=$con->prepare("select * from order_detail where invoice_no like'%$invoice_no%' OR status like'%$invoice_no%'");
					$display_ord->setFetchMode(PDO:: FETCH_ASSOC);
					$display_ord->execute();
					$count=$display_ord->rowCount();
					$i=1; 
					echo "<p style='color:#fff; font-weight:bold'>Total ".$count." Record Are Found</p>"; 
			?>
                <table style="width:900px">
                 <tr>
                    	<th style="background:#373F27; width:35px;">Sr No.</th>
                        <th style="background:#373F27; min-width:100px;">Customer Email</th>
                        <th style="background:#373F27; min-width:100px;">Product Image</th>
                        <th style="background:#373F27; min-width:100px;">Product Name</th>
                        <th style="background:#373F27; width:20px;">Quantity</th>
                        <th style="background:#373F27; width:100px;">Invoice No.</th>
                        <th style="background:#373F27; width:100px;">Order Date</th>
                        <th style="background:#373F27; width:100px;">Action</th>
                    </tr>
             		<?php
						$i=1;
						while($row_order=$display_ord->fetch()):
							$pro_id=$row_order['pro_id'];
							$o_id=$row_order['order_id'];
							$u_id=$row_order['u_id'];
							$get_pro=$con->prepare("select * from product where pro_id='$pro_id'");
							$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
							$get_pro->execute();
							$row_pro=$get_pro->fetch();
							$get_user=$con->prepare("select * from users where u_id='$u_id'");
							$get_user->setFetchMode(PDO:: FETCH_ASSOC);
							$get_user->execute();
							$row_user=$get_user->fetch();
							$complete="Complete";
					?>
                    <tr>
                    	<td style="display:none">
           				<input type="hidden" name="order[<?php echo $row_order['order_id'] ?>]" value="$complete" />
                        </td>
                    	<td style="width:35px"><?php echo $i++; ?></td>
                        <td><?php echo $row_user['u_email']; ?></td>
                        <td><img src="data:image;base64,<?php echo $row_pro['pro_img1']; ?>" width="40px" height="40px" /></td>
						<td><?php echo $row_pro['pro_name']; ?></td>
                        <td><?php echo $row_order['qty']; ?></td>
                        <td><?php echo $row_order['invoice_no']; ?></td>
                        <td><?php echo $row_order['order_date']; ?></td>
                        <?php $confirm=$row_order['status']; if($confirm=="In Process"){ ?>
                        <td><a href="ord.php?ord=<?php echo $row_order['order_id']; ?>">Confirm Order</a></td>
                        <?php } else{ ?>
                        <td>
                        	<button id="remove">
                            	<a class="btn" style="background:#000" href="invoice_gen.php?gen=<?php echo $row_order['order_id']; ?>">Generate Bill</a>
                            </button>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php endwhile; ?>
                </table>
                </form>
         	</center>
        </div><!--end of bodyright--><br clear="all" />
        </div>
    </body>
</html>