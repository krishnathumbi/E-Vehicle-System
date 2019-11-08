<?php
include("lib/init.php");
include("header.php");
include('sidebar_user.php');
include('functions.php');
$dbh=new dbi();
//$branch_id= $_SESSION['branch_id'];
?>
<!--<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>-->
<div class="cab">

<form action="cabbooking.php" method="POST">
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">
<tr>
	<th>Company Name</th>
	<th>Cab Registration Number</th>
	<th>Seating Capacity</th>
	<th>Model</th>
	<th>Action</th>
</tr>

<tr>
<?php
$frm=$_POST['from'];
$to=$_POST['to'];
//echo $fr;
?>

	
	<?php
	$id=mysql_query("select * from cabvehicle where status='Not Booked'");
				while ($row=mysql_fetch_array($id))
			{
				
				?>
				
			
					<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
				<td>	<a href="cabbooking.php?id=<?php echo $row[0];?>&from=<?php echo $frm;?>&to=<?php echo $to;?>">
					
			<input type="button" name="view" value="View" /></a></td>
			
			<input type="hidden" name="from" value="<?php echo $_POST['from'];?>">
			<input type="hidden" name="to" value="<?php echo $_POST['to'];?>">
		</td>
						
					</tr>
					
				<?php
			}
		?>
		
	</table>	
				
				</form>


<?php

include("footer.php");
?>