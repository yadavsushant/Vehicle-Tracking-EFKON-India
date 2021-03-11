<?php
function get_efkon_tracking()
{
	$curl = curl_init();
	$customer_id = XXXXXXXXXX;
	$api_key = XXXXXXXXXX
	$url = 'http://182.19.19.52:1098/OslService/api/vehicletrip/'.$customer_id; 
	$data = array(
		"key" => $api_key,
	);
   
	// curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$url = sprintf("%s?%s", $url, http_build_query($data));

	// OPTIONS:
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
	));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	// EXECUTE:
	$result = curl_exec($curl);
	if(!$result){die("Connection Failure");}
	curl_close($curl);
	$response = json_decode($result);
	
	foreach($response as $res)
	{
		$VehicleNo = $res->vehicleNo;
		$Location = $res->location;
		$Lat = $res->latitude;
		$Long = $res->longitude;
		$lat_longi=$Lat.",".$Long;
		$Date = $res->messageCreatedAt;
		$Speed = $res->speed;
	}
}
