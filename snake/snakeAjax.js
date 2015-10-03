$.ajaxSetup({
	cache: false
});

var snakeAjax =
{
	totalScore: '147',
	personName: 'ЖораКорнев',
	score: '124',
	dataAjax: function() {return this.personName + ' ' + this.score + ' ' + this.totalScore;},
	sendAjax: function() {
		$.post(
			'backEnd.php', 
			'foo=' + this.dataAjax(),
			snakeAjax.billBoard,
			'json'
	)},
	billBoard: function(data, textStatus) {
		k = data.length; f = 0; sort = [];
		while(f < k) {
			if (data[f][0] != '') {
				i = 0; p = 1; foo = -1; step = 0; foo2 = -1;
				while (data[i]) {
					if (+data[i][p] > +foo) {
						foo = data[i][p];
						step = +i;
						foo2 = data[i][2];
					}
					if (+data[i][p] === +foo) {
						if (+data[i][2] > +foo2) {
							step = +i;
							foo2 = data[i][2];
						}
					}
					i++;
				}
				sort[f] = $(data[step]);
				data[step][p] = '-1';
			}
				f++;
		}
		
		$('#boardScore').empty().append($('<tr>').append(
			$('<th>').append('Место'),
			$('<th>').append('Имя'),
			$('<th>').append('Счёт'),
			$('<th>').append('Всего')
		));
		
		$(sort).each(function(i, e){
			$('#boardScore').append($('<tr>').append(
				$('<td>').append(i + 1),
				$('<td>').append(e[0]),
				$('<td>').append(e[1]),
				$('<td>').append(e[2])
			));
		})
	},
}

/*
$(document).ready(function(){
		$('#moreMatrix').hide();
		$('.boardScore').show();
		snakeAjax.sendAjax();
});
*/