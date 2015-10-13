$.fn.duplicate = function(n) {
	var result = $();
	while(n-- > 0) result = result.add(this.clone());
	return result;
}

function writeCookie(name, value, days)
{
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name)
{
	var searchName = name + "=";
	var cookies = document.cookie.split(';');
	for (var i = 0; i < cookies.length; i++) {
		var c = cookies[i];
		while (c.charAt(0) == '') c = c.substring(1, c.length);
		if (c.indexOf(searchName) == 0) 
			return c.substring(searchName.length, c.length);
		return null;
	}
}

function eraseCookie(name)
{
	writeCookie(name,"",-1);
}


//Сортировка в два уровня
//TO DO
function unknow() {
	k = data.length; f = 0; sort = [];
	while(f < k) {
		if (data[f][0] != '') {
			i = 0; p = 1; foo = -1; step = 0; foo2 = -1;
			while (data[i]) {
				if (+data[i][p] > +foo) {
					foo = data[i][p];
					step = +i;
					foo2 = data[i][2];
				}
				if (+data[i][p] === +foo) {
					if (+data[i][2] > +foo2) {
						step = +i;
						foo2 = data[i][2];
					}
				}
				i++;
			}
			sort[f] = $(data[step]);
			data[step][p] = '-1';
		}
			f++;
	}
}

//Декодирование строки запроса и разбиение её на переменные
decodeURIComponent(location.search.substr(1)).split('&')[1];