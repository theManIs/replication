$(function() {
	$('#iconSnake').mouseover(function(){
		$('#iconSnake').animate({
			backgroundColor: "rgb(255, 255, 255, .1)",
			width: "500px"
		});
		$('#snakeAnnounce').slideDown(700);
	});
	$('#iconSnake').mouseout(function(){
		$('#iconSnake').animate({
			backgroundColor: "rgb(255, 255, 255, .0)",
			width: "300px"
		});
		$('#snakeAnnounce').slideUp(700);
	});
	$('#iconSnake').click(function(){$('#namePerson').toggle("fade").find('input').focus(0)});
	$('#namePerson').keydown(function(event){
		if (event.keyCode === 13) {
			personName = $('#namePerson').find('input').val();
			open("snake/snake-game.html?personName=" + personName, "_self");
		}
	});
	
	var dataAjax = 'ДжимЮджинРейнор' + ' ' + '500' + ' ' + '0';
	$.post('snake/backEnd.php', 'foo=' + dataAjax, 
		function(data, textStatus){
			var nameBook = [];
			$(data).each(function(i, e){nameBook.push(e[0])});
			$('#namePerson').find('input').autocomplete({source: nameBook});
		}, 
		'json');
	
})