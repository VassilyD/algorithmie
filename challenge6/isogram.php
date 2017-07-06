<?php
/*
* Fonction testant si une chaine de caractère est un isogram (a le même nombre d'occurence de chaque lettre).
*
* @params string $phrase : chaine de caratère contenant la phrase à tester
*
* @return : true si $phrase est un isogram, false sinon
*/
function isIsogram(string $phrase) {
	if ($phrase == null or $phrase == "") return false;
	if (is_numeric($phrase)) return false;

	$occurence = [];
	$separation = [" ", "-"];
	$phrase = str_replace($separation, "", $phrase);
	$phrase = strtolower($phrase);
	$taille = strlen($phrase);
	for($i = 0; $i < $taille; $i++) {
		//echo $phrase[$i]." ";
		$lettre = ord($phrase[$i]);
		//echo $lettre."\n";
		if(isset($occurence[$lettre])) $occurence[$lettre]++;
		else $occurence[$lettre] = 1;
	}
	unset($occurence[195]);
	$occurence = array_values($occurence);
	//print_r($occurence);

	$taille = count($occurence);
	$i = 0;
	$result = true;
	while ($result && $i < ($taille - 1)) {
		if (current($occurence) != next($occurence)) {
			$result = false;
		}
		$i++;
	}
	return $result;
}


$test = ["duplicates", "eleven", "subdermatoglyphic", "Alphabet", 'thumbscrew-japingly', 'Hjelmqvist-Gryb-Zock-Pfund-Wax', 'Heizölrückstoßabdämpfung', 'the quick brown fox', 'Emily Jung Schwartzkopf', 'éléphant', 'papa'];
foreach ($test as $value) {
	if (isIsogram($value)) echo 'Yoloooooo'."\n";
	else echo "Bad triiiip\n";
}
?>