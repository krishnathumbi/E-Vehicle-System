<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();
?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<div id="main">
<h2>Clients</h2>
<table class="as" cellpadding="5" cellspacing="5" align="center">
<th>Name</th>
<th>Addrerss</th>
<th>City</th>
<th>State</th>

<th width="50">Email</th>
<th>Phone No:</th>
</tr>
<?php
$id=mysql_query("select * from userregister order by email desc");
while($result=mysql_fetch_array($id))
{?>
<tr><td width="72"><?php echo $result['fname'];?></td>
<td width="72"><?php echo $result['address'];?></td>
<td width="72"><?php echo $result['city'];?></td>
<td width="72"><?php echo $result['state']?></td>

<td width="50"><?php echo $result['email'];?></td>
<td width="72"><?php echo $result['phoneno'];?></td>
<?php }?>
</table>
</div>

<?php
include("footer.php");
?>


