<?php
include('lib/init.php');
include("header.php");
include("sidebar_user.php");
$dbh=new dbi();
if(isset($_GET['data']))
{
	$sl=$_GET['data'];}
?>
<script>
$(document).ready(function() {
	
	 $("#ty").change(function(){
		 
		 
	var input = $(".searchid").val();	 
	location.href="?data="+input;
	});});
</script>
<div id="main">
<h2>VEHICLE LIST</h2>
<select id="ty" class="searchid" name="search" >
<option>----select---</option>
<table align="center">
<?php $id2=mysql_query("select * from cartype");
while($result2=mysql_fetch_array($id2))
{
	$c=$result2['cartype'];if($c==$sl)
	{?>
    <option value="<?php echo $result2['cartype'];?>" selected="selected"><?php echo $result2['cartype'];?> </option>
  <?php  }
    else
    { ?>
<option value="<?php echo $result2['cartype'];?>"><?php echo $result2['cartype'];?> </option>
<?php }}?> </select></table>
<?php
if(isset($_GET['data']))
{
	$sl=$_GET['data'];
$id=mysql_query("select * from cartype where cartype='$sl'");
?>
<table align="center" cellpadding="4" cellspacing="5">
<th>cartype</th>
<th>no of car</th>
<th> seat</th>
<th> class</th>
<th>model</th>
<th>available</th>
<th>rate per day</th>
<?php
while($result=mysql_fetch_array($id))
{?>
<tr><td><?php echo $result['cartype'];?></td>
<td><?php echo $result['no'];?></td>
<td><?php echo $result['seat'];?></td>
<td><?php echo $result['class'];?></td>
<td><?php echo $result['model'];?></td>
<td><?php echo $result['available'];?></td>
<td><?php echo $result['rateperday'];?></td>
<td><a href="reservation1.php">click here</a></td>

</tr>

<?php }}?>

</table>

</div>

<?php
include("footer.php");
?>

