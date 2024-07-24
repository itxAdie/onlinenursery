<?php
	//start of product script
	function overview(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
			$all_pro=$con->prepare("select * from product");
			$all_pro->setFetchMode(PDO:: FETCH_ASSOC);
			$all_pro->execute();
				
			$pro_count=$all_pro->rowCount();
			echo"<div  id='part'>
					<h5>Total Products = $pro_count </h5>
					<br clear='all' />
					<p><a href='../webpages/index.php?viewall'>View More </a></p>
				</div>";
					
			$all_cat=$con->prepare("select * from main_cat");
			$all_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$all_cat->execute();
				
			$cat_count=$all_cat->rowCount();
			echo"<div  id='part'>
					<h5>Total Category = $cat_count</h5>
					<br clear='all' />
           			<p style='background:#373F27'><a href='../webpages/index.php?viewall_cat'>View More </a></p>	
				</div>";
		
			$all_brand=$con->prepare("select * from brand");
			$all_brand->setFetchMode(PDO:: FETCH_ASSOC);
			$all_brand->execute();
				
			$brand_count=$all_brand->rowCount();
			echo"<div id='part'>
					<h5> Total available Brands  = $brand_count</h5>
					<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?viewall_brand'>View More </a></p>
				</div>";
			
			$all_order=$con->prepare("select * from order_detail where status='Complete'");
			$all_order->setFetchMode(PDO:: FETCH_ASSOC);
			$all_order->execute();
				
			$all_order_count=$all_order->rowCount();
			echo"<div  id='part'>
					<h5>Total Orders Shipped = $all_order_count</h5>
					<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?viewall_order'>View More</a></p>
        		</div>";
			
			$order_padding=$con->prepare("select * from order_detail where status='In Process'");
			$order_padding->setFetchMode(PDO:: FETCH_ASSOC);
			$order_padding->execute();
				
			$order_padding_count=$order_padding->rowCount();
			echo"<div  id='part'>
					<h5>Total Orders Pending = $order_padding_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?viewall_p_order'>View More</a></p>
        		</div>";
				
			$order_cancel=$con->prepare("select * from order_detail where status='Cancelled'");
			$order_cancel->setFetchMode(PDO:: FETCH_ASSOC);
			$order_cancel->execute();
				
			$order_cancel_count=$order_cancel->rowCount();
			echo"<div  id='part'>
					<h5>Total Order Cancelled = $order_cancel_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?viewall_c_order'>View More </a></p>
        		</div>";
				
			$all_out_stock=$con->prepare("select * from product where pro_qty<1");
			$all_out_stock->setFetchMode(PDO:: FETCH_ASSOC);
			$all_out_stock->execute();
				
			$out_stock_count=$all_out_stock->rowCount();
			echo"<div  id='part'>	
					<h5>Out Of Stock Items = $out_stock_count</h5>
					<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?out_stock'>View More</a></p>
        		</div>";
			
			$all_cust=$con->prepare("select * from users");
			$all_cust->setFetchMode(PDO:: FETCH_ASSOC);
			$all_cust->execute();
				
			$all_cust_count=$all_cust->rowCount();
			echo"<div  id='part'>
					<h5>Total Customer = $all_cust_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?viewall_customer'>View More </a></p>
        		</div>";
			
			$pro_dis=$con->prepare("select * from product where pro_dis>0");
			$pro_dis->setFetchMode(PDO:: FETCH_ASSOC);
			$pro_dis->execute();
				
			$pro_dis_count=$pro_dis->rowCount();
			echo"<div  id='part'>
					<h5>Discount Products = $pro_dis_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?dis_pro'>View More</a></p>
        		</div>";

			$wishlist=$con->prepare("select * from user_wishlist");
			$wishlist->setFetchMode(PDO:: FETCH_ASSOC);
			$wishlist->execute();
				
			$wishlist_count=$wishlist->rowCount();
			echo"<div  id='part'>
					<h5>Wishlist Products = $wishlist_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?wish_pro'>View More</a></p>
        	</div>";
			
			$pincode=$con->prepare("select * from pincode");
			$pincode->setFetchMode(PDO:: FETCH_ASSOC);
			$pincode->execute();
				
			$pincode_count=$pincode->rowCount();
			echo"<div id='part'>
					<h5>Shipping Locations = $pincode_count</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?pin'>View More</a></p>
        	</div>";
			
		 $web_count=$con->prepare("select * from web_count");
			$web_count->setFetchMode(PDO:: FETCH_ASSOC);
			$web_count->execute();
				
			$web_counter=$web_count->fetch();
			echo"<div  id='part'>
					<h5>Pageviews = ".$web_counter['web_count']."</h5>
        			<br clear='all' />
            		<p style='background:#373F27'><a href='../webpages/index.php?pin'>View More </a></p>
        	</div>";
			
			
			$all_pro=$con->prepare("select * from feedback");
			$all_pro->setFetchMode(PDO:: FETCH_ASSOC);
			$all_pro->execute();
			$pro_count=$all_pro->rowCount();
			echo"<div  id='part' style='margin-left:380px;'>
					<h5>Total feedback = $pro_count </h5>
					<br clear='all' />
					<p><a href='../webpages/u_feedback'>View More </a></p>
				</div>";
			
	}
	
	function insert_pro(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		
		if(isset($_POST['insert'])){
			$pro_name=$_POST['pro_name'];
			$pro_main_cat=$_POST['pro_main_cat'];
			$pro_sub_cat=$_POST['pro_sub_cat'];
			$pro_brand=$_POST['pro_brand'];
			
			$pro_img1=file_get_contents($_FILES['pro_img1']['tmp_name']);
			$img1=base64_encode($pro_img1);
			
			$pro_img2=file_get_contents($_FILES['pro_img2']['tmp_name']);
			$img2=base64_encode($pro_img2);
			
			$pro_img3=file_get_contents($_FILES['pro_img3']['tmp_name']);
			$img3=base64_encode($pro_img3);
			
			$pro_img4=file_get_contents($_FILES['pro_img4']['tmp_name']);
			$img4=base64_encode($pro_img4);
			
			$pro_price=$_POST['pro_price'];
			$pro_dis=$_POST['pro_dis'];
	        $pro_dis_price = $pro_price - ($pro_price * $pro_dis /100);
			$pro_feature1=$_POST['pro_feature1'];
			$pro_feature2=$_POST['pro_feature2'];
			$pro_feature3=$_POST['pro_feature3'];
			$pro_feature4=$_POST['pro_feature4'];
			$pro_feature5=$_POST['pro_feature5'];
			$pro_qty=$_POST['pro_qty'];
			
			$pro_desc=$_POST['pro_desc'];
			$pro_color=$_POST['pro_color'];
			$pro_model_no=$_POST['pro_model_no'];
			$pro_box=$_POST['pro_box'];
			
			$pro_warranty_type=$_POST['pro_warranty_type'];
		
			$pro_keyword=$_POST['pro_keyword'];
			
			$insert=$con->prepare("INSERT INTO `product`(`pro_name`, `pro_maincat_id`, `pro_subcat_id`, `pro_brand_id`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_price`, `pro_dis`, `pro_dis_price`, `pro_feature1`, `pro_feature2`, `pro_feature3`, `pro_feature4`, `pro_feature5`, `pro_qty`, `pro_desc`, `pro_color`, `pro_model_no`, `pro_box`, `pro_warranty_type`, `pro_added_date`, `pro_keyword`,`pro_view` ) VALUES ('$pro_name','$pro_main_cat','$pro_sub_cat','$pro_brand','$img1','$img2','$img3','$img4','$pro_price','$pro_dis','$pro_dis_price','$pro_feature1','$pro_feature2','$pro_feature3','$pro_feature4','$pro_feature5','$pro_qty','$pro_desc','$pro_color','$pro_model_no','$pro_box','$pro_warranty_type',NOW(),'$pro_keyword','1')");	
			
			
			if($insert->execute()){
				echo "<script>alert('Product Added Successfully')</script>";
				echo "<script>window.open('../webpages/index.php?viewall=viewall','_self');</script>";
			}
			else{
				echo"<script>alert('Please Try Again !!!');</script>";
			}
		}	
	}
	
