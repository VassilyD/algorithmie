# creation du paquet de carte
valeur = ['As','2','3','4','5','6','7','8','9','10','Valet','Dame','Roi']
couleur = ['Coeur','Pique','Carreau','Trefle']
carte = ['']*len(valeur)*len(couleur)
for i in range(0,len(valeur)*len(couleur)):
	carte[i] = [''+valeur[i%len(valeur)]+' de '+couleur[i/len(valeur)]]
	print carte[i]


# distribution des cartes
nbJoueur = 4
nbCartes = len(carte)
joueur = [[0] * nbCartes for _ in range(nbJoueur)]
cartesRestantes = len(carte) - 1
for i in range(0, nbCartes/nbJoueur):
	for j in range(0, nbJoueur):
		joueur[j][i] = carte[cartesRestantes]
		cartesRestantes -= 1