<?php
class reservation
{
   function reservation()
  {
     $dbh=new dbi();
	 if(isset($_POST['reserv']))
	 {
		 $userId=$_SESSION['email'];
		 
		 $carNo=$_POST['carNo'];
		 $carid=$_POST['carid'];
		 $rdate=isset($_REQUEST["rdate5"])? $_REQUEST["rdate5"] : "";
         $edate= isset($_REQUEST["enddate5"])? $_REQUEST["enddate5"] : "";
		 $purpose=$_POST['purpose'];
		 $totalamt=$_POST['carRenttotal'];
		 $advanceamt=$_POST['paymentadvance'];
		 $balanceamt=$_POST['paymentbalance'];
		 $nodays=$_POST['nodays'];
		
//		$status=$_POST['status'];
$status="Reserved";

		$creditcardnumber=$_POST['creditcardnumber'];
		 $date = mktime(0,0,0,date("m"),date("d"),date("Y"));
         $m= date("Y-m-d", $date);
		 $query=mysql_query("select * from reservation where VehicleRegNo='".$carNo."' and reserdate='".$rdate."' and returndate='".$edate."' and status='".$status."'");
	     $setdata=mysql_fetch_object($query);
	     if($setdata)
	     {
           //$this->msg="You already reserved this car on $rdate !!!";	  
	     }
	     else
	     {
				 $sql=mysql_query("insert into  reservation (email,VehicleRegNo,purpose,bookdate,reserdate,returndate,totalamt,advanceamt,balnaceamt,rentdays,status,VehicleId) values ('".$userId."','".$carNo."','".$purpose."','".$m."','".$rdate."','".$edate."','".$totalamt."','".$advanceamt."','".$balanceamt."','".$nodays."','".$status."','".$carid."')");
		
		
/*	mysql_query("insert into  user_payment (userid,total_amount,advance_amount,balnace_amount,credit_card_no,date) values ('".$userId."','".$totalamt."','".$advanceamt."','".$balanceamt."','".$creditcardnumber."','".$m."')");*/
		
		 if($sql)
		 {
			 $refqry=mysql_query("select max(ReservationId) as MyId from reservation");
			  $refdata=mysql_fetch_object($refqry);
			  $idd=$refdata->MyId;
			  
			  	mysql_query("insert into  user_payment (email,total_amount,advance_amount,balnace_amount,credit_card_no,date,reservation_id,status) values ('".$userId."','".$totalamt."','".$advanceamt."','".$balanceamt."','".$creditcardnumber."','".$m."','".$idd."','reserved')");
			  
			  
			 $refqr=mysql_query("select status from reservation where ReservationId='".$idd."'");
			 $refdat=mysql_fetch_object($refqr);
			 header("location:printreservation.php?rid=$refdata->MyId");
			// $this->msg="Reservation successfull... your status is '$refdat->status'... Your Reservation ID='$refdata->MyId' !!! ";
		 }
		 else
		 {
			 $this->msg="Database error !!!";
		 }
		 
		 
		 
		 
		 }
	 }
  }
  
}
$reservation= new reservation();
?>
