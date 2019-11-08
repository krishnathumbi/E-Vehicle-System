<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
include('functions.php');
$dbh=new dbi();
$branch_id= $_SESSION['email'];
?>

<?php if(isset($_REQUEST['action'])&&$_REQUEST['action']=="delete")
{
 $id=$_GET['id']; 
 $sql = "delete  from cabvehicle where cab_id='$id'";
   $res=mysql_query($sql);
   if($res)
   {
	echo '<script>window.location="branch_viewcabb.php"; </script>';
   }
 else 
 {
 echo '<script>window.location="branch_viewcabb.php"; </script>';
 }
}?>





<!--<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>-->
<form action="#" method="POST">

<a href="branch_addcab.php" class="cancelbtn">Add</a>

<table class="cs listtable" cellpadding="0" cellspacing="0" width="500" style="
    margin-top: 15px;">
<tr>

	<th>Cab Name</th>
	<th>Registration Number</th>
	<th>Seating Capacity</th>
	<th>Model</th>
	<th>Charge/KM</th>
	
	<th></th>
</tr>

<tr>
	
	<?php $result=getcabbybranch($branch_id);
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
 <a href="branch_viewcabb.php?id=<?php echo $row[0]; ?>&action=delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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