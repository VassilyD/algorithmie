let Stylo = function(couleur) {
	this.couleur = couleur;
	this.taille = 25;
	this.proprio = 'Ange';
}

Stylo.prototype.afficher = function() {
	return 'Ce stylo de couleur ' + this.couleur + ' et de ' + this.taille + ' cm appartient à ' + this.proprio + '.';
}

let styloRouge = new Stylo('Rouge');
let styloVert = new Stylo('Vert');
let styloViolet = new Stylo('Violet');
document.getElementById('bla').innerHTML = styloRouge.afficher() + '<br>' + styloVert.afficher() + '<br>' + styloViolet.afficher();