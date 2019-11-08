<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="calendar/calendar.js"></script>
<div id="main">
<h2>Rent</h2>
<div class="error">
<?php if(isset($rent->msg)){echo $rent->msg;}?>
</div>
<form method="post">
<table align="center" cellpadding="5" cellspacing="5">
<tr><td>total </td><td><input name="total" type="text" /></td></tr>
<tr><td>rent</td><td><input name="rent" type="text" /></td></tr>
<tr><td>start date<td>
<div>
 <?php
	  $myCalendar = new tc_calendar("sdate1", true, false);
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
	  ?></div></td></tr>
      <tr><td>end of reservation<td>
     <div> 
<?php
	  $myCalendar = new tc_calendar("endate1", true, false);
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
	  ?></div></td></tr>
<tr><td></td><td><input type="submit" value="submit" name="submit" /></td></tr>
</table></form></div>
<?php
include('footer.php');
?>
      
      
