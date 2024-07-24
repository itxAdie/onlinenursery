<?php	
	$on=$_GET["uq"];
	if($on==""){}else{
		include("../inc/db.php");
		$ad_search=$con->prepare("select * from product where pro_name like('%$on%')");
		$ad_search->setFetchMode(PDO:: FETCH_ASSOC);
		$ad_search->execute();
		echo "<ul id='a_search'>";
		while($row_pro=$ad_search->fetch()):
			echo"<li>
					<a href='pro_detail.php?pro_id=".$row_pro['pro_id']."'>
						<img src='data:image;base64,".$row_pro['pro_img1']."' />
						".$row_pro['pro_name']."
					</a>
				</li>";
		endwhile;
		echo"</ul>";
	}
?>
