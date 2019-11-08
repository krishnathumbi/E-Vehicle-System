<?php
include('lib/init.php');
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();
?>
<div id="main">
<h2>VEHICLE LIST</h2>
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>car type</td>
<td>no of car</td>
<td>seat</td>
<td>availability</td>
<td>model</td>
<td>rate per day</td></tr><tr>
<?php
$id=mysql_query("select * from cartype");
while($result=mysql_fetch_array($id))
{?>
<td><?php echo $result['cartype'];?></td>
<td><?php echo $result['no'];?></td>
<td><?php echo $result['seat'];?></td>
<td><?php echo $result['available'];?></td>
<td><?php echo $result['model'];?></td>
<td><?php echo $result['rateperday'];?></td></tr>
<?php }?>
</table>
</div>
<?php
include("footer.php");
?>

