<?php 
		echo "<table align=\"center\">";
		echo "<tr>";
		echo "<th>Product ID</th>";
		echo "<th>Product Name</th>";
		echo "<th>Quantity</th>";
		echo "<th>Rate (Rs.)</th>";
		echo "<th>Total Price (Rs.)</th></tr>";

		$con=mysql_connect("localhost","root","tiger");
		if (!$con)
		{
 			die('Could not connect: ' . mysql_error());
		}
		else
		{   
			mysql_select_db("xyz", $con);
			$cart_items=explode(",",$_SESSION['cart']);
			$q=explode(",",$_SESSION['qty']);
			$i=0;
			foreach($cart_items as $item)
			{
				$result=mysql_query("SELECT pname, rs FROM product WHERE pid='$item'");
				$result1=mysql_fetch_array($result);
				echo "<tr>";
				echo "<td align=\"center\">".$item."</td>";
				echo "<td align=\"center\">".$result1[0]."</td>";
				echo "<td align=\"center\">".$q[$i]."</td>";
				echo "<td align=\"center\">".$result1[1]."</td>";
				echo "<td align=\"center\">".($result1[1]*$q[$i])."</td>";
				echo "</tr>";
			}
			mysql_close($con);
		}

?>