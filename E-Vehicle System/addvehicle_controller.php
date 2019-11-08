<?php
class addvehicle
{
	function addvehicle()
	{
	    $dbh=new dbi();
		$branch_id= $_SESSION['email'];
		if(isset($_POST['submit']))
		{  
			move_uploaded_file($_FILES["Image_upload"]["tmp_name"],"attachments/".$_FILES["Image_upload"]["name"]);
	        $InsDate= isset($_REQUEST["InsDate"]) ? $_REQUEST["InsDate"] : "";
			$e_path="attachments/".$_FILES["Image_upload"]["name"];
			$CarNo=$_POST['carNo'];
			$CarModel=$_POST['cartype'];
			$vid=$_POST['type'];
			$InsNo=$_POST['InsNo'];
			$Rent=$_POST['carRent'];
			$company=$_POST['company'];

			$sql=mysql_query("insert into vehicles (VehicleType,VehicleCompany,VehicleModel,VehicleRegNo,InsuranceNo,InsuranceDate,Rent,Image,branchId) values ('".$vid."','".$company."','".$CarModel."','".$CarNo."','".$InsNo."','".$InsDate."','".$Rent."','".$e_path."','".$branch_id."')");
			if($sql)
			
			{
			
			/*	$cid=mysql_query("select VehicleCountId from vehicle_count where branch_id='".$branch_id."'  and model_id='".$CarModel."'");
				$cnt= mysql_num_rows($cid);
				if($cnt>0)
				{
					$result=mysql_fetch_array($cid);
					$ciid=$result['VehicleCountId'];
					mysql_query("UPDATE vehicle_count SET number_of_vehicles =number_of_vehicles +1 WHERE VehicleCountId='".$ciid."'");
					
				}
				else{
				
				$res=mysql_query("insert into  vehicle_count (branch_id,model_id,number_of_vehicles) values('".$branch_id."','".$CarModel."','1')");
				}
				*/
				echo '<script>alert("Record added successfully")</script>';
				$this->msg="One Vehicle added !!!";
			}
			
		}
	}
/*$carno=$_POST['carno'];
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
	}*/
}
$addvehicle= new addvehicle();
?>

	
	