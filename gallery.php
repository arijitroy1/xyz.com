<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/gallery.css">
<title>XYZ.com - Gallery</title>
</head>
<body>
<div class="gallerybody">

	<div id="header">
		<a href="index.php?ppg=gallery"><img style="float: left;" src="pics/hd_logo.jpg"></a>
		<div id="login" class="loginc">
			<a href="index.php?ppg=gallery"><font height="20px" align= "absmiddle">Home</font></a> |
			<font height="17px" align= "absmiddle" color="black">
<?php
	if((isset($_SESSION['user']))&&($_SESSION['user']!="guest"))
	{
		echo "Welcome ".$_SESSION['user']."</font></a> | ";
		echo "<a href=\"logout.php?ppg=gallery\"><font height=\"17px\" align= \"absmiddle\">Log Out</font></a> |";
	}
	else
	{
		echo "Welcome Guest</font></a> | ";
		echo "<a href=\"login.php?ppg=gallery\"><font height=\"17px\" align= \"absmiddle\">Log IN</font></a> |";
		$_SESSION['user']="guest";
	}
?>

			<a href="usrAC.php?ppg=home"><font height="20px" align= "absmiddle">My Account</font></a> |			 
			<a href="showCart.php?ppg=gallery"><font height="20px" align= "absmiddle">Shoping Cart</font></a> 
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
<h2 style="margin-bottom:10px;"><?php 
	if($_GET['type']=="Storage")
	{
		echo "Storage Medias -";
	}
	else
	{
		echo $_GET['type']."s -";
	}
 ?></h2>
	<ul>
			
<!--		<li>
		<a href="camera.html">
			<img src="" alt="" />
			<span class="" style="text-decoration: none;">
			</span>
		</a>
		<div class="price">
			<img src="price logo" alt="Rs." />
			<span>2000</span>
		</div>
		</li>
-->


<?php
		$ptype=$_GET['type'];
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			mysql_select_db("xyz", $con);
			$nampic=mysql_query("SELECT pname,pic,pid FROM product where type='$ptype' ");
			$nampica=mysql_fetch_array($nampic);
			while(!is_null($nampica[0])){
				echo "<li>";
				echo "<a href=\"product.php?pid=".$nampica[2]."\">";
				echo "<img src=\"".$nampica[1]."\" alt=\" pics/photo_not_available.jpg\" width= \"150px\" />";
				echo "<span class=\"plabel\">";
				echo $nampica[0];
				echo "</span></a>";
				$nampica=mysql_fetch_array($nampic);
			}
			mysql_close($con);
		}
 ?>


</ul>
</div>
</div>

</body>
</html>

