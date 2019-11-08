<?php
include("lib/init.php");
include("header.php");
include('sidebar_admin.php');	
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#rent").validate();
});
</script>
<div id="main">
<div class="error">
<h2>CAR SELECTION</h2>
<?php if(isset($carrent->msg)){echo $carrent->msg;}?>
</div>
<form method="post" id="rent">
<table cellpadding="5" cellspacing="5" align="center">
<tr><td>cartype</td><td><select name="cartype">
<?php 
mysql_query("select cartype from adddvehicle");
while($result= mysql_fetch_array($sql))
{ ?>
<option value=<?php echo $result['cartype'] ?>><?php echo $result['cartype']?>
<?php }?> </option> </select></td></tr>

<tr><td>carno</td><td><input name="no" type="text" ></td></tr>
<tr><td>status</td><td><input name="status" type="text"  />
<tr><td>seating capacity</td><td><input name="noofdays" type="text" class="required"></td></tr>
<tr><td>model</td><td><input name="model" type="text" ></td></tr>
<tr><td>rate per day</td><td><input name="rpd" type="text" ></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="reserve this car"></td></tr>
</table>
</form>
</div>
<?php
include("footer.php");
?>