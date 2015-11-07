
$(document).ready(function() {
	var directory = $('script[src$="sLoader.js"]').attr('src');
	directory = directory.substr(0, directory.search('sLoader.js'));	
	var script = $('<script>').attr('language', 'javascript').attr('src', directory + 'sModule.js');
	var barUi = $('<script>').attr('language', 'javascript').attr('src', directory + 'script/bar-ui.js');
	var soundMan = $('<script>').attr('language', 'javascript').attr('src', directory + 'sm2.min.js');
	var barStyle = $('<link>').attr('rel', 'stylesheet').attr('type', 'text/css');
	var userStyle = $('<link>').attr('rel', 'stylesheet').attr('type', 'text/css');
	$('head').append(soundMan).append(barUi).append(script);
	$('head').append(barStyle.attr('href', directory + 'css/bar-ui.css'));
	$('head').append(userStyle.attr('href', directory + 'userSoundStyle.css'));

	$.get(directory + 'sModule.html', '', function(data) {
		$('body').append($('<div>').html(data));
		supportFunction.controller();
	}, 'html');
	
});