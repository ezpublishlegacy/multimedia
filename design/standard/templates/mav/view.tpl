{* MAV View *}
<script type="text/javascript" src={'javascript/flowplayer-3.1.4.min.js'|ezdesign()}></script>
<script type="text/javascript" src={'javascript/flowplayer.controls-3.0.2.min.js'|ezdesign()}></script>
<script type="text/javascript" src={'javascript/jquery.mediaplayer.js'|ezdesign()}></script>
<script type="text/javascript">
{literal}
/*
$(function(){
$mediaplayer.setFlashDir('/extension/multimedia/design/standard/flash/');
	$('#mediaplayer').mediaplayer({
		volumeStep:5,
		autoPlay:true,
		clip:{
			url:'http://content.bitsontherun.com/videos/4Uf7N6ki-185041.mp4',
			autoPlay:true
		}
	});

});
*/
// 'http://vod01.netdna.com/vod/demo.flowplayer/flowplayer-700.flv'
$(window).load(function(){
/*
	var player_volume = 50
	var player = $f('player','/extension/multimedia/design/standard/flash/flowplayer-3.1.5.swf',{
		'clip':{
			'url':'http://content.bitsontherun.com/videos/4Uf7N6ki-185041.mp4',
			'autoPlay':false
		},
		'plugins':{
			'controls':null
		},
		'onLoad':function(){
			player_volume = this.getVolume();

//			var props=[];
//			for(var p in this){
//				props[props.length]=p;
//			}
//			window.alert(props.join("\n"));

		}
	}).controls('hulu').onVolume(function(l){player_volume=l;});
*/
/*
	$('#volUp').click(function(){
		player.setVolume(player_volume+10);
	});
	$('#volDown').click(function(){
		player.setVolume(player_volume-10);
	});
*/
/*
	$f("player", '/extension/multimedia/design/standard/flash/flowplayer-3.1.5.swf', {
		clip:{
		},
		playlist: [
			{url:'http://flowplayer.org/img/demos/national.jpg',scaling:'orig'},
			{url:'/extension/multimedia/design/standard/files/VBRabr192.mp3',duration:37},
			{url:'http://flowplayer.org/img/home/flow_eye.jpg',scaling:'orig'},
			{url:'/extension/multimedia/design/standard/files/fake_empire.mp3',duration:205}
		],
		plugins: {
			controls: null
		}
	}).controls('hulu');
*/
});
/*
		clip: {
			url:,
			autoPlay:false,
			autoBuffering:true
		},
			myContent:{
				url:'/extension/multimedia/design/standard/flash/flowplayer.content-3.1.0.swf',
				width:500,
				backgroundImage: 'url(http://flowplayer.org/img/demos/national.jpg)'
			},
			url:;
			audio: {  
				url: '/extension/multimedia/design/standard/flash/flowplayer.audio-3.1.2.swf'  
        	},
			http://releases.flowplayer.org/data/fake_empire.mp3

			url:,
*/
{/literal}
</script>


<h2>MAV View</h2>
{*
<div id="mediaplayer" style="text-align:center;width:500px;margin:20px auto;">
	<a title="" href="http://content.bitsontherun.com/videos/4Uf7N6ki-185041.mp4"><img alt="Search engine friendly content" src="http://flowplayer.org/img/home/flow_eye.jpg" width="425" height="300" /></a>
</div>
<hr />
http://content.bitsontherun.com/videos/4Uf7N6ki-185041.mp4*}
	{include
		uri="design:content/datatype/parts/mediaplayer.tpl"
		type='video'
		image=hash('url','http://flowplayer.org/img/home/flow_eye.jpg','alt','SEO Content')
		media=hash('url','http://vod01.netdna.com/vod/demo.flowplayer/flowplayer-700.flv','name','Demo','id',01,'width',500,'height',304)
	}

{*
<div style="text-align:center;width:500px;margin:20px auto;">
	<div id="player" style="width:500px;height:300px;"><img alt="Search engine friendly content" src="http://flowplayer.org/img/home/flow_eye.jpg" width="425" height="300" /></div>
	<div id="hulu" class="hulu">
		<a class="play">Play</a>
		<div class="track">
			<div class="buffer"></div>
			<div class="progress"></div>
			<div class="playhead"></div>
		</div> 
		<div class="time"></div>
		<a class="mute">mute</a>
{ *		<div id="volUp">Volume Up</div>
		<div id="volDown">Volume Down</div>* }
	</div>
</div>
*}