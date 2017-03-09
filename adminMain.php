<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/adminMain.css" />
<title>XYZ.com - Admin Main Menu</title>
</head>
<body>
<div class="bd">
	<div class="header">
		<img style="float: left;" src="pics/hd_logo_admin.jpg">
		<div id="login" class="loginc">
			<a href="adminMain.php"><font height="20px" align= "absmiddle">Home</font></a> |
			<a href="adminLogout.php"><font height="20px" align= "absmiddle">Log Out</font></a>
		</div>
	</div><br/><br/><br/><hr/>
	<div class="product">
    	<h2>Product :</h2>
        <table align="center" width="500px">
        <tr>
        <td align="center"><a href="adminInsert.html"><img src="pics/insert.jpg"></a></td>
        <td align="center"><a href="adminUpdate.html"><img src="pics/update.jpg"></a></td>
        <td align="center"><a href="adminDelete.html"><img src="pics/delete.jpg"></a></td>
        </tr>
        </table>
    </div>
    <br/><hr/>
    <div class="order">
    	<h2>Order :</h2>
    	<table align="center" width="785px">
        <tr>
        <td align="center"><a href="showOrder.php"><img src="pics/updateStatus.jpg"></a></td>
        </tr>
	<tr><td><br/></td></tr>
	<tr><td><hr/><br/></td></tr>
	<tr><td align="center"><a href="adminLogout.php"><img src="pics/logout.jpg"></a></td></tr>
	
        </table>
    </div>
</div>
</body>
</html>