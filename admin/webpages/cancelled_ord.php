<html>
    <head>
    	<link rel="icon" href="../../img/logo1.gif" type="image/gif" />
        <title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
       
    </head>
    <body>
    	<div class="bodyright">
       	<h4 class="title">View All Cancelled Orders</h4>
        <center>
        <form id="viewallcustomer" method="post">
                <table style="width:900px">
                 <tr>
                    	<th style="background:#373F27; width:35px;">Sr No.</th>
                        <th style="background:#373F27; min-width:100px;">Customer Email</th>
                        <th style="background:#373F27; min-width:100px;">Product Image</th>
                        <th style="background:#373F27; min-width:100px;">Product Name</th>
                        <th style="background:#373F27; width:20px;">Quantity</th>
                        <th style="background:#373F27; width:100px;">Invoice No.</th>
                        <th style="background:#373F27; width:100px;">Order Date</th>
                    </tr>
                    <?php
						include("../inc/function.php");
						echo view_cancel_order();
					?>
                </table>
                </form>
         	</center>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>