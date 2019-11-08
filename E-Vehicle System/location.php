<?php
include('lib/init.php');
include('header.php');
include('sidebar_admin.php');
?>
<div id="main">

<form method="post" name="loc">
<table>
<tr><td>Latitude</td><td><input type="text" name="xco"></td></tr>
<tr><td>Longitude</td><td><input type="text" name="yco"></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="submit"></td></tr>
</table>

</form>

<?php 

if (isset($_POST['submit']))
{
	$xcod=$_POST["xco"];
	$ycod=$_POST["yco"];
	//echo 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$xcod.','.$ycod.'&sensor=false'; die();

$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.$xcod.','.$ycod.'&sensor=false');

        $output= json_decode($geocode);
		//var_dump($output);
		//echo $output->results[0]->status;  
		if(isset($output->results[0]->formatted_address))
		{

			 $loc=$output->results[0]->formatted_address;
			$pieces = explode(",", $loc);
			foreach($pieces as $addr)
			{
				echo $addr.'<br>';
			}
		}
		else
		{
			echo "No Result Found. Please enter valid co-ordinates";
		}
}
?>
</div>
<?php
include('footer.php');
?>


