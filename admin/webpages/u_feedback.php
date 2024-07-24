<?php session_start(); ?>
<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
        
    </head>
    <div id="wrapper">
        	<div><?php include("../inc/header.php"); ?></div>
			<div><?php include("../inc/bodyleft.php"); ?></div>
    <body>
    	<div class="bodyright">
        	<center>
        		<h4 class="title">User's Feedback</h4>
        		<form id="viewallpro" method="post">
                <table style="width:1200px">
                 <tr>
                    	<th>Sr No.</th>
                        <th>Query Name</th>
                        <th>User Name</th>
                        <th>User E-mail</th>
                        <th>User Phone No</th>
                        <th>User Message</th>   
                        <th>Registration Date</th>
                    </tr>
                    <?php
						include("../inc/function.php"); 
						echo display_all_feedback();
					?>
                </table>
                </form>
         	</center>
        </div><!--end of bodyright--><br clear="all" />
    </body>
</html>_