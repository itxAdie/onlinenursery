<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
        
    </head>
    <body>
    	<div class="bodyright">
        	<center>
        		<h4 class="title">View All Customers</h4>
            	<form class="search" method="get" action="search_cust.php" enctype="multipart/form-data">
            		<input type="text" name="search_c" required="required" placeholder="Search Customer" style="padding-left:1%; width:70%" required /><input style="width:100px; background:#373F27; color:#fff" type="submit" value="Search" name="u_query" />
            	</form>
        		<form id="viewallpro" method="post">
                <table style="width:1200px">
                 <tr>
                    	<th>Sr No.</th>
                        <th>User Name</th>
                        <th>User E-Mail</th>
                        <th>User Phone No</th>
                        <th>User Password</th>
                        <th>User City</th>
                        <th>User Postalcode</th>
                        <th>User Address</th>
                        <th>User DOB</th>   
                        <th>Registration Date</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_customer();
					?>
                </table>
                </form>
         	</center>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>_