<?php 
	session_start();
	if($_GET['ppg']=="product_add")
	{
		unset($_GET['ppg']);
		if(isset($_SESSION['cart']))
		{
			$cart=$_SESSION['cart'];
			$quantity=$_SESSION['qty'];
			$cart = $cart.",".$_POST['productid'];
			$quantity=$quantity.",".$_POST['qty'];
		}
		else
		{
			$cart=$_POST['productid'];
			$quantity=$_POST['qty'];
		}
		unset($_POST['productid']);
		unset($_POST['qty']);
		$_SESSION['cart']=$cart;
		$_SESSION['qty']=$quantity;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/buy.css" />
<title>XYZ.com - Your Cart</title>
</head>
<body>
<div class="bd">

<div id="header">
		<a href="index.php?ppg=showCart"><img style="float: left;" src="pics/hd_logo.jpg"></a>
		<div id="login" class="loginc">
			<a href="index.php?ppg=showCart"><font height="20px" align= "absmiddle">Home</font></a> |
			<font height="17px" align= "absmiddle" color="black">
<?php
	if((isset($_SESSION['user']))&&($_SESSION['user']!="guest"))
	{
		echo "Welcome ".$_SESSION['user']."</font></a> | ";
		echo "<a href=\"logout.php?ppg=showCart\"><font height=\"17px\" align= \"absmiddle\">Log Out</font></a> |";
	}
	else
	{
		echo "Welcome Guest</font></a> | ";
		echo "<a href=\"login.php?ppg=showCart\"><font height=\"17px\" align= \"absmiddle\">Log IN</font></a> |";
		$_SESSION['user']="guest";
	}
?>
			<a href="usrAC.php?ppg=home"><font height="20px" align= "absmiddle">My Account</font></a> |
			<a href="showCart.php?ppg=showCart"><font height="20px" align= "absmiddle">Shoping Cart</font></a> 
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
	</div>

	<div class="cart_products">
<br/><br/><hr/><br/>

<?php 
	if(isset($_SESSION['cart']))
	{
		echo "<h2>Your have the following items in your cart-</h2>";
		echo "<table align=\"center\">";
		echo "<tr>";
		echo "<th  align=\"center\">Product ID</th>";
		echo "<th  align=\"center\">Product Name</th>";
		echo "<th align=\"center\">Quantity</th>";
		echo "<th align=\"center\">Rate (Rs.)</th>";
		echo "<th align=\"center\">Total Price (Rs.)</th>";
		echo "<th>     </th></tr>";

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
				echo "<td align=\"center\"><a href=\"cartItemDel.php?ppg=showCart&pid=".$item."&qty=".$q[$i]."\">Remove</a>";
				echo "</tr>";
				$i=$i+1;
			}
			echo "</table><br/><br/></div><table align=\"center\"><tr>";
			mysql_close($con);
			if(isset($_SESSION['user']))
			{
				if($_SESSION['user']!="guest")
				{
					echo "<td align=\"center\"><a href=\"buy.php?ppg=showCart\"><img src=\"pics/checkout.jpg\" /></a></td></table>";
				}
				else
				{
					echo "<td align=\"center\"><a href=\"login.php?ppg=showCart\"><img src=\"pics/checkout.jpg\" /></a></td></table>";
				}
			}
		}
	}
	else
	{
		echo "<p align=\"center\"><font color=\"red\">You haven't yet added any product to your cart !</font></p>";
	}
?>
	<br/><hr/>
	
	<div name="odr_details">
	<p  align="center">
	<font color="green">You can go back to the <a href="index.php">Home Page</a> to add more products to your cart or can <a href="login.php?ppg=showCart">Sign IN</a></font>.
	</p>
	
	</div>
</div>	
</body>
</html>