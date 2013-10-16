<?php

header("Content-type: text/xml");

$playlist = base64_decode($Params['playlist']);
$captions = base64_decode($Params['captions']);

$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $playlist);

$xml = curl_exec($curl);

curl_close($curl);

if (strpos($xml, 'kind="captions"') === false) {
	$xml = str_replace('kind="thumbnails" />', 'kind="thumbnails" />'."\r\n".'<jwplayer:track file="'.$captions.'" kind="captions" label="Captions" />', $xml);
}


echo $xml;

eZExecution::cleanExit();

?>