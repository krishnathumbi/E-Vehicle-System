<?php $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=8.883800,76.598783&sensor=false');

        $output= json_decode($geocode);
		//var_dump($output);

echo $output->results[0]->formatted_address;
?>