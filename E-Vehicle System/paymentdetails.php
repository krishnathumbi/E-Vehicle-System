<?php
include('lib/init.php');
include("header.php");
include("sidebar_admin.php");
$dbh=new dbi();
?>
<div id="main">
<h2>Payment Details</h2>

<table class="cs" cellpadding="5" cellspacing="5" align="center">

<td>total amount</td>
<td>advance amount</td>
<td>balance amount</td></tr><tr>
<?php
$id=mysql_query("select * from payment");
while($result=mysql_fetch_array($id))
{?>

<td><?php echo $result['totalamount'];?></td>
<td><?php echo $result['advanceamount'];?></td>
<td><?php echo $result['balanceamount'];?></td></tr>
<?php }?>
</table>
</div>
<?php
include("footer.php");
?>

