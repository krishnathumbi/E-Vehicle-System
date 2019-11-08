<?php
include("lib/init.php");
include("header.php");
include("sidebar_user.php");
require_once('calendar/classes/tc_calendar.php');
if(isset($_GET['data']))
{
$set=$_GET['data'];
}
?>
<style>
.c{ border:10px solid #CCCCCC;
float:left; margin-top:-1px;
min-height:200px;
min-width:150px;
	
}
.skillsveiw{text-align:right; float:inherit;}
</style>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#reser").validate();
$(".newtype li").click(function(){
	var selectvalue=$(this).attr('value');
	var flag=0;
	 $(".skillsveiw").append("<div class='car"+$(this).attr('value')+" sletclass' id='ctype'><input type='text' name='total_skill[]' readonly='readonly' value='"+$(this).text()+"'/><input type='text' name='noofcars' /><div class='remskills' onclick='skillsclick(this);'>[X]</div></div>");
	//if($('.sletclass').hasClass("select_skil"+$(this).attr('value')))
//    {
//	flag=1
//    }
	
	})
});
</script>
<script>
$(document).ready(function() {
	$("#re").change(function() {
	var input =$(".car").val();
	location.href="?data="+input;
	});});
	
    $('#ctyp li').live('click', function() {
	
			var selectvalue=$(this).attr('value')
			  var flag=0;
			/* $('.skillsview div').each(function(index)				
			 {
				 alert (selectvalue);
			 if($(this).hasClass('.select_skil'+selectvalue))
			 {
				 alert ($(this).attr('value'));
			 }
			
			
});*/



if($('.sletclass').hasClass("select_skil"+$(this).attr('value')))
{
	flag=1
}
            //var tcount=$("#hidden_skills").val();
            //var totcount=parseInt(tcount);
            //if(totcount<=1)
            //{
			if(flag!=1)
			{ 	
			
              $(".skillsview").append("<div class='car"+$(this).attr('value')+" sletclass' id='ctype'><input type='' name='total_skill[]' value='"+$(this).attr('value')+"'/><div class='single_skil'>"+$(this).text() + "</div><div class='remskills' onclick='skillsclick(this);'>[X]</div></div>");
			  
			}
		   //}
			//}
//					else
//					{
//						alert("You already selected this skill");
//					}
});

			function skillsclick(ctrl)
			   {
				   $(ctrl).parent().remove();
				   var rskillcount=$("#hidden_skills").val();
			       var rnewcount;
				   
			       var rnewcount = parseInt(rskillcount)-1;
			       $("#hidden_skills").val(rnewcount);
			   }
    </script>
 <div id="main">
<h2>RESERVATION</h2><div id="a"></div>
<div class="error">
<?php if(isset($reservation->msg)){echo $reservation->msg;}?></div>
<form method="post" id="reser">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td align="top">cartype</td><td><div class="c">
<ul name="cartype" id="ctyp" class="newtype">
<?php
$id=mysql_query("select * from cartype");
while($result=mysql_fetch_array($id))
{?>
<li class="car" id="ctype" value="<?php echo $result['carid']?>"><?php echo $result['cartype'];?></li> <?php }?> </ul></div></td>            
<td></td><td><div class="skillsveiw"></div></td></tr>
<!--<div id="car_select" class="sletclass"></div>-->
         














<tr><td>no of car</td><td><input name="noofcar" type="text" id="noc" class="number"></td></tr>
<tr><td>rent</td><td><input name="rent" readonly="readonly" type="text" id="re"value="<?php if(isset($_GET['data'])) {if($_GET['data']!='a0') {echo $rent; }}?>"></td></tr>
<tr><td>start of reservation</td><td>
 <?php
 	$dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	  $myCalendar = new tc_calendar("rdate", true, false);
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
 <tr><td>end of reservation date</td><td>
 <?php
 	$dateOneMonthAdded = strtotime(date("Y-m-d") ."+1 month");
	  $myCalendar = new tc_calendar("edate", true, false);
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
      <tr><td>no of days</td><td><input name="noofdays" type="text" readonly="readonly"></td></tr>
      <tr><td></td><td><a href="payment.php"><input name="submi" type="submit" value="submit"></a></td> </tr>
    </table>
    </div>
    </form> 
    <?php
	include('footer.php');
	 ?>     
       
   