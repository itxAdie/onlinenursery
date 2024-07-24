<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

	</head>
	<body>
    	<div class="bodyright">
            <form method="post" enctype="multipart/form-data">
              <center>
              		<table>
                        <tr>
                            <th colspan="3">Insert New Product</th>
                        </tr>
                    
                        <tr>
                            <td>Enter Product Name : </td>
                            <td><input type="text" required="required" name="pro_name" /></td>
                        </tr>
                        
                        <tr>
                            <td>Select Main Category : </td>
                            <td>
                                <select name="pro_main_cat">
                                	<option></option>
                                    <?php 
										include("../inc/function.php");
										echo display_all_main_cat();
									?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Select Sub Category Name : </td>
                            <td>
                                <select name="pro_sub_cat">
                                    <?php echo display_all_sub_cat(); ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Select Brand Name : </td>
                            <td>
                                <select name="pro_brand">
                                    <?php echo display_all_brands(); ?>
                                </select>
                            </td>
                        </tr>
                        
                      <tr> 
   <tr>
                            <td>Select Product Image1 : </td>
                            <td><input style="background:#fff; border:3px solid #373F27" required="required" type="file" name="pro_img1" /></td>
                        </tr>
                        
                        <tr>
                            <td>Select Product Image2 : </td>
                            <td><input style="background:#fff; border:3px solid #373F27"  required="required" type="file" name="pro_img2" /></td>
                        </tr>
                        
                        <tr>
                            <td>Select Product Image3 : </td>
                            <td><input style="background:#fff; border:3px solid #373F27" required="required" type="file" name="pro_img3" /></td>
                        </tr>
                        
                        <tr>
                            <td>Select Product Image4 : </td>
                            <td><input style="background:#fff; border:3px solid #373F27" required="required" type="file" name="pro_img4" /></td>
                        </tr> 
                        
                        <tr>
                            <td>Enter Product Price : </td>
                            <td><input type="text"  required="required" name="pro_price" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Discount (%) : </td>
                            <td><input type="text" name="pro_dis" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Feature1 : </td>
                            <td><input type="text" required="required" name="pro_feature1" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Feature2 : </td>
                            <td><input type="text" required="required" name="pro_feature2" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Feature3 : </td>
                            <td><input type="text"  required="required" name="pro_feature3" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Feature4 : </td>
                            <td><input type="text" name="pro_feature4" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Feature5 : </td>
                            <td><input type="text" name="pro_feature5" /></td>
                        </tr>
                        
                         <tr>
                            <td>Enter Product Quantity : </td>
                            <td><input type="text" required="required" name="pro_qty" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Description : </td>
                            <td><textarea name="pro_desc"></textarea></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Color : </td>
                            <td><input type="text" name="pro_color" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Model No. : </td>
                            <td><input type="text" name="pro_model_no" /></td>
                        </tr>
                        
                        <tr>
                            <td>In Product Box : </td>
                            <td><input type="text" name="pro_box" /></td>
                        </tr>
                        
                        <tr>
                            <td>Enter Product Warranty Type : </td>
                            <td><input type="text" name="pro_warranty_type" /></td>
                        </tr>
                        
                       
                        
                        <tr>
                            <td>Enter Product Keyword : </td>
                            <td><input type="text" name="pro_keyword" /></td>
                        </tr>
				</table>
                    	<center><input type="submit" value="Add Product" class="remove" style="width:200px ;float:none; margin-bottom:
                        10px;" name="insert" /></center>
               </center>
            </form>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>
<?php
	echo insert_pro();
?>