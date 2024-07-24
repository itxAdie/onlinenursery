<?php
	include("../inc/db.php");
	if(isset($_GET['ord'])){
		$order_id=$_GET['ord'];
		$update_stat=$con->prepare("update order_detail set status='Complete' where order_id='$order_id'");
		
			if($update_stat->execute()){
				echo "<script>window.open('index.php?viewall_order','_self');</script>";	
			}
			else{
				echo "<script>alert('Try');</script>";	
			}
	}
?>