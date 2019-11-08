<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
$dbh=new dbi();
//$set=$_SESSION['userid'];
//$date=date("Y-m-d");
//$lastDate="2100-12-30";
$stat="cancel";
$branch_id= $_SESSION['email'];

?>

<div id="main">
<h2>Payment List</h2>
<table class="cs listtable" cellpadding="0" cellspacing="0">
<tr><th>Name</th>
<th>Total Amount</th>
<th>Advance Amount</th>
<th>Date</th>

</tr>
</table>
<?php
$query = "select u.reservation_id,u.email,u.total_amount,u.advance_amount,
u.date,r.ReservationId,r.email,us.fname from user_payment u
inner join reservation r on u.reservation_id=r.ReservationId 
inner join userregister us on us.email=u.email
inner join vehicles v on r.VehicleId = v.vehicleId
where v.branchId = '$branch_id'
";

$id=mysql_query($query);
while($result=mysql_fetch_array($id))
{?>
<table cellpadding="1" cellspacing="1" class="listtable">
<tr><td><?php echo $result['fname'];?></td>
<td><?php echo $result['total_amount'];?></td>
<td><?php echo $result['advance_amount'];?></td>
<td><?php echo $result['date'];?></td>


</tr>
</table>



<?php }?>
</div>
<?php
include("footer.php");
?>
