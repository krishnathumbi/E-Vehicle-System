<?php
include("lib/init.php");
include("header.php");
include("sidebar_admin.php");
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#payment").validate();
});
</script>




<div id="main">
<h2>PAYMENT</h2>
<div class="error">
<?php if(isset($payment->msg)){echo $payment->msg;}?>
</div>
<form method="post" id="payment">
<table align="center" cellpadding="5" cellspacing="5">
<tr><td>Branch</td><td><select name="branch_id">
<option>select</option>
<?php 
$com=mysql_query("select * from branchregistration");
	while($result=mysql_fetch_object($com)){ ?>
    <option value="<?php echo $result->branchregid; ?>"><?php echo $result->branchname; ?></option>
		
		
		<?php }
?>	






</td></tr>
<tr><td>Amount</td><td><input name="amount" type="text" class="required number"></td></tr>
<tr><td>Date</td><td><div>
<?php
	  $myCalendar = new tc_calendar("date5", true, false);
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
	  ?></div>

</td></tr>
<tr><td></td><td><input name="submit" type="submit" value="submit"></td></tr>
</table>
</div></form>
<?php
include('footer.php');
?>