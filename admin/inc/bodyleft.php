<div class="bodyleft">
    <h3>Content Management</h3>
    <ul>
       <li>
           <a href="../webpages/index.php"> Overview</a>
       </li>
       <li>
           <a href="index.php?viewall=viewall"> View All Products </a>
       </li>
       <li id="active">
           <a href="index.php?add_pro=add_pro">Add New Product</a>
       </li>
       <li>
           <a href="index.php?out_stock">Out Of Stock Products</a>
       </li>
        <li>
           <a href="index.php?dis_pro">Discount Products</a>
       </li>
       <li>
           <a href="index.php?wish_pro">On Demand Products</a>
       </li>
       <li>
           <a href="index.php?viewall_cat=viewall_cat">View All Categories</a>
        </li>
        <li>
           <a href="index.php?viewall_sub_cat=viewall_sub_cat">View All Sub Category</a>
        </li>
        <li>
           <a href="index.php?viewall_brand=viewall_brand">View All Brands</a>
        </li>
        <li>
           <a href="index.php?viewall_customer=viewall_customer">View All Customers</a>
        </li>
        <li>
           <a href="index.php?viewall_order">View Complete Orders</a>
        </li>
        <li>
           <a href="index.php?viewall_p_order"> View Pendding Orders</a>
        </li>
        <li>
           <a href="index.php?viewall_c_order=viewall_order">View Cancel Orders</a>
        </li>
        <li>
           <a href="index.php?pin">View All Pincodes</a>
        </li>
        <li>
           <a href="index.php?img_slider">Edit Image Slider</a>
        </li>
         <li>
           <a href="u_feedback.php">users's Feedback</a>
        </li>
        
     </ul>
</div><!--end of bodyleft-->
<?php
	if(isset($_GET['add_pro'])){
		include("insert_pro.php");	
	}
	if(isset($_GET['viewall'])){
		include("viewall_pro.php");	
	}
	if(isset($_GET['viewall_cat'])){
		include("viewall_cat.php");	
	}
	if(isset($_GET['viewall_brand'])){
		include("viewall_brand.php");	
	}
	if(isset($_GET['viewall_sub_cat'])){
		include("viewall_sub_cat.php");	
	}
	if(isset($_GET['pin'])){
		include("pincode.php");	
	}
	if(isset($_GET['viewall_customer'])){
		include("viewall_customer.php");	
	}
	if(isset($_GET['viewall_order'])){
		include("viewall_order.php");	
	}
	if(isset($_GET['viewall_p_order'])){
		include("pendding_ord.php");	
	}
	if(isset($_GET['viewall_c_order'])){
		include("cancelled_ord.php");	
	}
	if(isset($_GET['img_slider'])){
		include("img_slider.php");	
	}
	if(isset($_GET['out_stock'])){
		include("out_stock_pro.php");	
	}
	if(isset($_GET['dis_pro'])){
		include("dis_pro.php");	
	}
	if(isset($_GET['wish_pro'])){
		include("wish_pro.php");	
	}
?>