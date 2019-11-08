<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();

$stat="cancel";
$branch_id= $_SESSION['branch_id'];
?>

<div id="main">
<h2>Leased vehicles List</h2>
<table class="cs" cellpadding="3" cellspacing="5">
<tr ><th>branch</th>
<th >vehicle</th>
<th >reservation id</th>
<th >leased days</th>
<th >leased date</th>
<th >return date</th>
<th >status</th>
</tr>
</table>
<?php
$id=mysql_query("select * from leased_vehicles  ");
while($result=mysql_fetch_array($id))
{?>
<table cellpadding="5" cellspacing="8">
<tr>
<td ><?php echo $result['branch_id'];?></td>
<td><?php echo $result['vehicle_id'];?></td>
<td><?php echo $result['reservation_id'];?></td>
<td><?php echo $result['leased_days'];?></td>
<td><?php echo $result['status'];?></td>


</tr>
</table>



<?php }?>
</div>
<?php
include("footer.php");
?>
