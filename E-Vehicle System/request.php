<?php
include_once('lib/init.php');
?>
<table cellpadding="5" cellspacing="3" align="center" border="2">
<tr>
<h2>REQUEST FORM</h2>
<td>userid</td>
<td>username</td>
<td>usertype</td><td>status</td></tr>
<?php
$dbh=new dbi();
$id=mysql_query("select * from login where status='waiting'");
while($result=mysql_fetch_array($id))
{?>
<tr>
<td><?php echo $result['userid'];?></td>
<td><?php echo $result['username'];?></td>
<td><?php echo $result['usertype'];?></td>
<td> 
<form>
<a  href="?userid=<?php echo $result['userid'];?>"><label>accept</label></a>
</form>
</td>
</tr>
<?php }?>
</table>
