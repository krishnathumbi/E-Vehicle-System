<?php
error_reporting(E_ALL^ E_NOTICE); 
include_once('lib/init.php');
include ('header.php');
include('sidebar_user.php');
$dbh=new dbi();
$set=$_SESSION['email'];
$sql=mysql_query("select * from userregister where email='$set'");
$result=mysql_fetch_array($sql);
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#prof").validate();
});
</script>
<div id="main">
<form method="post" id="prof">
<h2>PROFILE EDIT</h2>
<div class="error">
<?php if(isset($profile->msg)){echo $profile->msg;}?>
</div>
<table cellpadding="10" cellspacing="" border="0" align="center" >
<tr><td>Name</td><td><input name="name" type="text" value="<?php echo $result['fname'];?>"></td></tr>
<tr><td>Address </td><td><input name="addr" type="text" value="<?php echo $result['address'];?>"></td></tr>
<tr><td>City</td> <td><input name="city" type="text" value="<?php echo $result['city'];?>"></td></tr>
<tr><td>State</td><td><input name="state" type="text" value="<?php echo $result['state'];?>"></td></tr>
<tr><td>PIN</td> <td><input name="pin" type="text" value="<?php echo $result['pincode'];?>" class="number" maxlength="6" minlength="6"></td></tr>
<tr><td>Date of Birth</td> <td><input name="dateofbirth" type="date" value="<?php echo $result['dateofbirth'];?>" style="margin-left:111px;"></td></tr>
<tr><td>Email</td> <td><input name="email" type="text" value="<?php echo $result['email'];?>" readonly ></td></tr

<tr><td>Phone </td> <td><input name="phone" type="text" value="<?php echo $result['phoneno'];?>" class="number" maxlength="10" minlength="10"></td></tr>
<!--<tr><td>Username</td><td><input name="uname" type="text" value="<?php echo $result['username'];?>"></td></tr>
<tr><td>New Password</td><td><input name="pass" type="text"></td></tr>-->
<td colspan="2" align="center"><input name="update" type="submit" value="update"> </td></tr></table>
</div>
</form>
<?php
include('footer.php');
?>
