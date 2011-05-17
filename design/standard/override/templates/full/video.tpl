{if $node.data_map.video.has_content}

{def $attr_r = $node.data_map.video.content|explode('|')
	 $vid_r=bits_api($attr_r.0)
	 $vid = null
	 $v_h = 360
	 $v_w = 480
}

{* width and height hardcoded here and in mediaplayer.tpl for the thumbnail because it was quicker/easier than finding where the actual conversion was chosen and forcing it. if the 480x360 conversion is selected in admin interface this will work out the same. *}

{$vid_r|debug}

	{foreach $vid_r.response.1.conversions as $v}
	{$v|debug}
	{$v.key|debug}
		{if or($v.key|eq($attr_r.1), $v.link.path|contains('videos'))}
			{set $vid = concat($v.link.protocol, '://', $v.link.address, $v.link.path)}
			{*
				 $v_h = $v.height
				 $v_w = $v.width}
			*}
			{break}
		{/if}
	{/foreach}
	
{$vid|debug}
{$v_h|debug}
{$v_w|debug}

	{include
		uri="design:content/datatype/parts/mediaplayer.tpl"
		type='video'
		image=hash('url',concat('http://cdn.thinkcreative.com/thumbs/',$attr_r.0,'.jpg'),'alt','SEO Content')
		media=hash('url',$vid,'name',$node.name|wash(),'id',$attr_r.0,'width',$v_w,'height',$v_h)
	}

{/if}