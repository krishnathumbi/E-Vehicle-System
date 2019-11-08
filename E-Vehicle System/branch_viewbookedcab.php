<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
include('functions.php');
$dbh=new dbi();
$branch_id= $_SESSION['email'];
?>
<!--<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>-->
<form action="#" method="POST">
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">
<tr>
	<th>User Name</th>
	<th>Contact</th>
	<th>Cab Name</th>
	<th>From</th>
	<th>To</th>
	<th>Booking Status</th>
	<!--<th>Model</th>
	<th>Action</th>-->
</tr>

<tr>
	
	<?php $result=getbookbybranch($branch_id);
//	die($result);
			while ($row=mysql_fetch_array($result))
			{
				?>
					<tr>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[5]; ?></td>
						
					<!--	<td><a href="cabbooking.php?id=<?php echo $row[0]; ?>">
		<input type="button" name="view" value="View" /></a>
		</td>-->
						
					</tr>
					
				<?php
			}
		?>
		
	</table>	
				
				</form>


<?php

include("footer.php");
?>