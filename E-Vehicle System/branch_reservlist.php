<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
$dbh=new dbi();
//$set=$_SESSION['userid'];
//$date=date("Y-m-d");
//$lastDate="2100-12-30";
$stat="Reserved";
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
		$(this).parent().parent().parent().parent().next('.fullDetails').slideDown('slow');
		})
		$('.hide').click(function(){
			$(this).parent().parent().parent('.fullDetails').slideUp('slow');
			})
	})
</script>
<div id="main">
<h2>Reservation List</h2>
<table class="cs listtable" cellpadding="0" cellspacing="0">
<tr align="left"><th width="72">Client</th>
<th align="left" width="75">Car Number</th>
<th align="left" width="75">Booking Date</th>
<th align="left" width="85">Rent Start Date</th>
<th align="left" width="85">Return date</th>
<th align="left" width="75">Options</th>
</tr>
</table>
<?php
$s="select *,r.ReservationId as regid from reservation r 
INNER JOIN userregister ur ON (r.email=ur.email) 
left join vehicles cr on(r.VehicleId=cr.vehicleId) 
where cr.branchId='".$branch_id."' and  r.status='".$stat."'" ;


$id=mysql_query($s);


while($result=mysql_fetch_array($id))
{   ?>

<table cellpadding="0" cellspacing="0" class="listtable">
<tr align="left"><td  width="75"><?php echo $result['fname'];?></td>
<td width="113"><?php echo $result['VehicleRegNo'];?></td>
<td width="113"><?php echo $result['bookdate'];?></td>
<td  width="113"><?php echo $result['reserdate'];?></td>
<td  width="113"><?php echo $result['returndate'];?></td>
<td  width="115"><span class="show">More Details</span></td>
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
<div>
<form method="post" action="">
<input type="hidden" name="reservation_id" value="<?php echo $result['regid'];?>" />
<input type="hidden" name="vehicle_id" value="<?php echo $result['VehicleId'];?>" />
<input type="hidden" name="rentdays" value="<?php echo $result['rentdays'];?>" />
<input type="hidden" name="branch_id" value="<?php echo $result['branchId'];?>" />


<input type="submit" name="Lease_vehicle"  value="vehicle leased" /></div>
</form>
</div>
<div class="rightrow" style="width:45%;float:left; margin-left:10px;">
<div>Car Number  :  <?php echo $result['VehicleRegNo'];?></div>
<div>Purpose  :  <?php echo $result['purpose'];?></div>
<div>Reservation Date : <?php echo $result['reserdate'];?></div>
<div>Retun Date  :  <?php echo $result['returndate'];?></div>
<div>Total Amount  :  <?php echo $result['totalamt'];?></div>
<div>Advance Amount  :  <?php echo $result['advanceamt'];?></div>
<div>Balance Amount  :  <?php echo $result['balnaceamt'];?></div>
<div>Status  :  <?php echo $result['status'];?></div>

<div><input type="button" name="hide" class="hide" value="Less Details" /></div>
</div>

</div>
<?php }?>
</div>
<?php
include("footer.php");
?>
