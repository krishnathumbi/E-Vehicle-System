<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
include('functions.php');
$dbh=new dbi();
$branch_id= $_SESSION['branch_id'];
?>




<?php if(isset($_REQUEST['action'])&&$_REQUEST['action']=="delete")
{
 $id=$_GET['id']; 
 
   $res=mysql_query("delete  from cabvehicle where cab_id='$id'");
   if($res)
   {
		echo '<script>window.location="admin_viewcab.php"; </script>';
   }
	else 
	{
		echo '<script>window.location="admin_viewcab.php"; </script>';
	}
}?>



<!--<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>-->
<form action="#" method="POST">
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">
<tr>

	<th>Cab Name</th>
	<th>Registration Number</th>
	<th>Seating Capacity</th>
	<th>Model</th>
	<th>Charge/KM</th>
	
	<th>Action</th>
</tr>

<tr>
	
	<?php $result=getcab();
//	echo $result;
			while ($row=mysql_fetch_array($result))
			{
				?>
					<tr>
						<td><?php echo $row[1]; ?></td>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[5]; ?></td>
						
					<!--	<td><a href="cabbooking.php?id=<?php echo $row[0]; ?>">
		<input type="button" name="view" value="View" /></a>
		</td>-->
						
					
<td colspan="2">
<a href="branch_addcab.php"><input type="button" name="btn" value="Add" /></td></a></tr>
					
				<?php
			}
		?>
		
	</table>	
				
				</form>


<?php

include("footer.php");
?>