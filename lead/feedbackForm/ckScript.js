formWidget = {
	//formPath : '../feedbackForm/callkeeperWidget.html',
	formPath : '../feedbackForm/saveFeatures.php',
	stylePath : '../feedbackForm/callkeeperStyle.css',
	backEnd : '../feedbackForm/backEnd.php',
	
	loadModel : function(it) {
		var response = getReq(it);
		response.addEventListener('load', function() {
			document.body.innerHTML = document.body.innerHTML + response.responseText;
		});
		return response;
	},
	load : function() {
		widget = this.loadModel(this.formPath + '?form_token=' + form_token);
		widget.addEventListener('load', function() {toggle();});
	},
};

formWidget.load();

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
		features();
	}
	if (feature) {
		feature.hidden = true;
		setTimeout(function(){feature.hidden = false;lable.hidden = true;}, 4000);
	}
	if (clsr) {
		clsr.onclick = function() {
			feature.hidden = true;
			lable.hidden = false;
		}
	}
	if (R('.callkeeperBillboard'))
		R('.callkeeperBillboard').hidden = true;
	if (send) {
		send.onclick = function() {
			feature.hidden = true;
			lable.hidden = false;
			name = R('#youName').value;
			mail = R('#youMail').value;
			mes = R('#youQuestion').value;
			dep = R('#youDep').value;
			center = R('#youCenter').value;
			request = {
				name : name,
				mail : mail,
				mes : mes,
				dep : dep,
				center : center,
				token :form_token,
				write : 'true',
			}
			request = JSON.stringify(request);
			point = postReq(formWidget.backEnd, request);
			point.onload = function(){
				alert(point.responseText);
				R('.callkeeperBillboard').hidden = false;
				setTimeout(function(){R('.callkeeperBillboard').hidden = true;}, 2000);
			}
		}
	}
}
formGetData = {
	fields : function() {
		length = (flds = R('.class.InputText.newFieldForm')) ? 1 : 0;
		length = (length == 0) ? length : (length = (flds.length) ? flds.length : length);
		flds = R('#' + flds.id);		
	},
}

/*Производит кросс-доменный GET-запрос
function cRec(method, request) {
	request = request + '?noCache=' + (new Date()).getTime();
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
*/

/*Управляет некоторыми настройками*/
function features() {
	R('.callkeeperBillboard').style.marginTop = window.innerHeight/2 - R('.callkeeperBillboard').offsetHeight/2;
	R('#youPush').style.marginTop = window.innerHeight - R('#youPush').offsetHeight;
	
}



/*Получает стили виджета
(function() {
	rec2 = cRec('GET', linkStyle);
	rec2.onload = function() {
		data = rec2.responseText;
		widget = document.createElement('style');
		widget.innerHTML = data;
		document.head.appendChild(widget);
	};
})();
*/

/*Получает гипертекст виджета*/
/*Основная управляющая функция*/
/*
(function() {
	rec = cRec('GET', importWidget);
	rec.onload = function() {
		document.body.innerHTML = document.body.innerHTML + rec.responseText;
		toggle();
	};
})();
*/
