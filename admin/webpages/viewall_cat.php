<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

    </head>
    <body>
    	<div class="bodyright">
        <h4 class="title">View All Category</h4>
        <form class="viewall_cat" method="post">
        	<center>
                <table>
                 <tr>
                    	<th>Select</th>
                    	<th>Sr No.</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_maincat();
						echo add_main_cat();
						echo remove_multi_maincat();
					?>
                </table>
                <input class="remove" type="submit" name="remove_multi_maincat" onClick="return confirm('Are You Sure ???')" 
                value="Remove" /></td>
                </center>
                </form>
                <hr style="border:1px solid #373F27">
                
			<form method="post" class="add_cat">
               <center>
                  <table style="margin-top:20px">
                     <tr>
                        <th colspan="5">Add New Category</th>
                     </tr>
                     <tr style="background:#373F27">
                        <td style="width:220px">Enter New Category Name :</td>
                        <td style="width:200px"><input type="text"  required="required" name="pro_cat_name" placeholder="Enter Catagory Name" /></td>
                        <td><input class="remove" style="color:#FFF; margin-top:0px" type="submit" name="add_cat" value="Add Category" /></td>
                     </tr>
                  </table>
               </center>
            </form>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>