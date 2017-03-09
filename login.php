<?php session_start(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/login.css">
<title>XYZ.com-Log IN or Register</title>
</head>
<body>
<div id="login" class="customBodyc">

	<div id="header">
		<a href="index.php?ppg=login"><img style="float: left;" src="pics/hd_logo.jpg"></a>
		<div id="login" class="loginc">
			<a href="index.php?ppg=login"><font height="20px" align= "absmiddle">Home</font></a> |
			<font height="17px" align= "absmiddle" color="black">
<?php
	if((isset($_SESSION['user']))&&($_SESSION['user']!="guest"))
	{
		echo "Welcome ".$_SESSION['user']."</font></a> | ";
		echo "<a href=\"logout.php?ppg=login\"><font height=\"17px\" align= \"absmiddle\">Log Out</font></a> |";
	}
	else
	{
		echo "Welcome Guest</font></a> | ";
		echo "<a href=\"login.php?ppg=login\"><font height=\"17px\" align= \"absmiddle\">Log IN</font></a> |";
		$_SESSION['user']="guest";
	}
?>

			<a href="usrAC.php?ppg=home"><font height="20px" align= "absmiddle">My Account</font></a> |			 
			<a href="showCart.php?ppg=login"><font height="20px" align= "absmiddle">Shoping Cart</font></a> 
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

<div class="m_body" style="float:none;">
<br/><br/><hr/>
	<h1>Login or Register :</h1>

	<table align="center" width="780px" class="m_tbl">
	<tr>
		<th align="center"><h3>Existing user please Log IN</h3></th>
		<th align="center"><h3>New user please Register</h3></th>
	</tr>
	<tr>
	
		<td  width="500px" valign="top" >
				<form action="redirect.php?ppg=login" method="post" name="UsrIP">
				<table align="center">
				<tr>
					
					<td align="center">Email Address : </td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td align="right">Password :</td>
					<td><input type="password" name="pwd" /></td>
				</tr>
				<tr>
				<td></td>
					<td><input type="submit" name="submit" value="Log in"/></td>
				</tr>
				</table>
				</form>
		</td>
		<td width="500px">
		<form action="redirect.php?ppg=login" method="post" name="UsrReg">
				<table align="center">
				<tr>
				<td align="right">Name :</td>
				<td><input type="text" name="name" /></td>
				</tr>
				<tr>
				<td align="right">Your Email address :</td>
				<td><input type="text" name="email"/></td>
				</tr>
				<tr>
				<td align="right">Choose Password :</td>
				<td><input type="password" name="pwd"  /></td>
				</tr>
				<tr>
				<td align="right">Reenter Password :</td>
				<td><input type="password" name="pwd1" /></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Register" /></td>
				</tr>
				</table>
			</form>
		</td>
	</tr>
<?php
	if($_GET['ppg']=="redirect")
	{
		echo "<tr>";
		if($_SESSION['email']==1)
		{
			echo "<td></td>";
			echo "<td align=\"center\"><font color=\"red\">The Email Address you specified is already registered under some other name.</font></td>";
		}
		else if($_SESSION['email']==2)
		{
			echo "<td></td>";
			echo "<td align=\"center\"><font color=\"red\">You are already a registered user, so please Log IN.</font></td>";
		}
		else if($_SESSION['email']==3)
		{
				echo "<td align=\"center\"><font color=\"red\">You have specified a wrong Password or Email Address.</font></td>";
				echo "<td></td>";
		}
		else if($_SESSION['email']==4)
		{
				echo "<td></td>";
				echo "<td align=\"center\"><font color=\"red\">Please fill up all the required fields properly.</font></td>";

		}
		echo "</tr>";

	}
?>
	</table>
</div>
</div>
</body>
</html>