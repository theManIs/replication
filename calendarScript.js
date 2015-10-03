$(function() {
	$('#iconCalendar').mouseover(function(){
		$('#iconCalendar').add('.divCover').animate({
			backgroundColor: "rgb(255, 255, 255, .1)",
			width: "500px"
		});
		$('#calendarAnnounce').show("blind");
	});
	
	$('#iconCalendar').mouseout(function(){
		$('#iconCalendar').add('.divCover').animate({
			backgroundColor: "rgb(255, 255, 255, .0)",
			width: "300px"
		});
		$('#calendarAnnounce').hide();
	});
	
	$('#iconCalendar').click(function(){
		open('calendar/', '_self');
	});
})