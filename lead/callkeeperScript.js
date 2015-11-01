/*Системные переменные*/
var backScript = 'backEnd.php';
var importWidget = 'callkeeperWidget.html';
var linkStyle = 'callkeeperStyle.css';
var obj = false;

/*Эмулятор доступа к объекту DOM*/
function R(selector) {
	if (selector[0] === '#') {
		if (kit = document.querySelector(selector))
			return kit;
		else
			return false;
	} else {
		if(kit = document.querySelectorAll(selector)) {
			if (typeof kit[0] == 'undefined')
				return false;
			else {
				if (kit[1])	
					return kit;
				else 
					return kit[0];
			}
		} else
			return false;
	}
}

/*Компонент drag&drop */
function mousedown(ev) {
	obj = R('.' + ev.target.getAttribute('name'));
	if(obj) {
		X = ev.x;
		Y = ev.y;
		objLeft = parseInt(obj.style.left) ? parseInt(obj.style.left) : obj.offsetLeft;
		objTop = parseInt(obj.style.top) ? parseInt(obj.style.top) : obj.offsetTop;
	}
	return false;
}

function mousemove(ev) {
	if(obj) {
		obj.style.left = objLeft + event.clientX-X + document.body.scrollLeft + 'px';
		obj.style.top = objTop + event.clientY-Y + document.body.scrollTop + 'px';
		return false;
	}
}

function mouseup() {
	obj = false;
}

/*Установка обработчиков событий для drag&drop*/
document.onmousedown = function(event) {
	mousedown(event);
	return true;
}
document.onmousemove = mousemove;
document.onmouseup = mouseup; 

/*Навешивает обработчики событий на виджет*/
function toggle() {
	lable = document.querySelector('#youPush');
	feature = document.querySelector('.callkeeperMain');
	clsr = document.querySelector('#youClose');
	send = R('#youSend');
	if (lable) {
		lable.onclick = function() {
			lable.hidden = true;
			feature.hidden = false;
		};
		lable.hidden = true;
		setTimeout(function(){lable.hidden = false;features();}, 3000);
	}
	if (feature)
		feature.hidden = true;
	if (clsr) {
		clsr.onclick = function() {
			feature.hidden = true;
			lable.hidden = false;
		}
	}
	if (send) {
		send.onclick = function() {
			feature.hidden = true;
			lable.hidden = false;
			name = R('#youName').value;
			mail = R('#youMail').value;
			mes = R('#youQuestion').value;
			dep = R('#youDep').value;
			center = R('#youCenter').value;
			request = 'backEnd.php?name=' + name + '&mail=' + mail + '&mes=' + mes;
			request = request + '&dep=' + dep + '&center=' + center + '&token=' + token;
			request = request + '&write=true';
			point = cRec('GET', request);
			point.onload = function(){
				alert(this.responseText);
			}
		}
	}
}

/*Производит кросс-доменный GET-запрос*/
function cRec(method, request) {
	var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
	var xhr = new XHR();
	xhr.open(method, request, true);
	xhr.onerror = function() {
		alert('Ошибка' + this.status);
	}
	xhr.ontimeout = function() {
		alert('Извините, запрос превысил максимальное время');
	}
	xhr.send();
	return xhr;
};

/*Управляет некоторыми настройками*/
function features() {
	R('#youPush').style.marginTop = window.innerHeight - R('#youPush').offsetHeight;
}



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

/*Получает гипертекст виджета*/
/*Основная управляющая функция*/
(function() {
	rec = cRec('GET', importWidget);
	rec.onload = function() {
		document.body.innerHTML = document.body.innerHTML + rec.responseText;
		toggle();
	};
})();

