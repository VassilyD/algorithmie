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
			//tableL.push(false);
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
			var voisin = 0;
			for (var m = i-1; m <= i+1; m++) {
				var y;
				if(m == -1) y = table.length - 1;
				else if(m == table.length) y = 0;
				else y = m;
				for (var n = j-1; n <= j+1; n++) {
					var x;
					if(n == -1) x = table[i].length - 1;
					else if(n == table[i].length) x = 0;
					else x = n;
					if(!(m == i && n == j) && table[y][x]) voisin++;
				}
			}
			/*for (var m = Math.max(0, i-1); m <= Math.min(i+1, table.length-1); m++) {
				for (var n = Math.max(0, j-1); n <= Math.min(j+1, table[i].length-1); n++) {
					if(!(m == i && n == j) && table[m][n]) voisin++;
				}
			}*/
			tmpt[i][j] = (voisin == 3 || (table[i][j] && voisin == 2));
			if(tmpt[i][j]) document.getElementById(i * table[0].length + j).className = 'alive';
			else document.getElementById(i * table[0].length + j).className = 'dead';
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


function reverseTable() {
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
			var voisin = 0;
			for (var m = i-1; m <= i+1; m++) {
				var y;
				if(m == -1) y = table.length - 1;
				else if(m == table.length) y = 0;
				else y = m;
				for (var n = j-1; n <= j+1; n++) {
					var x;
					if(n == -1) x = table[i].length - 1;
					else if(n == table[i].length) x = 0;
					else x = n;
					if(!(m == i && n == j) && table[y][x]) voisin++;
				}
			}
			/*for (var m = Math.max(0, i-1); m <= Math.min(i+1, table.length-1); m++) {
				for (var n = Math.max(0, j-1); n <= Math.min(j+1, table[i].length-1); n++) {
					if(!(m == i && n == j) && table[m][n]) voisin++;
				}
			}*/
			tmpt[i][j] = (voisin == 3 || (table[i][j] && voisin == 2));
			document.getElementById(i * table[0].length + j).className = (tmpt[i][j])?'alive':'dead';
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


genTable(50,50);
var isAlive = 0;
document.getElementById("launcher").onclick = function(){
	if(isAlive != 0) {
		clearInterval(isAlive);
		isAlive = 0;
	}
	else isAlive = setInterval(actuTable, 100);
}
document.getElementById("nuke").onclick = function(){
	for (var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			table[i][j] = false;
			document.getElementById(i * table[0].length + j).className = 'dead';
		}
	}
}
document.getElementById("fill").onclick = function(){
	for (var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			table[i][j] = true;
			document.getElementById(i * table[0].length + j).className = 'alive';
		}
	}
}
document.getElementById("respawn").onclick = function(){
	for (var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			table[i][j] = (Math.round(Math.random()) == 0);
			document.getElementById(i * table[0].length + j).className = (table[i][j])?'alive':'dead';
		}
	}
}
document.getElementById("plus").onclick = function(){
	for (var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			var elem = document.getElementById(i * table[0].length + j);
			var tmp = elem.offsetWidth + 1
			elem.style.width = tmp + 'px';
			var tmp = elem.offsetHeight + 1
			elem.style.height = tmp + 'px';
		}
	}
}
document.getElementById("moins").onclick = function(){
	for (var i = 0; i < table.length; i++) {
		for (var j = 0; j < table[i].length; j++) {
			var elem = document.getElementById(i * table[0].length + j);
			elem.style.width = (elem.offsetWidth - 1) + 'px';
			elem.style.height = (elem.offsetHeight - 1) + 'px';
		}
	}
}
document.getElementById("onePass").onclick = actuTable;