function edit_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['update'])){
		$update_id=$_GET['edit_pro'];
		
		$pro_name=$_POST['pro_name'];
		$pro_main_cat=$_POST['pro_main_cat'];
		$pro_sub_cat=$_POST['pro_sub_cat'];
		$pro_brand=$_POST['pro_brand'];
		
		$pro_price=$_POST['pro_price'];
		$pro_dis=$_POST['pro_dis'];
		$pro_sell_price = $pro_price - ($pro_price * $pro_dis /100);
		$pro_feature1=$_POST['pro_feature1'];
		$pro_feature2=$_POST['pro_feature2'];
		$pro_feature3=$_POST['pro_feature3'];
		$pro_feature4=$_POST['pro_feature4'];
		$pro_feature5=$_POST['pro_feature5'];
		$pro_qty=$_POST['pro_qty'];
			
		$pro_desc=$_POST['pro_desc'];
		$pro_color=$_POST['pro_color'];
		$pro_model_no=$_POST['pro_model_no'];
		$pro_box=$_POST['pro_box'];
		
		$pro_warranty_type=$_POST['pro_warranty_type'];
		
		$pro_keyword=$_POST['pro_keyword'];
		
		$update_pro=$con->prepare("update product set pro_name='$pro_name',pro_maincat_id='$pro_main_cat',pro_subcat_id='$pro_sub_cat',pro_brand_id='$pro_brand',pro_price='$pro_price',pro_dis='$pro_dis',pro_dis_price='$pro_sell_price',pro_feature1='$pro_feature1',pro_feature2='$pro_feature2',pro_feature3='$pro_feature3',pro_feature4='$pro_feature4',pro_feature5='$pro_feature5',pro_qty='$pro_qty',pro_desc='$pro_desc',pro_color='$pro_color',pro_model_no='$pro_model_no',pro_box='$pro_box',pro_warranty_type='$pro_warranty_type',pro_keyword='$pro_keyword',pro_added_date=NOW() where pro_id='$update_id'");

		if($update_pro->execute()){
			echo"<script>alert('Product Updated Successfully');</script>";
			echo"<script>window.open('index.php?viewall=viewall','_self');</script>";
		}
		else{
			echo"<script>alert('Please Try Again !!!');</script>";
			echo"<script>window.open('index.php?viewall=viewall','_self');</script>";
		}
	}
}

