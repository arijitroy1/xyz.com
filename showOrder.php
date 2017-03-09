<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/showOrder.css" />
<title>XYZ.com - View Transactions</title>
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

<h2 style="margin-bottom:3px;">Insert a period to view Transaction -</h2>
<font color="green" align="center">Fill up the fields you in the format 'YYYY-MM-DD HH:MM:SS'</font><br/><br/>
	<div class="input" align="center">
		<table width="500" align="center">
        <form method="post" action="showOrder.php">
        <tr>
        <td align="right">From :</td><td align="left"><input type="text" name="from" /></td>
        </tr>
         <tr><td align="right">To :</td><td align="left"><input type="text" name="to" /></td>
         </tr>
          <tr>
         <td></td><td align="left"><input type="submit" value="Show Transaction" name="submit"/></td>
        </tr>
        </form>
        </table>
  </div>
    <div class="showGrid">
    
    <?php
	if((isset($_SESSION['user']))&&(isset($_POST["submit"])))
	{
		if(($_SESSION['user']=="admin")&&($_POST["submit"]=="Show Transaction"))
		{
			$con=mysql_connect("localhost","root","tiger");
			if (!$con)
			{
 				die('Could not connect: ' . mysql_error());
			}
			else
			{
				$f=$_POST["from"];
				$t=$_POST["to"];
				mysql_select_db("xyz", $con);
				$product_list=mysql_query("SELECT oid, dt, address, email, mobile, status FROM `orderdeliverydtls` WHERE dt BETWEEN '$f' AND '$t' ");
				$num_rows=mysql_num_rows($product_list);
				if($num_rows)
				{
					echo "<div class=\"bbd\">";
					echo "<h2 style=\"color: rgb(0,68,98); margin-bottom:3px;\">Transactions -</h2>";
					echo "<font color=\"green\" align=\"center\">Click on the corrosponding Order Id to perform updation</font><br/><br/>";
					echo "<table align=\"center\">";
					echo "<tr>";
					echo "<th align=\"center\">Order ID</th>";
					echo "<th align=\"center\">Order Date & Time</th>";
					echo "<th align=\"center\">Delivery Address</th>";
					echo "<th align=\"center\">Email</th>";
					echo "<th align=\"center\">Mobile</th>";
					echo "<th align=\"center\">Status</th>";
					for($i=0; $i<$num_rows; $i++)
					{
						$product_list1=mysql_fetch_array($product_list);
						echo "<tr>";
						echo "<td align=\"center\"><a href=\"adminFinalBill.php?odr=".$product_list1[0]."\">".$product_list1[0]."</a></td>";
						echo "<td align=\"center\">".$product_list1[1]."</td>";
						echo "<td align=\"center\">".$product_list1[2]."</td>";
						echo "<td align=\"center\">".$product_list1[3]."</td>";
						echo "<td align=\"center\">".$product_list1[4]."</td>";
						echo "<td align=\"center\">".$product_list1[5]."</td>";
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
	}
?>
    	
    </div>
</div>
</body>
</html>


