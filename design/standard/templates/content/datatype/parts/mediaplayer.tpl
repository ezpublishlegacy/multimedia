{* MediaPlayer - FlowPlayer *}

{ezscript_require(array('flowplayer-3.1.4.min.js','flowplayer.controls-3.0.2.min.js','flowplayer.playlist-3.0.8.min.js','jquery.mediaplayer.js'))}
{ezcss_require(array('mediaplayer.css'))}


{def $player_width = cond($media.width|gt(500), $media.width, 500)}

<div class="mediaplayer{if is_set($type)} {$type}{/if}" id="mediaplayer_{$media.id}" style="width:{$player_width}px;">
	<a title="" href="{$media.url}">{if is_set($image)}<img alt="{$image.alt}" src="{$image.url}" width="480" height="360" />{/if}</a>
</div>

<script type="text/javascript">

$(function(){ldelim}
$mediaplayer.setFlashDir('/extension/multimedia/design/standard/flash/');
	$('#mediaplayer_{$media.id}').mediaplayer({ldelim}
		id:'{$media.id}',
		volumeStep:5,
		autoPlay:true,
		type:'{$type}',
		{if is_set($media.duration)}duration:{$media.duration},{/if}
		size:{ldelim}width:{first_set($media.width,500)},height:{first_set($media.height,25)}{rdelim}
	{rdelim});

{rdelim});

</script>