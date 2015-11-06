
$(document).ready(function() {
	var sound = $('a[href$=".mp3"].playlink');
	$('a[href$=".mp3"].playlink').text('adfadfa');
	for (i = 0, c = sound.length; i < c; i++) {
		var recordname = $(sound[i]).attr('recordname');
		//var newS = $('<li>').append($('<a>').attr('href', sound[i].href).text($(sound[i]).text()));
		//$(newS.find('a')).text($(sound[i]).attr('recordname'));
		var newS = $('<li>').append($('<a>').attr('href', sound[i].href).text(recordname));
		$($('.sm2-playlist-bd')[1]).append(newS);
		$($($('.sm2-playlist-bd')[1]).find('a')[i]).click(function() {
			$('tr.success').removeClass('success');
			//$('*[recordname="' + recordname + '"').parent().parent().addClass('success');
			$('*[recordname="' + $($('a[href$=".mp3"].playlink')[i]).attr('recordname') + '"')
				.parent().parent().addClass('success')
		});
	}
	
	$('.sm2-bar-ui').css('display', 'none');
	var clickMp3 = function(o) {
	$(sound[o]).click(function(event) {
		event.preventDefault();
		$('tr.success').removeClass('success');
		$($(this).parent().parent()).addClass('success');
		$('.sm2-bar-ui').css('display', 'inline-block');
		sm2BarPlayers[0].playlistController.playItemByOffset(o + 1);
	});
	}		
	for (i = 0, c = sound.length; i < c; i++) {
		clickMp3(i);
	}
	$('a[href="#close"]').click(function(){
		sm2BarPlayers[0].actions.stop();
		$('.success').removeClass('success');
		$('.sm2-bar-ui').css('display', 'none');
		
	});
});