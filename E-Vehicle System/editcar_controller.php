<?php
class editvehicle
{
	function editvehicle()
	{
	    $dbh=new dbi();
		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES["Image_upload"]["tmp_name"],"attachments/".$_FILES["Image_upload"]["name"]);
	        $InsDate= isset($_REQUEST["InsDate"]) ? $_REQUEST["InsDate"] : "";
			$e_path="attachments/".$_FILES["Image_upload"]["name"];
			$CarNo=$_POST['carNo'];
			$CarModel=$_POST['cartype'];
			$InsNo=$_POST['InsNo'];
			$Rent=$_POST['carRent'];
			$carId=$_GET['id'];
					$qry =  "update vehicles set VehicleRegNo='$CarNo',VehicleModel='$CarModel',InsuranceNo='$InsNo',InsuranceDate='$InsDate',Rent='$Rent',Image='$e_path' where vehicleId='$carId'";
					
			$sql=mysql_query($qry);
			if($sql)
			{
				$this->msg="Vehicle Details Updated !!!";
			}
		}
	}
}
$addvehicle= new editvehicle();
?>