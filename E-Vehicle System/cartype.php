<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
include('functions.php');
require_once('calendar/classes/tc_calendar.php');
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#type").validate();
});

                                        $('.ren').blur(function(){
											var carid=$(this).parent().prev(".myclassouter").children(".carchecker").val();
											  var carno = $(this).val();
			                                 $('.checkingava').load("checkcartype.php?carid="+carid+"&carno="+carno); 
											   });                                       
</script>
<div id="main">
<div class="error">
<h2>ADD CARTYPE</h2>
<?php if(isset($cartype->msg)){echo $cartype->msg;}?>
</div>
<form  method="post" id="type">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>Car Model</td><td><?php carmodel();?></td></tr>
<tr><td>cartype</td><td><input name="cartype" type="text"class="required"/></td></tr>
<tr><td>no of car</td><td><input name="no" type="text" class="number"></td></tr>
<tr><td>seat</td><td><input name="seat" type="text" class="required"></td></tr>
<tr><td>class</td><td><input name="class" type="text" class="required"></td></tr>
<tr><td>model</td><td><input name="model"type="text" class="required" ></td></tr>
<tr><td>rate per day</td><td><input name="rpd" type="text" class="number"></td></tr>

<tr><td>reservation date</td><td>
   <div>
 <?php
	  $myCalendar = new tc_calendar("rdate", true, false);
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
    <tr><td></td><td><input name="add" type="submit" value="add"></td></tr>
   </table>
</form>
</div>
<?php
include("footer.php");
?>