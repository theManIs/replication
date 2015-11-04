<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="extensions\bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" href="extensions/fontawesome/css/font-awesome.min.css">
	<script language="javascript" src="extensions/jqui/jquery.js"></script>
	<script language="javascript" src="extensions/jqui/jquery-ui.min.js"></script>
	<script language="javascript" src="extensions/bootstrap/js/bootstrap.min.js"></script>
	<script src="extensions/soundM/script/soundmanager2.js"></script>	
	<script language="javascript" src="extensions/soundM/demo/bar-ui/script/bar-ui.js"></script>
	<link rel="stylesheet" type="text/css"
		href="extensions/soundM/demo/bar-ui/css/bar-ui.css">
</head>
<body>
	<div class="sm2-bar-ui full-width fixed">
		<div class="bd sm2-main-controls">
		<div class="sm2-inline-texture"></div>
		<div class="sm2-inline-gradient"></div>

		<div class="sm2-inline-element sm2-button-element">
		<div class="sm2-button-bd">
		<a href="#play" class="sm2-inline-button play-pause">Play / pause</a>
		</div>
		</div>

		<div class="sm2-inline-element sm2-inline-status">

		<div class="sm2-playlist">
		<div class="sm2-playlist-target"><ul class="sm2-playlist-bd"><li><b>SonReal</b> - LA<span class="label">Explicit</span></li></ul></div>
		</div>

		<div class="sm2-progress">
		<div class="sm2-row">
		<div class="sm2-inline-time">0:00</div>
		<div class="sm2-progress-bd">
		<div class="sm2-progress-track">
		<div class="sm2-progress-bar"></div>
		<div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
		</div>
		</div>
		<div class="sm2-inline-duration">0:00</div>
		</div>
		</div>

		</div>

		<div class="sm2-inline-element sm2-button-element sm2-volume">
		<div class="sm2-button-bd">
		<span class="sm2-inline-button sm2-volume-control volume-shade"></span>
		<a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
		</div>
		</div>

		<div class="sm2-inline-element sm2-button-element">
		<div class="sm2-button-bd">
		<a href="#prev" title="Previous" class="sm2-inline-button previous">&lt; previous</a>
		</div>
		</div>

		<div class="sm2-inline-element sm2-button-element">
		<div class="sm2-button-bd">
		<a href="#next" title="Next" class="sm2-inline-button next">&gt; next</a>
		</div>
		</div>

		<div class="sm2-inline-element sm2-button-element">
		<div class="sm2-button-bd">
		<a href="#repeat" title="Repeat playlist" class="sm2-inline-button repeat">∞ repeat</a>
		</div>
		</div>

		<!-- not implemented -->
		<!--
		<div class="sm2-inline-element sm2-button-element">
		<div class="sm2-button-bd">
		<a href="#shuffle" title="Shuffle" class="sm2-inline-button shuffle">shuffle</a>
		</div>
		</div>
		-->

		<div class="sm2-inline-element sm2-button-element sm2-menu">
		<div class="sm2-button-bd">
		<a href="#menu" class="sm2-inline-button menu">menu</a>
		</div>
		</div>
		</div>
		<div class="bd sm2-playlist-drawer sm2-element">
		<div class="sm2-inline-texture">
			<div class="sm2-box-shadow"></div>
		</div>
		<!-- playlist content is mirrored here -->
			<div class="sm2-playlist-wrapper">
				<ul class="sm2-playlist-bd">
				<!-- item with "download" link -->
				<li class="selected">
				<div class="sm2-row">
					<div class="sm2-col sm2-wide">
						<a href="0.mp3">Rain</a>
						<!--<a href="http://95.163.65.4/records/2015/11/03/d7c9b2f5244dd84e.1446544146.1515188.mp3">Скачать</a>-->
						<!--<a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20LA%20%28Prod%20Chin%20Injetti%29.mp3"><b>SonReal</b> - LA<span class="label">Explicit</span></a>-->
					</div>
					<!-- 
					<div class="sm2-col">
					<a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20LA%20%28Prod%20Chin%20Injetti%29.mp3" target="_blank" title="Download &quot;LA&quot;" class="sm2-icon sm2-music sm2-exclude">Download this track</a>
					</div>
					-->
				</div>
				</li>
					<!--
					<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20Let%20Me%20%28Prod%202oolman%29.mp3"><b>SonReal</b> - Let Me <span class="label">Explicit</span></a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20People%20Asking.mp3"><b>SonReal</b> - People Asking <span class="label">Explicit</span></a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20Already%20There%20Remix%20ft.%20Rich%20Kidd%2C%20Saukrates.mp3"><b>SonReal</b> - Already There Remix ft. Rich Kidd, Saukrates <span class="label">Explicit</span></a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/The%20Fugitives%20-%20Graffiti%20Sex.mp3"><b>The Fugitives</b> - Graffiti Sex</a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/Adrian%20Glynn%20-%20Seven%20Or%20Eight%20Days.mp3"><b>Adrian Glynn</b> - Seven Or Eight Days</a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20I%20Tried.mp3"><b>SonReal</b> - I Tried</a></li>
					<li><a href="http://freshly-ground.com/data/audio/mpc/20060826%20-%20Armstrong.mp3">Armstrong Beat</a></li>
					<li><a href="http://freshly-ground.com/data/audio/mpc/20090119%20-%20Untitled%20Groove.mp3">Untitled Groove</a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/birds-in-kauai-128kbps-aac-lc.mp4">Birds In Kaua'i (AAC)</a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/20130320%20-%20Po%27ipu%20Beach%20Waves.ogg">Po'ipu Beach Waves (OGG)</a></li>
					<li><a href="http://freshly-ground.com/data/audio/sm2/bottle-pop.wav">A corked beer bottle (WAV)</a></li>
					-->
				</ul>
			</div>
		</div>
	</div>
</body>
</html>