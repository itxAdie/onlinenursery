<?php if(!isset($_GET['checkout']) && !isset($_GET['wish_checkout'])){ ?>
<div id="item">
	<h3>Order Summary</h3>
    <form method="post" enctype="multipart/form-data">
    	<table>
        	<tr>
            	<th style="width:70px;"></th>
    			<th>Items</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
                <th>Remove</th>
            </tr>
            <?php echo multi_order();?> 
       </table>
</div><!--end of item-->
<div id='payment'>
	<h3>Payment Method</h3>
    	<center>
        	<input id='btn' name='cart_payment' type='submit' style='width:200px; margin-top:30px' value='Cash On Delivery' />
            <button id='btn' style='width:200px; margin-top:30px'><a href='#'>PayPal</a></button>
        </center>
   </form>   
</div><!--end of payment-->
<?php } echo checkout_delete_cart_item(); //unset checkout end ?>