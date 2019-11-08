<?php
include('lib/init.php');
$dbh=new dbi();
if(isset($_GET['RefId']))
 {
	 $Id=$_GET['RefId'];
	 $CarNo=$_GET['carNo'];
	 $qry=mysql_query("select * from cars where RefId='".$Id."' and replace( CarNo, ' ', '' )!='".$CarNo."'");
	 $result=mysql_fetch_object($qry);
	 if($result)
	 {
		 $sql=mysql_query("select * from cars where replace( CarNo, ' ', '' )='".$CarNo."'");
		
		$data=mysql_fetch_object($sql);
		if($data)
		{
			echo "Car Number existing !!! Please enter new one";
		}
	 }
 }
else
  {
		$CarNo=$_GET['carNo'];
		$sql=mysql_query("select * from cars where replace( CarNo, ' ', '' )='".$CarNo."'");
		
		$data=mysql_fetch_object($sql);
		if($data)
		{
			echo "Car Number existing !!! Please enter new one";
		}
  }
?>