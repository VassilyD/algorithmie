valeur = ['As','2','3','4','5','6','7','8','9','10','Valet','Dame','Roi']
couleur = ['Coeur','Pique','Carreau','Trefle']
carte = ['']*len(valeur)*len(couleur)
for i in range(0,len(valeur)*len(couleur)):
	carte[i] = [''+valeur[i%len(valeur)]+' de '+couleur[i/len(valeur)]]
	print carte[i]

nbJoueur = 4
nbCartes = len(carte)
joueur = [[]*nbCartes]*nbJoueur
cartesRestantes = len(carte) - 1
for i in range(0, nbCartes/nbJoueur):
	for j in range(0, nbJoueur):
		print j, i, cartesRestantes
		joueur[j,i] = carte[cartesRestantes]
		cartesRestantes -= 1