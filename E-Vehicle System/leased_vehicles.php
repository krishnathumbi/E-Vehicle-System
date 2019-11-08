<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
require_once('calendar/classes/tc_calendar.php');
$dbh=new dbi();
//$set=$_SESSION['userid'];
//$date=date("Y-m-d");
//$lastDate="2100-12-30";
$stat="cancel";
$branch_id= $_SESSION['email'];
?>
<style>
.fullDetails
{
	background-color: #FFFFFF;
padding: 10px;
width:97%;
float:left;
-moz-border-radius:10px;
display:none;
  border: 1px solid;
 
  margin-bottom: 10px;
}

.leftrow div
{
	float:left;
	width:100%;
	margin-top:5px;
}
.rightrow div
{
	margin-top:5px;
	float:left;
	width:100%;
}
.show
{
	cursor:pointer;
}
</style>
<script>
$(document).ready(function(){
	$('.show').click(function(){
		$(".fullDetails").hide();
		$(this).parent().parent().parent().parent().next('.fullDetails').show('slow');
		})
		$('.hide').click(function(){
			$(this).parent().parent().parent('.fullDetails').hide('slow');
			})
	})
</script>
<div id="main">
<h2>Leased Vehicle List</h2>
<table class="cs listtable" cellpadding="0" cellspacing="0">
<tr align="left"><th >Client</th>
<th  >Car Number</th>
<th >Booking Date</th>
<th  >Rent Start Date</th>
<th  >Return date</th>
<th  >Options</th>
</tr>
</table>
<?php
/*$id=mysql_query("select *,r.Refid as regid from reservation r INNER JOIN userregister ur ON (r.UserId=ur.userid) left join cars cr on(r.carid=cr.RefId) left join vtype v on(cr.vid=v.vtypeid) inner join leased_vehicles lv on(r.Refid!=lv.reservation_id) where v.branch_id='".$branch_id."'and  r.status!='".$stat."'");*/


$id=mysql_query("select *,lv.status,ur.fname lvstatus from  leased_vehicles lv 
inner join reservation r on(lv.reservation_id=r.ReservationId) 
INNER JOIN userregister ur ON (r.email=ur.email) 
left join vehicles cr on(r.VehicleId=cr.vehicleId) 
where cr.branchId='".$branch_id."' and lv.status='leased'");



while($result=mysql_fetch_array($id))
{   /*var_dump($result); die('here');*/?>

<table cellpadding="0" cellspacing="0" class="listtable">
<tr align="left"><td  ><?php echo $result['fname'];?></td>
<td ><?php echo $result['VehicleRegNo'];?></td>
<td ><?php echo $result['bookdate'];?></td>
<td  ><?php echo $result['reserdate'];?></td>
<td  ><?php echo $result['returndate'];?></td>
<td  ><span class="show">More Details</span></td>
</tr>
</table>
<div class="fullDetails">
<div class="leftrow" style="width:45%;float:left;">
<div>Client Name : <?php echo $result['fname'];?></div>
<div>Address : <?php echo $result['address'];?></div>
<div>City : <?php echo $result['city'];?></div>
<div>State : <?php echo $result['state'];?></div>
<div>Pincode : <?php echo $result['pincode'];?></div>
<div>Email : <?php echo $result['email'];?></div>
<div>Phone/Mobile : <?php echo $result['phoneno'];?></div>
<div>Select Return Date:</div>

<div>
<?php if($result['lvstatus'] !='returned'){ ?>
<form method="post" action="">
<input type="hidden" name="reservation_id" value="<?php echo $result['reservation_id'];?>" />
<input type="hidden" name="leased_id" value="<?php echo $result['leasedVehicleId'];?>" />
<input type="submit" name="Lease_vehicle"  value="vehicle Returned" />
</form>
<?php } ?>


<?php /*?><?php if($result['lvstatus'] =='returned'){ ?>
<form method="post" action="">
<input type="hidden" name="leased_id" value="<?php echo $result['lid'];?>" />
<input type="hidden" name="reservation_id" value="<?php echo $result['reservation_id'];?>" />


<input type="submit" name="delete_Lease"  value="delete" />
</form>
<?php } ?><?php */?>


</div></div>
<div class="rightrow" style="width:45%;float:left; margin-left:10px;">
<div>Car Number  :  <?php echo $result['VehicleRegNo'];?></div>
<div>Purpose  :  <?php echo $result['purpose'];?></div>
<div>Reservation Date : <?php echo $result['reserdate'];?></div>
<div>Return Date  :  <?php echo $result['returndate'];?></div>
<div>Total Amount  :  <?php echo $result['totalamt'];?></div>
<div>Advance Amount  :  <?php echo $result['advanceamt'];?></div>
<div>Balance Amount  :  <?php echo $result['balnaceamt'];?></div>
<div>Status  :  <?php echo $result['status'];?></div>
<input type="hidden" name="returndate" value="<?php echo $result['returndate'];?>" />
<div><input type="button" name="hide" class="hide" value="Less Details" /></div>
</div>

</div>
<?php }?>
</div>
<?php
include("footer.php");
?>
