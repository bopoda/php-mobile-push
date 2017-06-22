<?php
// API access key from Google API's Console, smt like "AIzaSyTTOoVZfSDso7OWYrkIHOUx34BIwP2Z57A"
$googleApiKey = 'YOUR_SERVER_KEY_FROM_GOOGLE_CONSOLE_SETTINGS';
// User Device token, smt like "APG36bF_7JfPXcsCq7-PLoDuu6av5aKUmMatfk5bI6sOXOnOdO4PvWqXoe4RpnzrjPkhy6iUvNoqBF7Ij5K2K7PrbyVe_atrBl2SHPHuqiITopby8FcXdy-uqlla5OsEmLpcZJraKUP-OondhRfW9DXYC1aurjOHKg
$deviceToken = 'USER_DEVICE_TOKEN';

// prep the bundle
$msg = [
	'message' => 'Push message',
	'title' => 'Title 1',
	'subtitle' => 'This is a subtitle 1',
	'vibrate' => 1,
	'sound' => 1,
];

$fields = [
	'to' => $deviceToken,
	'data' => $msg,
];

$headers = [
	'Authorization: key='.$googleApiKey,
	'Content-Type: application/json',
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
curl_close($ch);
echo $result . PHP_EOL;