function img_update(){
	if(isset($_GET['img1'])){
			include("../inc/db.php");
			$pro_id=$_GET['img1'];
			$img1=$con->prepare("select * from product where pro_id='$pro_id'");
			$img1->setFetchMode(PDO:: FETCH_ASSOC);
			$img1->execute();
			
			$row_img1=$img1->fetch();
			$pro_img1=$row_img1['pro_img1'];
			echo "<img src='data:image;base64,$pro_img1' width='100px' height='100px' />";
			echo "<form method='post' enctype='multipart/form-data'>
					<input style='border:1px solid' type='file' name='img1' />
					<input type='submit' name='up_img1' />
				</form>";
				
			if(isset($_POST['up_img1'])){
				$pro_image1_name=file_get_contents($_FILES['img1']['tmp_name']);
				$pro_image1=base64_encode($pro_image1_name);
				
				$up_img1=$con->prepare("update product set pro_img1='$pro_image1' where pro_id='$pro_id'");	
				$up_img1->setFetchMode(PDO:: FETCH_ASSOC);
				$up_img1->execute();
				
				if($up_img1){
					echo"<script>alert('Image Updated Successfully')</script>";
					echo"<script>window.open('edit_pro.php?edit_pro=$pro_id','_self');</script>";	
				}
				else{
					echo"<script>alert('try Again')</script>";	
				}
			}	
		}
	
		if(isset($_GET['img2'])){
			include("../inc/db.php");
			$pro_id=$_GET['img2'];
			$img2=$con->prepare("select * from product where pro_id='$pro_id'");
			$img2->setFetchMode(PDO:: FETCH_ASSOC);
			$img2->execute();
			
			$row_img2=$img2->fetch();
			$pro_img2=$row_img2['pro_img2'];
			echo "<img src='data:image;base64,$pro_img2' width='100px' height='100px' />";
			echo "<form method='post' enctype='multipart/form-data'>
					<input style='border:1px solid' type='file' name='img2' />
					<input type='submit' name='up_img2' />
				</form>";
				
			if(isset($_POST['up_img2'])){
				$pro_image2_name=file_get_contents($_FILES['img2']['tmp_name']);
				$pro_image2=base64_encode($pro_image2_name);
				
				$up_img2=$con->prepare("update product set pro_img2='$pro_image2' where pro_id='$pro_id'");	
				$up_img2->setFetchMode(PDO:: FETCH_ASSOC);
				$up_img2->execute();
				
				if($up_img2){
					echo"<script>alert('Image Updated Successfully')</script>";
					echo"<script>window.open('edit_pro.php?edit_pro=$pro_id','_self');</script>";	
				}
				else{
					echo"<script>alert('try Again')</script>";	
				}
			}	
		}
	
		if(isset($_GET['img3'])){
			include("../inc/db.php");
			$pro_id=$_GET['img3'];
			$img3=$con->prepare("select * from product where pro_id='$pro_id'");
			$img3->setFetchMode(PDO:: FETCH_ASSOC);
			$img3->execute();
			
			$row_img3=$img3->fetch();
			$pro_img3=$row_img3['pro_img3'];
			echo "<img src='data:image;base64,$pro_img3' width='100px' height='100px' />";
			echo "<form method='post' enctype='multipart/form-data'>
					<input style='border:1px solid' type='file' name='img3' />
					<input type='submit' name='up_img3' />
				</form>";
				
			if(isset($_POST['up_img3'])){
				$pro_image3_name=file_get_contents($_FILES['img3']['tmp_name']);
				$pro_image3=base64_encode($pro_image3_name);
				
				$up_img3=$con->prepare("update product set pro_img3='$pro_image3' where pro_id='$pro_id'");	
				$up_img3->setFetchMode(PDO:: FETCH_ASSOC);
				$up_img3->execute();
				
				if($up_img3){
					echo"<script>alert('Image Updated Successfully')</script>";
					echo"<script>window.open('edit_pro.php?edit_pro=$pro_id','_self');</script>";	
				}
				else{
					echo"<script>alert('try Again')</script>";	
				}
			}	
		}
		
    	if(isset($_GET['img4'])){
			include("../inc/db.php");
			$pro_id=$_GET['img4'];
			$img4=$con->prepare("select * from product where pro_id='$pro_id'");
			$img4->setFetchMode(PDO:: FETCH_ASSOC);
			$img4->execute();
			
			$row_img4=$img4->fetch();
			$pro_img4=$row_img4['pro_img4'];
			echo "<img src='data:image;base64,$pro_img4' width='100px' height='100px' />";
			echo "<form method='post' enctype='multipart/form-data'>
					<input style='border:1px solid' type='file' name='img4' />
					<input type='submit' name='up_img4' />
				</form>";
				
			if(isset($_POST['up_img4'])){
				$pro_image4_name=file_get_contents($_FILES['img4']['tmp_name']);
				$pro_image4=base64_encode($pro_image4_name);
				
				$up_img4=$con->prepare("update product set pro_img4='$pro_image4' where pro_id='$pro_id'");	
				$up_img4->setFetchMode(PDO:: FETCH_ASSOC);
				$up_img4->execute();
				
				if($up_img4){
					echo"<script>alert('Image Updated Successfully')</script>";
					echo"<script>window.open('edit_pro.php?edit_pro=$pro_id','_self');</script>";
				}
				else{
					echo"<script>alert('try Again')</script>";	
				}
			}	
		}	
}
function login(){
	#$con = include("db.php");
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['login'])){
		$a_name=$_POST['a_name'];
		$a_email=$_POST['a_email'];
		$a_pass=$_POST['a_pass'];
		
		$check_a=$con->prepare("select * from admin where a_name='$a_name' AND a_email='$a_email' AND a_pass='$a_pass'");
		$check_a->execute();
		
		if($check_a->rowCount()==1){
			$_SESSION['a_name']=$a_name;
			$_SESSION['a_email']=$a_email;
			echo"<script>window.open('../webpages/index.php','_self');</script>";	
		}
		else{
			echo"<script>alert('User Name, Email Or Password Is Incorrect Please Try Again !!!');</script>";	
			exit();
		}
	}	
}

function viewall_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
							if(!isset($_GET['viewall_pro']) && !isset($_GET['pro_query'])){
								
							$display_allpro=$con->prepare("select * from product order by 1 DESC");
							$display_allpro->setFetchMode(PDO:: FETCH_ASSOC);
							$display_allpro->execute();
							$i=1;
							while($row=$display_allpro->fetch()):
								echo"<tr style='height:20px'>
										<td><input type='checkbox' name='remove_pro[]' value='".$row['pro_id']."' style='height:15px; width:15px' /></td>
										<td>".$i++."</td>
										<td style='width:20px'><a href='edit_pro.php?edit_pro=".$row['pro_id']."'>&#9998;</a></td>
										<td><a href='delete_pro.php?delete_pro=".$row['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
										<td>".$row['pro_name']."</td>
										<td style='width:150px'>
									  <img src='data:image;base64,".$row['pro_img1']."' height='30px' width='30' />
									  <img src='data:image;base64,".$row['pro_img2']."' height='30px' width='30' />
									  <img src='data:image;base64,".$row['pro_img3']."' height='30px' width='30' />
									  <img src='data:image;base64,".$row['pro_img4']."' height='30px' width='30' />
											
										</td>
										<td>".$row['pro_price']."</td>
										<td>".$row['pro_dis']."%</td>
										<td>".$row['pro_dis_price']."</td>
										<td>".$row['pro_feature1']."</td>
										<td>".$row['pro_feature2']."</td>
										<td>".$row['pro_feature3']."</td>
										<td>".$row['pro_feature4']."</td>
										<td>".$row['pro_feature5']."</td>
										<td>".$row['pro_qty']."</td>
										<td>".$row['pro_desc']."</td>
										<td>".$row['pro_color']."</td>
										<td>".$row['pro_model_no']."</td>
										<td>".$row['pro_box']."</td>
										
										<td>".$row['pro_warranty_type']."</td>
										
										<td>".$row['pro_added_date']."</td>
										<td>".$row['pro_keyword']."</td>
									</tr>";
							endwhile;
							}	
}

