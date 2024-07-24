<div id="nav">
  <ul>
     <li style="margin-left:5% ; color:#fff"><a href="#">CATEGORIES</a>
        <ul>
            <?php 
				include("../inc/db.php");
				$cat_display=$con->prepare("select * from main_cat");
				$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
				$cat_display->execute();
						
				while($row=$cat_display->fetch()):
					$cat_name=$row['pro_maincat_name'];
					echo"<li><a style='font-size:14px;' href='categories.php?cat_page=".$row['pro_maincat_id']."'>".$row['pro_maincat_name']."</a></li>";
				endwhile; 
			?>
        </ul>
     </li>
     
     
    
     
      <li><a href="#"> BRANDS</a>
     	<ul>
        	<?php
         		include("../inc/db.php");
				$cat_display=$con->prepare("select * from brand");
				$cat_display->setFetchMode(PDO:: FETCH_ASSOC);
				$cat_display->execute();
								
				while($row=$cat_display->fetch()):
					echo"<li><a style='font-size:14px;' href='brands.php?brand_page=".$row['pro_brand_id']."'>".$row['pro_brand_name']."</a></li>";
				endwhile;   
			?>
           
        </ul>
     </li>
      <li id="new"><a href="aboutus.php">About US</a></li>
      <li><a href="../webpages/contact_us.php">COntact us</a></li>
  </ul>
  
</div><!--End Of Nav-->