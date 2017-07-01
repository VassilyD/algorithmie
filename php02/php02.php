<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);


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

echo "nombre total de mots : ".nbMots($dico)."\n";
echo "nombre de mots de 15 lettres : ".nbMotsX($dico, 15)."\n";
echo "nombre de mots possédant la lettre w : ".nbMotsLettre($dico, 'w')."\n";
echo "nombre de mots possédant la lettre w ou W : ".nbMotsLettre(['trucw', null, '', 15, ['truc', null, 15]], 'w', false)."\n";
echo "nombre de mots terminant par la lettre q : ".nbMotsLettreFin($dico, 'q')."\n";
echo "nombre de mots terminant par la lettre q ou Q : ".nbMotsLettreFin($dico, 'q', false)."\n";
echo "nombre de mots de 15 lettre et possédant la lettre w ou W : ".nbMotsLettreX($dico, 'w', 15, false)."\n";


?>