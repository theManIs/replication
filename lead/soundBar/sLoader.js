(function() {
	var directory = $('script[src$="sLoader.js"]').attr('src');
	directory = directory.substr(0, directory.search('sLoader.js'));
	var script = $('<script>').attr('language', 'javascript')
		.attr('src', directory + 'sManager.js').attr('async', true);
	var style = $('<link>').attr('rel', 'stylesheet').attr('type', 'text/css')
		.attr('href', directory + 'css/sBarStyle.css');
	$('head').append(script).append(style);
})();
$(document).ready(function() {	
	var directory = $('script[src$="sLoader.js"]').attr('src');
	directory = directory.substr(0, directory.search('sLoader.js'));
	$.get(directory + 'sModule.html', '', function(data) {		
		$('body').append($('<div>').html(data));
		supportFunction.controller();
	}, 'html');	
});