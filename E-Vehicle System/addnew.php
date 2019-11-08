<?php
include("lib/init.php");
$x=$_POST['vtype'];
$y=$_POST['company'];
$z=$_POST['vmodel'];

$dbh=new dbi();
$sql=mysql_query("INSERT INTO carmodel (typeId,carmodel,cartype) values ('".$y."','".$z."','".$x."')");	
if($sql)
{
	$data="Vehicle model added successfully";
}
else
{
	$data="Database error";
}
echo $data;?>