<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
 
    </head>

    <body>
        <div class="bodyright">
        	<form method="post" enctype="multipart/form-data">
        	<h4 class="title" style=" text-align:center; padding-right:100px; line-height:25px">View All Products
            	<span>
                    <ul>
                        <li><a href="#" style="text-align:center;"> Categorise Wise
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
            <form class="search" method="get" action="search_pro.php" enctype="multipart/form-data">
            	<input type="text" name="search_pro" placeholder="Search Product" style="padding-left:1%; width:70%" required /><input style="width:100px; background:#373F27; color:#fff" type="submit" value="Search" name="pro_query" />
            </form>
            <form id="viewallpro" method="post" enctype="multipart/form-data">
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
                            <th>Selling Price</th>
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
                        <?php include("../inc/function.php"); echo viewall_pro(); ?>
                </table>
                    <input type="submit" required="required" value="Remove" class="remove" style="width:100px; margin-left:0px" name="delete_pro" onClick="return confirm('Are You Sure ???')"/>
            </form>
            </center>
        </div><!--end of bodyright-->
    </body>
</html>

<?php echo delete_multi_pro(); ?>