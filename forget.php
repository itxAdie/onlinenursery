          <html><head>
	<link rel="icon" href="img/logo1.gif" type="image/gif" />
	<title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="css/style.css" />

    
        <script>
			function checkTextField(field) {
				if (field.value == '') {
					alert("Please FillOut Thet Field First");
				}
			}
        </script>
	</head>
	<body>
    	<?php
        	include("inc/db.php");
			$web_count=$con->prepare("update web_count set web_count=web_count+1");
			$web_count->execute();
		?>
    	<div><?php include("inc/header.php"); ?></div>
        <div><?php include("inc/nav.php"); ?></div>
        <?php 
	session_start();
	
	if(!isset($_SESSION['u_email'])){
		$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
	}
	
?>

		<div id="wrapper">
            <?php if(!isset($_SESSION['u_email'])){?>
            
            <div title="Forgot Password">
                            <form method="post"  id="formot">
                     
                                <table>
                                 <tr>
                                 
                                   <th width="211" height="66" style="color:#999; font-size: 24px; text-align:left; margin-top: 50%;">
                                     Forget Password
                                   
                                 <tr>
                                	
                                		<th>Enter Your Email :</th>
                                        <td><input type="email" required name="forgot_email" placeholder="Enter Your Email Here" /></td>
                                	</tr>
                                     <tr> 
                   <th >Security Questions :</th>
                   <td> <select name="u_question">
                   <option >What was the name of your primary school?</option>
                   <option >In what city does your nearest sibling live?</option>
                   <option >What time of the day were you born? (hh:mm)</option>
                    <option>In what year was your father born?</option>
                    <option>What is your favorite dish?</option>
                   
                    </select> </td>
           </tr>
           
                                    <tr>
                                    	<th> Enter Your Answer :</th>
                      <td><input type="text" onBlur="checkTextField(this);" name="u_ans" required placeholder="Enter Your Answer" /></td>
                                    </tr>
                                    
                                     <tr>
                                	
                                		<th >Enter New Password :</th>
                                  <td><input type='Password' required name='u_pass' placeholder='Enter New password' /></td>

                               	  </tr>
                                    <tr>
                                	
                                		<th >Retype New Password :</th>
                                        <td><input type='Password' required name='u_pass1' placeholder='Retype New Password' /></td>
                               	  <tr>
                                	
                                	<tr>
                                	  
                               <td height="101"><input  id="button" type="submit" name="forgot_pass" /></td>
                                	</tr>
                                </table>
                            </form>
       
            <?php }?>
           </div>
        </div><!--End Of Wrapper--> <br clear="all" />
        <div><?php include("inc/footer.php"); ?></div>
	</body>
</html>