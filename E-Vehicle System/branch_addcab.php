<?php
include("lib/init.php");
include('header.php');
include('sidebar_company.php');
include('functions.php');
$branch_id= $_SESSION['branch_id'];
?>

<form action="#" method="POST">
<h1>Add Cabs</h1>
<table class="">

<tr>
<td>Cab Name</td>
<td><input type="text" name="company"/></td>
</tr>

<tr>
<td>Cab Registration Number</td>
<td><input type="text" name="num"/></td>
</tr>
			
<tr>
<td>Seating Capacity</td>
<td><input type="text" name="seat"/></td>
</tr>

<tr>
<td>Model</td>
<td><input type="text" name="model"/></td>
</tr>

<tr>
<td>Charge/KM</td>
<td><input type="text" name="chrg"/></td>
</tr>
	
<tr><td colspan="2"><input type="submit" name="submit" value="Create" /></td></tr>
</table>
</form>






</div>
  <?php 
include('footer.php');
?>