function wish_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
							$wish=$con->prepare("select * from user_wishlist");
							$wish->setFetchMode(PDO:: FETCH_ASSOC);
							$wish->execute();
							while($row_wish=$wish->fetch()):
							$wish_id=$row_wish['pro_id'];
								
							$display_allpro=$con->prepare("select * from product where pro_id='$wish_id' order by 1 DESC");
							$display_allpro->setFetchMode(PDO:: FETCH_ASSOC);
							$display_allpro->execute();
							$i=1;
							while($row=$display_allpro->fetch()):
								echo"<tr style='height:20px'>
										<td><input type='checkbox' name='remove_pro[]' value='".$row['pro_id']."' style='height:15px; width:15px' /></td>
										<td>".$i++."</td>
										<td style='width:20px'><a href='edit_pro.php?edit_pro=".$row['pro_id']."'>&#9998;</a></td>
										<td><a href='delete_pro.php?delete_pro=".$row['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
										<td>".$row['pro_name']."</td>
										<td style='width:150px'>
											<img src='data:image;base64,".$row['pro_img1']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img2']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img3']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img4']."' height='30px' width='30' />
										</td>
										<td>".$row['pro_price']."</td>
										<td>".$row['pro_dis']."%</td>
										<td>".$row['pro_dis_price']."</td>
										<td>".$row['pro_feature1']."</td>
										<td>".$row['pro_feature2']."</td>
										<td>".$row['pro_feature3']."</td>
										<td>".$row['pro_feature4']."</td>
										<td>".$row['pro_feature5']."</td>
										<td>".$row['pro_qty']."</td>
										<td>".$row['pro_desc']."</td>
										<td>".$row['pro_color']."</td>
										<td>".$row['pro_model_no']."</td>
										<td>".$row['pro_box']."</td>
										
										<td>".$row['pro_warranty_type']."</td>
										
										<td>".$row['pro_added_date']."</td>
										<td>".$row['pro_keyword']."</td>
									</tr>";
							endwhile;
							endwhile;	
}

function out_of_stock(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
							if(!isset($_GET['viewall_pro']) && !isset($_GET['pro_query'])){
								
							$display_allpro=$con->prepare("select * from product where pro_qty<1 order by 1 DESC");
							$display_allpro->setFetchMode(PDO:: FETCH_ASSOC);
							$display_allpro->execute();
							$i=1;
							while($row=$display_allpro->fetch()):
								echo"<tr style='height:20px'>
										<td><input type='checkbox' name='remove_pro[]' value='".$row['pro_id']."' style='height:15px; width:15px' /></td>
										<td>".$i++."</td>
										<td style='width:20px'><a href='edit_pro.php?edit_pro=".$row['pro_id']."'>&#9998;</a></td>
										<td><a href='delete_pro.php?delete_pro=".$row['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
										<td>".$row['pro_name']."</td>
										<td style='width:150px'>
											<img src='data:image;base64,".$row['pro_img1']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img2']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img3']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img4']."' height='30px' width='30' />
										</td>
										<td>".$row['pro_price']."</td>
										<td>".$row['pro_dis']."%</td>
										<td>".$row['pro_dis_price']."</td>
										<td>".$row['pro_feature1']."</td>
										<td>".$row['pro_feature2']."</td>
										<td>".$row['pro_feature3']."</td>
										<td>".$row['pro_feature4']."</td>
										<td>".$row['pro_feature5']."</td>
										<td>".$row['pro_qty']."</td>
										<td>".$row['pro_desc']."</td>
										<td>".$row['pro_color']."</td>
										<td>".$row['pro_model_no']."</td>
										<td>".$row['pro_box']."</td>
									
										<td>".$row['pro_warranty_type']."</td>
										
										<td>".$row['pro_added_date']."</td>
										<td>".$row['pro_keyword']."</td>
									</tr>";
							endwhile;
							}	
}

function delete_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	$delete_pro_id=$_GET['delete_pro'];
	
	$delete_pro=$con->prepare("delete from product where pro_id='$delete_pro_id'");
	$delete_pro->execute();
	
	if($delete_pro){
		echo "<script>alert('Record Deleted Successfully');</script>";
		echo"<script>window.open('index.php?viewall=viewall','_self');</script>";	
	}
	else{
		echo "<script>alert('Please Try Again');</script>";
	}	
}

function dis_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
							$display_allpro=$con->prepare("select * from product where pro_dis>1 order by 1 DESC");
							$display_allpro->setFetchMode(PDO:: FETCH_ASSOC);
							$display_allpro->execute();
							$i=1;
							while($row=$display_allpro->fetch()):
								echo"<tr style='height:20px'>
										<td><input type='checkbox' name='remove_pro[]' value='".$row['pro_id']."' style='height:15px; width:15px' /></td>
										<td>".$i++."</td>
										<td style='width:20px'><a href='edit_pro.php?edit_pro=".$row['pro_id']."'>&#9998;</a></td>
										<td><a href='delete_pro.php?delete_pro=".$row['pro_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
										<td>".$row['pro_name']."</td>
										<td style='width:150px'>
											<img src='data:image;base64,".$row['pro_img1']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img2']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img3']."' height='30px' width='30' />
											<img src='data:image;base64,".$row['pro_img4']."' height='30px' width='30' />
										</td>
										<td>".$row['pro_price']."</td>
										<td>".$row['pro_dis']."%</td>
										<td>".$row['pro_dis_price']."</td>
										<td>".$row['pro_feature1']."</td>
										<td>".$row['pro_feature2']."</td>
										<td>".$row['pro_feature3']."</td>
										<td>".$row['pro_feature4']."</td>
										<td>".$row['pro_feature5']."</td>
										<td>".$row['pro_qty']."</td>
										<td>".$row['pro_desc']."</td>
										<td>".$row['pro_color']."</td>
										<td>".$row['pro_model_no']."</td>
										<td>".$row['pro_box']."</td>
										<td>".$row['pro_warranty_type']."</td>
										<td>".$row['pro_added_date']."</td>
										<td>".$row['pro_keyword']."</td>
									</tr>";
							endwhile;	
}

