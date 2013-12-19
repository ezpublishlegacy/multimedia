<?php

Header("content-type: application/x-javascript");

$keys = $_GET['keys'];

$my_js = file_get_contents("http://cdn.thinkcreative.com/players/$keys.js");

//$my_js = preg_replace("/^.*document\.write/s", "document.write", $my_js);

$my_js = preg_replace("/document\.write.*;/", "", $my_js);

$addme = false;
$caption = '';
$audiodescription = '';
$pugins = '';

preg_match('/playlist: "([^"]*)"((\s)?,|$|})/', $my_js, $playlist);

if (count($playlist) > 1) {
	$p = $playlist[1];
	$new_p = "/botr_video_dt/playlist/".base64_encode($p)."/".base64_encode($_GET['caption']);
	$my_js = str_replace($p, $new_p, $my_js);
}

echo $my_js;

?>