$(function() {
	$('#namePerson').keydown(function(event){
		if (event.keyCode === 13) {
			personName = $('#namePerson').find('input').val();
			open("snake.html?personName=" + personName, "_self");
		}
	});
	
	var dataAjax = 'ДжимЮджинРейнор' + ' ' + '500' + ' ' + '0';
	$.post('backEnd.php', 'foo=' + dataAjax, 
		function(data, textStatus){
			var nameBook = [];
			$(data).each(function(i, e){nameBook.push(e[0])});
			$('#namePerson').find('input').autocomplete({source: nameBook});
		}, 
		'json');
	
})