<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
       
    </head>

    <body>
        <div class="bodyright">
        	<h4 class="title">View All On Demand Products</h4>
            <center>
            <form id="viewallpro" method="post" enctype="multipart/form-data">
                	<table>
                        <tr>
                        	<th style="background:#373F27">Select</th>
                            <th style="background:#373F27">No.</th>
                            <th style="background:#373F27">Edit</th>
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
                        <?php include("../inc/function.php"); echo wish_pro(); ?>
                </table>
                    <input type="submit" value="Remove" class="remove" style="width:100px; margin-left:0px" name="delete_pro" onClick="return confirm('Are You Sure ???')"/>
            </form>
            </center>
        </div><!--end of bodyright-->
    </body>
</html>

<?php echo delete_multi_pro();?>