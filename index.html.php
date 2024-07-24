          <html><head>
	<link rel="icon" href="img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="css/style.css" />

        <script>
			function checkTextField(field) {
				if (field.value == '') {
					alert("Please FillOut This Field First");
				}
			}
        </script>
	</head>
	<body>
    	<?php
        	include("inc/db.php");
			$web_count=$con->prepare("update web_count set web_count=web_count+1");
			$web_count->execute();
		?>
    	<div><?php include("inc/header.php"); ?></div>
        <div><?php include("inc/nav.php"); ?></div>
		<div id="wrapper">
            <div><?php include("inc/bodyleft.php"); ?></div> 
			<div><?php include("inc/bodyright.php"); ?></div>
        </div><!--End Of Wrapper--> <br clear="all" />
        <div><?php include("inc/footer.php"); ?></div>
	</body>
</html>