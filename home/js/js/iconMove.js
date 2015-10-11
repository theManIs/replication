$(function(){
	$('.animateIcon').mouseover(function(){
		$(this).animate({
			backgroundColor: "rgb(0, 255, 255, .1)"
		});
		$(this).find('img').add($(this).find('div')).add($(this).find('p')).animate({
			width: "400px"
		});
		$(this).find('p').show();
	}).mouseleave(function(){
		$(this).animate({
			backgroundColor: "rgb(255, 255, 255, .0)"
		}, {complete: function(){$(this).stop(true)}});
		$(this).find('img').add($(this).find('div')).add($(this).find('p')).animate({
			width: "300px"
		}, {complete: function() {$(this).stop(true);}})
		$(this).find('p').hide();
	});
	
	
})