function delete_multi_pro(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['delete_pro'])){
		foreach($_POST['remove_pro'] as $remove_id){
			$multi_delete=$con->prepare("delete from product where pro_id='$remove_id'");
			if($multi_delete->execute()){
				echo "<script>alert('Multiple Products Deleted Successfully');</script>";
				echo "<script>window.open('index.php?viewall=viewall','_self')</script>";
			}
		}	
	}
}

function display_all_main_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$select_main_cat=$con->prepare("Select * From main_cat");
	$select_main_cat->setFetchMode(PDO:: FETCH_ASSOC);
	$select_main_cat->execute();
											
	while($row=$select_main_cat->fetch()){
		$pro_main_cat_id=$row['pro_maincat_id'];
		$pro_main_cat_name=$row['pro_maincat_name'];
		echo "<option value='$pro_main_cat_id'>$pro_main_cat_name</option>";
	}
}

function display_all_sub_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
										
	$select_sub_cat=$con->prepare("select * from sub_cat");
	$select_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
	$select_sub_cat->execute();
	echo"<option></option>";
	while($row=$select_sub_cat->fetch()):
		$pro_sub_cat_id=$row['pro_subcat_id'];
		$pro_sub_cat_name=$row['pro_subcat_name'];
												
		echo "<option value='$pro_sub_cat_id'>$pro_sub_cat_name</option>";
		
	endwhile;
}

function display_all_brands(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$select_brand=$con->prepare("Select * From brand");
	$select_brand->setFetchMode(PDO:: FETCH_ASSOC);
	$select_brand->execute();
	echo"<option></option>";								
	while($row=$select_brand->fetch()):
		$pro_brand_id=$row['pro_brand_id'];
		$pro_brand_name=$row['pro_brand_name'];	
										
		echo "<option value='$pro_brand_id'>$pro_brand_name</option>";
	endwhile;
}
//end of product script

//start of main_cat_script

function display_all_maincat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_cat=$con->prepare("select * from main_cat");
	$display_cat->setFetchMode(PDO:: FETCH_ASSOC);
	$display_cat->execute();
	$i=1;
	echo"<option></option>";
	while($row=$display_cat->fetch()):
		echo"
			<tr>
				<td><input type='checkbox' name='remove_maincat[]' value='".$row['pro_maincat_id']."' style='height:15px; width:15px' /></td>
				<td>".$i++."</td>
				<td style='text-align:left'>".$row['pro_maincat_name']."</td>
				<td><a href='../webpages/edit_cat.php?edit_cat=".$row['pro_maincat_id']."'>&#9998;</a></td>
				<td><a href='../webpages/delete_cat.php?delete_cat=".$row['pro_maincat_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
			</tr>";
	endwhile;
}

function add_main_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['add_cat'])){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		
		$main_cat_name=$_POST['pro_cat_name'];
		
		$adding_main_cat=$con->prepare("insert into main_cat(pro_maincat_name)values(:pro_cat_name)");
		$adding_main_cat->bindParam(':pro_cat_name',$main_cat_name);
		
		if($adding_main_cat->execute()){
			echo "<script>alert('Category Added Successfully');</script>";
			echo "<script>window.open('index.php?viewall_cat=viewall_cat','_self')</script>";	
		}
		else{
			echo "<script>alert('Please Try Again !!!');</script>";	
		}
	}	
}

function edit_maincat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['update_cat'])){
		$update_cat=$_GET['edit_form'];
		$pro_main_cat=$_POST['pro_cat_name'];
				
		$update_cat=$con->prepare("update main_cat set pro_maincat_name='$pro_main_cat' where pro_maincat_id='$update_cat'");

		if($update_cat->execute()){
			echo"<script>alert('Category Updated Successfully');</script>";
			echo"<script>window.open('index.php?viewall_cat=viewall_cat','_self');</script>";
		}
		else{
			echo"<script>alert('Please Try Again !!!');</script>";
		}
	}	
}

function remove_multi_maincat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['remove_multi_maincat'])){
		foreach($_POST['remove_maincat'] as $remove_cat){
			$multi_delete=$con->prepare("delete from main_cat where pro_maincat_id='$remove_cat'");
			
			if($multi_delete->execute()){
				echo "<script>window.open('index.php?viewall_cat=viewall_cat','_self')</script>";
			}
		}	
	}
}

function remove_single_maincat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$delete_id=$_GET['delete_cat'];
	
	$delete_cat=$con->prepare("delete from main_cat where pro_maincat_id='$delete_id'");
	
	if($delete_cat->execute()){
		echo "<script>alert('Category Deleted Successfully');</script>";
		echo "<script>window.open('index.php?viewall_cat=viewall_cat','_self')</script>";	
	}
}

//end of main_cat_script

//start of sub_cat script

function add_sub_cat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['add_sub_cat'])){
		$main_cat=$_POST['main_cat'];
		$sub_cat=$_POST['sub_cat'];
		
		$add_sub_cat=$con->Prepare("insert into sub_cat(pro_maincat_id,pro_subcat_name)values(:main_cat,:sub_cat)");
		
		$add_sub_cat->bindParam(':main_cat',$main_cat);
		$add_sub_cat->bindParam(':sub_cat',$sub_cat);
		
		if($add_sub_cat->execute()){
			echo"<script>alert('Sub Category Added Successfully')</script>";
			echo"<script>window.open('index.php?viewall_sub_cat=viewall_sub_cat','_self')</script>";
		}	
		else{
			echo"<script>alert('Please Try Again')</script>";	
		}
	}	
}


