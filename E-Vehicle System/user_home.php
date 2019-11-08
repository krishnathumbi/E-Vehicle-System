<?php
include('lib/init.php');
include('header.php');
include('sidebar_user.php');
$dbh=new dbi();
 $temp=$_SESSION['email'];
 $sql = "select * from userregister where email='$temp'";
 //die($sql);
$res=mysql_query($sql);
$t=mysql_fetch_array($res);
$s=$_SESSION['username'];

$na =  $_SESSION['name'];
?>
<div id="main">
<p class="heading2"><font color="#66FFFF" size="+3" face="Georgia, Times New Roman, Times, serif"><i>Welcome to <?php echo $na?></font></i> </p>
<p align="justify"><font color="#3333CC" face="Times New Roman, Times, serif" size="+1"><i> Looking to rent a car? At first glance, the big rent-a-car companies like Enterprise and Hertz make it easy with their official websites. You can simply make an online reservation, they'll give you a confirmation number, and you're good to go.

Sometimes however, it's just not that simple, especially if you're trying to rent a car last-minute. Vehicles may be sold out, rental office locations have lousy business hours, and rates don't match one another. Before you know it, their websites will start giving you the runaround, requiring you to change the pick-up or drop-off times and limiting your choice of cars to whatever is available.

How about a more user-friendly and faster way to search for cheap online car rentals? Yeah, that's more like it. Avoid the frustration and hassle altogether with these websites.</i></font></p>

</div>
<?php
include('footer.php');
?>
