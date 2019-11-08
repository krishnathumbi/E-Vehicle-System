<?php
include("lib/init.php");
include("header.php");
include('sidebar_user.php');
$dbh=new dbi();
$set=$_SESSION['email'];
$sdatee=date("Y-m-d");
$edatee="2100-12-30";
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
<h2>RESERVATION LIST</h2>
<h5><?php if(isset($_GET['returnamt']))
{ 
?>
Your reservation is successfully cancelled ........ You charged the cancellation fee Rs <?php echo $_GET['cancelfee'].' ............. '?> You will get Rs <?php echo $_GET['returnamt'].'......';
}?>
</h5>
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">
<tr><th width="50">Rent Id</th>
<th width="100">Car Number</th>
<th width="113">Rent Start Date</th>
<th width="113">Return date</th>
<th width="50">Status</th>
<th width="75">Options</th>
</tr>
</table>
<?php
$id=mysql_query("select * from reservation where email='$set' and  returndate >= '$sdatee' and status!='cancel'");
while($result=mysql_fetch_array($id))
{?>
<table cellpadding="0" cellspacing="0" class="listtable">
<tr><td width="50"><?php echo $result['ReservationId'];?></td>
<td width="100"><?php echo $result['VehicleRegNo'];?></td>
<td  width="113"><?php echo $result['reserdate'];?></td>
<td  width="113"><?php echo $result['returndate'];?></td>
<td  width="60"><?php echo $result['status'];?></td>
<td  width="115"><span class="show">More Details</span></td>
</tr>
</table>
<div class="fullDetails">
<div class="leftrow" style="width:45%;float:left;">
<div>Car Number  :  <?php echo $result['VehicleRegNo'];?></div>
<div>Purpose  :  <?php echo $result['purpose'];?></div>
<div>Booking Date  :  <?php echo $result['bookdate'];?></div>
<div>Rent Start Date : <?php echo $result['reserdate'];?></div>
<div>Retun Date  :  <?php echo $result['returndate'];?></div>
<div>
<?php if($result['status']!='closed'){?>
<a href="Mycancel.php?refid=<?php echo $result['ReservationId'];?>"><input type="button" name="Cancel" value="Cancel Reservation" /></a>

<?php }?>
</div>
</div>
<div class="rightrow" style="width:45%;float:left; margin-left:10px;">
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