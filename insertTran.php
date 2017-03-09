<?php
	session_start();
	if(isset($_SESSION['cart']))
	{
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{
			mysql_select_db("xyz", $con);
			date_default_timezone_set('UTC');
			$odate=date("Y-m-d H:i:s");
			$temp_date=mktime(0,0,0,date("m"),date("d")+7,date("Y"));
			$ddate=date("Y-m-d", $temp_date);
			$address=$_REQUEST["address"];
			$mobile=$_REQUEST["mobileno"];
			$email=$_SESSION['email'];
			$maxoid=mysql_query("SELECT MAX(oid) FROM orderdeliverydtls");	
			$maxoida=mysql_fetch_array($maxoid);
			if(!is_null($maxoida[0]))
			{
				$oid=1000000000+(($maxoida[0]-1000000000)+1);
			}
			else
			{
				$oid=1000000000;
			}
			mysql_query("INSERT INTO orderdeliverydtls(oid, dt, address, email, mobile) VALUES('$oid', '$odate', '$address', '$email', '$mobile')");
			$cart_items=explode(",",$_SESSION['cart']);
			$q=explode(",",$_SESSION['qty']);
			$i=0;
			foreach($cart_items as $item)
			{
				$result=mysql_query("SELECT rs,discount FROM product WHERE pid='$item'");
				$result1=mysql_fetch_array($result);
				$dprice=intval($result1[0] - (($result1[0]*$result1[1])/100));
				$tprice=$dprice*$q[$i];
				mysql_query("INSERT INTO `order` (oid, pid, qty, discount, price) VALUES('$oid', '$item', '$q[$i]', $result1[1], '$tprice')");
				$i=$i+1;
			}
			mysql_close($con);
		}
		unset($_SESSION['cart']);
		unset($_SESSION['qty']);
		header( "Location: finalBill.php?odr=$oid" ) ;				
	}
	else
	{
		header( 'Location: usrAC.php' ) ;				
	}
?>