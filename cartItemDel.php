<?php 
	session_start();
	if($_GET['ppg']=="showCart")
	{
		if(isset($_SESSION['cart']))
		{
			$pid=$_GET["pid"];
			$qty=$_REQUEST["qty"];
			$cart_items=explode(",",$_SESSION['cart']);
			$q=explode(",",$_SESSION['qty']);
			$i=0;
			$j=0;
			$del_flag=0;
			foreach($cart_items as $item)
			{
				if(($item==$pid)&&($q[$i]==$qty)&&($del_flag==0))
				{
					$del_flag=1;
				}
				else
				{
					echo "abc";
					if($j==0)
					{
						$t_cart=$item;
						$t_q=$q[$i];
						$j=1;
					}
					else
					{
						$t_cart = $t_cart.",".$item;
						$t_q=$t_q.",".$q[$i];	
					}
				}
				$i=$i+1;
			}
			if($j==0)
			{
				unset($_SESSION['cart']);
				unset($_SESSION['qty']);
			}
			else
			{
				$_SESSION['cart']=$t_cart;
				$_SESSION['qty']=$t_q;
			}					
		}
	}


	header( 'Location: showCart.php?ppg=cartItemDel' ) ;
?>