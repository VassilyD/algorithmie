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
		if (isset($film['im:releaseDate']['label']) && is_string($film['im:releaseDate']['label']) && preg_match('#^([0-9]{4})#', $film['im:releaseDate']['label'], $match)) {
			if ($match[1] < $date) {
				$compteur++;
			}
		}
	}
	return $compteur;
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*
*Sortie : Une chaine de caractère correspondant au titre du film le plus récent et sa date de sortie
*/
function lastFilm(array $films) {
	$rangLast = 0;
	$date = [0, 0, 0];
	$mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	foreach ($films as $rang => $film) {
		// On vérifie d'abords que l'élément existe
		// Ensuite on vérifie qyue ce soit une chaine de caractère
		// Et enfin on vérifie que le format corresponde
		//		d'abord l'année avec (19[5-9][0-9]|20[01][0-9]) qui correspond à n'importe quel entier entre 1950 et 2019
		//		puis le mois avec (0[1-9]|1[0-2]) qui correspond à n'importe quel entier entre 01 et 12
		//		et enfin le jour avec ([0-2][0-9]|3[01]) qui correspond à n'importe quel entier entre 01 et 31
		if (isset($film['im:releaseDate']['label']) && is_string($film['im:releaseDate']['label']) && preg_match('#^(19[5-9][0-9]|20[01][0-9])-(0[1-9]|1[0-2])-([0-2][0-9]|3[01])T#', $film['im:releaseDate']['label'], $match)) {
			// On test d'abord si l'année de sortie est supérieur au plus récent
			// Sinon si elle est égale
			//		Soit le mois est supérieur
			//		Soit le mois est égale et le jour est supérieur
			if (($match[1] > $date[0]) || 
				(($match[1] == $date[0]) && 
					(($match[2] > $date[1]) || 
					(($match[2] == $date[1]) && 
						($match[3] > $date[2]))))) {
				$rangLast = $rang;
				foreach ($date as $key => &$value) {
					// On mets à jour la date du plus ancien film
					// On peut affecter les valeur directement à $value car il est passer par référencement (grace au & coller devant la variable)
					// Cela signifie qu'au lieu de copier les différent éléments de $date dans $value, on fait pointer $value vers la zone mémoire des éléments de $date
					// sans le & $value pointe vers une zone mémoire qui lui est propre, avec le & $value pointe vers la zone mémoire de l'éléments parcourue
					$value = $match[$key+1];
					// Ce qui équivaut à : $date[$key] = $match[$key+1];
				}
				// voila ce que fais la boucle foreach précédente
				//$date[0] = $match[1];
				//$date[1] = $match[2];
				//$date[2] = $match[3];
			}
			/* ceci est l'équivalent du if précédent mais sans l'utilisation de OR et de AND
			if ($match[1] > $date[0]) {
				$rangLast = $rang;
				foreach ($date as $key => &$value) {
					$value = intval($match[$key+1]);
				}
			}
			else if ($match[1] == $date[0]) {
				if ($match[2] > $date[1]) {
					$rangLast = $rang;
					foreach ($date as $key => &$value) {
						$value = intval($match[$key+1]);
					}
				}
				else if ($match[2] == $date[1]) {
					if ($match[3] > $date[2]) {
						$rangLast = $rang;
						foreach ($date as $key => &$value) {
							$value = intval($match[$key+1]);
						}
					}
				}

			}
			*/
		}
	}
	return ''.$films[$rangLast]['im:name']['label'].', sortie le '.$date[2].' '.$mois[$date[1] - 1].' '.$date[0];
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*
*Sortie : Une chaine de caractère correspondant au titre du film le plus ancien et sa date de sortie
*/
function oldestFilm(array $films) {
	$rangOldest = 0;
	$date = [9999, 99, 99];
	$mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
	foreach ($films as $rang => $film) {
		// On vérifie d'abords que l'élément existe
		// Ensuite on vérifie qyue ce soit une chaine de caractère
		// Et enfin on vérifie que le format corresponde
		//		d'abord l'année avec (19[5-9][0-9]|20[01][0-9]) qui correspond à n'importe quel entier entre 1950 et 2019
		//		puis le mois avec (0[1-9]|1[0-2]) qui correspond à n'importe quel entier entre 01 et 12
		//		et enfin le jour avec ([0-2][0-9]|3[01]) qui correspond à n'importe quel entier entre 01 et 31
		if (isset($film['im:releaseDate']['label']) && is_string($film['im:releaseDate']['label']) && preg_match('#^(19[5-9][0-9]|20[01][0-9])-(0[1-9]|1[0-2])-([0-2][0-9]|3[01])T#', $film['im:releaseDate']['label'], $match)) {
			// On test d'abord si l'année de sortie est inférieur au plus ancien
			// Sinon si elle est égale
			//		Soit le mois est inférieur
			//		Soit le mois est égale et le jour est inférieur
			if (($match[1] < $date[0]) || 
				(($match[1] == $date[0]) && 
					(($match[2] < $date[1]) || 
					(($match[2] == $date[1]) && 
						($match[3] < $date[2]))))) {
				$rangOldest = $rang;
				foreach ($date as $key => &$value) {
					// On mets à jour la date du plus ancien film
					// On peut affecter les valeur directement à $value car il est passer par référencement (grace au & coller devant la variable)
					// Cela signifie qu'au lieu de copier les différent éléments de $date dans $value, on fait pointer $value vers la zone mémoire des éléments de $date
					// sans le & $value pointe vers une zone mémoire qui lui est propre, avec le & $value pointe vers la zone mémoire de l'éléments parcourue
					$value = intval($match[$key+1]);
				}
			}
		}
	}
	// Retourne "[titre du film] sortie le JJ mois YYYY"
	return ''.$films[$rangOldest]['im:name']['label'].', sortie le '.$date[2].' '.$mois[$date[1] - 1].' '.$date[0];
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*
*Sortie : Une chaine de caractère correspondant à la catégorie la plus vue et au nombre de film correspondant
*/
function categoryVueMax(array $films) {
	$category = [];
	foreach ($films as $rang => $film) {
		$cat = $film['category']['attributes']['label'];
		if (array_key_exists($cat, $category)) {
			$category[$cat]++;
		} else {
			$category[$cat] = 1;
		}
	}
	arsort($category);
	reset($category);
	return key($category).' ('.current($category).' films)';
}

/*
*Paramètre d'entrée :
*	$films = un tableau multidimensionnel associatif ^^ contenant le top 100 des films les plus vue et leurs info
*
*Sortie : Une chaine de caractère correspondant au nom du réalisateur ayant fait le plus de films ainsi que le nombre de films en question
*/
function realisateurZele(array $films) {
	$realisateurs = [];
	foreach ($films as $rang => $film) {
		$realisateur = $film['im:artist']['label'];
		if (preg_match('#&#', $realisateur)) {
			$reals = explode("&", $realisateur);
			foreach ($reals as $real) {
				$real = trim($real);
				if (array_key_exists($real, $realisateurs)) {
					$realisateurs[$real]++;
				} else {
					$realisateurs[$real] = 1;
				}
			}
		} else if (array_key_exists($realisateur, $realisateurs)) {
			$realisateurs[$realisateur]++;
		} else {
			$realisateurs[$realisateur] = 1;
		}
	}
	arsort($realisateurs);
	reset($realisateurs);
	return key($realisateurs).' ('.current($realisateurs).' films)';
}

echo "Top10 des films les plus vue : "."\n".topX($top, 10)."\n";
echo "Rang du films \"Gravity\" : ".rang($top, "Gravity")."\n";
echo 'Le nom du réalisateur de "The LEGO Movie" est : '.nomRealisateur($top, "The LEGO Movie")."\n";
echo 'Il y a '.nbFilmsDate($top, 2000).' films sortie avant l\'an 2000'."\n";
echo 'Le film le plus récent est : '.lastFilm($top)."\n";
echo 'Le film le plus ancien est : '.oldestFilm($top)."\n";
echo 'La catégorie le plus vue est : '.categoryVueMax($top)."\n";
echo 'Le réalisateur le plus zélé est : '.realisateurZele($top)."\n";

?>