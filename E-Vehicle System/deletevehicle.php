<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
 $dbh=new dbi();
$id=mysql_query("select cartype from cartype ");
?>
<div id="main">
<h2>Delete Vehicle</h2>
<form method="post" id="add">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>cartype</td><td><select name="cartype">?>
<?php 
while($result=mysql_fetch_array($id))
{?>
<option value=<?php echo $result['cartype']?>><?php echo $result['cartype']?>
<?php }?> 
</option> </select></td></tr>
<tr><td></td><td><input name="del" type="submit" value="DELETE" align="middle"></td></tr>
</table></form>
</div>
<?php
include("footer.php");
if(isset($_POST['del']))
{
	$cartp=$_POST['cartype'];
	$qry=mysql_query("DELETE FROM `cartype` WHERE cartype='$cartp'");
	echo "DELETE FROM `cartype` WHERE cartype='$cartype'";
	
}
?>