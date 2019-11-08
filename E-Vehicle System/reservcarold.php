
<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');
require_once('calendar/classes/tc_calendar.php');
$carId=$_GET['id'];
//?>
<script>
 function grandtotal(){
	     
		 var rentday=$(".rentday").val();
		 var rentdays=$(".nodays").val();
		
		
		 var rentcars=$(".nocars").val();
		 var amount=rentday*rentdays*rentcars;
		 $('.gtotal').val(amount);
		 }

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
	      $(".nocars").blur(function(){
			var num=$(this).val();
		  var cpt=$('.cartp').val();
		  var enddate13=$("#divCalendar_enddate5_lbl").html();
	      var startdate13=$("#divCalendar_rdate5_lbl").html();
		 /// alert(num);alert(cpt);alert(enddate13);alert(startdate13);
           if ($('.nocars').text() != content)
		  {
			    $(".showavailability").load("caravailability.php?numm="+num+"&edat="+enddate13+"&sdat="+startdate13+"&carpt="+cpt);
				
		  }
		   function avail(){
		        var waitingcars= $('.showavailability').html();
                $('.wiatingcras').val(waitingcars);
						 }
						 
	var ints = setInterval(avail, 1000);
	});
	$("#divCalendar_enddate5_lbl").change(function(){alert("hii");})
    $(".nocars").focus(function(){
    var enddate13=$("#divCalendar_enddate5_lbl").html();
	var startdate13=$("#divCalendar_rdate5_lbl").html();
	var datest=daysBetween(startdate13,enddate13);
	if(datest<1)
	{
		alert("You must enter a currect date");
		
	}
	else
	{
	 $(".nodays").val(datest);
	}
	 });
	});
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
<?php
$dbh=new dbi(); 
$sql=mysql_query("select * from cartype where carid='".$carId."'");
$result=mysql_fetch_object($sql)
?>
<input type="hidden"  class="cartp" value="<?php echo $result->cartype;?>"/>
<input type="hidden" value="<?php echo $result->rateperday;?>" class="rentday" />
<tr><td>reservation date</td><td>
        <div>
 <?php
	  $myCalendar = new tc_calendar("rdate5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(date('Y'), date('Y')+10);
	  $myCalendar->dateAllow(date('Y') .'-'. date('m') .'-'.date('d'),   date('Y') .'-'.date('m')+12 .'-' .date('d'));
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
<tr><td><!--Total Days--></td><td><input name="noofdays" type="hidden" readonly="readonly" value="0" class="nodays" onblur="grandtotal();" /></td></tr>
<tr><td>Total Cars</td><td>
<input name="typeno" type="text" class="required nocars" onblur="grandtotal();" ></td><div class="showavailability"></div>
</tr>
<tr><td>Net Total</td><td><input  name="totalamount" type="text" readonly="readonly" class="gtotal" value="0" /></td></tr>
<tr><td></td><td><input type="hidden" value="" name="waitingcars" class="wiatingcras" /><input name="submit" type="submit" value="submit" /></td></tr>
</table>
</form></div>
<?php
include('footer.php');
?>

