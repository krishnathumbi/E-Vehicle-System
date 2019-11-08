<?php
include('lib/init.php');
$dbh=new dbi();
$noofcar=$_GET['numm'];
//echo $noofcar;
$edatee=$_GET['edat'];
$sdatee=$_GET['sdat'];
$carpt=$_GET['carpt'];
$sql=mysql_query("select noofcar from reservation where cartype='$carpt' and rdate BETWEEN '$sdatee' AND '$edatee' and edate BETWEEN '$sdatee' AND '$edatee'");
if($sql)
{
	$number=0;
	while($data=mysql_fetch_array($sql))
	{
		$number=+$data['noofcar'];
	}
	//echo $number;
	$query=mysql_query("Select total-'$number'as counter from cartype where cartype='$carpt'");
	$result=mysql_fetch_object($query);
	$availablecars=$result->counter;
	//echo $availablecars;
	$carsnumber=$availablecars-$noofcar;
	echo $carsnumber;
}

?>
