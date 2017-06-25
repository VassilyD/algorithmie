
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
	// pour chaque élément du tableau maitre
    foreach ($masterTab as $keyMaitre => $elementMaitre) {
    	// pour chaque élément du tableau enfant on créer un élément qui est la fusion maitre enfant
    	foreach ($suffixeTab as $keyEnfant => $elementEnfant) {
    		// on ajoute la fusion au tableau de retour
    		$tabFusion[] = $elementMaitre." ".$elementEnfant;
    	}
    }
    return $tabFusion;
}

/*
Prends une chaine de caractère en entrée et créé un tableau avec un élément par mots de la chaine entrée
*/
function exercice2(string $string) {
	// la fonctions explode fait exactement ce que l'on veut ^^
	return explode(" ", $string));
}

/*
Prends en entrée un tableau en sort en sortie un tableau contenant les deux derniers éléments du tableau d'entrée
*/
function exercice3(Array $tab) {
	return array($tab[count($tab)-2], $tab[count($tab)-1]);
}

function exercice4(Array $tab) {

}

function exercice5(Array $tab) {

}

function exercice6(Array $tab) {

}

function exercice7(Array $tab) {

}

?>