{* MP3 Audio - Full View *}

<div>
<h1>{$node.name|wash()}</h1>

	{include
		uri="design:content/datatype/parts/mediaplayer.tpl"
		type='audio'
		media=hash('url',$node.data_map.file.content.filepath|ezroot('no'),'name',$node.name|wash(),'id',$node.node_id,'duration', $node.data_map.file.content.filepath|get_mp3_duration)
	}
</div>
