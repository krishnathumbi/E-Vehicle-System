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
         $return_date= isset($_REQUEST["enddate5"])? $_REQUEST["enddate5"] : "";
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
		 
		 /*---card details---*/
		 $holdername=$_POST['holdername'];
		 $expiry=$_POST['dt'];
		 $cvv=$_POST['cvv'];
		 
		 
		 $query1="select * from card where cardno='$creditcardnumber' and cardholder='$holdername'";
		
		
		$res1=mysql_query($query1);
		
		
		 if(mysql_num_rows($res1)>0)
		 {
			 //die("sdhfjhsk");
			$query="select * from reservation where VehicleRegNo='".$carNo."' and reserdate='".$rdate."' and returndate='".$edate."' and status='".$status."'";
			
			$res=mysql_query($query);
			
				//$setdata=mysql_fetch_object($query); 
				
			if(mysql_num_rows($res)==0)
			{
				//$this->msg="You already reserved this car on $rdate !!!";	  
				$sql="insert into  reservation (email,VehicleRegNo,purpose,bookdate,reserdate,returndate,totalamt,advanceamt,balnaceamt,rentdays,status,VehicleId) values ('".$userId."','".$carNo."','".$purpose."','".$m."','".$rdate."','".$return_date."','".$totalamt."','".$advanceamt."','".$balanceamt."','".$nodays."','".$status."','".$carid."')";
				
				$res=mysql_query($sql);
				
				if($res)
				{
					$refqry=mysql_query("select max(ReservationId) as MyId from reservation");
					$refdata=mysql_fetch_object($refqry);
					$idd=$refdata->MyId;
			  
					mysql_query("insert into  user_payment (email,total_amount,advance_amount,balance_amount,credit_card_no,date,reservation_id,status) values ('".$userId."','".$totalamt."','".$advanceamt."','".$balanceamt."','".$creditcardnumber."','".$m."','".$idd."','reserved')");
			  
			  
					$refqr=mysql_query("select status from reservation where ReservationId='".$idd."'");
					$refdat=mysql_fetch_object($refqr);
					header("location:printreservation.php?rid=$refdata->MyId");
				}
			}
			
			else
			{
				 $this->msg="Database error !!!";
			}
		
		 }
		 else
		 {
			 echo "Failed";
		 }
	 }
  }
  
}
$reservation= new reservation();
?>
