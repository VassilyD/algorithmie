var table = [];
function changerStatu(elem) {
	elem.className = (elem.className == 'alive')?'dead':'alive';
	var i = Math.floor(elem.id / table[0].length);
	var j = elem.id % table[0].length;
	table[i][j] = (table[i][j])?false:true;
}

function genTable(x = 10, y = 10) {
	for (var i = 0; i < x; i++) {
		var ligne = document.createElement("tr");
		document.body.appendChild(ligne);
		var tableL = [];
		for (var j = 0; j < y; j++) {
			tableL.push(Math.round(Math.random()) == 0);
			var elem = document.createElement("td");
			elem.id = i * y + j;
			elem.className = (tableL[j])?'alive':'dead';
			elem.onclick = function(){
				changerStatu(this);
			}
			ligne.appendChild(elem);
		}
		table.push(tableL);
	}
}

function actuTable() {
	var tmpt = [];
	for (var i = 0; i < table.length; i++) {
		var fuck = [];
		for (var j = 0; j < table[i].length; j++) {
			fuck.push(table[i][j]);
		}
		tmpt.push(fuck);
	}
	for(var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			//document.getElementById(i * table[0].length + j).style.opacity = 0;
			var voisin = 0;
			for (var m = Math.max(0, i-1); m <= Math.min(i+1, table.length-1); m++) {
				for (var n = Math.max(0, j-1); n <= Math.min(j+1, table[i].length-1); n++) {
					if(!(m == i && n == j) && table[m][n]) voisin++;
				}
			}
			tmpt[i][j] = (voisin == 3 || (table[i][j] && voisin == 2));
			if(tmpt[i][j]) document.getElementById(i * table[0].length + j).className = 'alive';
			else document.getElementById(i * table[0].length + j).className = 'dead';
			//document.getElementById(i * table[0].length + j).style.opacity = 1;
			// 
		}
	}
	table = [];
	for (var i = 0; i < tmpt.length; i++) {
		var fuck = [];
		for (var j = 0; j < tmpt[i].length; j++) {
			fuck.push(tmpt[i][j]);
		}
		table.push(fuck);
	}
}
genTable(50,70);
var isAlive = 0;
document.getElementById("launcher").onclick = function(){
	if(isAlive != 0) {
		clearInterval(isAlive);
		isAlive = 0;
	}
	else isAlive = setInterval(actuTable, 250);
}