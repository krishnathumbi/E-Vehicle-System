<?php
include('lib/init.php');
switch ($_GET['method']) {
    case 'getcompany':
		$id=$_REQUEST['vid'];
        $dbh=new dbi();
		$sql=mysql_query("select * from vehiclecompany where VehicleType = $id");
		
		$str= '<option value="">Select</option>';
		while($result=mysql_fetch_array($sql))
		{ 
			$rs=$result['VehicleCompanyId'];
			
			$str.= '<option value="'.$rs.'">'; 
			$str.= $result['VehicleCompanyName'];
			$str.= '</option>';
			
		}echo $str;
        break;
    case 'getmodel':
       $id=$_REQUEST['cid'];
        $dbh=new dbi();
		$sql=mysql_query("select * from vehiclemodel where VehicleCompany = $id");
		
		$str= '<option value="">Select</option>';
		while($result=mysql_fetch_array($sql))
		{ 
			$rs=$result['VehicleModelId'];
			
			$str.= '<option value="'.$rs.'">'; 
			$str.= $result['VehicleModelName'];
			$str.= '</option>';
			
		}echo $str;
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
      return false;
}
?>