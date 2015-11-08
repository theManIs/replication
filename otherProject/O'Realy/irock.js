function touchRock()
{
	if (userName) {
		alert("I like the attention, " + userName + ". Thank you.");
	} 
	else {
		userName = prompt("What is your name?", "Enter your name here.");
		alert("It is good to meet you, " + userName + ".");
		if (navigator.cookieEnabled)
			writeCookie("irock_username", userName, 365);
		else
			alert("Sorry. Cookies aren't supported in your browser, " +
			"I won't remember you later.");
	}
	document.getElementById("rockImg").src = "happy.jpg";
	setTimeout("document.getElementById('rockImg').src = 'smile.jpg';", 3000);
}
function resizeRock()
{
	document.getElementById("rockImg").style.height = 
		(document.body.clientHeight - 100) * 0.9;
}
function greetUser()
{	
	if (navigator.cookieEnabled)
		userName = readCookie("irock_username");
	if (userName) 
		alert("Hello " + userName + ", I missed you.");
	else 
		alert('Hello, I am your pet rock.');
}