$(document).ready(function(){
	$.get('js/js/calendarScript.js');
	$.get('js/js/snakeScript.js');
	$.get('js/js/iconMove.js');
	$.get('js/js/booksScript.js');
	$.get('js/js/blogScript.js');
	
});


	$('img[alt=certificate]').click(function(){$('body').append($('<img>').attr('class', 'cert').css({"width" : "1000px", "position" : "fixed", "left": "20%", "top":"20%", "z-index": "10"}).attr("src", $(this).attr("src")));$('#main').add('#bg').css({"opacity":".5"});});
$('body').on('click', '.cert', function(){$('.cert').click(function(){$(this).remove(); $('#main').add('#bg').css({"opacity":"1"});});});