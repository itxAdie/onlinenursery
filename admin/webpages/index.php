<?php
	session_start();
	if(!isset($_SESSION['a_email'])){
		echo "<script>window.open('login.php','_self');</script>";	
	}
?>
<html>
	<head>
		<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
         <script>
			function checkTextField(field) {
				if (field.value == '') {
					alert("Please FillOut This Field First");
				}
			}
        </script>
	</head>
	<body>
		<div id="wrapper">
        	<div><?php include("../inc/header.php"); ?></div>
			<div><?php include("../inc/bodyleft.php"); ?></div>
            <div><?php include("../inc/bodyright.php"); ?></div><br clear="all" />
        </div><!--End Of Wrapper-->
	</body>
</html>