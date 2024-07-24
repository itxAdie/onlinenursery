<html>
	<head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
		<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
  
	</head>
	<body>
		<div id="wrapper" style="background:#fff">
        	<div class="header">
            	<h3>Tech<span style="color:#636B46">Store</span></h3>
            </div><!--end of header--><br clear="all" />
			<div id="invoice">
            	<?php include("../inc/function.php"); echo invoice_gen(); ?>
                <button id="img" onClick="window.print()">Print</button>
            </div>
        </div><!--End Of Wrapper-->
	</body>
</html>