/*var count = prompt("Enter a number greater than 0.", "10");
if (count > 0) {
	var x = count;
	while (x > 0) {
		alert("Starting in..." + x);
		x--;
	}
	alert("Roll film!");
} else
	alert("The number wasn't greater than 0. No movie for you!");
var seats = [false, true, false, true, true, true, false, true, false];
for (var i = 0; i < seats.length; i++) {
	if (seats[i])
		alert("Seat " + i + " is avalible.");
	else
		alert("Seat " + i + " is not avalible.");
}*/
var seats = [
	[false, true, false, true, true, true, false, true, false],
	[false, true, false, false, true, false, true, true, true],
	[true, true, true, true, true, true, false, true, false],
	[true, true, true, false, true, false, false, true, false]
];
function setSeat(seatNum, status, description)
{
	document.getElementById("seat" + seatNum).src = "seat_" + status + ".png";
	document.getElementById("seat" + seatNum).alt = "description";
	document.getElementById("seat" + seatNum).height = "75";
}
function initSeats()
{
	for (var i = 0; i < seats.length; i++) {
		for (var j = 0; j < seats[i].length; j++) {
			if (seats[i][j]) {
				setSeat(i * seats[i].length + j, "avail", "Avalible seat");
			} else {
				setSeat(i * seats[i].length + j, "unavail", "Unavalible");
			}
		}
	}
}
var selSeat = -1;

function getSeatStatus(seatNum)
{
	if (selSeat != -1 &&
		(seatNum == selSeat || seatNum == (selSeat + 1) || seatNum == (selSeat + 2)))
		return "yours";
	else if (seats[Math.floor(seatNum/seats[0].length)][seatNum % seats[0].length])
		return "avalible";
	else
		return "unavalible";
}

function showSeatStatus(seatNum)
{
	alert("This seat is " + getSeatStatus(seatNum) + ".");
}

function findSeats()
{
	if (selSeat >= 0) {
		selSeat = -1;
		initSeats();
	}
	var i = 0, finished = false;
	while ((i < seats.length) && !finished) {
		for (var j = 0; j < seats[i].length; j++) {
			if (seats[i][j] && seats[i][j + 1] && seats[i][j + 2]) {
				selSeat = i * seats[i].length + j;
				setSeat(i * seats[i].length + j, "select", "Your seat");
				setSeat(i * seats[i].length + j + 1, "select", "Your seat");
				setSeat(i * seats[i].length + j + 2, "select", "Your seat");
				
				var accept = confirm("Seats " + (j + 1) + " through " + (j + 3) +
					" in row " + (i + 1) + " are avalible. Accept?");
				if (!accept) {
					selSeat = -1;
					setSeat(i * seats[i].length + j, "avail", "Avalible seat");
					setSeat(i * seats[i].length + j + 1, "avail", "Avalible seat");
					setSeat(i * seats[i].length + j + 2, "avail", "Avalible seat");
				} else {
					finished = true;
					break;
				}
			}
		}
		i++;
	}
}
window.onload = function(evt) {
	document.getElementById("findseats").onclick = findSeats;
	//for (var $i = 0; $i < 36; $i++) {
		$i = 3;
		document.getElementById("seat" + $i).onclick = function(evt) {showSeatStatus($i);};
	//}
	initSeats();
}