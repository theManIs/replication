$(function() {
	source = $('table');
	i = source.find('tr').size() - 1;
	while (i > -1) {
		name = $($(source.find('tr')[i]).find('td')[5]).hide().text();
		$($(source.find('tr')[i]).find('button[name=delete]')).val(name);
		$($(source.find('tr')[i]).find('button[name=update]')).val(name);
		i--;
	}
});