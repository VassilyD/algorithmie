
<?php

/*
Prends un tableau en entrée et retourne une chaine de caractère du style ["élément1", "élement2"]
*/
function tabToString(Array $tab) {
	// Déclaration de la valeur de retour et ajout du crochet d'ouverture du tableau
	$string = "[";

	// On ajoute chaque élément du tableau les uns à la suite des autres dans la chaine $string
	foreach ($tab as $key => $value) {
		// On encadre chaque élément avec des guillemet double
		// si l'élément n'est pas le dernier du tableau on rajoute une virgule et un espace
		if ($key != (count($tab) - 1)) {
			$string .= '"'.$value.'", ';
		}
		else {
			// pour le dernier éléments  on ferme le tableau avec unj ] en lieu et place de la , et son espace
			$string .= '"'.$value.'"]';
		}
	}
	// retour de la chaine complète
	return $string;
}

/*
 Prends deux tableau en entrée et associe chaque éléments du deuxime à chaque éléments du premier
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
	    foreach ($masterTab as $keyMaitre => $elementMaitre) {
	    	// On vérifie que l'élément ne soit pas vide
	    	if ($elementMaitre != NULL && $elementMaitre != "") {
	    		// pour chaque élément du tableau enfant on créer un élément qui est la fusion maitre-enfant
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
    	// On retourne un message d'erreur si l'un des tableau est vide
    	return "ERREUR : veuillez ne pas entrer de tableau vide\n";
    }
}

/*
Prends une chaine de caractère en entrée et créé un tableau avec un élément par mots de la chaine entrée
*/
function exercice2(string $string) {
	// la fonctions explode fait exactement ce que l'on veut ^^
	if ($string != "" && $string != NULL) {
		return explode(" ", $string);
	} else {
		return "ERREUR : Veuillez rentrer une phrase non vide!\n";
	}
}

/*
Prends en entrée un tableau en sort en sortie un tableau contenant les deux derniers éléments du tableau d'entrée
*/
function exercice3(Array $tab) {
	// On vérifie que le tableau ne sois pas vide et contienne au moins 2 élément
	if (!empty($tab) && $tab != NULL && count($tab) > 1) {
		return array($tab[count($tab)-2], $tab[count($tab)-1]);
	} else {
		return "ERREUR : tableau trop petit, voir inexistant\n";
	}
}

/*
Prends en entrée un tableau et retourne ce même tableau amputé de son éléments centrale
Un éléments centrale est un éléments qui a autant d'éléments d'indice inférieur que d'élément d'indice supérieur
de ce fait seule les tableau avec un nombre impair d'éléments seront affecter, de plus un tableau d'un seul éléments ne rentre pas
dans cette catégorie (en meêm temps un tableau d'un seul élément ce n'est plus un tableau ^^)
*/
function exercice4(Array $tab) {
	// Calcule la taille du tableau
	if (!empty($tab) && $tab != NULL) {
		$taille = count($tab);

		// Si la taille du tableau est impair et qu'il y a au moins 3 éléments
		if ($taille%2 == 1 && $taille >= 3) {
			// on décale vers la gauche tous les élements d'indice supérieur à la moitié de la taille du tableau
			// ce qui écrase la valeur du milieu
			for ($i = $taille/2 + 1; $i < $taille; $i++) {
				$tab[$i-1] = $tab[$i];
			}
			// On supprime le dernier élément du tableau devenu obsolète 
			unset($tab[$taille-1]);
		}
		return $tab;
	} else {
		return "ERREUR : y a une erreur mais tu sais c'est quoi puisque c'est fais exprès\n";
	}
}

/*
Prends en entrée un tableau de chaine de caractère
Retourne la chaine la plus longue du tableau
*/
function exercice5(Array $tab) {
	if (!empty($tab) && $tab != NULL) {
		// Déclaration de l'indice de la chaine la plus longue
		$keyPlusLongueChaine = 0;
		// déclaration de la taille de la plus longue chaine de caractère
		$taillePlusLongueChaine = 0;
		// on teste chaque éléments un par un
		foreach ($tab as $key => $value) {
			// si la taille de l'élément en cours est plus grand que la plus longue chaine
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
		return "ERREUR : c'est relou ces erreur\n";
	}
}

function exercice6(Array $tab) {
	if ($tab != NULL && !empty($tab)) {
		foreach ($tab as $key => $value) {
			if ($value != "" && $value != NULL) {
				if (preg_match('#^0[0-9]{9}$#', $value)) {
					echo "test\n";
					$tab[$key] = preg_replace('#^0#', '+33', $value);
				}
			}
		}
		return $tab;
	} else {
		return "ERREUR : t'en as pas marre de chercher la petite bête?\n";
	}
}

/*
Prends en entrée un tableau de chaine de caractère un un caractère
Retourne le nombre de fois que le caractère apparait dans l'ensemble du tableau
*/
function exercice7(Array $tab, string $lettre) {
	if (!empty($tab) && $tab != NULL) {
		if (strlen($lettre) == 1) {
			// Déclaration du nombre d'occurence
			$nbOccur = 0;

			// On parcours l'ensemble du tableau
			foreach ($tab as $value) {
				// Pour chaque éléments on vérifie lettre par lettre si l'on trouve une occurence de notre lettre
				for ($i = 0; $i < strlen($value); $i++) {
					// si la lettre correspond on incrémente nbOccur de 1
					if ($value[$i] == $lettre) { $nbOccur++; }
				}
			}
			// On retourne le nombre d'occurence
			return $nbOccur;
		} else {
			return "ERREUR : Veuillez ne donnez qu'une seule lettre en deuxième paramètre\n";
		}
	} else {
		return "ERREUR : Vous êtes priez de ne pas envoyer de tableau vide svp\n";
	}
}

?>