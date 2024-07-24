<?php
	include("db.php");
	
	if(!isset($_GET['add_pro']) && !isset($_GET['add_cat']) && !isset($_GET['viewall_cat']) &&
		!isset($_GET['viewall']) && !isset($_GET['viewall_brand']) && !isset($_GET['viewall_sub_cat']) &&
		!isset($_GET['pin']) && !isset($_GET['viewall_customer']) && !isset($_GET['viewall_order']) &&
		!isset($_GET['img_slider']) && !isset($_GET['viewpro_by_cat']) && 
		!isset($_GET['viewall_c_order']) && !isset($_GET['viewall_p_order']) && 
		!isset($_GET['out_stock']) && !isset($_GET['dis_pro']) && !isset($_GET['wish_pro'])){
?>
	<div class="bodyright">
    	<h4 class="title" style="line-height:15px; margin-top:px;">OVERVIEW</h4>
        <?php include("function.php"); echo overview();?>	
    </div><br clear="all" />
<?php } ?>