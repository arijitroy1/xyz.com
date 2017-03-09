<?php session_start(); ?>
<?php
	$order_id=$_REQUEST["odr"];
	if(isset($_SESSION['user']))
		if($_SESSION['user']=="admin")
		{			
			$status=$_REQUEST["selectStatus"];
			$con=mysql_connect("localhost","root","tiger");
			if (!$con)
			{
 				die('Could not connect: ' . mysql_error());
			}
			else
			{
				mysql_select_db("xyz", $con);
				$odrmatrix=mysql_query("UPDATE `orderdeliverydtls` SET `status`='$status' WHERE oid='$order_id'");
			}
		}
	header( "Location: adminFinalBill.php?odr=$order_id" ) ;	
		

?>
		