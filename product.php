
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/product.css">

<script type="text/javascript">
function onsubmitform()
{
	if(Number(document.pgdirect.qty.value)>0)
	{
		document.pgdirect.action ="showCart.php?ppg=product_add";
	}
	else
	{
		alert("Please first specify a valid Quantity.");	
	}	
	return true;
}
</script>

<title>XYZ.com - Product Details</title>
</head>

<body>
<div class="bd">

	<div id="header">
		<a href="index.php?ppg=product"><img style="float: left;" src="pics/hd_logo.jpg"></a>
		<div id="login" class="loginc">
			<a href="index.php?ppg=product"><font height="20px" align= "absmiddle">Home</font></a> |
			<font height="17px" align= "absmiddle" color="black">
<?php
	if((isset($_SESSION['user']))&&($_SESSION['user']!="guest"))
	{
		echo "Welcome ".$_SESSION['user']."</font></a> | ";
		echo "<a href=\"logout.php?ppg=product\"><font height=\"17px\" align= \"absmiddle\">Log Out</font></a> |";
	}
	else
	{
		echo "Welcome Guest</font></a> | ";
		echo "<a href=\"login.php?ppg=product\"><font height=\"17px\" align= \"absmiddle\">Log IN</font></a> |";
		$_SESSION['user']="guest";
	}
?>
			<a href="usrAC.php?ppg=home"><font height="20px" align= "absmiddle">My Account</font></a> |
			<a href="showCart.php?ppg=product"><font height="20px" align= "absmiddle">Shoping Cart</font></a> 
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
<br/><br/><hr/>

	<div class="tbd">
		<div class="picture">
			
<?php
		$product_id=$_GET['pid'];
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			mysql_select_db("xyz", $con);
			$nampic=mysql_query("SELECT pname,pic,rs,discount,qtyh,info FROM product where pid='$product_id' ");
			$nampica=mysql_fetch_array($nampic);
			echo "<img src=\"".$nampica[1]."\" alt=\"pics/photo_not_available.jpg\" />";
		}
?>
		</div>
		<div class="infos">
			<table align="center">
				<tr>
				<th colspan="2" align="center">

<?php

			echo "<h2>".$nampica[0]."</h2>";
			echo "</th>	</tr>";
			echo "<tr><td>Product ID :</td>";
			echo "<td>".$product_id."</td>";
			echo "</tr>";
			echo "<tr><td>Market Price :</td>";
			echo "<td><font size= \"5\" color= \"black\">";
			echo "<b>Rs ".$nampica[2]."</b></font></td></tr>";
			echo "<tr><td>Discount:</td>";
			echo "<td>".$nampica[3]."%</td></tr>";
			echo "<tr><td>Our Price:</td>";
			echo "<td><font size=\"5\" color=\"red\">";
			$dprice=intval($nampica[2] - (($nampica[2]*$nampica[3])/100));
			echo "<b>Rs.".$dprice."</b></font></td></tr>";
			echo "<tr><td colspan= \"2\" align= \"center\">";
			echo "<font size= \"5\" color= \"green\">";
			echo "<b>In Stock</b></font></td></tr>";
			echo "</table></div>";
			mysql_close($con);
		
?>
	<div class="btn">
			<form method="post" onsubmit="return onsubmitform();" name="pgdirect" >
			<table align="right">
			<tr >
			<td colspan="2"><input type="text" name="productid" value=<?php echo "\"$product_id\""; ?> style="visibility: hidden;">
			</td>
			</tr>
			<tr>
			<td width="108" align="right">
			Quantity :
			</td>
			<td width="73" align="left"><input type="text" name="qty" value="1" style="width:20px;">
			</td>
			</tr>
			<tr>
			<td align="center" colspan="2"><input type="submit" id="ac" name="submit" onclick="document.pressed=this.value" value="Add to Cart" /></td>
			</tr>
			<tr>
			<td colspan="2"><img src="\pics/cod.jpg" alt="Cash on Delivery Available"/></td>
			</tr>

			</table>
			</form>
		</div>
	</div>
<br/><br/>
	<div class="bbd" style="float: left;">
<h3>Product Info -</h3>
<?php 
		echo "<p>".$nampica[5]."</p>";
?>
	</div>
</div>
</body>
</html>