function display_all_subcat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_sub_cat=$con->prepare("select * from sub_cat");
	$display_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
	$display_sub_cat->execute();
	$i=1;
	while($row=$display_sub_cat->fetch()):
		echo"
			<tr>
				<td><input type='checkbox' name='remove_subcat[]' value='".$row['pro_subcat_id']."' style='height:15px; width:15px' /></td>
				<td>".$i++."</td>
				<td style='text-align:left'>".$row['pro_subcat_name']."</td>
				<td><a href='../webpages/edit_subcat.php?edit_subcat=".$row['pro_subcat_id']."'>&#9998;</a></td>
				<td><a href='../webpages/delete_subcat.php?delete_subcat=".$row['pro_subcat_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
			</tr>";
	endwhile;
}

function edit_subcat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['update_subcat'])){
		$update_subcat=$_GET['edit_form'];
		$pro_sub_cat=$_POST['pro_subcat_name'];
				
		$update_cat=$con->prepare("update sub_cat set pro_subcat_name='$pro_sub_cat' where pro_subcat_id='$update_subcat'");

		if($update_cat->execute()){
			echo"<script>alert('Sub Category Updated Successfully');</script>";
			echo"<script>window.open('index.php?viewall_sub_cat=viewall_sub_cat','_self');</script>";
		}
		else{
			echo"<script>alert('Please Try Again !!!');</script>";
		}
	}	
}

function remove_single_subcat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$delete_id=$_GET['delete_subcat'];
	
	$delete_subcat=$con->prepare("delete from sub_cat where pro_subcat_id='$delete_id'");
	
	if($delete_subcat->execute()){
		echo "<script>alert('Sub Category Deleted Successfully');</script>";
		echo "<script>window.open('index.php?viewall_sub_cat=viewall_sub_cat','_self')</script>";	
	}
}

function remove_multi_subcat(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['remove_multi_subcat'])){
		foreach($_POST['remove_subcat'] as $remove_subcat){
			$multi_delete=$con->prepare("delete from sub_cat where pro_subcat_id='$remove_subcat'");
			
			if($multi_delete->execute()){
				echo "<script>alert('Multiple Sub Category Deleted Added Succesfully')</script>";
				echo "<script>window.open('index.php?viewall_sub_cat=viewall_sub_cat','_self')</script>";
			}
		}	
	}
}
//end of sub_cat script

//start of brand_script

function display_all_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_brand=$con->prepare("select * from brand");
	$display_brand->setFetchMode(PDO:: FETCH_ASSOC);
	$display_brand->execute();
	$i=1;
	while($row=$display_brand->fetch()):
		echo"
			<tr>
				<td style='width:60px;'>
					<input value='".$row['pro_brand_id']."' type='checkbox' name='remove_brand[]' style='height:15px; width:15px' />
				</td>
				<td>".$i++."</td>
				<td style='text-align:left'>".$row['pro_brand_name']."</td>
				<td><a href='../webpages/edit_brand.php?edit_brand=".$row['pro_brand_id']."'>&#9998;</a></td>
				<td><a href='../webpages/delete_brand.php?delete_brand=".$row['pro_brand_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
			</tr>";
	endwhile;
}

function add_new_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['add_brand'])){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
		
		$brand_name=$_POST['pro_brand_name'];
		
		$adding_brand=$con->prepare("insert into brand(pro_brand_name)values(:pro_brand_name)");
		$adding_brand->bindParam(':pro_brand_name',$brand_name);
		
		if($adding_brand->execute()){
			echo "<script>alert('Brand Added Successfully');</script>";
			echo "<script>window.open('index.php?viewall_brand=viewall_brand','_self')</script>";	
		}
		else{
			echo "<script>alert('Please Try Again !!!');</script>";	
		}
	}	
}

function remove_multi_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['remove_multi_brand'])){
		foreach($_POST['remove_brand'] as $remove_brand){
			$multi_delete=$con->prepare("delete from brand where pro_brand_id='$remove_brand'");
			
			if($multi_delete->execute()){
				echo "<script>window.open('index.php?viewall_brand=viewall_brand','_self')</script>";
			}
			
		}	
	}
}

function remove_single_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$delete_id=$_GET['delete_brand'];
	
	$delete_brand=$con->prepare("delete from brand where pro_brand_id='$delete_id'");

	if($delete_brand->execute()){
		echo "<script>alert('Brand Deleted Successfully');</script>";
		echo "<script>window.open('index.php?viewall_brand=viewall_brand','_self');</script>";	
	}
	else{
		echo "<script>alert('Please Try Again !!!');</script>";	
	}
}

function edit_brand(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['update_brand'])){
		$update_brand=$_GET['edit_form'];
		$pro_brand_cat=$_POST['pro_brand_name'];
				
		$update_cat=$con->prepare("update brand set pro_brand_name='$pro_brand_cat' where pro_brand_id='$update_brand'");

		if($update_cat->execute()){
			echo"<script>alert('Brand Updated Successfully');</script>";
			echo"<script>window.open('index.php?viewall_brand=viewall_brand','_self');</script>";
		}
		else{
			echo"<script>alert('Please Try Again !!!');</script>";
		}
	}	
}

//end of brand_script

//start of customer script

function display_all_customer(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_customer=$con->prepare("select * from users");
	$display_customer->setFetchMode(PDO:: FETCH_ASSOC);
	$display_customer->execute();
	$i=1;
	while($row=$display_customer->fetch()):
		echo"
			<tr>
				<td style='text-align:left; padding-left:1%; min-width:100px'>".$i++."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_name']."</td>
				<td style='text-align:left; min-width:180px'>".$row['u_email']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_phone']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_pass']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_city']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_pincode']."</td>
				<td style='text-align:left; min-width:200px'>".$row['u_add']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_dob']."</td>
				<td style='text-align:left; min-width:150px'>".$row['u_reg_date']."</td>
			</tr>";
	endwhile;
}

//end of customer script

