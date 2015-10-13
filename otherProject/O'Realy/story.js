
function changeScene(option)
{
	var message = "";
	switch (curScene) {
		case 0:
			curScene = 1;
			message = "You journey begins at a fork in the road.";
		break;
		case 1;
			if (option == 1) {
				curScene = 2;
				message = "You have arrived at a cure little house in the woods."
			}
			else {
				curScene = 3;
				message = "You are standing on the bridge overlocking a peaceful stream."
			}
		break;
		case 3:
			if (option == 1) {
				curScene = 6;
				message = "Sorry, a troll lives on the other side of the brige and you " +
				"just became his lunch.";
			}
			else {
				curScene = 7;
				message = "Your stare is interrupted by arrival of a huge troll.";
			}
		break;
		case 4:
			if (option == 1) {
				curScene = 8;
			}
			else {
				curScene = 5;
				message = "Sorry, you became part of the witch's stew.";
			}
		break;
		case 5:
			curScene = 0;
		break;
		case 6:
			curScene = 0;
		break;
	}
	document.getElementById("sceneimg").src = "scene" + curScene + ".png";
	if (message != "") alert(message);
}