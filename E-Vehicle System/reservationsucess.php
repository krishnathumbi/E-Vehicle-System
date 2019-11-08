<?php
include("lib/init.php");
include("header.php");
include("sidebar_user.php");
$dbh=new dbi();
$id=mysql_query("select max(rentid)as rentid from reservation ");
$result=mysql_fetch_object($id);
      	$uid=$result->rentid;
      	$myid=$uid+1;?>
		<h2 style="text-decoration:blink; color:#C3C"> your registration is successfull </h2><br>
		<h4 style="color:#C0C">reservation id is <?php echo "$uid";?></h4>
<?php
include('footer.php');
?>
