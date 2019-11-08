<?php
include("lib/init.php");
include("header.php");
include('sidebar_user.php');
$dbh= new dbi();
?>
<div id="main">
<h2>CAR RENT DETAILS</h2>
<table cellpadding="5" cellspacing="8" align="center">
<tr><td>rent id</td>
<td>carno</td>
<td>status</td>
<td>no of days</td>
<td>issue date</td>
</tr>
<?php
$id=mysql_query("select *from rentcar");
while($result=mysql_fetch_array($id))
{?>
<tr><td><?php echo $result['rentid'];?></td>
<td><?php echo $result['carno'];?></td>
<td><?php echo $result['status'];?></td>
<td><?php echo $result['noofdays'];?></td>
<td><?php echo $result['issuedate'];?></td>
</tr>
<?php }?>
</table>
</div>
<?php
include("footer.php");
?>
