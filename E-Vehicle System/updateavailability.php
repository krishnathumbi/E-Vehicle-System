<?php
include('lib/init.php');
$dbh=new dbi();
$reserId=$_GET['resrId'];
$edatee=$_GET['edat'];
$sdatee=$_GET['sdat'];
$RefId=$_GET['carno'];
$sql=mysql_query("select CarNo from cars where RefId='$RefId'");
$data=mysql_fetch_object($sql);
$carNo=$data->CarNo;
$qry=mysql_query("select * from reservation where RefId='".$reserId."'");
$setdata=mysql_fetch_object($qry);
$myreserdate=$setdata->reserdate;
$myreturndate=$setdata->returndate;
if(($myreserdate==$sdatee) && ($myreturndate=$edatee))
{
	echo '<input type="hidden" value="Reserved" name="status" />';
}
else
{
$query=mysql_query("select * from reservation where carNo='$carNo' and reserdate BETWEEN '$sdatee' AND '$edatee' and   	returndate BETWEEN '$sdatee' AND '$edatee'");
$result=mysql_fetch_object($query);
if($result)
{
	echo "This car already reserved between $sdatee and $edatee";
	echo '<input type="hidden" value="Waiting" name="status" />';
}
else
{
	echo '<input type="hidden" value="Reserved" name="status" />';
}
}

//if($sql)
//{
//	$number=0;
//	while($data=mysql_fetch_array($sql))
//	{
//		$number=+$data['noofcar'];
//	}
//	//echo $number;
//	$query=mysql_query("Select total-'$number'as counter from cartype where cartype='$carpt'");
//	$result=mysql_fetch_object($query);
//	$availablecars=$result->counter;
//	//echo $availablecars;
//	$carsnumber=$availablecars-$noofcar;
//	echo $carsnumber;
//}

?>
