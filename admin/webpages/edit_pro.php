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
            <?php
                include("../inc/function.php");
                include("../inc/db.php");
                $edit_id=@$_GET['edit_pro'];
                
                $display_pro=$con->prepare("select * from product where pro_id='$edit_id'");
                $display_pro->setFetchMode(PDO:: FETCH_ASSOC);
                $display_pro->execute();
                
                while($row=$display_pro->fetch()):
					$pro_id=$row['pro_id'];
                    $pro_main_cat_id=$row['pro_maincat_id'];
                    $pro_sub_cat_id=$row['pro_subcat_id'];
                    $pro_brand_id=$row['pro_brand_id'];
            ?>
            <div class="bodyright">
                <form method="post" enctype="multipart/form-data">
                  <center>
                        <table>
                            <tr>
                                <th colspan="3">Edit Product</th>
                            </tr>
                        
                            <tr>
                                <td>Update Product Name : </td>
                                <td><input type="text" name="pro_name" value="<?php echo $row['pro_name']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Main Category : </td>
                                <td>
                                    <select name="pro_main_cat">
                                        <?php
                                            include("../inc/db.php");
                                               //display single main cat
                                                    $display_main_cat_name=$con->prepare("select * from main_cat where pro_maincat_id='$pro_main_cat_id'");
                                                    $display_main_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
                                                    $display_main_cat_name->execute();
                                                    
                                                    while($row_main_cat=$display_main_cat_name->fetch()){
                                                        $pro_main_cat_name=$row_main_cat['pro_maincat_name'];
                                                        
                                                        echo "<option value='$pro_main_cat_id'>$pro_main_cat_name</option>";	
                                                    }
                                            //display all man cat
                                                echo display_all_main_cat();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Sub Category Name : </td>
                                <td>
                                    <select name="pro_sub_cat">
                                        <?php
                                            include("../inc/db.php");
                                            //display single sub cat
                                                    $display_sub_cat_name=$con->prepare("select * from sub_cat where pro_subcat_id='$pro_sub_cat_id'");
                                                    $display_sub_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
                                                    $display_sub_cat_name->execute();
                                                    
                                                    while($row_sub_cat=$display_sub_cat_name->fetch()){
                                                        $pro_sub_cat_name=$row_sub_cat['pro_subcat_name'];
                                                        
                                                        echo "<option value='$pro_sub_cat_id'>$pro_sub_cat_name</option>";	
                                                    }
                                            //display all sub cat
                                            echo display_all_sub_cat();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Brand Name : </td>
                                <td>
                                    <select name="pro_brand">
                                         <?php 
                                            include("../inc/db.php");
                                            //display single brand
                                                    $display_brand_name=$con->prepare("select * from brand where pro_brand_id='$pro_brand_id'");
                                                    $display_brand_name->setFetchMode(PDO:: FETCH_ASSOC);
                                                    $display_brand_name->execute();
                                                    
                                                    while($row_brand=$display_brand_name->fetch()){
                                                        $pro_brand_name=$row_brand['pro_brand_name'];
                                                        echo "<option value='$pro_brand_id'>$pro_brand_name</option>";	
                                                    }
                                            //display all sub cat
                                            echo display_all_brands();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Image1 : </td>
                             
                                <td>
                                    <img src="data:image;base64,<?php echo $row['pro_img1']; ?>" width="40" height="40" /> 
                                   	<a href="up_img.php?img1=<?php echo $row['pro_id']; ?>">Update Image 1</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Image2 : </td>
                               <td>
                                    <img src="data:image;base64,<?php echo $row['pro_img2']; ?>" width="40" height="40" />
                                    <a href="up_img.php?img2=<?php echo $row['pro_id']; ?>">Update Image 2</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Image 3 : </td>
                               <td>
                                    <img src="data:image;base64,<?php echo $row['pro_img3']; ?>" width="40" height="40"/>
                                    <a href="up_img.php?img3=<?php echo $row['pro_id']; ?>">Update Image 3</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Image4 : </td>
                               <td>
                                   <img src="data:image;base64,<?php echo $row['pro_img4']; ?>" width="40" height="40" />
                                   <a href="up_img.php?img4=<?php echo $row['pro_id']; ?>">Update Image 4</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Price : </td>
                                <td><input type="text" name="pro_price" value="<?php echo $row['pro_price']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Discount : </td>
                                <td><input type="text" name="pro_dis" value="<?php echo $row['pro_dis']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Feature1 : </td>
                                <td><input type="text" name="pro_feature1" value="<?php echo $row['pro_feature1']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Feature2 : </td>
                                <td><input type="text" name="pro_feature2" value="<?php echo $row['pro_feature2']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Feature3 : </td>
                                <td><input type="text" name="pro_feature3" value="<?php echo $row['pro_feature3']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Feature4 : </td>
                                <td><input type="text" name="pro_feature4" value="<?php echo $row['pro_feature4']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Feature5 : </td>
                                <td><input type="text" name="pro_feature5" value="<?php echo $row['pro_feature5']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Quantity : </td>
                                <td><input type="text" name="pro_qty" value="<?php echo $row['pro_qty']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Description : </td>
                                <td><textarea name="pro_desc"><?php echo $row['pro_desc']; ?></textarea></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Color : </td>
                                <td><input type="text" name="pro_color" value="<?php echo $row['pro_color']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Model No. : </td>
                                <td><input type="text" name="pro_model_no" value="<?php echo $row['pro_model_no']; ?>" /></td>
                            </tr>
                            
                            <tr>
                                <td>Update Product Box : </td>
                                <td><input type="text" name="pro_box" value="<?php echo $row['pro_box']; ?>" /></td>
                            </tr>
                            
                            
                            
                            <tr>
                                <td>Update Product Warranty Type : </td>
                                <td><input type="text" name="pro_warranty_type" value="<?php echo $row['pro_warranty_type']; ?>"/></td>
                            </tr>
                            
                            
                            <tr>
                                <td>Update Product Keyword : </td>
                                <td><input type="text" name="pro_keyword" value="<?php echo $row['pro_keyword']; ?>"/></td>
                            </tr>
                    </table>
                    <center><input type="submit" value="Update Product" class="remove" style="width:200px ;float:none; margin-bottom:
                        10px;" name="update" /></center>
                   </center>
                </form>
                <?php endwhile; ?>
            </div><!--end of bodyright--><br clear="all" />
         </div><!--end of wrapper-->
    </body>
</html>
<?php
	echo edit_pro();
?>