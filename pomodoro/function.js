const MS_IN_SECONDE = 1000;
const MS_IN_MINUTE = 60 * MS_IN_SECONDE;
const MS_IN_HOURS = 60 * MS_IN_MINUTE;

// Q1 : Est-ce propre de déclarer et initialiser ainsi 2 variables (voir plus)?
var isLooping = isPaused = false;
var timer = 0;
var date = 0;
var play = {};
var stop = {};
var inputs = {};
var display = {};
var tWork = 20 * MS_IN_MINUTE;
var tBreak = 10 * MS_IN_MINUTE;
var tStop = 30 * MS_IN_MINUTE;
var time = tWork;
var inBreak = false;
var cycle = 0;

function styleTime(time = 0) {
	//time = Math.round(time / 1000);
	var hours = Math.floor(time / MS_IN_HOURS);
	time -= MS_IN_HOURS * hours;

	if(hours < 10 && hours > 0) hours = "0" + hours;
	else if(hours == 0) hours = "00";

	var mins = Math.floor(time / MS_IN_MINUTE);
	if(mins < 10 && mins > 0) mins = "0" + mins;
	else if(mins == 0) mins = "00";
	time -= MS_IN_MINUTE * mins;

	var seconde = Math.round(time / MS_IN_SECONDE);
	if(seconde < 10 && seconde > 0) seconde = "0" + seconde;
	else if(seconde == 0) seconde = "00";

	return "" + hours + " : " + mins + " : " + seconde;
}

function timing() {
	// Q2 : Faut il déclarer switchPhase(), qui n'est utile que dans timing(), ici ou bien en globale?
	function switchPhase(newTime = 0) {
		time = newTime;
		display.html(styleTime(time));
		inBreak = !inBreak;
	}
	var tmp = Date.now();
	time -= (tmp - date);
	date = tmp;
	if(time > 0) display.html(styleTime(time));
	else display.html(styleTime(0));

	if(time < 0) {
		if(inBreak) {
			switchPhase(tWork)
			if(cycle < 3) cycle++;
			else cycle = 0;
		}
		else if(cycle < 3) switchPhase(tBreak);
		else switchPhase(tStop);
	}
}
