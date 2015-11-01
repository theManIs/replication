/*Производит кросс-доменный GET-запрос*/
function get(request) {
	var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
	var xhr = new XHR();
	xhr.open(request, true);
	xhr.onerror = function() {
		alert('Ошибка' + this.status);
	}
	xhr.ontimeout = function() 	{
		alert('Извините, запрос превысил максимальное время');
	}
	xhr.send();
	return xhr;
};