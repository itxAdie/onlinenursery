<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
    
    </head>
    <body>
    	<div class="bodyright">
        <h4 class="title">View All Brands</h4>
        	<form class="viewall_cat" method="post">
            	<center>
                <table>
                    <tr>
                    	<th style="padding-left:5px; background:#373F27">Select</th>
                    	<th style="background:#373F27">Sr No.</th>
                        <th style="text-align:left; background:#373F27">Brand Name</th>
                        <th style="background:#373F27">Edit</th>
                        <th style="background:#373F27">Delete</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_brand();
						echo add_new_brand();
						echo remove_multi_brand();
				?>
                    
                </table>
                <input class="remove" type="submit" name="remove_multi_brand" onClick="return confirm('Are You Sure ???')" value="Remove" />
                </center>
                </form>
                <hr style="border:1px solid #373F27 ">
                <form method="post" class="add_cat">
               <center>
                  <table style="margin-top:20px">
                     <tr>
                        <th colspan="5">Add New Brand</th>
                     </tr>
                     <tr style="background:#373F27">
                        <td style="width:220px">Enter New Brand Name :</td>
                        <td style="width:200px"><input required="required" type="text" name="pro_brand_name" placeholder="Enter Brand Name"/></td>
                        <td><input class="remove" style="color:#FFF; margin-top:0px" type="submit" name="add_brand" value="Add Brand" /></td>
                     </tr>
                  </table>
               </center>
               </form>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>