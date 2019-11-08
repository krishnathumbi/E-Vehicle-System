<?php
class updatereservation
{
   function reservation()
  {
     $dbh=new dbi();
	 if(isset($_POST['reserv']))
	 {
		 $refId=$_GET['RefId'];
		 $userId=$_SESSION['userid'];
		 $carNo=$_POST['carNo'];
		 $rdate=isset($_REQUEST["rdate5"]) ? $_REQUEST["rdate5"] : "";
         $edate= isset($_REQUEST["enddate5"]) ? $_REQUEST["enddate5"] : "";
		 $purpose=$_POST['purpose'];
		 $totalamt=$_POST['carRenttotal'];
		 $advanceamt=$_POST['paymentadvance'];
		 $balanceamt=$_POST['paymentbalance'];
		 $nodays=$_POST['nodays'];
		 $status=$_POST['status'];
		 //$query=mysql_query("select * from reservation where carNo='".$carNo."' and reserdate='".$rdate."' and UserId='".$userId."'");
	     //$setdata=mysql_fetch_object($query);
	     //if($setdata)
	     //{
           //$this->msg="You already reserved this car on $rdate !!!";	  
	     //}
	     //else
	     //{
				 $sql=mysql_query("update  reservation set purpose='".$purpose."',reserdate='".$rdate."',returndate='".$edate."',totalamt='".$totalamt."',advanceamt='".$advanceamt."',balnaceamt='".$balanceamt."',rentdays='".$nodays."',status='".$status."' where RefId='".$refId."'");
			
		 if($sql)
		 {
			 $this->msg="Reservation updated successfully You Reservation ID='$refId' !!!";
		 }
		 else
		 {
			 $this->msg="Database error !!!";
		 }
		 //}
	 }
  }
  
}
$reservation= new updatereservation();
$reservation->reservation();
?>
