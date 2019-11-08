<?php
include('lib/init.php');
include('header.php');

if(isset($_SESSION['usertype']))
{
$getUser=$_SESSION['usertype'];
if($getUser=='user')
{include('sidebar_user.php');}
else
{include('sidebar_admin.php');}
}
else
{
	include('sidebaronlymenu.php');
}
//include('functions.php');
?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<?php
 $xx=$_GET['x'];
 $yy= $_GET['y'];?>

<div id="main">

 
 <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
	var xx ="<?php echo $xx; ?>";
	var yy ="<?php echo $yy; ?>";
	alert(xx);
	alert(yy);
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(xx,yy),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });


var curZoom = 8;
var zoomInterval;

// create map with zoom level curZoom
// ...

zoomInterval = setInterval(function () {
    curZoom += 1;
    map.setZoom(curZoom);
    if (curZoom === 18) {
        clearInterval(zoomInterval);
    }
}, 1000);
  </script>
 </div> 
  <?php 
include('footer.php');
?>