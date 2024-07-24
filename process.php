<?php
	include("inc/db.php");
	$get_cat=$con->prepare("select * from main_cat where pro_maincat_id='24'");
	$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
	$get_cat->execute();
		
	while($row=$get_cat->fetch()):
		echo"<p>".$row['pro_maincat_name']."</p>";
	endwhile;

?>