function display_all_feedback(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_feedback=$con->prepare("select * from feedback");
	$display_feedback->setFetchMode(PDO:: FETCH_ASSOC);
	$display_feedback->execute();
	$i=1;
	while($row=$display_feedback->fetch()):
		echo"
			<tr>
				<td style='text-align:left; padding-left:1%; min-width:100px'>".$i++."</td>
				<td style='text-align:left; min-width:150px'>".$row['f_query']."</td>
				<td style='text-align:left; min-width:180px'>".$row['f_u_name']."</td>
				<td style='text-align:left; min-width:150px'>".$row['f_u_phone']."</td>
				<td style='text-align:left; min-width:150px'>".$row['f_u_email']."</td>
				<td style='text-align:left; min-width:150px'>".$row['f_u_msg']."</td>
				<td style='text-align:left; min-width:150px'>".$row['f_time']."</td>
				
			</tr>";
	endwhile;
}
//start of pincode script

function display_all_pincode(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
	$display_brand=$con->prepare("select * from pincode");
	$display_brand->setFetchMode(PDO:: FETCH_ASSOC);
	$display_brand->execute();
	$i=1;
	while($row=$display_brand->fetch()):
		echo"
			<tr>
				<td style='width:60px;'>
					<input value='".$row['pin_id']."' type='checkbox' name='remove_pincode[]' style='height:15px; width:15px' />
				</td>
				<td>".$i++."</td>
				<td style='text-align:left'>".$row['pincode']."</td>
				<td style='text-align:left'>".$row['city_name']."</td>
				<td><a href='../webpages/edit_pincode.php?edit_pin=".$row['pin_id']."'>&#9998;</a></td>
				<td><a href='../webpages/delete_pincode.php?delete_pincode=".$row['pin_id']."' OnClick=\"return confirm('Are You Sure !!!');\">&#x2718;</a></td>
			</tr>";
	endwhile;
}

function add_pincode(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['add_pincode'])){
		$pincode_no=$_POST['pincode_no'];
		$city_name=$_POST['city_name'];
		
		$add_pincode=$con->Prepare("insert into pincode(pincode,city_name)values(:pincode_no,:city_name)");
		
		$add_pincode->bindParam(':pincode_no',$pincode_no);
		$add_pincode->bindParam(':city_name',$city_name);
		
		if($add_pincode->execute()){
			echo"<script>alert('PinCode Added Successfully')</script>";
			echo"<script>window.open('index.php?pin=pin','_self');</script>";
		}	
		else{
			echo"<script>alert('Please Try Again')</script>";	
		}
	}	
}

function edit_pincode(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
	if(isset($_POST['update_pincode'])){
		$update_pincode=$_GET['edit_form'];
		$pincode=$_POST['pincode'];
		$city=$_POST['city_name'];
				
		$update_pin=$con->prepare("update pincode set pincode='$pincode',city_name='$city' where pin_id='$update_pincode'");

		if($update_pin->execute()){
			echo"<script>alert('Pincode Updated Successfully');</script>";
			echo"<script>window.open('index.php?pin=pin','_self');</script>";
		}
		else{
			echo"<script>alert('Please Try Again !!!');</script>";
		}
	}	
}

function remove_single_pincode(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	$delete_id=$_GET['delete_pincode'];
	
	$delete_pincode=$con->prepare("delete from pincode where pin_id='$delete_id'");

	if($delete_pincode->execute()){
		echo "<script>alert('Pincode Deleted Successfully');</script>";
		echo "<script>window.open('index.php?pin=pin','_self');</script>";	
	}
	else{
		echo "<script>alert('Please Try Again !!!');</script>";	
	}
}

function remove_multi_pincode(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	if(isset($_POST['remove_multi_pincode'])){
		foreach($_POST['remove_pincode'] as $remove_pincode){
			$multi_delete=$con->prepare("delete from pincode where pin_id='$remove_pincode'");
			
			if($multi_delete->execute()){
				echo "<script>alert('Multiple Pincodes Deleted Successfully !!!')</script>";
				echo "<script>window.open('index.php?pin=pin','_self')</script>";
			}
		}	
	}
}

function complete_ord(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
						$get_order=$con->prepare("select * from order_detail where status='complete'");
						$get_order->setFetchMode(PDO:: FETCH_ASSOC);
						$get_order->execute();
						$i=1;
						while($row_order=$get_order->fetch()):
							$pro_id=$row_order['pro_id'];
							$o_id=$row_order['order_id'];
							$u_id=$row_order['u_id'];
							$get_pro=$con->prepare("select * from product where pro_id='$pro_id'");
							$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
							$get_pro->execute();
							$row_pro=$get_pro->fetch();
							$get_user=$con->prepare("select * from users where u_id='$u_id'");
							$get_user->setFetchMode(PDO:: FETCH_ASSOC);
							$get_user->execute();
							$row_user=$get_user->fetch();
							$complete="Complete";
							
							echo"<tr>
									<td style='width:35px'>".$i++."</td>
									<td>".$row_user['u_email']."</td>
									<td><img src='data:image;base64,".$row_pro['pro_img1']."' width='40px' height='40px' /></td>
									<td>".$row_pro['pro_name']."</td>
									<td>".$row_order['qty']."</td>
									<td>".$row_order['invoice_no']."</td>
									<td>".$row_order['order_date']."</td>
									<td>
										<a style='text-decoration:none;' href='#'>".$row_order['status']."</a>
										<button id='remove'>
											<a style='text-decoration:none; background:#000; line-height:20px;'  href='invoice_gen.php?gen=".$row_order['order_id']."'>Generate Bill</a>
										</button>
									</td>
								</tr>";
						endwhile;	
}

