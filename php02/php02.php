<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"]; # list of movies


/*
*Prend un  tableau en entrée et renvoie la taille du tableau
*Ici la taille du tableau correspond au nombre de mots de notre dictionnaire
*/
function nbMots(array $dico) {
	return count($dico);
}

/*
*Renvoie le nombre de mots ayant la taille choisie
*Paramètre d'entré : 
*	$dico = un tableau contenant tous les mots du dictionnaire (un mot par élément)
*	$taille = la taille des mots voulue
*
*Sortie : un entier correspondant au nombre de mots de la taille voulue
*/
function nbMotsX(array $dico, int $taille) {
	$compteur = 0;
	foreach ($dico as $key => $mot) {
		if (is_string($mot)) {
			if(strlen($mot) == $taille) {
				$compteur++;
			}
		}
	}
	return $compteur;
}

/*
*Renvoie le nombre de mots possédant la lettre voulue
*Paramètre d'entrée :
*	$dico = un tableau contenant tous les mots du dictionnaire (un mot par élément)
*	$lettre = la lettre recherché
*	$casse = un booléen indiquant si oui ou non on prends en compte la casse (oui par défault)
*
*Sortie : un entier contenant le nombre de mot possédant la lettre recherché
*/
function nbMotsLettre(array $dico, string $lettre, bool $casse = true) {
	$compteur = 0;
	if ($casse) {
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'#', $mot)) {
					$compteur++;
				}
			}
		}
	} else {
		$lettre = strtolower($lettre);
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'#', strtolower($mot))) {
					$compteur++;
				}
			}
		}
	}
	return $compteur;
}

/*
*Renvoie le nombre de mots terminant par la lettre voulue
*Paramètre d'entrée :
*	$dico = un tableau contenant tous les mots du dictionnaire (un mot par élément)
*	$lettre = la lettre recherché
*	$casse = un booléen indiquant si oui ou non on prends en compte la casse (oui par défault)
*
*Sortie : un entier contenant le nombre de mot terminant par la lettre recherché
*/
function nbMotsLettreFin(array $dico, string $lettre, bool $casse = true) {
	$compteur = 0;
	if ($casse) {
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'$#', $mot)) {
					$compteur++;
				}
			}
		}
	} else {
		$lettre = strtolower($lettre);
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'$#', strtolower($mot))) {
					$compteur++;
				}
			}
		}
	}
	return $compteur;
}

/*
*Renvoie le nombre de mots possédant la lettre voulue
*Paramètre d'entrée :
*	$dico = un tableau contenant tous les mots du dictionnaire (un mot par élément)
*	$lettre = la lettre recherché
*	$taille = un entier correspondant à la taille voulue
*	$casse = un booléen indiquant si oui ou non on prends en compte la casse (oui par défault)
*
*Sortie : un entier contenant le nombre de mot de la taille voulue et possédant la lettre recherché
*/
function nbMotsLettreX(array $dico, string $lettre, int $taille, bool $casse = true) {
	$compteur = 0;
	if ($casse) {
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'#', $mot) && strlen($mot) == $taille) {
					$compteur++;
				}
			}
		}
	} else {
		$lettre = strtolower($lettre);
		foreach ($dico as $key => $mot) {
			if (is_string($mot)) {
				if(preg_match('#'.$lettre.'#', strtolower($mot)) && strlen($mot) == $taille) {
					$compteur++;
				}
			}
		}
	}
	return $compteur;
}

// -------------------------------------------------------------------------------------------------

echo "nombre total de mots : ".nbMots($dico)."\n";
echo "nombre de mots de 15 lettres : ".nbMotsX($dico, 15)."\n";
echo "nombre de mots possédant la lettre w : ".nbMotsLettre($dico, 'w')."\n";
echo "nombre de mots possédant la lettre w ou W : ".nbMotsLettre($dico, 'w', false)."\n";
echo "nombre de mots terminant par la lettre q : ".nbMotsLettreFin($dico, 'q')."\n";
echo "nombre de mots terminant par la lettre q ou Q : ".nbMotsLettreFin($dico, 'q', false)."\n";
echo "nombre de mots de 15 lettre et possédant la lettre w ou W : ".nbMotsLettreX($dico, 'w', 15, false)."\n\n";

