<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/XYZ.css">
<title>XYZ.com - Market @ your home</title>
<link rel="logo" href="favicon.png" />
</head>
<body>
<div class="customBodyc">
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
	</div>
	<div class="m_body">
	<br/><br/><hr/><br/>

<h2 style="margin-bottom:0px;">Cameras</h2>
<ul style="height:160px;">
<?php
		$ptype="Camera";
		require("homeGallery.php");
 ?>
</ul><br/>

<h2 style="margin-bottom:0px;">Laptops</h2>
<ul>
<?php
		$ptype="Laptop";
		require("homeGallery.php");
?>
</ul><br/>

<h2 style="margin-bottom:10px;">Mobiles</h2>
<ul>
<?php
		$ptype="Mobile";
		require("homeGallery.php");
?>
</ul><br/>

<h2 style="margin-bottom:0px;">Printers</h2>
<ul>
<?php
		$ptype="Printer";
		require("homeGallery.php");
?>
</ul><br/>

<h2 style="margin-bottom:0px;">Storage Media</h2>
<ul style="height:130px;">
<?php
		$ptype="Storage";
		require("homeGallery.php");
?>
</ul><br/>
		
<h2 style="margin-bottom:0px;">Webcams</h2>
<ul style="height:160px;">
<?php
		$ptype="Webcam";
		require("homeGallery.php");
?>
</ul><br/>


	</div>

</div>
</body>
</html>