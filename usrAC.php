<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/finalBill.css" />
<title>XYZ.com - Your A/C</title>
</head>
<body>
<div class="bd">
	<div class="tbd">

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
		<div class="catalogc"><b>
			<ul>
			<li><a href="gallery.php?type=Camera">Cameras</a></li> 
			<li><a href="gallery.php?type=Laptop">Laptops</a></li> 
			<li><a href="gallery.php?type=Mobile">Mobiles</a></li> 
			<li><a href="gallery.php?type=Printer">Printers</a></li> 
			<li><a href="gallery.php?type=Storage">Storage Media</a></li> 
			<li><a href="gallery.php?type=Webcam">Webcams</a></li> 
			</ul></b>
		</div>
	<br/><br/><hr/>

		
<?php
	if($_SESSION['user']!="guest")
	{
		echo "<h2 style=\"color: rgb(0,68,98);\">Account Info -</h2>";
		echo "<table align=\"center\">";
		date_default_timezone_set('UTC');
		$email=$_SESSION['email'];
		$name=$_SESSION['user'];
                                	echo "<tr><td align=\"center\">Name :</td>";
		echo "<td align=\"center\">".$name."</td>";
		echo "</tr><tr>";
		echo "<td align=\"center\">Email :</td>";
		echo "<td align=\"center\">".$email."</td>";
		echo "</tr><tr>";
	                  echo "</tr></table><br/><hr/></div>";
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{
			mysql_select_db("xyz", $con);
			$product_list=mysql_query("SELECT oid, dt, status FROM `orderdeliverydtls` WHERE email='$email'");
			$num_rows=mysql_num_rows($product_list);
			if($num_rows)
			{
				echo "<div class=\"bbd\">";
				echo "<h2 style=\"color: rgb(0,68,98);\">Your previous Transactions -</h2>";
				echo "<table align=\"center\">";
				echo "<tr>";
				echo "<th align=\"center\">Order ID</th>";
				echo "<th align=\"center\">Order Date & Time</th>";
				echo "<th align=\"center\">Order Status</th>";
				for($i=0; $i<$num_rows; $i++)
				{
					$product_list1=mysql_fetch_array($product_list);
					echo "<tr>";
					echo "<td align=\"center\"><a href=\"finalBill.php?odr=".$product_list1[0]."\">".$product_list1[0]."</a></td>";
					echo "<td align=\"center\">".$product_list1[1]."</td>";
					echo "<td align=\"center\">".$product_list1[2]."</td>";
					echo "</tr>";
				}
				echo "</table></div><br/>";
			}
			mysql_close($con);
						

		}
	}	
	else
	{
                        echo "<h3 align=\"center\"><font color=\"red\">To access your account please <a href=\"login.php?ppg=usrAC\">Log IN</a> first.</font></h3>";
	}
?>
	<br/><hr/>
	
	<div name="odr_details">
	<p  align="center">
	<font color="green">You can go back to the <a href="index.php">Home Page</a> to add more products to your cart.</font>
	</p>
	</div>
</div>
</body>
</html>
