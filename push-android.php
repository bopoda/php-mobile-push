<?php
// API access key from Google API's Console
$googleApiKey = 'YOUR_SERVER_KEY_FROM_GOOGLE_CONSOLE_SETTINGS';
// User Device token
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
