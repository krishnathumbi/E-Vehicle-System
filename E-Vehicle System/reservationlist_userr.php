<?php
include("lib/init.php");
include("header.php");
include('sidebar_user.php');
$dbh=new dbi();
$set=$_SESSION['userid'];
$date=date("Y-m-d");
$lastDate="2100-12-30";
?>
<style>
.fullDetails
{
	background-color: #FFFFFF;
padding: 10px;
width: 500px;
float:left;
-moz-border-radius:10px;
display:none;
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
<h2>RESERVATION LIST</h2>
<table class="cs" cellpadding="5" cellspacing="8" >
<tr><th>Car Number</th>
<th>Reservation Date</th>
<th>Return date</th>
<th>Status</th>
<th>Options</th>
</tr>
</table>
<?php
$id=mysql_query("select * from reservation where UserId='$set' and reserdate between '".$date."' and '".$lastDate."'");
while($result=mysql_fetch_array($id))
{?>
<table cellpadding="5" cellspacing="8">
<tr><td width="75"><?php echo $result['carNo'];?></td>
<td  width="113"><?php echo $result['reserdate'];?></td>
<td  width="70"><?php echo $result['returndate'];?></td>
<td  width="46"><?php echo $result['status'];?></td>
<td  width="115"><a href="update_reservation.php?RefId=<?php echo $result['RefId'];?>">Edit</a> | <span class="show">More Details</span></td>
</tr>
</table>
<div class="fullDetails">
<div class="leftrow" style="width:45%;float:left;">
<div>Car Number  :  <?php echo $result['carNo'];?></div>
<div>Purpose  :  <?php echo $result['purpose'];?></div>
<div>Reservation Date : <?php echo $result['reserdate'];?></div>
<div>Retun Date  :  <?php echo $result['returndate'];?></div>
<div>
<a href="Mycancel.php?refid=<?php echo $result['RefId'];?>"><input type="button" name="Cancel" value="Cancel Reservation" /></a>
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