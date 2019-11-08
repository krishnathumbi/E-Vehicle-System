<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');?>
<?php
require_once('calendar/classes/tc_calendar.php');
$RefId=$_GET['RefId'];
$dbh=new dbi(); 
$sql=mysql_query("select r.*,c.Rent,c.RefId as CarId from reservation r INNER JOIN cars c on r.carNo=c.CarNo where r.RefId='".$RefId."'");
$result=mysql_fetch_object($sql);
?>
<script>
$(document).ready(function(){
	//alert($(".myfunction").val());
	})

function treatAsUTC(date) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
    return result;
	}
function daysBetween(startDate, endDate) {
		var millisecondsPerDay = 24 * 60 * 60 * 1000;
		return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
	}
function grandtotal(){
	     
		 var rentday=$(".rentday").val();
		 var rentdays=$(".nodays").val();
		
		
		 var rentcars=$(".nocars").val();
		 var amount=rentday*rentdays*rentcars;
		 $('.gtotal').val(amount);
		 }
function setdays(){
	var enddate13=$("#divCalendar_enddate5_lbl").html();
	var startdate13=$("#divCalendar_rdate5_lbl").html();
	var datest=daysBetween(startdate13,enddate13);
	if(datest<1)
	{
		alert("You must enter a valid date range");
		
	}
	else
	{
	 $(".nodays").val(datest);
	 $(".paymentadvance").val("");
	 $(".paymentbalance").val("");
	 
	}
}
		 
function settotal(){
	
	setdays();
	var daysrent=$('.nodays').val();
	var rentday=$('.carrentday').val();
	var totalAmount=parseInt(daysrent)*parseInt(rentday);
	$('.carRenttotal').val(totalAmount);
	
}
function setbalance(){
	
	var advanceAmt=$('.paymentadvance').val();
	var totalAmt=$('.carRenttotal').val();
	var balanceAmt=parseInt(totalAmt)-parseInt(advanceAmt);
	$('.paymentbalance').val(balanceAmt);
}
function availability(){
	var enddate13=$("#divCalendar_enddate5_lbl").html();
	var startdate13=$("#divCalendar_rdate5_lbl").html();
	var carNo=$('.carnumberIndex').val();
	var reserId=$('.reserId').val();
	$(".showavailability").load("updateavailability.php?carno="+carNo+"&edat="+enddate13+"&sdat="+startdate13+"&resrId="+reserId);
}
</script>

<style>
.carcheckerclass
{
	float:left;width:30px;
}
.leftbox
{
	float:left;
	width:75%;
}
.rentbox
{
	float:left;
	margin-left:10px;
}
.rentbox div
{
	margin-top:5px;
	font-weight:bold;
}
.readOnly
{
	background-color:#FDCA00;
	color:#fff;
	font-weight:bold;
}
.btncreate
{
	margin-top:45px !important;
	margin-left:35px;
}
</style>
<div id="main">
<h2>RESERVATION</h2>
<div class="error ">
<?php if(isset($reservation->msg)){echo $reservation->msg;}?>
</div>

<form method="post">
<div class="showavailability"></div>
<div class="leftbox">
<table>
<tr><td>Car Number : </td><td><input type="text" class="readOnly carNo" readonly="readonly" value="<?php echo $result->carNo;?>" name="carNo"  /></label></td></tr>
<tr><td>Reservation Date : </td><td>
       <div class="cal">
 <?php
      $dateOneMonthAdded = strtotime(date("Y-m-d") . "+6 month");
	  $date=$result->reserdate;
	  list($year, $month, $day ) = split('[/.-]', $date);
	  $myCalendar = new tc_calendar("rdate5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date($day), date($month), date($year));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y'), date('Y')+10);
	  $myCalendar->dateAllow(date('Y') .'-'. date('m') .'-'.date('d'),$dateOneMonthAdded);
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'month');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?></div>
</td></tr>
<tr><td>Return Date : </td><td>
 <div class="cal">
	  <?php
	  $dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	   $date=$result->returndate;
	  list($year, $month, $day ) = split('[/.-]', $date);
	  $myCalendar = new tc_calendar("enddate5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date($day), date($month), date($year));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y'), date('Y')+10);
	  $myCalendar->dateAllow(date('Y').'-'.date('m').'-'.date('d'),$dateOneMonthAdded);
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'month');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?></div>
</td></tr>
<tr><td>Purpose : </td><td><input type="text" value="<?php echo $result->purpose;?>" class="required purpose" name="purpose" onchange="availability();" /></td></tr>
<tr><td>Rent/Day</td><td><input type="text" class="carrentday readOnly" readonly="readonly" value="<?php echo $result->Rent;?>" name="carrentday" /></td></tr>
</table>
</div>
<div class="rentbox">
<div>Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="carRenttotal readOnly" style="width:50px !important;" readonly="readonly" value="<?php echo $result->totalamt;?>" name="carRenttotal" />
</div>
<div>Advance <input type="text" value="<?php echo $result->advanceamt;?>" name="paymentadvance" style="width:50px !important;" onfocus="settotal();" onchange="setbalance();"  class="paymentadvance" /></div>
<div>Balance &nbsp;<input type="text" readonly="readonly" value="<?php echo $result->balnaceamt;?>"  style="width:50px !important;" name="paymentbalance" class="paymentbalance readOnly" /></div>
<div class="btncreate"><input type="submit" name="reserv" value="Reserve" /></div>
</div>
<input type="hidden" name="nodays" class="nodays" value="0" />
<input type="hidden" name="reserId" class="reserId" value="<?php echo $RefId;?>" />
<input type="hidden" name="carnumberIndex" class="carnumberIndex" value="<?php echo $result->CarId;?>" />
</form>
</div>
<?php
include('footer.php');
?>

