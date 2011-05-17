
var $mediaplayer=(function($){

	$flashDir='';
	$flashFiles={
		'flowplayer':'flowplayer-3.1.5.swf',
		'audio':'flowplayer.audio-3.1.2.swf',
		'content':'flowplayer.content-3.1.0.swf',
		'controls':'flowplayer.controls-3.1.5.swf'
	};

$.fn.mediaplayer=function(o){

	$o=$.extend({
	}, o);

	$mp = $(this);

	$plrid = 'plr'+o.id;
	$ctlid = 'ctl'+o.id;

	$file = $mp.find('a').attr('href');
	$ctls = '<div id="'+$ctlid+'" class="default controls"><a class="stop btn">stop</a><a class="play btn">play</a><div class="track"><div class="buffer"></div><div class="progress"></div><div class="playhead"></div></div><div class="time"></div><a class="volume-down btn">Volume Down</a><a class="volume-up btn">Volume Up</a><a class="mute btn">mute</a></div>';
	$ctlcls = {playClass:'play btn',pauseClass:'pause btn',muteClass:'mute btn',unmuteClass:'unmute btn'};

	var $player, $volume;
	$mp.wrapInner('<div id="'+$plrid+'" class="player"></div>').append($ctls);

	if($o.type=='audio'){$('#'+$ctlid).css({position:'static'});}

	$mp.find('#'+$plrid).css({width:$o.size.width,height:($o.type=='video'?$o.size.height:1)})
	if($o.type=='video'){
		$mp.hover(function(){
			$('#'+$ctlid).fadeIn();
		},function(){
			$('#'+$ctlid).fadeOut();
		});
	}

	var $cl = {
				url:$file,
				autoPlay:$o.autoPlay,
				onBeforeBegin:function() {
					if($o.type=='audio'){$f($plrid).close();}
				},
				onStart:function(clip){
					pageTracker._trackEvent("Videos", "Play", clip.url);
				},
				onPause:function(clip){
					pageTracker._trackEvent("Videos", "Pause", clip.url, parseInt(this.getTime()));
				},
				onStop:function(clip){
					pageTracker._trackEvent("Videos", "Stop", clip.url, parseInt(this.getTime()));
				},
				onFinish:function(clip){
					pageTracker._trackEvent("Videos", "Finish", clip.url);
				}
			};

			if($o.type=='audio'){$cl.duration=$o.duration;}

	$(window).load(function(){
		$player = $f($plrid,$flashDir+$flashFiles.flowplayer,{
			clip:$cl,
			plugins:{
				controls:null
			},
			onLoad:function(){this.setVolume(50);$volume = this.getVolume();}
		}).controls($ctlid,$ctlcls);

		$controls=$('#'+$ctlid);
		if($o.type=='video'){$controls.fadeTo(0,0.8).hide();}

		$controls
		.find('.volume-up').click(function(){changeVolume(true,$player);}).end()
		.find('.volume-down').click(function(){changeVolume(false,$player);}).end()
		.find('.stop').click(function(){$player.unload()}).end();

	});


	return this;

	function changeVolume($inc,$obj){
		if($inc && $volume<=100){
			$volume+=10;$player.setVolume($volume);
		}
		else if(!$inc && $volume>=0){
			$volume-=10;$player.setVolume($volume);
		}
	}


}

	return {
		setFlashDir:function($dir){
			$flashDir=$dir;
		}
	};

})(jQuery);

