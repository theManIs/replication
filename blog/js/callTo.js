$(function() {
	$('.hero-unit').find('a').click(function() {
		$('#call').dialog({
			dialogClass: "no-close",
			button:[{
				text: "adfad"
			}],
			width: "400px"
		})
	});
})