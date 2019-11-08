<?php
class reservation
{
	function reservation()
	{

$dbh=new dbi();
if(isset($_POST['submit']))
{
$set=$_SESSION['userid'];
$cartype=$_POST['cartype '];   
$noofcar=$_POST['noofcar'];
$rent=$_POST['rent'];
$noofdays=$_POST['noofdays'];
$totalamount=$_POST['totalamount'];
	$rdate= isset($_REQUEST["rdate"]) ? $_REQUEST["date5"] : "";
	$edate= isset($_REQUEST["edate"]) ? $_REQUEST["edate"] : "";
$sql=mysql_query("INSERT INTO reservation (userid,cartype,noofcar,noofdays,rdate,edate,totalamount)values('$set','$cartype','$noofcar','$noofdays','$rdate','$edate','$totalamount')");

		if($sql)
		{ 
        	$this->msg="reservation sucess !!!";
			header("location:payment.php");
		  
		}
		
		else
		{
			$this->msg="Database error !!!";
	    }
}
     }
}
$reservation= new reservation();
?>
  