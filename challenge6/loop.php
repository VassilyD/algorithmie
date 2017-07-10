<?php
/* Génère une liste html de nombres
**
** @Params : $debut : le premier nombre de la liste, $fin : le dernier nombre de la liste
**
** @Return : la liste de tous les entier entre $debut et $fin
**				avec les pair en bleu, les impair en orange et les carrés en gras
*/
function nNombre(Int $debut, Int $fin) {
	if ($debut < 0 || $fin < 0 ) return '';
	if ($fin < $debut) {
		$temp = $debut;
		$debut = $fin;
		$fin = $temp;
	}
	$liste = '<ul>'."\n";
	for ($i = $debut; $i <= $fin ; $i++) { 
		$style = '';
		if (floor(sqrt($i)) == pow($i, 0.5)) {
			$style .= 'font-weight: bold; font-size: 1.1em; list-style: square; ';
		}
		if ($i % 2 == 0) {
			$style .= 'color: blue;';
		} else {
			$style .= 'color: orange;';
		}
		$liste .= "\t".'<li style="'.$style.'">'.$i.'</li>'."\n";
	}
	$liste .= '</ul>'."\n";
	return $liste;
}

/* Calcul l'écart le plus grand entre deux éléments consécutif d'un tableau.
**
** @Params : $tab : tableau d'entier à traiter
**
** @Return : l'écart le plus grand
*/
function plusGrandGap(Array $tab) {
	if (empty($tab)) return 0;
	$taille = count($tab);
	$gap = 0;
	for($i = 0; $i < $taille -1; $i++) {
		if (is_int($tab[$i]) && is_int($tab[$i+1]) && abs($tab[$i] - $tab[$i+1]) > $gap) {
			$gap = abs($tab[$i] - $tab[$i+1]);
		}
	}
	return $gap;
}
/* Jeu de la fouchette
**
** @Params : null
**
** Choisi au hazard un nombre entre 1 et 100 et demande à l'utilisateur de le deviner en max 8 tours
**	ne donne que les indication "trop grand" ou "trop petit"
*/
function fourchette() {
	$secret = rand(1, 100);
	$passe = 0;
	$guessed = false;
	$essai = 0;
	echo '\\**** Jeu de la Fourchette ****/'."\n";
	do {
		do {
			echo 'Entrez un nombre entre 1 et 100 : ';
			$essai = intval(fgets(STDIN));
		} while (!(is_numeric($essai) && $essai > 0 && $essai < 101));

		if ($essai > $secret) {
			echo 'nombre donné trop grand'."\n";
		} else if ($essai < $secret) {
			echo 'nombre donné trop petit'."\n";
		} else {
			$guessed = true;
		}
		if (!$guessed) $passe++;

	} while ($passe < 8 && !$guessed);

	if ($guessed) {
		echo 'bravo, vous avez trouvé en '.$passe.' essai(s)'."\n";
	} else {
		echo 'désolé, le nombre était '.$secret."\n";;
	}
}

//echo nNombre(1, 100);
//echo plusGrandGap([0,6,4,8,9,5,13,2,4,12])."\n";
//fourchette();
?>