<?php


$dbh=new dbi();
if(isset($_POST['Lease_vehicle']))
{
$leased_id=$_POST['leased_id'];
$reservation_id=$_POST['reservation_id'];
$qry_resev  = "select * from reservation where ReservationId = $reservation_id";
$reser_res = mysql_query($qry_resev);
$reserv_rw = mysql_fetch_array($reser_res);
$rdate = $reserv_rw[7];

     $returndate= isset($_REQUEST["returndate"]) ? $_REQUEST["returndate"] : "";
/*echo "UPDATE   leased_vehicles SET status='Returned', returndate='$rdate'  where leasedVehicleId='".$leased_id."'";*/
$sql=mysql_query("UPDATE   leased_vehicles SET status='Returned', returndate='$rdate'  where leasedVehicleId='".$leased_id."'");


if($sql){
mysql_query("UPDATE   reservation  SET status='closed'  where ReservationId='".$reservation_id."'");	
}


}

/*if(isset($_POST['delete_Lease']))
{
$leased_id=$_POST['leased_id'];
$reservation_id=$_POST['reservation_id'];


mysql_query("DELETE from   leased_vehicles   where lid='".$leased_id."'");
mysql_query("DELETE from   reservation   where RefId='".$reservation_id."'");

}*/
 ?>