// -------------------------------------------------------------------------------------------------

print_r($top[0]);


/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*	$top = le nombre des meilleurs films voulue
*
*Sortie : une chaine de caractère contenant le top des $top films les plus vue
*/
function topX(array $films, int $top) {
	$retour = "";
	for($i = 0; $i < $top; $i++) {
		$retour .= ($i+1).' : '.$films[$i]['im:name']['label']."\n";
	}
	return $retour;
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*	$titre = le titre du film recherché
*	$casse = un booléen indiquant si l'on doit prendre ou non en compte la casse pour $titre (oui par default)
*
*Sortie : un entier correspondant au rang du film recherché
*/
function rang(array $films, string $titre, bool $casse = true) {
	$i = 0;
	$fin = count($films);
	$continuer = true;
	if ($casse) {
		while ($i < $fin && $continuer) {
			if (isset($films[$i]['im:name']['label']) && is_string($films[$i]['im:name']['label']) && $films[$i]['im:name']['label'] == $titre) {
				$continuer = false;
			} else {
				$i++;
			}
		}
	} else {
		while ($i < $fin && $continuer) {
			if (isset($films[$i]['im:name']['label']) && is_string($films[$i]['im:name']['label']) && strtolower($films[$i]['im:name']['label']) == strtolower($titre)) {
				$continuer = false;
			} else {
				$i++;
			}
		}
	}
	if ($continuer) {
		return (-1);
	} else {
		return $i;
	}
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*	$titre = le titre du film recherché
*	$casse = un booléen indiquant si l'on doit prendre ou non en compte la casse pour $titre (oui par default)
*
*Sortie : une chaine de caractère contenant le nom du réalisateur du film recherché
*/
function nomRealisateur(array $films, string $titre, bool $casse = true) {
	$i = 0;
	$fin = count($films);
	$continuer = true;
	$match = [];
	if ($casse) {
		while ($i < $fin && $continuer) {
			if (isset($films[$i]['title']['label']) && is_string($films[$i]['title']['label']) && preg_match('#^'.$titre.' - (.*)$#', $films[$i]['title']['label'], $match)) {
				$continuer = false;
			} else {
				$i++;
			}
		}
	} else {
		while ($i < $fin && $continuer) {
			if (isset($films[$i]['title']['label']) && is_string($films[$i]['title']['label']) && preg_match('#^'.$titre.' - (.*)$#i', $films[$i]['title']['label'], $match)) {
				$continuer = false;
			} else {
				$i++;
			}
		}
	}
	if ($continuer) {
		return "";
	} else {
		return $match[1];
	}
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*	$date = la date limite de notre recherche
*
*Sortie : un entier correspondant au nombre de film sortie avant la date recherché
*/
function nbFilmsDate(array $films, int $date) {
	$compteur = 0;
	foreach ($films as $i => $film) {
		if (isset($films[$i]['im:releaseDate']['label']) && is_string($films[$i]['im:releaseDate']['label']) && preg_match('#^([0-9]{4})#', $films[$i]['im:releaseDate']['label'], $match)) {
			if ($match[1] < $date) {
				$compteur++;
			}
		}
	}
	return $compteur;
}

echo "Top10 des films les plus vue : "."\n".topX($top, 10)."\n";
echo "Rang du films \"Gravity\" : ".rang($top, "Gravity")."\n";
echo 'Le nom du réalisateur de "The LEGO Movie" est : '.nomRealisateur($top, "The LEGO Movie")."\n";
echo 'Il y a '.nbFilmsDate($top, 2000).' films sortie avant l\'an 2000'."\n";

?>