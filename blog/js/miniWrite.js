$(function() {
	$('.miniWrite').click(function() {
		name = $(this).find('.imp').val();
		iceCream = 'notes/' + name + '.txt';
		jqName = $('#d' + name);
		if (jqName.size() === 0) {
			$.get(iceCream, '', function(data, textStatus) {
				$('body').append($('<div>').attr('id', 'd' + data[4]).html(data[2]));
				jqName = '#d' + data[4];
				$(jqName).addClass('dialog').dialog({
					dialogClass: "no-close",
					buttons: [
						{
							text: "Закрыть",
							click: function() {
								$(this).dialog("close");
							}
						}
					],
					draggable: false,
					hide: {effect: "explode", duration: 1000},
					width: "1000px",
					modal: true
				});
				console.log(data);
			}, 'json');
		} else {
			$(jqName).addClass('dialog').dialog({
				dialogClass: "no-close",
				buttons: [
					{
						text: "Закрыть",
						click: function() {
							$(this).dialog("close");
						}
					}
				],
				draggable: false,
				hide: {effect: "explode", duration: 1000},
				width: "800px",
				modal: true
			});
		}
		
	});
	$('.miniWrite').mouseover(function(){
		$(this).effect("highlight", 200, function(){
			$(this).stop(true);
		});
	});
});
