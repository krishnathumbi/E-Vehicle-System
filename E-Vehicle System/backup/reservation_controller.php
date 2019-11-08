<?php
class reservation
{
   function reservation()
  {
$dbh=new dbi();
$set=$_SESSION['userid'];
if(isset($_POST['submit']))
 {
$cartype=$_POST['cartype'];   
$cars=implode(",",$cartype);
/*$noofcar=$_POST['noofcar'];*/
$noofdays=$_POST['noofdays'];
$totalamount=$_POST['totalamount'];
$rdate=isset($_REQUEST["rdate5"]) ? $_REQUEST["rdate5"] : "";
$edate= isset($_REQUEST["enddate5"]) ? $_REQUEST["enddate5"] : "";
$sql=mysql_query("INSERT INTO  reservation (userid,cartype,rdate,edate,noofdays,totalamount ) VALUES('$set','$cars','$rdate','$edate','$noofdays','$totalamount')");
         if($sql)
		{ 
        	$this->msg="reservation sucess !!!";
			//header("location:reservationsucess.php");
		  
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
