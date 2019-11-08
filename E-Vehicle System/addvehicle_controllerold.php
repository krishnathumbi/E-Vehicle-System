<?php
class addvehicle
{
	function addvehicle()
	{
	    $dbh=new dbi();
		if(isset($_POST['add']))
		{
		$carno=$_POST['carno'];
		$cartype=$_POST['cartype'];
		$availability=$_POST['availability'];
		$ino=$_POST['ino'];
        $pofi= isset($_REQUEST["period5"]) ? $_REQUEST["period5"] : "";
		$sss=mysql_query("select * from cartype where cartype='$cartype'");
		$qq=mysql_fetch_object($sss);
		$resul=$qq->total;
		$rree=$resul+1;
		$sql=mysql_query("INSERT INTO addvehicle (carno,cartype,availability,insuranceno,periodofinsurance)
		values('$carno','$cartype','yes','$ino','$pofi')");
		
		if($sql)
		{
	     mysql_query("INSERT INTO cartype(available)values('yes')");
		$ff=mysql_query("update cartype set total='$rree' where cartype='$cartype'");
			$this->msg="One Vehicle added !!!";
		}
		else
		{
			$this->msg="Database error !!!";
		}
       }
	}
}
$addvehicle= new addvehicle();
?>

	
	