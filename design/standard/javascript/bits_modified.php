<?php

Header("content-type: application/x-javascript");

$keys = $_GET['keys'];

$my_js = file_get_contents("http://content.jwplatform.com/players/$keys.js");

//$my_js = preg_replace("/^.*document\.write/s", "document.write", $my_js);

$my_js = preg_replace("/document\.write.*;/", "", $my_js);

if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == ‘on’ || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&$_SERVER['HTTP_X_FORWARDED_PROTO'] == "https") {
        $my_js = preg_replace("/http:/", "/https:/", $my_js);
}

if( $_SERVER['SERVER_PORT'] == 443 )
{
        $my_js = preg_replace("/http:/", "https:", $my_js);
}

$addme = false;
$caption = '';
$audiodescription = '';
$pugins = '';

if (array_key_exists('caption', $_GET)) {
	
	$caption = 'botr_' . str_replace("-", "_", $keys) . '.addVariable("captions.file","' . $_GET['caption'] .'");' . "\r\n";
	$pugins = 'botr_' . str_replace("-", "_", $keys) . ".addVariable(\"plugins\",\"captions-2h\");\r\n";
	
}

if (array_key_exists('audiodescription', $_GET)) {
	
	$audiodescription = 'botr_' . str_replace("-", "_", $keys) . '.addVariable("audiodescription.file","' . $_GET['audiodescription'] .'");'. "\r\n";
	$pugins = 'botr_' . str_replace("-", "_", $keys) . ".addVariable(\"plugins\",\"audiodescription-1\");\r\n";
	
}

if (array_key_exists('audiodescription', $_GET) && array_key_exists('caption', $_GET)) {
	
	$pugins = 'botr_' . str_replace("-", "_", $keys) . ".addVariable(\"plugins\",\"captions-2h,audiodescription-1\");\r\n";
	
}

if (array_key_exists('audiodescription', $_GET) || array_key_exists('caption', $_GET)) {
	
	$addme = $pugins . $caption . $audiodescription;
	$my_js = preg_replace("/\n.*\.addVariable\(\"[^,]*/", "$addme$0", $my_js, 1);
	
}

echo $my_js;

?>