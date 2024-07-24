<html>
	<head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
		<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
      
        
	</head>
	<body>
            <div class="bodyright">
            	<h4 class="title" style="line-height:35px">View All Sub Categories</h4>
                <form class="viewall_cat" method="post">
        	<center>
                <table style="background:#636B46">
                 <tr>
                    	<th >Select</th>
                    	<th>Sr No.</th>
                        <th >Sub Category Name</th>
                        <th>Edit</th>
                        <th >Delete</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_subcat();
						echo add_sub_cat();
						echo remove_multi_subcat();
					?>
                </table >
                <input class="remove" type="submit" name="remove_multi_subcat" onClick="return confirm('Are You Sure ???')" 
                value="Remove" /></td>
                </center>
                </form>
                <hr style="border:1px solid #373F27">
                	<center>
          <form  id="viewall_sub_cat" method="post" enctype="multipart/form-data" style=" width:80%; margin-right:10%;">
                    	<table  style="margin-top:25px;">
                        <tr>
                        <th colspan="5" style="background:#636B46">Add New Sub Category</th>
                       </tr>
                        	<tr style="background:#373F27">
                            	<td>Select Main Category :</td>
                                <td>
                                	<select name="main_cat">
                                    	<?php 
											echo display_all_main_cat(); 
										?>
                                    </select>
                                </td>
                             </tr>
                             <tr style="background:#373F27">
                                <td>Add  New Sub Category :</td>
                                <td><input type="text" name="sub_cat" required="required" placeholder="Enter Sub_catagory Name" /></td>
                             </tr>
                       </table>
                       <button class="remove" style="width:150px; margin-left:2%; margin-bottom:10px;" name="add_sub_cat">Add Sub Category</button>
                    </form>
                    </center>
            </div>
	</body>
</html>