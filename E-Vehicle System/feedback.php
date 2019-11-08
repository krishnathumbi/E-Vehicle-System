 <?php
include("lib/init.php");
include("header.php");
include("sidebar_user.php");
require_once('calendar/classes/tc_calendar.php');
$set=$_SESSION['email'];	
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#add").validate();
});
</script>

<div id="main">
<div class="error">
<h2>FEEDBACK</h2>
<?php if(isset($feedback->msg)){echo $feedback->msg;}?>
</div>
<form method="post" id="add">
<table cellpadding="5" cellspacing="5" align="center">
<?php
$id=mysql_query("select email,fname from userregister where email='$set' ");
$result=mysql_fetch_array($id);
?>
<tr><td>Name</td><td><input name="name" type="text" value="<?php echo $result['fname'];?>" class="required"></td></tr>
<tr><td>Email</td><td><input name="email" type="text" value="<?php echo $result['email'];?>" class="required"></td></tr>
<tr><td valign="top">Message</td><td><textarea name="message" cols="18" rows="5"class="required frm_cntrl"></textarea> </td></tr>

<!---<tr><td>Reservation number</td><td><select name="rentid">
<?php
$id=mysql_query("select * from reservation where email='$set'");
while($result=mysql_fetch_array($id))
{?>
<?php echo $result['rentid'];?>
<option value="<?php echo $result['RefId']?>"> <?php echo $result['RefId'];?>
 </option><?php }?> </select></td></tr>

</td></tr>
<tr><td>date</td><td>
<?php
	$dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	  $myCalendar = new tc_calendar("date5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(1960, 2020);
	  $myCalendar->dateAllow(date('Y').'-'.date('m').'-'.date('d'));
	  $myCalendar->setDateFormat('Y-m-d');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array(""), 0, 'year');
	  $myCalendar->setSpecificDate(array(""), 0, 'mssssonth');
	  $myCalendar->setSpecificDate(array(""), 0, '');
	  $myCalendar->writeScript();
	  ?>
	  -->
<tr><td></td><td><input name="submit" type="submit" value="submit"></td></tr>
</table>
</form>
</div>
<?php
include("footer.php");
?>