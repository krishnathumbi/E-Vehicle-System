<?php
include('lib/init.php');
include('header.php');
include('sidebar_admin.php');

?>
<?php
if(isset($_POST['add']))
{
	$location=$_POST['location'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];
	$dbh=new dbi();
	$sql=mysql_query("insert into rentlocation (rentallocation,latitude,longitude) values ('".$location."','".$latitude."','".$longitude."')");
	
	if($sql)
	{
		$msg="Location added";
	}
}
?>
<div id="main">
<div><?php if(isset($msg)){echo $msg;}?></div>
<div class="header_Part">
<h2>Add Rental Location</h2>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#rent").validate();
});
</script>
<form method="post" id="rent">
<table>
<tr><td>Location</td><td><input type="text" name="location" class="required"></td></tr>
<tr><td>Latitude</td><td><input type="text" name="latitude" class="required"/></td></tr>
<tr><td>Longitude	</td><td><input type="text" name="longitude" class="required"/></td></tr>
<tr><td colspan="2"><input type="submit" name="add" value="Add" /></td></tr>
</table>
</form>
</div>
</div>
<?php 
include('footer.php');
?>