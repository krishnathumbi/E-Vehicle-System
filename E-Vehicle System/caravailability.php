<?php
include('lib/init.php');
$dbh=new dbi();

$edatee=$_GET['edat'];
$sdatee=$_GET['sdat'];
$RefId=$_GET['carno'];
//$sql=mysql_query("select CarNo from vehicles where RefId='$RefId'");
//$data=mysql_fetch_object($sql);
//$carNo=$data->CarNo;

$query=mysql_query("select * from reservation where VehicleId='$RefId' and reserdate <= '$sdatee' and returndate >= '$edatee'");
//echo "select * from reservation where carNo='$carNo' and reserdate >= '$sdatee' and returndate <= '$edatee'";
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
