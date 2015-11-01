/*Системные переменные*/
var backScript = 'backEnd.php';
var importWidget = 'callkeeperWidget.html';
var linkStyle = 'callkeeperStyle.css';

/*Показвает или скрывает окно виджета*/
function tggl() {
	lable = document.querySelector('#youPush');
	feature = document.querySelector('.callkeeperMain');
	clsr = document.querySelector('#youClose');
	if (lable != null) {
		lable.onclick = function() {
			lable.hidden = true;
			feature.hidden = false;
		};
		feature.hidden = true;
	}
	
	if (clsr != null) {
		clsr.onclick = function() {
			feature.hidden = true;
			lable.hidden = false;
		}
	}
}

/*Производит кросс-доменный запрос*/
function cRec(method, request) {
	var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
	var xhr = new XHR();
	xhr.open(method, request, true);
	xhr.onerror = function() {
		alert('Ошибка' + this.status);
	}
	xhr.ontimeout = function() 
	{
		alert('Извините, запрос превысил максимальное время');
	}
	xhr.send();
	return xhr;
};

/*Получает гипертекст виджета*/
(function() {
	rec = cRec('GET', importWidget);
	rec.onload = function() {
		data = rec.responseText;
		widget = document.createElement('div');
		widget.innerHTML = data;
		document.body.appendChild(widget);
		tggl();
	};
})();

/*Получает стили виджета*/
(function() {
	rec2 = cRec('GET', linkStyle);
	rec2.onload = function() {
		data = rec2.responseText;
		widget = document.createElement('style');
		widget.innerHTML = data;
		document.head.appendChild(widget);
	};
})();


