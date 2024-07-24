<html>
    <head>
    <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
    	<title>Img_slider</title>
        <link rel="stylesheet" href="../css/style.css" />
         
       
	</head>
	<body>
    	<div id="wrapper">
           <div class="bodyright">
        		<h4 style="background:#CDA34F; height:40px !important; line-height:40px !important; color:#FFF; text-align:center; border-bottom:2px solid #636B46; font-weight:bold; margin-top:-10px;">Edit Image Slider</h4>
                <form method="post" enctype="multipart/form-data">
                	<table>
                    	<tr>
                        	<td>Select Slide Image : </td>
                            <td><input style="border:1px solid #000;"type="file" required="required" name="slide1" /></td>
                            <td><input id="img" type="submit" name="up_slide1" value="Update" /></td>
                        </tr>
                
                    </table>
                </form>
           </div><br clear="all" />
        </div><!--end of wrapper-->
   </body>
</html>
<?php include("../inc/function.php"); echo img_slider(); ?>