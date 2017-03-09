<?php
session_start();
$email=$_POST["email"];
$pwd=$_POST["pwd"];
$con=mysql_connect("localhost","root","tiger");
if (!$con)
{
  	die('Could not connect: ' . mysql_error());
}
else
{   
	mysql_select_db("xyz", $con);
	$result = mysql_query("SELECT * FROM customer WHERE email='$email'");
	if($_POST["submit"]=="Register")
	{
		if((strcmp($_POST["pwd"],$_POST["pwd1"])==0)&&((strlen($_POST["name"])!=0)&&(strlen($_POST["email"])!=0)&&(strlen($_POST["pwd"])!=0)))
		{
			$name=$_POST["name"];
			$num_rows=mysql_num_rows($result);
			if($num_rows)
			{
				$row = mysql_fetch_array($result);
				if(strnatcasecmp($row['name'],$name)==0)
				{
					$_SESSION['email']=2;
				}
				else
				{
					$_SESSION['email']=1;
				}
				$_SESSION['user']="guest";
				header( 'Location: login.php?ppg=redirect' ) ;
			}
			else
			{
				mysql_query("INSERT INTO customer (email, name, pwd) VALUES('$email','$name','$pwd')");
				$_SESSION['email']=$email;
				$_SESSION['user']=$name;
				if(isset($_SESSION['cart']))
				{
					header( 'Location: buy.php?ppg=redirect' ) ;	
				}	
				else
				{
					header( 'Location: usrAC.php?ppg=redirect' ) ;
				}	
			}	
		}
		else
		{
			$_SESSION['email']=4;
			$_SESSION['user']="guest";
			header( 'Location: login.php?ppg=redirect' ) ;	
		}
	}	
	elseif($_POST["submit"]=="Log in")
	{
		$row = mysql_fetch_array($result);
		if($row['pwd']!=$pwd)
		{
			$_SESSION['email']=3;
			$_SESSION['user']="guest";
			header( 'Location: login.php?ppg=redirect' ) ;
		}
		else
		{
			$_SESSION['email']=$email;
			$_SESSION['user']=$row['name'];
			if((strcmp($email,"admin@xyz.com"))==0)
			{
				header( 'Location: adminMain.php?ppg=redirect' ) ;
			}
			else if(isset($_SESSION['cart']))
			{
				header( 'Location: buy.php?ppg=redirect' ) ;
			}
			else
			{
				header( 'Location: usrAC.php?ppg=redirect' ) ;
			}
		}
	}
}
?>
