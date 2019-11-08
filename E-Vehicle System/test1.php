<?php
include('lib/init.php');
$dbh=new dbi();
$noofcar=$_GET['numm'];
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
	$query=mysql_query("Select total-'$number'as counter from cartype where cartype='$carpt'");
	$result=mysql_fetch_object($query);
	echo $result->counter;
}
//$sql=mysql_query("Select * from cartype where no<'$noofcar'");
/*if($r=mysql_fetch_object($sql))
{
	//echo "car not available ";
	$carcount=$r->noofcar ;
	$sqll=mysql_query("Select * from cartype where cartype='$carpt' and total < '$carcount'");
	$avail=mysql_fetch_object($sqll);
	echo "available ";
}
else
{
echo "available ";
echo $_GET['nocars'];
}*/
?>
