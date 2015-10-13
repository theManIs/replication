$.ajax({
	async: true,
	cache: true,
	type: "POST",
	url: "serverscript.php",
	//data: "data="+"content",
	data: $("form").serialize(),
	dataType: "html",
	ifModified: false,
	timeout: 30000,
	beforeSend: function(XMLHttpRequest){},
	success: function(data){},
	error: function(XMLHttpRequest, textStatus, errorThrown){},
	dataFilter: function(data, type) {}
});

$.ajaxSetup({
	url: "ajax.php",
	global: true,
	type: "GET"
});

$.get(
	"serverscript.php", 
	$("form").serialize(),
	function(data){},
	"html"
);

$.post(
	"serverscript.php",
	"data=content",
	//{data: "content"},
	function(data, textStatus){},
	"html"
);

$.('#content').load(
	'serverscript.php',
	{'a' : 'sss'}
);

//EVENTS//ajaxError, ajaxSuccess, ajaxComplete, ajaxSend, ajaxStart, ajaxStop

foo = setTimeout(function(){}, 2000); clearTimeout(foo);
foo = setInterval(function(){}, 2000); clearInterval(foo);

function ajaxWithoutJQuery(input) {
	var request = new XMLHttpRequest();
	request.open('GET', 'ajax.php?input=' + input);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status == 200)
			function(request.responseText){};
	}
};

	//JQuery core {
jQuery === $
jQuery(expresion, context);
jQuery(html, ownerDocument);
jQuery(elemens);
Query(callback); === $(document).ready();
each(callback);
size();
length;
selector;
context;
eq(position);
get();
get(index);
index(object);
data(name);
data(name, value);
removeData(name);
queue(name);
queue(name, callback);
queue(name, stack);
dequeue(name);
jQuery.fn.extend(object);
jQuery.extend(object);
jQuery.noConflict();
jQuery.noConflict(extreme);
	//jQuery core }