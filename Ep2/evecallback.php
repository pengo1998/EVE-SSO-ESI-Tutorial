<?php
require("data.php");
require("Request.php");

if(isset($_GET['code'])) {
	$code = $_GET['code'];

	$url = "https://login.eveonline.com/v2/oauth/token";
	$header = "Authorization: Basic " . base64_encode($cid . ":" . $secretKey);
	$fields_string = "";
	$fields = array(
		'grant_type' => 'authorization_code',
		'code' => $code
	);

	foreach($fields as $key => $value) {
		$fields_string .= $key . "=" . $value . "&";
	}
	rtrim($fields_string, "&");

	$resp = Request::POST($header, $url, $fields, $fields_string);

	$accessToken = $resp->access_token;
	$refreshToken = $resp->refresh_token;

var_dump($resp);
die();
	$url = "https://login.eveonline.com/oauth/verify";
	$header = "Authorization: Bearer " .$accessToken;

	$resp = Request::GET($header, $url);

	$characterID = $resp->CharacterID;
	$characterName = $resp->CharacterName;
	$expiration = $resp->ExpiresOn;



} else {
	echo "Did not receive code from eve.";
	die();
}
