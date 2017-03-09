<?php
session_start();

if((isset($_SESSION['user'])))
{
	if($_SESSION['user']=="admin")
	{
		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			mysql_select_db("xyz", $con);
			if($_REQUEST["submit"]=="Delete")
			{
				$pid=$_REQUEST["pid"];
				mysql_query("DELETE FROM product WHERE pid='$pid' ");
			}
			else
			{
				$pname=$_REQUEST["pname"];
				$rs=$_REQUEST["pprice"];
				$qtyh=$_REQUEST["pqtyh"];
				$info=$_REQUEST["pinfo"];
				//echo $info;
				$manufacturer=$_REQUEST["pmanufacturer"];
				//echo $manufacturer;
				$type=$_REQUEST["type"];
				//echo $type;
				$pic=$_REQUEST["ppic"];
				$dis=$_REQUEST["pdis"];
				$h_show=$_REQUEST["hpshow"];
				$temp="No info available";
				if($_REQUEST["submit"]=="Insert")
				{	
					$maxpid=mysql_query("SELECT MAX(pid) FROM product");
					$maxpida=mysql_fetch_array($maxpid);
					if(!is_null($maxpida[0]))
					{
						$pid=1000000000+(($maxpida[0]-1000000000)+1);
					}
					else
					{
						$pid=1000000000;
					}
					if(strlen($pname)==0)
					{
						header( 'Location: adminMain.php' ) ;
					}
					else
					{
						mysql_query("INSERT INTO product (pid, info) VALUES('$pid','$temp')");
						require("adminCheckUpdate.php");
					}
				}
				else if($_REQUEST["submit"]=="Update")
				{		
					$pid=$_REQUEST["pid"];
					if(strlen($pid)!=0)
						require("adminCheckUpdate.php");		
				}
			}
			mysql_close($con);
		}
		header( 'Location: adminMain.php' ) ;
	}
}
	
?>
