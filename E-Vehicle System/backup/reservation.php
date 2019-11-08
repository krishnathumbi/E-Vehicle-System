<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<script>
$(document).ready(function(){
	
	
function treatAsUTC(date) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
    return result;
}

function daysBetween(startDate, endDate) {
    var millisecondsPerDay = 24 * 60 * 60 * 1000;
    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
}
$(".nodays").focus(function(){
    var enddate13=$("#divCalendar_enddate5_lbl").html();
	var startdate13=$("#divCalendar_rdate5_lbl").html();
	var datest=daysBetween(startdate13,enddate13);
    $(".nodays").val(datest);
	})	
	

var starda=$('input[name=rdate5]').val();
$("#reser").validate();

$(".nocars").blur(function(){
var num=$(this).val();
var totalamt=$('.tam').val();	
var rent=$(this).next().val();
var dayst=$(".nodays").val();
var amount=parseInt(rent)*parseInt(num)*parseInt(dayst);
if($('.rentcars').hasClass('.carcountsclass'+$(this).attr('id')))
{
$('.carcountsclass'+$(this).attr('id')).children('.ttrent').val(amount);
var newamount=parseInt(totalamt)+parseInt(amount);

}
else
{
	$(".car_type").append("<div class='rentcars carcountsclass"+$(this).attr('id')+"'><input type='hidden' value='"+amount+"' class='ttrent test  hideclass"+$(this).attr('id')+"'></div>");
  
  
    
}
var otalamt= 0;
$('.test').each(function(index) {
   otalamt=otalamt+ parseInt($(this).val());
});

$('.tam').val(otalamt);
});

	$(".carchecker").click(function(){
	//	alert($(this).parent().next(".carcheckerclass").attr('style'));
				
				if ($('.carchecker').is(':checked')) {
					 $(this).parent().next().show();
                 
               }
			   else
			   {
				   $(this).parent().next().hide();
			   }
		})


 $(".nocars").blur(function(){
	 var noscar=$(this).val();
 $(".checkingava").load("test1.php?nocars="+noscar);
 $(".checkingava").load("test1.php?no="+no);
 })
												  
})										   			
</script>
<style>
.carcheckerclass
{
	float:left;width:30px;
}
</style>
<div id="main">
<h2>RESERVATION</h2>
<div class="error">
<?php if(isset($reservation->msg)){echo $reservation->msg;}?>
</div>
<form method="post" id="reser" name="form1">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>reservation date</td><td>
        <div>
 <?php
	  $myCalendar = new tc_calendar("rdate5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y')-100, date('Y'));
	  $myCalendar->dateAllow(date('Y')-80 .'-'. date('m') .'-'.date('d'),   date('Y') .'-'.date('m') .'-' .date('d'));
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'month');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?></div></td></tr>
      <tr><td>end date : </td> <td>
	  <div class="cal">
	  <?php
	  $dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	  $myCalendar = new tc_calendar("enddate5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1960, 2020);
	  $myCalendar->dateAllow(date('Y').'-'.date('m').'-'.date('d'));
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'month');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?></div>
</td></tr>
<tr><td>no of days</td><td>
<input name="noofdays" type="text" id="nod" value="0" class="required nodays" readonly="readonly"></td></tr>
<tr><td>car type</td><td>
<div class="car_type" id="cty" style="border:1px solid black;width:145px;height:70px;overflow:scroll">
<?php 
$sql=mysql_query("select cartype,rateperday  from cartype ");
while($result=mysql_fetch_array($sql))
{?>
<div class="myclassouter" style="width:95px; float:left;">
<input type="checkbox" id="cbx" name="cartype[]"value="<?php echo $result['cartype']?>" class="carchecker">
<?php  echo $result['cartype'];?></div>
<div class="carcheckerclass" style="display:none"><input type="text1" class="nocars myClass caas<?php echo $result['cartype']?>" style="width:20px; float:left;" value="0" id="cs<?php echo $result['cartype']?>">
<input type="hidden" id="hh" class="rentdayamt" value="<?php echo $result['rateperday']?>"/>
</div> <?php  }?>
<div class="ttrent"><input class="ttrent" value="0" type="hidden" /></div>
</div></td><td><div class="checkingava"></td></tr>
<!--<tr><td>no of cars</td><td><input name="noofcar" type="text" id="nocresult" class="required totcar" value="0"></td></tr>-->
<tr><td>total amount</td><td><input name="totalamount" type="text" id="amt" class="tam" value="0" readonly="readonly"></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="submit" /></td></tr>
</table>
</form></div>
<?php
include('footer.php');
?>



