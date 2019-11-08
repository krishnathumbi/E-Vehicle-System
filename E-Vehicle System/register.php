	<?php
include("lib/init.php");
include("header.php");
include('sidebaronlymenu.php');
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#reg").validate();
});
</script>
<div id="main">
<h2>REGISTRATION</h2>
<div class="error">
<?php if(isset($register->msg)){echo $register->msg;}?>
</div>

<form method="post" style="padding: 10px 10px 10px 10px;" id="reg">
<fieldset>
    <legend>REGISTRATION</legend>
<table  cellpadding="5" cellspacing="20" align="center" class="tbl-cls">
<tr><td>Name</td><td><input name="name" type="text" class="required" pattern="[A-Za-z_ ]{1,32}" ></td></tr>

<tr><td>Address</td><td><textarea name="addr" class="txtarea required" style="margin-left: 112px;"></textarea></td></tr>
<tr><td>City</td><td><input name="city" type="text"  class="required"></td></tr>
<tr><td>State</td><td><input name="state" type="text" class="required"></td></tr>
<tr><td>Pincode</td><td><input name="pin" type="text" class="number" maxlength="6" minlength="6"> </td></tr>
<tr><td>Dateofbirth</td><td>
<?php
	  $myCalendar = new tc_calendar("dbirth", true, false);
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
<tr><td>Email</td><td><input name="email" type="text" class="required email"></td></tr>
<tr><td>Phone no</td><td><input name="phn" type="text" class="number" maxlength="10" minlength="10"></td></tr>
<!--<tr><td>Username</td><td><input name="uname" type="text" class="required"></td></tr>-->
<tr><td>Password</td><td><input type="password" id="pwd1"name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="required">
<tr><td>Confirm password</td><td><input name="cpassword" type="password" class="required" equalTo="#pwd1"></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="submit"></td></tr>
</table>
</fieldset>
</form>
</div>
<?php
include("footer.php");
?>