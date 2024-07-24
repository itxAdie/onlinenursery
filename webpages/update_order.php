<?php
	include("../inc/db.php");
	
	if(isset($_GET['up_order'])){
		$up_id=$_GET['up_order'];
		$status1='Complete';
		$select=$con->prepare("select * from order_detail where order_id='$up_id' AND status='$status1'");
		$select->setFetchMode(PDO:: FETCH_ASSOC);
		$select->execute();
		if($select->rowCount()==1){
			echo"<script>alert('This Order Is Completed You Cannot Cancel This Order');</script>";
			echo"<script>window.open('user_profile.php?my_order','_self');</script>";
		}else{
			$status="Cancelled";
			$up_order=$con->prepare("update order_detail set status='$status' where order_id='$up_id'");
			$up_order->execute();
	
			if($up_order){
				echo"<script>alert('Order Cancelled SuccessFully');</script>";
				echo"<script>window.open('user_profile.php?my_order','_self');</script>";
			}
		}
	}
?>