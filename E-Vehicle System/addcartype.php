<?php
include('lib/init.php');
include('header.php');
include('sidebar_admin.php');
?>
<?php
if(isset($_POST['craet']))
{
	$cname=$_POST['cartype'];
	$disc=$_POST['dis'];
	$dbh=new dbi();
	$sql=mysql_query("insert into catype (ctype,description) values ('".$cname."','".$disc."')");
	if($sql)
	{
		$msg="One Car Type added";
	}
}
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#reg").validate();
});
</script>
<div id="main">
<div><?php if(isset($msg)){echo $msg;}?></div>
<div class="header_Part">
<h2>Add Car Type</h2>
<form method="post" id="reg">
<table>
<tr><td>Car type</td><td><input type="text" name="cartype" class="required" /></td></tr>
<tr><td>Description</td><td><input type="text" name="dis" /></td></tr>
<tr><td colspan="2"><input type="submit" name="craet" value="Add" /></td></tr>
</table>
</form>
</div>
</div>
<?php 
include('footer.php');
?>