<?php
	session_start();
?>
<html>
	<head>
        <link rel="icon" href="../../img/logo1.gif" type="image/gif" />
        <title>Onlinenursery.pk</title>
        <link rel="stylesheet" href="../css/style.css" />

    </head>
<body>
	<div id="login" title="Admin Login">
        <form method="post">
            <table>
            	<tr>
                	<th colspan="2">Admin Login</th>
                </tr>
                <tr>
                    <td> Enter Your Name : </td>
                    <td><input type="text" placeholder="Enter Your Name" name="a_name" required="required" /></td>
                </tr>
                <tr>
                    <td> Enter Your Email : </td>
                    <td><input type="email" placeholder="Enter Your Email" name='a_email' required="required" /></td>
                </tr>
                <tr>
                    <td> Enter Your Password : </td>
                    <td><input type="password" placeholder="Enter Your Password" name="a_pass" required="required" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input id="login_btn" style="padding-left:0%" type="submit" name="login" value="Login" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php include("../inc/function.php"); echo login(); ?>