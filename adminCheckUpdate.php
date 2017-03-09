<?php

				if(strlen($pname)!=0)
				{
					mysql_query("UPDATE product SET pname='$pname' WHERE pid='$pid' ");
				}
				if(strlen($rs)!=0)
				{
					mysql_query("UPDATE product SET rs='$rs' WHERE pid='$pid' ");
				}
				if(strlen($qtyh)!=0)
				{
					mysql_query("UPDATE product SET qtyh='$qtyh' WHERE pid='$pid' ");
				}
				if(strlen($info)!=0)
				{
					mysql_query("UPDATE product SET info='$info' WHERE pid='$pid' ");
				}
				if(strlen($manufacturer)!=0)
				{
					mysql_query("UPDATE product SET manufacturer='$manufacturer' WHERE pid='$pid' ");
				}
				if(strlen($type)!=0)
				{
					mysql_query("UPDATE product SET type='$type' WHERE pid='$pid' ");
				}
				if(strlen($pic)!=0)
				{
					mysql_query("UPDATE product SET pic='$pic' WHERE pid='$pid' ");
				}
				if(strlen($dis)!=0)
				{
					mysql_query("UPDATE product SET discount='$dis' WHERE pid='$pid' ");
				}
				if(strlen($h_show)!=0)
				{
					mysql_query("UPDATE product SET home_pg_show='$h_show' WHERE pid='$pid'");
				}

?>