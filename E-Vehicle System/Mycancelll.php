<?php
include('lib/init.php');
$dbh=new dbi();
$RefId=$_GET['refid'];
$sql=mysql_query("select * from reservation where RefId='".$RefId."'");
$result=mysql_fetch_object($sql);
$carNo=$result->carNo;
$rdate=$result->reserdate;
$edate=$result->returndate;
$rentdays=$result->rentdays;
$delqry=mysql_query("delete from reservation where RefId='$RefId'");
if($rentdays>1)
{
	$query=mysql_query("select RefId,reserdate,returndate,rentdays  from reservation where status='Waiting' and reserdate between '".$rdate."' and '".$edate."' and returndate between '".$rdate."' and '".$edate."' and carNo='".$carNo."'");
    while($data=mysql_fetch_array($query))
	{
		$activesdate=$data['reserdate'];
		$activeedate=$data['returndate'];
		$NewId=$data['RefId'];
		$newdays=$data['rentdays'];
		if($newdays>1)
		{
			$chkqry=mysql_query("select * from reservation where reserdate between '".$rdate."' and '".$edate."' and returndate between '".$rdate."' and '".$edate."'");
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
			$chkqry=mysql_query("select * from reservation where reserdate between '".$rdate."' and '".$edate."' and returndate between '".$rdate."' and '".$edate."'");
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
	$query=mysql_query("select min(RefId) as nextId  from reservation where status='Waiting' and reserdate='".$rdate."' and returndate='".$edate."' and carNo='".$carNo."'");
    $data=mysql_fetch_object($query);
    $NewId=$data->nextId;
	$setfinal=mysql_query("update reservation set status='Reserved' where RefId='$NewId'");

}
if($delqry)
{
	header("location:reservationlist_user.php");
}

?>