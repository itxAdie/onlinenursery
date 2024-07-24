<html><head>
	<link rel="icon" href="../img/logo1.gif"  type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />
        
	</head>
	<body>
    	<div><?php include("../inc/header2.php"); ?></div>
        <div><?php include("nav.php"); ?></div>
		<div id="wrapper">
        	<div id="bodyleft">
            	<h2>Help & Support</h2>
                <form id="add2" style="width:97%;" method="post">
                	<table style="height:450px">
                    	<tr>
                        	<td>Type Of Query</td>
                            <td><input type="text" required name="query"></td>
                        </tr>
                        <tr>
                        	<td>Name</td>
                            <td><input type="text" required name="u_name" placeholder="Enter Your Name"></td>
                        </tr>
                        <tr>
                        	<td>Mobile No.</td>
                            <td><input type="tel" required name="phone_no" pattern="[0-9]{11}" placeholder="Enter Your Mobile No"></td>
                        </tr>
                        <tr>
                        	<td>Email Id</td>
                            <td><input type="email" name="email" placeholder="Enter Your Email"></td>
                        </tr>
                        <tr>
                        	<td>Any Message</td>
                            <td><textarea name="message" placeholder="Enter Your Message"></textarea></td>
                        </tr>
                        <tr>
                        	<td><input id="btn" type="submit" value="Submit" name="submit"></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div style="margin-top:140px" id="bodyright">
            	<ul>
                	<li>
                    	<h3>Call Us:</h3>
                        <p>We're available 24 hours a day. <br>
							(+92) 042-35777991 or <br> (+92) 042-35777661 
</p>
                    </li>
                    <li>
                    	<h3>Mail Us:</h3>
                        <p>Customercare@techstore.pk</p>
                    </li>
                    
                    <li>
                    	<h3>Social Contact:</h3>
                        <p>www.facebook.com/techstore.pk <br>
                        www.twitter.com/techstore.pk <br>
                        www.istagram/techstore.pk</p>
                        
                    </li>
                    
                    <li>
                    	<h3>Corporate Address:</h3>
                        <p>TechStore Internet Private Limited
                            Hafez Center, Ground Floor, 7th Main,
                            80 Feet Road, 3rd Block,
                             Lahore Industrial Layout,
                            Okara - *****
                             Lahore
                             
                          
                            
                    </li>
                </ul>
            </div><br clear="all" />
        </div><!--End Of Wrapper-->
        <div><?php include("../inc/footer.php"); ?></div>
	</body>
</html>
<?php
	include("../inc/db.php");
	if(isset($_POST['submit'])){
		$u_query=$_POST['query'];	
		$u_name=$_POST['u_name'];
		$u_phone=$_POST['phone_no'];
		$u_email=$_POST['email'];
		$u_msg=$_POST['message'];
		
		if(strlen($u_msg)>100){
			echo"<script>alert('You Cannot Enter More Then 100 Characters In Massage');</script>";	
		}
		else{
			$insert_feed=$con->prepare("insert into feedback(f_query,f_u_name,f_u_phone,f_u_email,f_u_msg,f_time)values('$u_query','$u_name','$u_phone','$u_email','$u_msg',NOW())");
			
			if($insert_feed->execute()){
				echo"<script>alert('Thenks For Your Feedback We Will Get To You Soon')</script>";
				echo"<script>window.open('contact_us.php','_self');</script>";	
			}
			else{
				echo"<script>alert('Try Again !!!')</script>";	
			}	
		}
	}
?>