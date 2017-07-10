<?php
function chiffrement(String $texte, int $k) {
	if ($texte == '') return '';
	$taille = strlen($texte);
	for($i = 0; $i < $taille; $i++) {
		$ascii = ord($texte[$i]);
		// Si c'est une lettre en majuscule
		if($ascii >= 65 && $ascii <= 90) {
			$ascii -= 65;
			$ascii += $k;
			$ascii %= 26;
			$ascii += 65;
			$texte[$i] = chr($ascii);
		// si c'est une lettre en minuscule
		} else if ($ascii >= 97 && $ascii <= 122) {
			$ascii -= 97;
			$ascii += $k;
			$ascii %= 26;
			$ascii += 97;
			$texte[$i] = chr($ascii);
		// si c'est un chiffre
		} else if ($ascii >= 48 && $ascii <= 57) {
			$ascii -= 48;
			$ascii += $k;
			$ascii %= 10;
			$ascii += 48;
			$texte[$i] = chr($ascii);
		// si c'est un chiffre
		} else if ($ascii >= 128 && $ascii <= 165) {
			echo $texte[$i].' : '.$ascii."\n";
			$ascii -= 128;
			$ascii += $k;
			$ascii %= 38;
			$ascii += 128;
			$texte[$i] = chr($ascii);
		}
	}
	return $texte;
}

function dechiffrement(String $texte, int $k) {
	if ($texte == '') return '';
	$taille = strlen($texte);
	for($i = 0; $i < $taille; $i++) {
		$ascii = ord($texte[$i]);
		// Si c'est une lettre en majuscule
		if($ascii >= 65 && $ascii <= 90) {
			$ascii -= 65;
			$ascii -= ($k % 26);
			$ascii += 26;
			$ascii %= 26;
			$ascii += 65;
			$texte[$i] = chr($ascii);
		// si c'est une lettre en minuscule
		} else if ($ascii >= 97 && $ascii <= 122) {
			$ascii -= 97;
			$ascii -= ($k % 26);
			$ascii += 26;
			$ascii %= 26;
			$ascii += 97;
			$texte[$i] = chr($ascii);
		// si c'est un chiffre
		} else if ($ascii >= 48 && $ascii <= 57) {
			$ascii -= 48;
			$ascii -= ($k % 10);
			$ascii += 10;
			$ascii %= 10;
			$ascii += 48;
			$texte[$i] = chr($ascii);
		// si c'est un chiffre
		} else if ($ascii >= 128 && $ascii <= 165) {
			echo '>>'.$texte[$i].' : '.$ascii."\n";
			$ascii -= 128;
			$ascii -= ($k % 38);
			$ascii += 38;
			$ascii %= 38;
			$ascii += 128;
			$texte[$i] = chr($ascii);
		}
	}
	return $texte;
}

echo 'Voila une phrase de texte à décoder ^^!'."\n";
echo dechiffrement(chiffrement('Voila une phrase de texte à décoder ^^!', 26), 0)."\n";
?>