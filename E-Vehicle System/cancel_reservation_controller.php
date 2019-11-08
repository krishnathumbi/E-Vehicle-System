<?php
 $dbh=new dbi();
if(isset($_GET['rentid']))
{
   $rid=$_GET['rentid'];
	$sql1=mysql_query("select * from reservation where rentid='$rid'");
	$res=mysql_fetch_object($sql1);
	$car=$res->cartype;
     $nocar=$res->noofcar;
	$sql1=mysql_query("select min(rentid),waitingstatus, noofcar from reservation where cartype='$car' and waitingstatus<0 "); 
	$data=mysql_fetch_array($sql1);
	 $rntid=$data['min(rentid)'];
	$waitst=$data['waitingstatus'];
	$Nocar=$data['noofcar'];
	while($waitst<$nocar)
	{
	 mysql_query("update reservation set noofcar='$Nocar'+'$waitst' where rentid=$rntid");
	
	
		
	}

    $sqlo=mysql_query("DELETE FROM reservation where rentid='$rid'");
	
}
?>
