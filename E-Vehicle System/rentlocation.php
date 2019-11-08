<?php
include('lib/init.php');
include('header.php');
if(isset($_SESSION['usertype']))
{
$getUser=$_SESSION['usertype'];
if($getUser=='user')
{include('sidebar_user.php');}
elseif($getUser=='branch')
{include('sidebar_company.php');


}
elseif($getUser=='admin')
{include('sidebar_admin.php');}
}
else
{
	include('sidebaronlymenu.php');
}
//include('functions.php');
?>


<div id="main">

<h2>Locations</h2>
<table class="cs" cellpadding="5" cellspacing="5" align="center">
<tr><th align="left" width="140" >Address</th>

</tr>
<?php
$xy=new dbi();
$id=mysql_query("select * from rentlocation ");
while($result=mysql_fetch_array($id))
{?>

<tr>
<td align="left" width="80"><?php echo $result['rentallocation'];?></td>

<td  width="115"><a href="map.php?x=<?php echo $result['latitude']?>&y=<?php echo $result['longitude']; ?>">View map</a></td>
</tr>



<?php }
?>
</table>
</div>
<?php 
include('footer.php');
?>