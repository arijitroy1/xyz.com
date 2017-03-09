<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/adminFinalBill.css" />
<title>XYZ.com - Final Bill</title>
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


	<div class="tbd" align="center">
		<table align="center">
<?php
	if(isset($_SESSION['user']))
		if($_SESSION['user']=="admin")
		{
			$order_id=$_REQUEST["odr"];
			$con=mysql_connect("localhost","root","tiger");
			if (!$con)
			{
 				die('Could not connect: ' . mysql_error());
			}
			else
			{
				mysql_select_db("xyz", $con);
				$odrmatrix=mysql_query("SELECT oid, dt, address,email, mobile, status FROM orderdeliverydtls WHERE oid='$order_id'");
				$num_r=mysql_num_rows($odrmatrix);
				if($num_r!=0)
				{
					$odrmatrix1=mysql_fetch_array($odrmatrix);
					$odate=$odrmatrix1[1];
                                				date_default_timezone_set('UTC');
					$temp_date=mktime(0,0,0,date("m"),date("d")+7,date("Y"));
					$ddate=date("Y-m-d", $temp_date);
					$address=$odrmatrix1[2];
					$mobile=$odrmatrix1[4];
					$email=$odrmatrix1[3];
                                				$o_status=$odrmatrix1[5];
					echo "<tr><td align=\"center\">Transaction ID :</td>";
					echo "<td align=\"center\">".$order_id."</td>";
					echo "</tr><tr>";
					echo "<td align=\"center\">Address :</td>";
					echo "<td align=\"center\">".$address."</td>";
					echo "</tr><tr>";
					echo "<td align=\"center\">Mobile :</td>";
					echo "<td align=\"center\">".$mobile."</td>";
					echo "</tr><tr><td align=\"center\">Order Date :</td>";
					echo "<td align=\"center\">".$odate."</td>";
					echo "</tr><tr><td align=\"center\">Delivery Date :</td>";
					echo "<td align=\"center\">".$ddate."</td>";
					echo "</tr><tr><td align=\"center\">Order Status :</td>";
					echo "<td align=\"center\">".$o_status."</td>";
                                				echo "</tr></table><br/><hr/></div><div class=\"bbd\">";
					echo "<table align=\"center\">";
					echo "<tr>";
					echo "<th align=\"center\">Product ID</th>";
					echo "<th align=\"center\">Quantity</th>";
					echo "<th align=\"center\">Rate (Rs.)</th>";
					echo "<th align=\"center\">Total Price (Rs.)</th></tr>";
					$product_list=mysql_query("SELECT pid, qty, price FROM `order` WHERE oid='$order_id'");
					$num_rows=mysql_num_rows($product_list);
					for($i=0; $i<$num_rows; $i++)
					{
						$product_list1=mysql_fetch_array($product_list);
						echo "<tr>";
						echo "<td align=\"center\">".$product_list1[0]."</td>";
						echo "<td align=\"center\">".$product_list1[1]."</td>";
						echo "<td align=\"center\">".($product_list1[2]/$product_list1[1])."</td>";
						echo "<td align=\"center\">".$product_list1[2]."</td>";
						echo "</tr>";
					}
					mysql_close($con);
					echo "</table></div><br/>";			
				}
				else
				{
			                                echo "<h3><font color=\"red\">The Transaction Id you entered is wrong.</font></h3>";
				}
			}
		}	
		else
		{
		                echo "<h3><font color=\"red\">Please Log IN first.</font></h3>";
		}
?>
		
<table align="center">
<form name="changeOrder" method="post" action="updateStatus.php">
	<tr>
		<td colspan="2"><?php echo "<input type=\"text\" name=\"odr\" value=\"".$order_id."\" style=\"visibility:hidden\" >"; ?></td>
	</tr>
	<tr>
		<td>Update the status to : </td>
		<td><select name="selectStatus">
			<option>In Process</option>
			<option>Shipped</option>
			<option>Cancelled</option>
		</select>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">
		<input type="submit" value="Update" name="submit" />
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">OR</td>
	</tr>
	<tr align="center">
		<td colspan="2">Go back to <a href="adminMain.php">HOME</a>.</td>
	</tr>
</form>
</table>
</div>
</div>
</body>
</html>
