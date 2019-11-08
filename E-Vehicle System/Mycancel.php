<?php
include('lib/init.php');
$dbh=new dbi();
$RefId=$_GET['refid'];
$sql=mysql_query("select * from reservation where ReservationId='".$RefId."'");
$result=mysql_fetch_object($sql);
$carNo=$result->VehicleRegNo;
$sdatee=$result->reserdate;
$edatee=$result->returndate;
$rentdays=$result->rentdays;
$totalamount=$result->totalamt;
$advanceamt=$result->advanceamt;
$balanceamt=$result->balnaceamt;
$cancelfee=$advanceamt*(0.10);
$returnamt=$advanceamt-$cancelfee;

mysql_query("update  user_payment set return_amount='".$returnamt."',cancellation_fee='".$cancelfee."', status='cancel' where reservation_id='$RefId'");
$delqry=mysql_query("update reservation set advanceamt='".$returnamt."', status='cancel' where ReservationId='$RefId'");
if($delqry)
{
	header("location:reservationlist_user.php?returnamt='$returnamt'&cancelfee='$cancelfee'");
}
//echo "select * from reservation  where status='Waiting' and reserdate >= '$sdatee' and returndate <= '$edatee' and carNo='".$carNo."'";

$s1 = "select * from reservation  where ReservationId='".$RefId."'";
$qry=mysql_query($s1);

while($data=mysql_fetch_array($qry))
{
	$id=$data['RefId'];
	$sdate=$data['reserdate'];
	$edate=$data['returndate'];
	$qry1=mysql_query("delete* from reservation  where ReservationId='".$RefId."'");
	//echo "select * from reservation  where status='Reserved' and reserdate >= '$sdate' and returndate <= '$edate' and carNo='".$carNo."'";
	$sup=mysql_fetch_array($qry1);
	var_dump($sup);
	if(!$sup)
	{
		//echo "yes";
		//echo $id;
	   $setqry=mysql_query("update reservation set status='Reserved' where ReservationId='$id'");
	   //echo "update reservation set status='Reserved' where RefId='$id'";
	}
}

/*if($rentdays>1)
{
	$query=mysql_query("select RefId,reserdate,returndate,rentdays  from reservation where status='Waiting' and reserdate <= '$sdatee' and returndate >= '$edatee' and carNo='".$carNo."'");
    while($data=mysql_fetch_array($query))
	{
		$activesdate=$data['reserdate'];
		$activeedate=$data['returndate'];
		$NewId=$data['RefId'];
		$newdays=$data['rentdays'];
		if($newdays>1)
		{
			$chkqry=mysql_query("select * from reservation where reserdate <= '$sdatee' and returndate >= '$edatee'");
			$getchk=mysql_fetch_object($chkqry);
			if($getchk)
			{
			}
			else
			{
		       $setfinal=mysql_query("update reservation set status='Reserved' where RefId='$NewId'");
			}
		}
		else
		{
			$chkqry=mysql_query("select * from reservation where reserdate <= '$sdatee' and returndate >= '$edatee'");
			$getchk=mysql_fetch_object($chkqry);
			if($getchk)
			{
			}
			else
			{
		       $setfinal=mysql_query("update reservation set status='Reserved' where RefId='$NewId'");
			}
		}
		
	}
    
}
else
{
	$query=mysql_query("select min(RefId) as nextId  from reservation where status='Waiting' and reserdate <= '$sdatee' and returndate >= '$edatee' and carNo='".$carNo."'");
    $data=mysql_fetch_object($query);
    $NewId=$data->nextId;
	$setfinal=mysql_query("update reservation set status='Reserved' where RefId='$NewId'");

}*/
//if($delqry)
//{
	//header("location:reservationlist_user.php?returnamt='$returnamt'&cancelfee='$cancelfee'");
//}

?>