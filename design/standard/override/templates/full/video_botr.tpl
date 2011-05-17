{if array(195,5816)|contains(fetch(user, current_user).contentobject_id)|not}

{* Video - Full view *}

{if eq($DesignKeys:used.node, $node.node_id)}

<div class="class-video extrainfo">
    <div class="columns-video float-break">
        <div class="main-column-position">
            <div class="main-column float-break">

{/if}

<div class='comments-block'>
	<div class='video-block'>

	{def $vid_data = $node.data_map.vid.content|video
     	$description = first_set($node.data_map.description.output.output_text,$vid_data['description'])}

	<object width="560" height="341" id="embedded_player" type="application/x-shockwave-flash" data="http://service.twistage.com/plugins/player.swf?v={$node.data_map.vid.content}">
	    <param name="movie" value="http://service.twistage.com/plugins/player.swf?v={$node.data_map.vid.content}"/>
	    <param name="allowfullscreen" value="true"/>
		<param name="wmode" value="transparent">
	    <param name="allowscriptaccess" value="always"/>
	    <param name="base" value="http://service.twistage.com"/>
	</object>

	{if $node.data_map.still_frame.content.is_valid}
		<div id='coverup' onclick="javascript: this.style.display = 'none';">
		{attribute_view_gui attribute=$node.data_map.still_frame image_class='still_frame_large'}
		</div>
	{/if}

		<div class='video-details'>
			<h1>{$node.name|wash}</h1>

			<div onclick='slide_toggle(this)' class='fauxlink share'><span></span></div>

			{if $description|trim|begins_with('<p>')|not}<p>{/if}{$description}{if $description|trim|begins_with('<p>')|not}</p>{/if}

			{if $node.data_map.tags.has_content}
				<div class='tag_border'>
					<div class='tag_label'><h4>TAGS:</h4></div>
					<ul class="tags">
					{foreach $vid_data['tags'] as $thistag}
						<li><a href={concat( $node.object.main_node.parent.url_alias, "/(id)/", $node.object.main_node.parent.node_id, "/(tag)/", $thistag['name']|rawurlencode )|ezroot}>{$thistag['name']}</a></li>
					{/foreach}
					</ul>
				</div>
			{/if}
			{if $node.path_array|contains(1903)}
			<p>&nbsp;</p>
			{else}
			{include uri='design:parts/comments.tpl' usenode=$node}
			{/if}
		</div>
	</div>
</div>

{if eq($DesignKeys:used.node, $node.node_id)}
            </div>
        </div>
			<div class="extrainfo-column-position">
			<div class="extrainfo-column"
			{include uri='design:parts/vid_stats.tpl'}
			{include uri='design:parts/video/extra_info.tpl' used_node=$node}
			</div>
		</div>
	</div>
</div>
{/if}

{else}














{def $vid_id = $node.data_map.botr.content
	 $player = ezgetvars()['player']
}
	
{if or(is_set($player)|not, $player|eq(''))}
	{set $player = ezini( 'BOTRSettings', 'DefaultPlayer', 'site.ini' )}
{/if}

{def $player_r = botr_player($player)}

<div id="botr_{$vid_id}_{$player}_div" style='width: {sum($player_r['width'], 15)}px; height: {sum($player_r['height'], 15)}px' class="botrplayer"></div>

<script type="text/javascript" src="/extension/multimedia/design/standard/javascript/ezbotr_object.js"></script>
<script type="text/javascript" src="/extension/multimedia/design/standard/javascript/bits_modified.php?keys={$vid_id}-{$player}"></script>






{/if}