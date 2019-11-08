<?php
include("lib/init.php");
include('header.php');
include('sidebar_company.php');
include('functions.php');
require_once('calendar/classes/tc_calendar.php');

$bbb=$_GET['b'];
$branch_id= $_SESSION['branch_id'];

?>
<style>
.mod
{
	display:none;
}
.show, .hide
{
	cursor:pointer;
	font-weight:bold;

}
</style>
<script>
$(document).ready(function() {
	
		/*var tpp=$('.getvtype').val();
		var cid='<?php // echo $bbb; ?>';
		
		if(cid!='' || cid!=0)
		{
			$.post('gettype.php',{tp:tpp,cids:cid}, function(data) 
			{
				$('.company').html(data);
				$('.company').change();
			});
		}
		*/
	
	/*	$('.getvtype').change(function()
	{
		var x=$('.getvtype').val();
		$.post('gettype.php',{tp:x}, function(data) 
		{
			$('.company').html(data);
		});
		
	});*/
	
	
	$('.company').change(function()
	{
		var y=$('.company').val();
		
		$.post('getcompany.php',{cn:y}, function(data) 
		
		{ 
			$('.cartype').html(data);
		});
		
			
	});
		
/*	$('.ok').click(function()
	{
		var x=$('.getvtype').val();
		var y=$('.company').val();
		var z=$('.vmodel').val();
	
		if(x=='' ||x==0)
		alert('Please select vehicle type');
		else if(y==0 || y=='')
		alert('Please select vehicle company');
		else if(z=='')
		alert('Please enter vehicle model');
		else
		{
			
		$.post('addnew.php',{vtype:x,company:y,vmodel:z}, function(data) 
			{
			alert(data);
			window.location = 'addvehicle.php?a='+x+'&b='+y+'&c='+z;
			});
		}
		
	});
	*/
	/*	$('.show').click(function()
	{
		$('.hide').show();
		$('.mod').show();
		$('.cartype').hide();
		$('.second_table').hide();
		$('.show').hide();
	});
	$('.hide').click(function()
	{
		$('.hide').hide();
		$('.mod').hide();
		$('.cartype').show();
		$('.second_table').show();
		$('.show').show();
	});
	
	$("#addCar").validate();
	$('.MycarNo').change(function(){
	
	var a=$(this).val();
	
    var CarNo=a.replace( /\s/g, ""); 
	$('.carnoChecking').load('checkcartype.php?carNo='+CarNo);
	
	
	});
	*/
	
/*************************************************************************************************************************/
	$("#addCar").validate();
	$('.getvtype').change(function(){
		
		var vtype=$('.getvtype').val();
		$.post('ajax.php?method=getcompany',{vid:vtype}, function(data) {
			
			$('.company').html(data);
		});
	});
	
	$('.company').change(function()
	{
		var cnpny=$('.company').val();
		
		$.post('ajax.php?method=getmodel',{cid:cnpny}, function(data) 
		
		{ 
			$('.carmodel').html(data);
		});
		
			
	});
	
	
});
</script>
<div id="main">
<h2>Add Vehicle</h2>
<div class="error">
<?php if(isset($addvehicle->msg)){echo $addvehicle->msg;}?>
</div>
<div class="carnoChecking"></div>
<form enctype="multipart/form-data" name="addcar" id="addCar" method="post">
<table>
<tr><td>Vehicle Type</td><td><select class="getvtype required" name="type"><option value="">select
</option><?php getVehicleType();?></select></td></tr>
<tr><td>Vehicle Company</td><td><select name="company" class="company required"></select></td></tr>
<tr><td valign="top">Vehicle Model</td><td><select name="cartype" class="carmodel required"></select>

</td>
<td>

</td>


</tr>
</table>
<table class="second_table">
<tr><td>Vehicle Number</td><td><input type="text" class="required MycarNo" name="carNo" /></td></tr>


<tr><td>Insurance Number</td><td><input type="text" class="required" name="InsNo" minlength="11" maxlength="12"/></td></tr>
<tr><td>Insurance Date</td><td>
<div class="cal">
	<?php
	  $myCalendar = new tc_calendar("InsDate", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y'), '2020');
	  $myCalendar->dateAllow(date('Y') .'-'. date('m') .'-'.date('d'), date('Y') .'-'. date('m')+12 .'-'.date('d'));
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'month');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?></div>
</td></tr>
<tr><td>Rent/Day</td><td><input type="text" class="required number" name="carRent" /></td></tr>
<tr><td>Image</td><td><input name="Image_upload" type="file" class="input required"></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Create" /></td></tr>
</table>
</form>






</div>
  <?php 
include('footer.php');
?>