function pendding_ord(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
						$get_order=$con->prepare("select * from order_detail where status='In Process'");
						$get_order->setFetchMode(PDO:: FETCH_ASSOC);
						$get_order->execute();
						$i=1;
						while($row_order=$get_order->fetch()):
							$pro_id=$row_order['pro_id'];
							$o_id=$row_order['order_id'];
							$u_id=$row_order['u_id'];
							$get_pro=$con->prepare("select * from product where pro_id='$pro_id'");
							$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
							$get_pro->execute();
							$row_pro=$get_pro->fetch();
							$get_user=$con->prepare("select * from users where u_id='$u_id'");
							$get_user->setFetchMode(PDO:: FETCH_ASSOC);
							$get_user->execute();
							$row_user=$get_user->fetch();
							$complete="Complete";
							
							echo"<tr>
									<td style='width:35px'>".$i++."</td>
									<td>".$row_user['u_email']."</td>
									<td><img src='data:image;base64,".$row_pro['pro_img1']."' width='40px' height='40px' /></td>
									<td>".$row_pro['pro_name']."</td>
									<td>".$row_order['qty']."</td>
									<td>".$row_order['invoice_no']."</td>
									<td>".$row_order['order_date']."</td>
									<td><a href='ord.php?ord=".$row_order['order_id']."'>Confirm Order</a></td>
								</tr>";
							
						endwhile;	
}

function view_cancel_order(){
						$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
						
						$get_order=$con->prepare("select * from order_detail where status='cancelled'");
						$get_order->setFetchMode(PDO:: FETCH_ASSOC);
						$get_order->execute();
						$i=1;
						while($row_order=$get_order->fetch()):
							$pro_id=$row_order['pro_id'];
							$o_id=$row_order['order_id'];
							$u_id=$row_order['u_id'];
							$get_pro=$con->prepare("select * from product where pro_id='$pro_id'");
							$get_pro->setFetchMode(PDO:: FETCH_ASSOC);
							$get_pro->execute();
							$row_pro=$get_pro->fetch();
							$get_user=$con->prepare("select * from users where u_id='$u_id'");
							$get_user->setFetchMode(PDO:: FETCH_ASSOC);
							$get_user->execute();
							$row_user=$get_user->fetch();
							$complete="Complete";
							
							echo "<tr>
									<td style='width:35px'>".$i++."</td>
									<td>".$row_user['u_email']."</td>
									<td><img src='data:image;base64,".$row_pro['pro_img1']."' width='40px' height='40px' /></td>
									<td>".$row_pro['pro_name']."</td>
									<td>".$row_order['qty']."</td>
									<td>".$row_order['invoice_no']."</td>
									<td>".$row_order['order_date']."</td>
								</tr>";
						endwhile;	
}

function img_slider(){
	$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
	
		if(isset($_POST['up_slide1'])){
		$img1_name=file_get_contents($_FILES['slide1']['tmp_name']);
		$img1=base64_encode($img1_name);
		
		$update_img1=$con->prepare("update img_slider set img1='$img1'");
		
		if($update_img1->execute()){
			echo"<script>alert('Slider  Change SuccessFully');</script>";
			echo"<script>window.open('index.php?img_slider','_self');</script>";	
		}
		else{
			echo"<script>alert('Try Again');</script>";	
	}
	}

}

function invoice_gen(){
		$con=new PDO("mysql:host=localhost;dbname=mystore","root","");
					if(isset($_GET['gen'])){
						$order_id=$_GET['gen'];
						$order_display=$con->prepare("select * from order_detail where order_id='$order_id'");
						$order_display->setFetchMode(PDO:: FETCH_ASSOC);
						$order_display->execute();
						
						$row_order=$order_display->fetch();
							$pro_id=$row_order['pro_id'];
							$u_id=$row_order['u_id'];
						$display_pro=$con->prepare("select * from product where pro_id='$pro_id'");
						$display_pro->setFetchMode(PDO:: FETCH_ASSOC);
						$display_pro->execute();
						
						$display_user=$con->prepare("select * from users where u_id='$u_id'");
						$display_user->setFetchMode(PDO:: FETCH_ASSOC);
						$display_user->execute();
						
						$row_user=$display_user->fetch();
						
						$display_payment=$con->prepare("select * from payment where pro_id='$pro_id' AND u_id='$u_id'");
						$display_payment->setFetchMode(PDO:: FETCH_ASSOC);
						$display_payment->execute();
						$row_payment=$display_payment->fetch();
						date_default_timezone_set('UTC');
						
						$row_pro=$display_pro->fetch();
							echo"<div id='od_detail'>
									<h2>Order</h2>
									<h3><br>Order ID : ".$row_order['invoice_no']."</h3>
									<h5>Order Date : ".$row_order['order_date']."</h5>
									<h5>Invoice Date : ".date('Y/m/d')."</h5>
								</div><!--end of od_detail-->
								<div id='seller_add'>
									<h2>Seller</h2>
									<h3><br>TechStore</h3>
									
									<h5>Techstore Internet Private Limited, Hafez Center, </h5>
									<h5> #56/18 & 55/09, 7th Floor, Shalimar Garden, Mall Road, Lahore, Pakistan.</h5>
									<h5>Phone : (+92) 042-35777991  </h5>
										<h5> Email Us : Customercare@techstore.pk	</h5>
								</div><!--end of myadd-->
								<div id='buyer_add'>
									<h2>Buyer</h2>
									<h3> <br>".$row_user['u_name']."</h3>
									<h5>".$row_user['u_add']."</h5>
									<h5>".$row_user['u_city']." - ".$row_user['u_pincode'].".</h5>
									<h4>Phone : ".$row_user['u_phone']."</h4>
								</div><!--end of myadd-->";
							echo "<table>
									<tr>
										<th style='text-align:center; background:#e6e6e6; font-size:20px' colspan='8'>Order Detail</th>
									</tr>
									<tr>								
										<th >Product Name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>SubTotal</th>
									</tr>
									<tr>
									<td style='padding-left:15px; text-align:center;'>".$row_pro['pro_name']."</td>
									<td style='padding-left:15px; text-align:center;'>".$row_order['qty']."</td>
									<td style='padding-left:15px; text-align:center;'>".$row_pro['pro_price']."</td>
									<td style='padding-left:15px; text-align:center;'>".$row_payment['amount']."</td>
									</tr>
									<tr><td></td><td></td><td></td><td></td></tr>
									<tr><td></td><td></td><td></td><td></td></tr>
									<tr>
										<th colspan='4' style='padding-left:80%; border-top:1px solid #000'>Total Amount : ".$row_payment['amount']."</th>
									</tr>
								</table>";
					}	
}

?>