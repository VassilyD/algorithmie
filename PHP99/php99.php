
<?php

/*
Prends un tableau en entrée et retourne une chaine de caractère du style ["élément1", "élement2"]
*/
function tabToString(Array $tab) {
	// Déclaration de la valeur de retour et ajout du crochet d'ouverture du tableau
	$string = "[";

	// On va venir concatenner chaque éléments du tableau les uns à la suite des autres dans $string, tout en pensant à rajouter ce qu'il faut pour un affichage correct
	// On parcour le tableau $tab élément par élément
	// l'indice de l'élément en cours sera stocker dans $key
	// La valeur de l'élément en cours sera stocker dans $value
	foreach ($tab as $key => $value) {
		// On encadre chaque élément avec des guillemet double
		$string .= '"'.$value.'"';
		// si l'élément n'est pas le dernier du tableau on rajoute une virgule et un espace
		if ($key != (count($tab) - 1)) {
			$string .= ', ';
		}
		else {
			// pour le dernier éléments  on ferme le tableau avec un ] à la place de la virgule et son espace
			$string .= ']';
		}
	}
	// retour de la chaine complète
	return $string;
}

/*
 Prends deux tableau en entrée et associe chaque éléments du deuxième à chaque éléments du premier
 exemple : exercice1(["pierre", "feuille"], ["rouge", "bleu"]) donne ["pierre rouge", "pierre bleu", feuille rouge", "feuille bleu"]
*/
function exercice1(Array $masterTab, Array $suffixeTab) {
	// déclaration du tableau de sortie
	$tabFusion = [];
	// On vérifie que les tableau ne sont pas vide
	if (!empty($masterTab) && $masterTab != NULL && !empty($suffixeTab) && $suffixeTab != NULL) {
		// On enlève les doublons
		$masterTab = array_unique($masterTab);
		$suffixeTab = array_unique($suffixeTab);
		// pour chaque élément du tableau maitre
		// On parcour le tableau $masterTab élément par élément
		// l'indice de l'élément en cours sera stocker dans $keyMaitre
		// La valeur de l'élément en cours sera stocker dans $elementMaitre
	    foreach ($masterTab as $keyMaitre => $elementMaitre) {
	    	// On vérifie que l'élément ne soit pas vide
	    	if ($elementMaitre != NULL && $elementMaitre != "") {
	    		// pour chaque élément du tableau enfant on créer un élément qui est la fusion maitre-enfant
				// On parcour le tableau $suffixeTab élément par élément
				// l'indice de l'élément en cours sera stocker dans $keyEnfant
				// La valeur de l'élément en cours sera stocker dans $elementEnfant
		    	foreach ($suffixeTab as $keyEnfant => $elementEnfant) {
		    		// On vérifie que l'élément ne sois pas vide
		    		if ($elementEnfant != NULL && $elementEnfant != "") {
			    		// on ajoute la fusion au tableau de retour
			    		$tabFusion[] = $elementMaitre." ".$elementEnfant;
			    	}
		    	}
		    }
	    }
	    // On retourne le tableau fusionné
    	return $tabFusion;
    } else {
    	// On retourne null si l'un des tableau est vide
    	return null;
    }
}

/*
Prends une chaine de caractère en entrée et créé un tableau avec un élément par mots de la chaine entrée
*/
function exercice2(string $string) {
	// On vérifie que l'on ne nous ai pas envoyé une chaine vide
	if ($string != "" && $string != NULL) {
		// la fonctions explode fait exactement ce que l'on veut ^^
		// le premier paramètre est le délimiteur, le deuxième est la chaine à transformer
		$retour = explode(" ", $string);

		// Une autre façon de faire avec preg_split qui permet de prendre en compte différent délimiteur
		// scinde la phrase grâce aux virgules, slash, deux points, point virgule et espacements
		// ce qui inclus les " ", \r, \t, \n et \f (c'est le \s qui gère ça)
		$retour = preg_split("#[\s,/:;]+#", $string);
		return $retour;
	} else {
    	// On retourne null si la chaine d'entrée est vide ou inexistante
    	return null;
	}
}

/*
Prends en entrée un tableau en sort en sortie un tableau contenant les deux derniers éléments du tableau d'entrée
*/
function exercice3(Array $tab) {
	// On vérifie que le tableau ne sois pas vide et contienne au moins 2 élément
	if (!empty($tab) && $tab != NULL && count($tab) > 1) {
		// On renvoie un tableau (array()) contenant les deux dernier éléments du tableau d'entrée
		// On utilise count($nom-du-tableau)-i pour accèder au i-ème dernier élément d'un tableau
		return array($tab[count($tab)-2], $tab[count($tab)-1]);
	} else {
    	// On retourne null si le tableau d'entrée est vide ou inexistant
    	return null;
	}
}

/*
Prends en entrée un tableau et retourne ce même tableau amputé de son éléments centrale
Un éléments centrale est un éléments qui a autant d'éléments d'indice inférieur que d'élément d'indice supérieur
de ce fait seule les tableau avec un nombre impair d'éléments seront affecter, de plus un tableau d'un seul éléments ne rentre pas
dans cette catégorie (en meêm temps un tableau d'un seul élément ce n'est plus un tableau ^^)
*/
function exercice4(Array $tab) {
	// On vérifie que le tableau ne soit pas vide
	if (!empty($tab) && $tab != NULL) {
		// Calcule la taille du tableau
		$taille = count($tab);

		// Si la taille du tableau est impair et qu'il y a au moins 3 éléments
		// $entier % 2 donne le reste de la division par 2 de $entier, soit $entier est pair et il restera 0, soit il est impair et il restera 1
		if ($taille%2 == 1 && $taille >= 3) {
			// on décale vers la gauche tous les élements d'indice supérieur à la moitié de la taille du tableau
			// ce qui écrase la valeur du milieu
			for ($i = $taille/2 + 1; $i < $taille; $i++) {
				$tab[$i-1] = $tab[$i];
			}
			// On supprime le dernier élément du tableau devenu obsolète 
			unset($tab[$taille-1]);
		}
		// On renvoie le tableau amputé de son élément centrale
		return $tab;
	} else {
    	// On retourne null si le tableau d'entrée est vide ou inexistant
    	return null;
	}
}

