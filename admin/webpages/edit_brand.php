<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

 
		
	</head>
	<body>
    	<div id="wrapper">
            <div><?php include("../inc/bodyleft.php"); ?></div>
            <?php
				include("../inc/function.php");
                include("../inc/db.php");
            
                if(isset($_GET['edit_brand'])){
                    $brand_id=$_GET['edit_brand'];
                    $dispaly_brand=$con->prepare("select * from brand where pro_brand_id='$brand_id'");
                    $dispaly_brand->setFetchMode(PDO:: FETCH_ASSOC);
                    $dispaly_brand->execute();
                    
                    while($row=$dispaly_brand->fetch()):
                
            ?>
            <div class="bodyright">
            	<h4 style="background:#CDA34F; height:30px; color:#FFF; text-align:center; margin-top:10px; border-bottom:2px solid #400040">
                View All Brand</h4>
        <form class="viewall_cat" method="post">
        	<center>
                <table>
                 <tr>
                    	<th style="background:#373F27">Select</th>
                    	<th style="background:#373F27">Sr No.</th>
                        <th style="text-align:left;background:#373F27">Category Name</th>
                        <th style="background:#373F27">Edit</th>
                        <th style="background:#373F27">Delete</th>
                    </tr>
                    <?php
						echo display_all_maincat();
						echo remove_multi_maincat();
					?>
                </table>
                <input class="remove" type="submit" name="remove_multi_maincat" onClick="return confirm('Are You Sure ???')" 
                value="Remove" /></td>
                </center>
                </form>
                <hr style="border:1px solid #400040">

                <form method="post" class="add_cat" action="edit_brand.php?edit_form=<?php echo $row['pro_brand_id']; ?>">
                    <center>
                        <table style="margin-top:50px">
                            <tr>
                                <th colspan="5">Edit Brand</th>
                            </tr>
                            <tr>
                            	<td style="width:60px"></td>
                                <td>Update Brand</td>
                                <td style="width:200px">
                                	<input type="text" name="pro_brand_name" value="<?php echo $row['pro_brand_name']; ?>" />
                                </td>
                                <td style="width:200px">
                                	<input class="remove" style="width:150px; margin-top:0px; color:#FFF" type="submit" name="update_brand" value="Update Brand" />
                                </td>
                            </tr>
                            <?php endwhile; } ?>
                        </table>
                    </center>
                </form>
            </div><!--end of bodyright--><br clear="all" />
        </div><!--end of wrapper-->
   </body>
</html>
<?php echo edit_brand(); ?>