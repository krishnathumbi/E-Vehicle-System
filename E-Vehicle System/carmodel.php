<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
include('functions.php');
$branch_id= $_SESSION['branch_id'];
?>

<?php
if(isset($_POST['sub']))
{
$dbh=new dbi();
$carmdl=$_POST['carmodel1'];
$company=$_POST['company'];
$type=$_POST['type'];


	$sql = "select * from vehiclemodel where VehicleModelName='".$carmdl."' and VehicleType='".$type."' and VehicleCompany ='".$company."' ";
	
	$res=mysql_query($sql);
	//or die(mysql_error());
	$count = mysql_num_rows($res);
	
   if(mysql_num_rows($res) > 0)
    {
		
			echo '<script>alert("Vehicle model already exist")</script>';

	}
	else
	{
		
		$sql=mysql_query("INSERT INTO vehiclemodel (VehicleModelName,VehicleType,VehicleCompany) values ('".$carmdl."','".$type."','".$company."')");
		echo '<script>alert("Vehicle model added successfully")</script>';
		   
	}
}
?>
<script>
$(document).ready(function(){
	$('#carModel').validate 		
	$('.vtype').change(function(){
		var vtype=$('.vtype').val();
		$.post('ajax.php?method=getcompany',{vid:vtype}, function(data) {
			
			$('.company').html(data);
		});
	});
})
</script>

<div id="main">
<h2>Add New Model</h2>
<div class="success msg"><?php if(isset($data)){echo $data;}?></div>
<form method="post" id="carModel">
<table>
<tr><td>Vehicle Type</td><td><select class="vtype required" name="type"><option value="">Select</option><?php getVehicleType();?></select></td></tr>
<tr><td>Company</td><td><select name="company" class="company required"></select></td></tr>
<tr><td>Model:</td><td><input name="carmodel1" type="text" class="required"></td></tr>
<tr><td><input name="sub" type="submit" value="Add"></td></tr>
</table>
</form>
</div>
<?php 
include("footer.php");?>
