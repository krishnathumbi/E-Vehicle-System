<?php
include("lib/init.php");
include('header.php');
include('sidebar_admin.php');
include('functions.php');
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="calendar/calendar.js"></script>
<script>
$(document).ready(function() {
$("#add").validate();
});
</script>
<div id="main">
<h2>ADD VEHICLE</h2>
<div class="error">
<?php if(isset($addvehicle->msg)){echo $addvehicle->msg;}?>
</div>
<form method="post" id="add">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>carno</td><td><input name="carno" type="text" class="number" ></td></tr>
<tr><td>cartype</td><td><select name="cartype">
<?php
$id=mysql_query("select cartype from cartype ");

while($result=mysql_fetch_array($id))
{?>
<option value=<?php echo $result['cartype']?>><?php echo $result['cartype']?>
<?php }?> </option> </select></td></tr>
<tr><td>availability</td><td><select name="availability"><option>yes</option><option>no</option></select></td></tr>
<tr><td>insurance no</td><td><input name="ino" type="text" class="number" /></td></tr>
<tr><td>period of insurance</td><td><?php
	$dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	  $myCalendar = new tc_calendar("period5", true, false);
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
	  ?>
<tr><td></td><td><input name="add" type="submit" value="add" align="middle"></td></tr>
</table>
</form>
</div>
  <?php 
include('footer.php');
?>