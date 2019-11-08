<?php
include("lib/init.php");
include('header.php');
include('sidebar_company.php');
include('functions.php');
require_once('calendar/classes/tc_calendar.php');
$carId=$_GET['id'];
$dbh=new dbi();
$query=mysql_query("select * from vehicles where VehicleId='".$carId."'");
$result=mysql_fetch_object($query);
//var_dump($result);
?>
<script>
$(document).ready(function() {
	
	
$("#addCar").validate();
$('.MycarNo').change(function(){
	var a=$(this).val();
	//var a = "/var/www/site/Brand new document.docx";
    //var a.split(' ').join(''));
    var CarNo=a.replace( /\s/g, "");
	var Refid=$('.REfID').val(); 
	//alert (CarNo);
	$('.carnoChecking').load('checkcartype.php?carNo='+CarNo+'&RefId='+Refid);
	/*if($($('.carnoupdating').html()=="Car Number existing !!! Please enter new one"))
	{
		//$('.carnoChecking').html("");
		$('.MycarNo').val("");
		$('.MycarNo').focus();
	}*/
	
	})
	
});
</script>
<div id="main">
<h2>Edit Vehicle</h2>
<div class="error">
<?php if(isset($addvehicle->msg)){echo $addvehicle->msg;}?>
</div>
<div class="carnoChecking"></div>
<form enctype="multipart/form-data" name="addcar" id="addCar" method="post">
<input type="hidden" value="<?php echo $carId;?>" name="ref" class="REfID" />
<table>
<tr><td>Car Number</td><td><input type="text" class="required MycarNo" name="carNo" value="<?php echo $result->VehicleRegNo;?>" /></td></tr>
<tr><td>Car Model</td><td><select name="cartype" class="frm_element" ><?php cartypesedit($result->CarModel);?></select></td></tr>
<tr><td>Insurance Number</td><td><input type="text" class="required" name="InsNo" value="<?php echo $result->InsuranceNo ;?>" /></td></tr>
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
<tr><td>Rent</td><td><input type="text" class="required" name="carRent" value="<?php echo $result->Rent;?>" /></td></tr>
<tr><td valign="bottom">New Image</td><td><input name="Image_upload" type="file" class="input required" value="<?php echo $result->Image;?>"><img src="<?php echo $result->Image;?>" width="100"></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Update" /></td></tr>
</table>
</form>






</div>
  <?php 
include('footer.php');
?>