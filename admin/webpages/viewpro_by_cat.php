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
        	<form method="post" enctype="multipart/form-data">
            <?php
            	include("../inc/db.php");
				if(isset($_GET['viewpro_by_cat'])){
					$cat_id=$_GET['viewpro_by_cat'];
					$cat_name=$con->prepare("select * from main_cat where pro_maincat_id='$cat_id'");
					$cat_name->setFetchMode(PDO:: FETCH_ASSOC);
					$cat_name->execute();
					$row_cat=$cat_name->fetch();
					$pro_cat_name=$row_cat['pro_maincat_name'];
					echo"<h2 class='title' style='font-size:15px; margin-left:-45px;'> ".$pro_cat_name." </h2>";
					$view_by_cat=$con->prepare("select * from product where pro_maincat_id='$cat_id' order by 1 DESC");
					$view_by_cat->setFetchMode(PDO:: FETCH_ASSOC);
					$view_by_cat->execute();
					$count=$view_by_cat->rowCount();
					$i=1;
				}
			?>
            	<span>
                    <ul>
                        <li><a href="#" style="float:right"> Categorise Wise
                        	<ul>
								<?php
                                    include("../inc/db.php");
                                    $select_main_cat=$con->prepare("Select * From main_cat");
                                    $select_main_cat->setFetchMode(PDO:: FETCH_ASSOC);
                                    $select_main_cat->execute();                                   
                                    while($row=$select_main_cat->fetch()){
                                        $pro_main_cat_id=$row['pro_maincat_id'];
                                        $pro_main_cat_name=$row['pro_maincat_name'];
                                        echo "<li><a href='viewpro_by_cat.php?viewpro_by_cat=".$pro_main_cat_id."'>".$pro_main_cat_name."</a></li>";
                                    }
                                ?>
                        	</ul>
                        </a></li>
                    </ul>
                </span>
            </form>
            </h4>
        	<center>
            <form id="viewallpro" method="post" enctype="multipart/form-data">
            	<?php echo"<p style='color:#fff; font-weight:bold'>Total ".$count." Record Are Found</p>"; ?>
                	<table>
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
                            <th>Product Warranty</th>
                            <th>Product Added Date</th>
                            <th>Product Keywords</th>
                        </tr>
                        <?php
								while($row_Cat=$view_by_cat->fetch()):
								echo"<tr style='height:20px'>
										<td><input type='checkbox' name='remove_pro[]' value='".$row_Cat['pro_id']."' style='height:15px; width:15px' /></td>
										<td>".$i++."</td>
										<td style='width:20px'><a href='edit_pro.php?edit_pro=".$row_Cat['pro_id']."'><span class='glyphicon glyphicon-edit'></span></a></td>
										<td><a href='delete_pro.php?delete_pro=".$row_Cat['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\"><span class='glyphicon glyphicon-trash'></span></a></td>
										<td>".$row_Cat['pro_name']."</td>
										<td style='width:150px'>
											<img src='data:image;base64,".$row_Cat['pro_img1']."' height='30px' width='30' /> 
											<img src='data:image;base64,".$row_Cat['pro_img2']."' height='30px' width='30' />
											<img src='data:image;base64,".$row_Cat['pro_img3']."' height='30px' width='30' />
											<img src='data:image;base64,".$row_Cat['pro_img4']."' height='30px' width='30' />
										</td>
										<td>".$row_Cat['pro_price']."</td>
										<td>".$row_Cat['pro_dis']."%</td>
										<td>".$row_Cat['pro_dis_price']."</td>
										<td>".$row_Cat['pro_feature1']."</td>
										<td>".$row_Cat['pro_feature2']."</td>
										<td>".$row_Cat['pro_feature3']."</td>
										<td>".$row_Cat['pro_feature4']."</td>
										<td>".$row_Cat['pro_feature5']."</td>
										<td>".$row_Cat['pro_qty']."</td>
										<td>".$row_Cat['pro_desc']."</td>
										<td>".$row_Cat['pro_color']."</td>
										<td>".$row_Cat['pro_model_no']."</td>
										<td>".$row_Cat['pro_box']."</td>
										<td>".$row_Cat['pro_warranty_type']."</td>
									   <td>".$row_Cat['pro_added_date']."</td>
										<td>".$row_Cat['pro_keyword']."</td>
									</tr>";
								endwhile;	
					?>
                </table>
                    <input type="submit" value="Remove" class="remove" style="width:100px; margin-left:0px" name="delete_pro" onClick="return confirm('Are You Sure ???')"/>
            </form>
            </center>
        </div><!--end of bodyright--><br clear="all" />
        </div>
   </body>
</html>

<?php
	include("../inc/function.php");
    echo delete_multi_pro();
?>