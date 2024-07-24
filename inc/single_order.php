<?php if(!isset($_GET['cart_checkout']) && !isset($_GET['wish_checkout'])){?>
<div id="item">
	<h3>Order Summary</h3>
    <form method="post" enctype="multipart/form-data">
    	<table>
        	<tr>
            	<th></th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Delivery Detail</th>
                <th>Price</th>
                <th>SubTotal</th>
           </tr>
           <?php echo single_order();?>
        </table>
     </form>
</div><!--end of item-->
<div id='payment'>
	<h3>Payment Method</h3>
	<form method='post' enctype='multipart/form-data'>
        <center>
            <input id='btn' name='payment' type='submit' style='width:200px; margin-top:30px' value='Cash On Delivery' />
            <button id='btn' style='width:200px; margin-top:30px'><a href='#'>PayPal</a></button>
        </center>
    </form>
</div><!--end of payment-->
<?php } // end of !cart_checkout?>