/*
Prends en entrée un tableau de chaine de caractère
Retourne la chaine la plus longue du tableau
*/
function exercice5(Array $tab) {
	// on vérifie que le tableau ne soit pas vide
	if (!empty($tab) && $tab != NULL) {
		// Déclaration de l'indice de la chaine la plus longue
		$keyPlusLongueChaine = 0;
		// déclaration de la taille de la plus longue chaine de caractère
		$taillePlusLongueChaine = 0;
		// On parcour le tableau $tab élément par élément
		// l'indice de l'élément en cours sera stocker dans $key
		// La valeur de l'élément en cours sera stocker dans $value
		foreach ($tab as $key => $value) {
			// Si l'élément en cours n'est pas null et que sa taille est supérieur à celle de la plus longue chaine
			if ($value != NULL && strlen($value) > $taillePlusLongueChaine) {
				// On mets à jour la taille de l'élément le plus grand
				$taillePlusLongueChaine = strlen($value);
				// On mets à jour l'indice de l'élément le plus grand
				$keyPlusLongueChaine = $key;
			}
		}
		// On retourne l'élément le plus grand
		return $tab[$keyPlusLongueChaine];
	} else {
    	// On retourne null si le tableau d'entrée est vide ou inexistant
    	return null;
	}
}

/*
Prends en un tableau de chaine de caractère sensé contenir une liste de numéro de téléphone
Renvoie cette même liste mais avec l'indice nationale (ici le +33) rajouter à la place du premier 0
*/
function exercice6(Array $tab) {
	// On vérifie que le tableau n'est pas vide
	if ($tab != NULL && !empty($tab)) {
		// On parcour les éléments du tableau un par un
		foreach ($tab as $key => $value) {
			// Si l'élément n'est pas vide
			if ($value != "" && $value != NULL) {
				// Si l'éléments correspond au format d'un numméro de téléphone (à savoir un 0 suivie de 9 chiffre et rien d'autre)
				// notre regex commence par ^ pour indiquer que la chaine doit commencer par notre regex
				// et elle se termine par un $, ce qui signifie que la chaine doit se terminer par notre regex
				// du coup avec la combinaisont de ^ et $, la chaine doit correspondre exactement à notre regex
				if (preg_match('#^0[0-9]{9}$#', $value)) {
					// On remplace le premier 0 (on retrouve l'emploi de ^) par +33
					$tab[$key] = preg_replace('#^0#', '+33', $value);
				}
			}
		}
		// On renvoie le tableau formaté comme il se doit
		return $tab;
	} else {
    	// On retourne null si le tableau d'entrée est vide ou inexistant
    	return null;
	}
}

/*
Prends en entrée un tableau de chaine de caractère un un caractère
Un troisième paramètre, un booléen, permet de dire si oui ou non la recherche est sensible à la casse (oui par défault)
Retourne le nombre de fois que le caractère apparait dans l'ensemble du tableau
*/
function exercice7(Array $tab, string $lettre, bool $casse = true) {
	// OOn verifie que le tableau d'entrée n'est pas vide
	if (!empty($tab) && $tab != NULL) {
		// On vérifie que le deuxième paramèetre est bien un seul caractère
		if (strlen($lettre) == 1) {
			// Déclaration du nombre d'occurence
			$nbOccur = 0;

			// Si l'on est sensible à la casse
			if ($casse) {
				// On parcour le tableau $tab élément par élément
				// l'indice de l'élément en cours ne sera pas stocker, il ne sera donc pas (directement) accessible
				// La valeur de l'élément en cours sera stocker dans $value
				foreach ($tab as $value) {
					// Pour chaque éléments on vérifie lettre par lettre si l'on trouve une occurence de notre lettre
					for ($i = 0; $i < strlen($value); $i++) {
						// si la lettre correspond on incrémente nbOccur de 1
						// Remarquez le fait qu'il n'y ai pas d'accolade pour ce if
						// c'est par ce que il n'y a qu'une seule instruction associer au if (le nbOccur++)
						// Par contre ne pas oublier le point-virgule à la fin de la ligne
						if ($value[$i] == $lettre) $nbOccur++;
					}
				}
			} else {
				// On met notre caractère en minuscule
				// En faisant de même avec chaque mot on rendra notre fonction insensible à la casse
				$lettre = strtolower($lettre);
				// On parcours l'ensemble du tableau
				foreach ($tab as $value) {
					// On met notre mot en minuscule
					$value = strtolower($value);
					// Pour chaque éléments on vérifie lettre par lettre si l'on trouve une occurence de notre lettre (sans se soucier de la casse)
					for ($i = 0; $i < strlen($value); $i++) {
						// si la lettre correspond on incrémente nbOccur de 1
						// Remarquez que l'on pmeut quand même mettre des accolade pour un if avec une seule action
						// on peut même se payer le luxe de tout garder sur la même ligne
						if ($value[$i] == $lettre) { $nbOccur++; }
					}
				}
			}
			// On retourne le nombre d'occurence
			return $nbOccur;
		} else {
	    	// On retourne null si le caractère d'entrée n'en est pas un
	    	return null;
		}
	} else {
    	// On retourne null si le tableau d'entrée est vide ou inexistant
    	return null;
	}
}

?>