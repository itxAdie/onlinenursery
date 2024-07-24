<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
       
    </head>
    <body>
    	<div class="bodyright">
        <h4 class="title">View All Postal Codes</h4>
        <form class="viewall_cat" method="post">
        	<center>
                <table>
                 <tr style="background:#373F27 !important">
                    	<th style="background:#373F27">Select</th>
                    	<th style="background:#373F27">Sr No.</th>
                        <th style="background:#373F27">Postalcode</th>
                        <th style="background:#373F27">City/Village Name</th>
                        <th style="background:#373F27">Edit</th>
                        <th style="background:#373F27">Delete</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_pincode();
						echo add_pincode();
						echo remove_multi_pincode();
					?>
                </table>
                <input class="remove" type="submit" name="remove_multi_pincode" onClick="return confirm('Are You Sure ???')" 
                value="Remove" /></td>
                </center>
                </form>
                <hr style="border:1px solid #400040">
                
			<form method="post" class="add_cat">
               <center>
                  <table style="margin-top:20px">
                     <tr>
                        <th colspan="5">Add New Postal Code</th>
                     </tr>
                     <tr style="background:#373F27">
                        <td style="width:200px"><input type="text" required="required" placeholder="Enter New PostalCode" name="pincode_no" /></td><br />
                        <td style="width:200px"><input type="text" required="required" placeholder="Enter City/Village Name" name="city_name" /></td>
                        <td><input class="remove" style="color:#FFF; margin-top:0px" type="submit" name="add_pincode" value="Add Pincode" /></td>
                     </tr>
                  </table>
               </center>
            </form>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>