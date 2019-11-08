<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();
$set=$_SESSION['email'];
//$date=date("Y-m-d");
$stat="cancel";
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
<h2>Cancel Reservation List</h2>
<table class="cs" cellpadding="5" cellspacing="8" >
<tr><th width="72">Client</th>
<th width="75" align="left">Car Number</th>
<th align="left" width="75">Booking Date</th>
<th width="85" align="left">Rent Start Date</th>
<th width="85" align="left">Return date</th>
<th width="75" align="left">Options</th>
</tr>
</table>
<?php
$query = "select * from reservation r INNER JOIN userregister ur ON r.email=ur.email where r.status='".$stat."'";
$id=mysql_query($query);
while($result=mysql_fetch_array($id))
{?>
<table cellpadding="5" cellspacing="8">
<tr><td  width="100"><?php echo $result['username'];?></td>
<td width="113"><?php echo $result['carNo'];?></td>
<td width="113"><?php echo $result['bookdate'];?></td>
<td  width="113"><?php echo $result['reserdate'];?></td>
<td  width="113"><?php echo $result['returndate'];?></td>
<td  width="115"><span class="show">More Details</span></td>
</tr>
</table>
<div class="fullDetails">
<div class="leftrow" style="width:45%;float:left;">
<div>Client Name : <?php echo $result['name'];?></div>
<div>Address : <?php echo $result['address'];?></div>
<div>City : <?php echo $result['city'];?></div>
<div>State : <?php echo $result['state'];?></div>
<div>Pincode : <?php echo $result['pincode'];?></div>
<div>Email : <?php echo $result['email'];?></div>
<div>Phone/Mobile : <?php echo $result['phoneno'];?></div>
<div></div>
<div></div>
<div></div><div></div>
<div>
<tr><td class="showchild"><span class="remove"><a href="removecancel.php?RefId=<?php echo $result['RefId'];?>"><div><input name="txtbut" type="button" value="Delete"></div></a></span></td></tr></div>
</div>
<div class="rightrow" style="width:45%;float:left; margin-left:10px;">
<div>Car Number  :  <?php echo $result['carNo'];?></div>
<div>Purpose  :  <?php echo $result['purpose'];?></div>
<div>Reservation Date : <?php echo $result['bookdate'];?></div>
<div>Rent Start Date : <?php echo $result['reserdate'];?></div>
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
