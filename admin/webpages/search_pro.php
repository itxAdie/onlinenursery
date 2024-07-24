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
    	<h4 class="title">View All Product</h4>
        <center>
        <form id="viewallcustomer" method="post">
        	<?php
				include("../inc/function.php"); 
					include("../inc/db.php");
					$pro_name=$_GET['search_pro'];
						
					$display_pro=$con->prepare("select * from product where pro_name like'%$pro_name%'");
					$display_pro->setFetchMode(PDO:: FETCH_ASSOC);
					$display_pro->execute();
					$count=$display_pro->rowCount();
					$i=1; 
					echo "<p style='color:#fff; font-weight:bold'>Total ".$count." Record Are Found</p>"; 
			?>
                <table style="width:3000px">
                <tr>
                	<th>Select</th>
                    <th>No.</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Product Name</th>
                    <th>Product Images</th>
                    <th>Product Price</th>
                    <th>Discount</th>
                    <th>Salling Price</th>
                    <th>Product Feature 1</th>
                    <th>Product Feature 2</th>
                    <th>Product Feature 3</th>
                    <th>Product Feature 4</th>
                    <th>Product Feature 5</th>
                    <th>Product Quantity</th>
                    <th>Product Description</th>
                    <th>Product Color</th>
                    <th>Product Model No.</th>
                    <th>In The Box</th>
                   
                    <th>Product Warranty Type</th>
                
                    <th>Product Added Date</th>
                    <th>Product Keywords</th>
                 </tr>
             	<?php
                	include("../inc/db.php");
					$i=1;
					while($search_row=$display_pro->fetch()):
						echo"<tr style='height:20px'>
								<td><input type='checkbox' name='remove_pro[]' value='".$search_row['pro_id']."' style='height:15px; width:15px' /></td>
								<td>".$i++."</td>
								<td style='width:20px'><a href='edit_pro.php?edit_pro=".$search_row['pro_id']."'><span class='glyphicon glyphicon-edit'></span></a></td>
								<td><a href='delete_pro.php?delete_pro=".$search_row['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\"><span class='glyphicon glyphicon-trash'></span></a></td>
								<td>".$search_row['pro_name']."</td>
								<td style='width:150px'>
									<img src='data:image;base64,".$search_row['pro_img1']."' height='30px' width='30' />
									<img src='data:image;base64,".$search_row['pro_img2']."' height='30px' width='30' />
									<img src='data:image;base64,".$search_row['pro_img3']."' height='30px' width='30' />
									<img src='data:image;base64,".$search_row['pro_img4']."' height='30px' width='30' />
								</td>
								<td>".$search_row['pro_price']."</td>
								<td>".$search_row['pro_dis']."%</td>
								<td>".$search_row['pro_dis_price']."</td>
								<td>".$search_row['pro_feature1']."</td>
								<td>".$search_row['pro_feature2']."</td>
								<td>".$search_row['pro_feature3']."</td>
								<td>".$search_row['pro_feature4']."</td>
								<td>".$search_row['pro_feature5']."</td>
								<td>".$search_row['pro_qty']."</td>
								<td>".$search_row['pro_desc']."</td>
								<td>".$search_row['pro_color']."</td>
								<td>".$search_row['pro_model_no']."</td>
								<td>".$search_row['pro_box']."</td>
							
								<td>".$search_row['pro_warranty_type']."</td>
								
								<td>".$search_row['pro_added_date']."</td>
								<td>".$search_row['pro_keyword']."</td>
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