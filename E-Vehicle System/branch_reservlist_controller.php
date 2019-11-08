<?php

	    $dbh=new dbi();
		if(isset($_POST['Lease_vehicle']))
		{  
			
	     ;
			
			$reservation_id=$_POST['reservation_id'];
			$vehicle_id=$_POST['vehicle_id'];
			$rentdays=$_POST['rentdays'];
			$branch_id=$_POST['branch_id'];
			

			$sql=mysql_query("insert into  leased_vehicles (branch_id,vehicle_id,reservation_id,leased_days,status) values ('".$branch_id."','".$vehicle_id."','".$reservation_id."','".$rentdays."','leased')");
			if($sql){
			mysql_query("UPDATE   reservation SET status='leased'  where ReservationId='".$reservation_id."'");
			}
		}


?>

	
	