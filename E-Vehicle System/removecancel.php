<?php
include("lib/init.php");
$RentId=$_GET['RefId'];
$dbh=new dbi();
$data=mysql_query("delete from reservation where VehicleId='".$RentId."'");
if($data)
{
	header("location:cancellist.php");
}
?>