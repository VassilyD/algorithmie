<?php
function decale(Int $nb, Int $decalage, Int $debut, Int $plage) {
	return ((($nb - $debut) + ($decalage % $plage) + $plage) % $plage) + $debut;
}

function caesar(String $texte, int $k) {
	if ($texte == '') return '';
	$taille = strlen($texte);
	for($i = 0; $i < $taille; $i++) {
		$ascii = ord($texte[$i]);
		// Si c'est une lettre en majuscule
		if($ascii >= 65 && $ascii <= 90) {
			$ascii -= 65; // on décale la plage de caractère pour partir de 0 pour que le modulo fonctionne bien
			$ascii += ($k % 26); // On module le décalage en cas de décalage négatif pour pouvoir revenir à un nombre positif par la suite (pour éviter un modulo sur un nombre négatifs, cela peux donner des résultats inattendu)
			$ascii += 26; // on rajoute 26 pour être sur d'avoir un nombre positif
			$ascii %= 26; // on module pour rester dans la plage a-z
			$ascii += 65; // on redécale dans la bonne plage ascii
			$texte[$i] = chr($ascii);
		// si c'est une lettre en minuscule
		} else if ($ascii >= 97 && $ascii <= 122) {
			$texte[$i] = chr(decale($ascii, $k, 97, 26));
		// si c'est un chiffre
		} else if ($ascii >= 48 && $ascii <= 57) {
			$texte[$i] = chr(decale($ascii, $k, 48, 10));
		// si c'est un caractère spécial (??? bug sur certain, notamment le é)
		} else if ($ascii >= 128 && $ascii <= 165) {
			$texte[$i] = chr(decale($ascii, $k, 128, 38));
		}
	}
	return $texte;
}

// Une autre version plus courte et qui prends en compte plus de caractère
function caesar2(String $texte, int $k) {
	if ($texte == '') return '';
	$taille = strlen($texte);
	for($i = 0; $i < $taille; $i++) {
		$ascii = ord($texte[$i]);
		if($ascii >= 33 && $ascii <= 126)
			$texte[$i] = chr(decale($ascii, $k, 33, 94));
		else if ($ascii >= 128 && $ascii <= 175) 
			$texte[$i] = chr(decale($ascii, $k, 128, 48));
	}
	return $texte;
}



/* Obsolète...
function dechiffrement(String $texte, int $k) {
	if ($texte == '') return '';
	$taille = strlen($texte);
	for($i = 0; $i < $taille; $i++) {
		$ascii = ord($texte[$i]);
		// Si c'est une lettre en majuscule
		if($ascii >= 65 && $ascii <= 90) {
			$ascii -= 65; // on décale la plage de caractère pour partir de 0 pour que le modulo fonctionne bien
			$ascii += ($k % 26); // On module le décalage en cas de décalage négatif pour pouvoir revenir à un nombre positif par la suite (pour éviter un modulo sur un nombre négatifs, cela peux donner des résultats inattendu)
			$ascii += 26; // on rajoute 26 pour être sur d'avoir un nombre positif
			$ascii %= 26; // on module pour rester dans la plage a-z
			$ascii += 65; // on redécale dans la bonne plage ascii
			$texte[$i] = chr($ascii);
		// si c'est une lettre en minuscule
		} else if ($ascii >= 97 && $ascii <= 122) {
			$texte[$i] = chr(decale($ascii, $k, 97, 26));
		// si c'est un chiffre
		} else if ($ascii >= 48 && $ascii <= 57) {
			$texte[$i] = chr(decale($ascii, $k, 48, 10));
		// si c'est un caractère spécial
		} else if ($ascii >= 128 && $ascii <= 165) {
			$texte[$i] = chr(decale($ascii, $k, 128, 38));
		}
	}
	return $texte;
}
*/

/****************************add slash here --|
**  Main loop. uncomment to use in cli mode **v
**********************************************
$continuer = true;
do {
	echo 'Texte à travailler :'."\n";
	$texte = fgets(STDIN);
	echo 'Clé de chiffrement : ';
	$cle = fgets(STDIN);
	echo 'voulez vous chiffrer (0) ou bien déchiffrer (1) ? ';
	$mode = intval(fgets(STDIN));

	if($mode == 0) echo caesar2($texte, intval($cle))."\n";
	else echo caesar2($texte, (-1)*intval($cle))."\n";

	echo 'Encore du travail ? (Y/n) ';
	$continuer = fgets(STDIN);
	$continuer = (preg_match('#^y#i', $continuer))?true:false;
} while ($continuer);
//*/
//**************** /Main *********************


//echo 'Voila 1 phrase de texte à décoder ^^!'."\n";
//echo dechiffrement(chiffrement('Voila 1 phrase de texte à décoder ^^!', 11), 11)."\n";
?>