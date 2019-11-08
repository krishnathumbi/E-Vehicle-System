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
<fieldset><legend> New Branch</legend>
<table  cellpadding="5" cellspacing="5" align="center">
<tr><td>Company name</td><td><input name="com_name" type="text" class="required"></td></tr>
<tr><td>Address</td><td><textarea name="com_addrs" class="txtarea required" style="margin-left: 112px;"></textarea></td></tr>
<tr><td>City</td><td><input name="com_city" type="text" class="required"></td></tr>
<tr><td>State</td><td><input name="com_state" type="text" class="required"></td></tr>
<tr><td>Email</td><td><input name="com_email" type="text" class="required"></td></tr>
<tr><td>Phone</td><td><input name="com_phone" type="text" class="number" maxlength="6" minlength="6"></td></tr>

<!--<tr><td>User name</td><td><input name="com_username" type="text" class="required" ></td></tr>-->
<tr><td>Password</td><td><input name="com_paswrd" id="pwd1" type="password" class="required"></td></tr>
<tr><td>Confirm password</td><td><input name="com_conpaswrd" type="password" class="required" equalTo="#pwd1"></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="Add"></td></tr>
</table>
</fieldset>
</form>
</div>
<?php
include("footer.php");
?>