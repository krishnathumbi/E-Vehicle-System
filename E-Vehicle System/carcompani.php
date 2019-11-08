<?php
include('lib/init.php');
include('header.php');
include('sidebar_admin.php');
include('functions.php');
//$branch_id= $_SESSION['branch_id'];

?>
<?php
if(isset($_POST['craet']))
{
	$dbh=new dbi();
	$cname=$_POST['companyname'];
	$vid=$_POST['type'];
	$sql = "select * from vehiclecompany where VehicleCompanyName='".$cname."' and VehicleType='".$vid."' ";
	
	$res=mysql_query($sql);
	//or die(mysql_error());
	$count = mysql_num_rows($res);
	
   if(mysql_num_rows($res) > 0)
    {
		
			echo '<script>alert("This company name already exist")</script>';

	}
	else
	{
		
		$sql=mysql_query("insert into vehiclecompany(VehicleCompanyName,VehicleType) values ('".$cname."','".$vid."')");
		echo '<script>alert("Vehicle company added successfully")</script>';
		   
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

<script>
$(document).ready(function() {

/*$('.companyname').change(function()
	{
var y=$('.companyname').val();

if(y=='other'){$('#other_field').show(); }

});*/
});
</script>
<style>
#other_field{ display:none;}
</style>
<div id="main">

<div class="header_Part">
<h2>Add Company</h2>
<div class="msg"><?php if(isset($msg)){echo $msg;}?></div>
<form method="post" id="reg">
<table>
<tr><td>Vehicle Type</td><td><select name="type"><?php getVehicleType();?></select></td></tr>
<tr><td>Vehicle Company Name</td><td>
<input type="text" name="companyname" class="companyname">


<input type="text" name="othercompanyname"   id="other_field"/>

</td></tr>
<tr><td colspan="2"><input type="submit" name="craet" value="Add"  /></td></tr>
</table>
</form>
</div>
</div>
<?php 
include('footer.php');
?>