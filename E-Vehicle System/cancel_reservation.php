<?php
include_once('lib/init.php');
include('header.php');
include('sidebar_user.php');
$dbh= new dbi();
$userId=$_SESSION['userid'];?>
<div class id="main">
<h4 align="center">cancellation</h4>
<table class="cs" align="center" border="1" bgcolor="#CCCCCC" ><tr>
<td>rent id</td>
<td>car type</td>
<td>no of car</td>
<td>reservation date</td>
</tr>
<?php
$id=mysql_query("select * from  reservation where userid='$userId'");
while($result=mysql_fetch_array($id))
{?>
<tr>
<td>
<?php echo $result['rentid']; ?>
</td>
<td>
<?php echo $result['cartype']; ?>
</td>
<td>
<?php echo $result['noofcar']; ?>
</td>
<td>
<?php echo $result['rdate']; ?>
</td>
<td>
<form>
<a href="?rentid=<?php echo $result['rentid']?>"><label>cancel</label></a>
</form>
</td>
</tr>
<?php }?>
</table>
</div>
<?php
include('footer.php');
?>