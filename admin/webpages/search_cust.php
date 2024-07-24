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
        <h4 class="title">View All Customers</h4>
        <center>
        <form id="viewallpro" method="post">
        	<?php
				include("../inc/function.php"); 
					include("../inc/db.php");
					$u_name=$_GET['search_c'];
						
					$display_customer=$con->prepare("select * from users where u_name like'%$u_name%'");
					$display_customer->setFetchMode(PDO:: FETCH_ASSOC);
					$display_customer->execute();
					$count=$display_customer->rowCount();
					$i=1; 
					echo "<p style='color:#fff; font-weight:bold'>Total ".$count." Record Are Found</p>"; 
			?>
                <table style="width:1200px">
                 <tr>
                    	<th style="text-align:left; background:#373F27">Sr No.</th>
                        <th style="text-align:left;background:#373F27">User Name</th>
                        <th style="text-align:left; background:#373F27">User E-Mail</th>
                        <th style="text-align:left; background:#373F27">User Phone No</th>
                        <th style="text-align:left; background:#373F27">User Password</th>
                        <th style="text-align:left; background:#373F27">User City</th>
                        <th style="text-align:left; background:#373F27">User Pincode</th>
                        <th style="text-align:left; background:#373F27">User Address</th>
                        <th style="text-align:left; background:#373F27">User DOB</th>   
                        <th style="text-align:left; background:#373F27">Registration Date</th>
                    </tr>
                    <?php
						while($row=$display_customer->fetch()):
							echo"
								<tr>
									<td style='text-align:left; padding-left:1%; min-width:100px'>".$i++."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_name']."</td>
									<td style='text-align:left; min-width:180px'>".$row['u_email']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_phone']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_pass']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_city']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_pincode']."</td>
									<td style='text-align:left; min-width:200px'>".$row['u_add']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_dob']."</td>
									<td style='text-align:left; min-width:150px'>".$row['u_reg_date']."</td>
								</tr>";
						endwhile;
					?>
                </table>
                </form>
         	</center>
        </div><!--end of bodyright--><br clear="all" />
        </div>
    </body>
</html>