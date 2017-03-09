<?php

		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			$count=0;
			$i="yes";
			mysql_select_db("xyz", $con);
			$nampic=mysql_query("SELECT pname,pic,pid FROM product where (home_pg_show='$i')AND(type='$ptype') ");
			$nampica=mysql_fetch_array($nampic);
			while((!is_null($nampica[0]))&&($count<4)){
				echo "<li>";
				echo "<a href=\"product.php?pid=".$nampica[2]."\">";
				echo "<img src=\"".$nampica[1]."\" alt=\" pics/photo_not_available.jpg\" width= \"150px\" />";
				echo "<span class=\"plabel\">";
				echo $nampica[0];
				echo "</span></a>";
				$nampica=mysql_fetch_array($nampic);
				$count++;
			}
			mysql_close($con);
		}

?>