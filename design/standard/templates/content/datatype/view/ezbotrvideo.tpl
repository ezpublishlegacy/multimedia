{def $vid_id = $attribute.content.id}
{def $defplayer = ezini( 'BOTRSettings', 'DefaultPlayer', 'botr.ini' )
     $captions = $attribute.object.data_map.captions}
	
{if or(is_set($player)|not,$player|eq(''))}
	{def $player = $defplayer}
{/if}

{def $player_r = $attribute.content.players[$player]}

{if and($attribute.object.data_map.captions|is_set, $captions.has_content)}
	{def $caption = concat( '&caption=', $captions.content.filepath|ezroot(no)|urlencode)}
{else}
	{def $caption = ''}
{/if}

{if and($attribute.object.data_map.audiodescription|is_set, $attribute.object.data_map.audiodescription.has_content)}
	{def $audiodescription = concat( '&audiodescription=', $attribute.object.data_map.audiodescription.content.filepath|ezroot(no)|urlencode)}
{else}
	{def $audiodescription = ''}
{/if}

<div id="botr_{$vid_id}_{$player}_div" style='width: {sum($player_r['width'], 15)}px; height: {sum($player_r['height'], 15)}px' class="botrplayer"></div>

<script type="text/javascript" src="/extension/multimedia/design/standard/javascript/ezbotr_object.js"></script>
<script type="text/javascript" src="/extension/multimedia/design/standard/javascript/bits_modified.php?keys={$vid_id}-{$player}{$caption}{$audiodescription}"></script>