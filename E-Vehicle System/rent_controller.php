<?php
class rent
{
   function rent()
  {
$dbh=new dbi();
if(isset($_POST['submit']))
{
$total=$_POST['total'];
$rent=$_POST['rent'];
$sdate= isset($_REQUEST["sdate1"]) ? $_REQUEST["sdate1"] : "";
$enddate= isset($_REQUEST["enddate1"]) ? $_REQUEST["enddate1"] : "";
$sql=mysql_query("INSERT INTO rent(total,rent,sdate,enddate) values('$total','$rent','$sdate','$enddate')");
 if($sql)
		{ 
        	$this->msg="sucess !!!";
			}
		
		else
		{
			$this->msg="Database error !!!";
	    }
    }
  }
}
$reservation= new rent();
?>

 


