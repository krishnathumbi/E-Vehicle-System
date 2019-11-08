	<?php
include('lib/init.php');
include('header.php');
include('sidebar_admin.php');
//$branch_id= $_SESSION['branch_id'];
//var_dump($_SESSION);
?>
<?php
if(isset($_POST['craet']))
{
	$dbh=new dbi();
	$vtype1=$_POST['vtype'];
	$res = mysql_query("select * from vehicletype where VehicleName= '".$vtype1."' ");
//	or die(mysql_error());
	$count = mysql_num_rows($res);
   if($count == 0)
    {
			
		$sql=mysql_query("insert into vehicletype (VehicleName) values ('".$vtype1."')");
		echo '<script>alert("Vehicle type saved")</script>';
//		or die(mysql_error("saved"));
	/*if($sql)
	{
		$msg="vehicle added";
		// header("location:carcompany.php");
	}*/
	}
	else
	{
		       echo '<script>alert("Vehicle type already exist")</script>';
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

<div class="header_Part">
<h2>Vehicle Type</h2>

<div class="msg"><?php if(isset($msg)){echo $msg;}?></div>
<form method="post" id="reg">
<table>
<tr><td> Type of Vehicle</td><td><input type="text" name="vtype" class="required" /></td></tr>
<tr><td colspan="2"><input type="submit" name="craet" value="Add" /></td></tr>
</table>
</form>
</div>
</div>
<?php
include('footer.php');
?>