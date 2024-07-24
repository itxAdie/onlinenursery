<html>
	<head>
		<link rel="icon" href="../img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

	</head>
	<body>
    	<div><?php include("../inc/header2.php"); ?></div>
        <div><?php include("nav.php"); ?></div>
		<div id="wrapper">
            <div id="bodyleft">
            	<div id="special_pro">
					<?php echo cat_name(); echo sub_cat_name(); ?>
                    <?php if(!isset($_GET['sub_cat'])){if(!isset($_GET['price'])){ ?>
                	<ul>
						<?php echo cat_page();
								 echo add_cart();
						?>
                    </ul>
                    <?php } } ?>
                    <ul><?php echo sub_cat_items();?></ul>
                   
                </div><!--End Of Special_pro--><br clear="all" />
            </div><!--End Of bodyleft-->
		  <div id="cat_bodyright">
            
            	<?php display_all_sub_cat();?>
           
                 
                <div style="margin-top:10px; width:100%;" id="bodyright">
                    
                    <ul>
                   
                        <a href="offerzone.php"><li style="margin-top:10px"><img src="../img/ads/adv1.jpg" /></li></a>
                        <a href="offerzone.php"><li><img src="../img/ads/adv2.jpg" /></li></a>
                        <a href="offerzone.php"><li><img src="../img/ads/adv3.jpg" /></li></a>
                      
                    </ul>
                </div><!--End Of BodyRight--><br clear="all" />
               
            </div>
		  <br clear="all" /><!--end of cat_bodyright-->
            <div><?php include("../inc/footer.php"); ?></div>
        </div><!--End Of Wrapper-->
	</body>
</html>``