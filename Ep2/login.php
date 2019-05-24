<?php
require("data.php");

$state = "sk4kfvlslk4lsvlksdkl43klfv";
$url = "https://login.eveonline.com/v2/oauth/authorize/" . "?response_type=code&redirect_uri=" . $callback . "&client_id=" . $cid . "&state=" . $state;

if(headers_sent()) {
	echo '<script>window.location = ' . $url . ';</script>';
} else {
	header("Location: " . $url);
	die();
}
