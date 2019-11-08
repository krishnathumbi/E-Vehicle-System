<?php
include("lib/init.php");
include("header.php");
include('sidebar_user.php');
include('functions.php');
$dbh=new dbi();
$email=$_SESSION['email'];
//$branch_id= $_SESSION['branch_id'];
?>
<!--<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>-->
<div class="cab">
<?php $id=$_GET['id'];
$frm=$_GET['from'];
$to=$_GET['to'];
//echo $to;
?>

<form action="#" method="POST">
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">

<!--<tr>
	<th>Company Name</th>
	<th>Cab Registration Number</th>
	<th>Seating Capacity</th>
	<th>Model</th>
	<th>Action</th>
</tr>-->
<div id="main">
<h2 style="margin-bottom: 0px;">Book Cab</h2>
<div class="header_Part">

<tr>
	
	<?php
	$res=mysql_query("select * from cabvehicle where cab_id=$id");
				$row=mysql_fetch_array($res);
			
				
				?>
					<div class="carcontainer">
	<div class="car_Details">
	<table>
		
	<tr><td>Cab Company Name : </td><td><?php echo $row[1];?></td></tr>
	<tr><td>Registration Number : </td><td><?php echo $row[2]; ?></td></tr>
	<tr><td>Seating Capacity : </td><td><?php echo $row[3]; ?></td></tr>
	
	<tr><td>Model : </td><td><?php echo $row[4]; ?></td></tr>
	<tr><td>Charge/KM : </td><td>₹<?php echo $row[5]; ?></td></tr>
<!--	<tr><td>From:</td><td><input type="text" name="from"/></td></tr>
	<tr><td>To:</td><td><input type="text" name="to"/></td></tr>-->
	
	<tr><td>Can you share this vehicle for pooling</td><td><input type="checkbox" name="pool_vehicle"/>
	<br>
	</td></tr>
	<!--<tr><td>Amount:</td><td><input type="text" name="from"/></td></tr>-->
	
	<!--<tr><td>Insurance Date : </td><td><?php echo $result['InsuranceDate'];?></td></tr>
	<tr><td>Rent Location : </td><td><?php echo getBranchName($result['branchId']);?></td></tr>-->
	<tr><td colspan="2">
<input name="btn_book" type="submit" value="Book">
<input type="hidden" name="cabid" value="<?php echo $id?>">
<input type="hidden" name="from" value="<?php echo $frm?>">
<input type="hidden" name="to" value="<?php echo $to?>">

 
</td></tr></table>
</div>

<div class="line"></div>


</div>
				
			
					<!--<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><a href="cabbooking.php">
		<input type="button" name="view" value="View" /></a>
		</td>
						
					</tr>-->
					
		
		
</table>	
				
				</form>


<?php

include("footer.php");
?>