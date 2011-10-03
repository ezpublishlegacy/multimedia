<?

$vars = (count($_POST)) ? $_POST : $_GET;

if (array_key_exists('video_key', $vars)) {
	
	$video = new eZBotrVideo($vars['video_key']);

	echo "<xmp>" .  json_encode( $video->Attributes ) . "</xmp>";

}
			
eZExecution::cleanExit();		

?>