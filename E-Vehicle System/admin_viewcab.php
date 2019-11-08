<?php
include("lib/init.php");
include("header.php");
include('sidebar_company.php');
include('functions.php');
$dbh=new dbi();
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
<form action="#" method="POST">
<table class="cs listtable" cellpadding="0" cellspacing="0" width="500">
<tr>
	<th>User Name</th>
	<th>Contact</th>
	<th>Cab Name</th>
	<th>From</th>
	<th>To</th>
	<!--<th>Model</th>
	<th>Action</th>-->
</tr>

<tr>
	
	<?php $result=getbooking();
			while ($row=mysql_fetch_array($result))
			{
				?>
					<tr>
						<td><?php echo $row[2]; ?></td>
						<td><?php echo $row[3]; ?></td>
						<td><?php echo $row[4]; ?></td>
						<td><?php echo $row[0]; ?></td>
						<td><?php echo $row[1]; ?></td>
						
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