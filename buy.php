<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/buy.css" />
<link rel="stylesheet" type="text/css" href="stylesheets/xyz.css" />
<title>XYZ.com - Buy Product</title>
</head>
<body>
<div class="bd">

<div id="header">
		<a href="index.php?ppg=home"><img style="float: left;" src="pics/hd_logo.jpg"></a>
		<div id="login" class="loginc">
			<a href="index.php?ppg=home"><font height="20px" align= "absmiddle">Home</font></a> |
			<font height="17px" align= "absmiddle" color="black">
<?php
	if((isset($_SESSION['user']))&&($_SESSION['user']!="guest"))
	{
		echo "Welcome ".$_SESSION['user']."</font></a> | ";
		echo "<a href=\"logout.php?ppg=home\"><font height=\"17px\" align= \"absmiddle\">Log Out</font></a> |";
	}
	else
	{
		echo "Welcome Guest</font></a> | ";
		echo "<a href=\"login.php?ppg=home\"><font height=\"17px\" align= \"absmiddle\">Log IN</font></a> |";
		$_SESSION['user']="guest";
	}
?>
			<a href="usrAC.php?ppg=home"><font height="20px" align= "absmiddle">My Account</font></a> |
			<a href="showCart.php?ppg=home"><font height="20px" align= "absmiddle">Shoping Cart</font></a> 
		</div>
	</div>
<br/><br/><hr/>

	<div class="cart_products">
<?php 
	if(isset($_SESSION['cart']))
	{
		echo "<h2><font color=\"#236B8E\">Your have the following items in your cart -</font></h2>";
		echo "<table align=\"center\">";
		echo "<tr>";
		echo "<th align=\"center\">Product ID</th>";
		echo "<th align=\"center\">Product Name</th>";
		echo "<th align=\"center\">Quantity</th>";
		echo "<th align=\"center\">Rate (Rs.)</th>";
		echo "<th align=\"center\">Total Price (Rs.)</th></tr>";
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			mysql_select_db("xyz", $con);
			$cart_items=explode(",",$_SESSION['cart']);
			$q=explode(",",$_SESSION['qty']);
			$i=0;
			foreach($cart_items as $item)
			{
				$result=mysql_query("SELECT pname, rs, discount FROM product WHERE pid='$item'");
				$result1=mysql_fetch_array($result);
				echo "<tr>";
				echo "<td align=\"center\">".$item."</td>";
				echo "<td align=\"center\">".$result1[0]."</td>";
				echo "<td align=\"center\">".$q[$i]."</td>";
				$dprice=intval($result1[1] - (($result1[1]*$result1[2])/100));
				echo "<td align=\"center\">".$dprice."</td>";
				echo "<td align=\"center\">".($dprice*$q[$i])."</td>";
				echo "</tr>";
				$i=$i+1;
			}
			mysql_close($con);
		}
	}
	else
	{
		echo "<p align=\"center\"><font color=\"red\">Currently you do not have any product in your cart !</font></p>";
	}
?>
	</table><br/><hr/>
	</div>
	<div name="odr_details">
	<h2><font color="#236B8E">Please specify the following details for delivery -</font></h2>
	<table align="center">
		<form name="deliverydtls" method="post" action="insertTran.php">
		<tr>
		<td align="right">Address :</td>
		<td align="left"><textarea name="address" rows="5" cols="17"></textarea></td>
		</tr>
		<tr>
		<td align="right">Mobile No. :</td>
		<td align="left"><input type="text" name="mobileno"/></td>
		</tr>
		<tr>
		<td align="right">Delivery Date :</td>
		<td align="left"><input type="text" value="3-5 working days" disabled="disabled" /></td>
		</tr>
		<tr>
		<td colspan= "2" align="center"><input type="submit" value="Pay Now" /></td>
		</tr>
		</form>
	</table>
	</div>
</div>	
</body>
</html>