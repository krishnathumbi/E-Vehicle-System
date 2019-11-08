<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');
$dbh=new dbi();
?>
<style>
.fullDetails
{
	background-color: #FFFFFF;
padding: 10px;
width: 500px;
float:left;
-moz-border-radius:10px;
display:none;
}
.leftrow div
{
	float:left;
	width:100%;
	margin-top:5px;
}
.rightrow div
{
	margin-top:5px;
	float:left;
	width:100%;
}
.show
{
	cursor:pointer;
	font-weight:bold;
	background-color:rgb(255,255,255);
}



table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<script>
$(document).ready(function(){
	$('.show').click(function(){
		$(".fullDetails").hide();
		$(this).parent().parent().parent().parent().next('.fullDetails').show('slow');
		})
		$('.hide').click(function(){
			$(this).parent().parent().parent('.fullDetails').hide('slow');
			})
	})
</script>

<div id="main">
<h2>Client Feedbacks</h2>


<table class="form_table">
<tr>
	<th>Client</th>
   
	   <th>Email</th>
	     <th>Date</th>
		 <th>Message</th>
		    

   </tr>
		<?php $result=mysql_query("select f.email,f.message,f.date,r.fname from feedback f join userregister r on f.email = r.email") ;while($row=mysql_fetch_array($result)){ ?>
		
		<tr>    

	<td align="left" width="80"><?php echo $row['fname'];?></td>
<td align="left" width="80"><?php echo $row['email'];?></td>

<td align="left" width="80"><?php echo $row['date'];?></td>
<td  width="115"><?php echo $row['message'];?></td>
	</tr>
		<?php
}
?>
		</table
		</table



</div>
<?php
include("footer.php");
?>
