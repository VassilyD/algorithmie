<?php

function tabToString(Array $tab) {
	$string = "[";
	foreach ($tab as $key => $value) {
		if ($key != (count($tab) - 1)) {
			$string .= '"'.$value.'", ';
		}
		else {
			$string .= '"'.$value.'"]';
		}
	}
	return $string;
}

function exercice1(Array $tab1, Array $tab2) {
	echo "Tableau maitre : ".tabToString($tab1)."\n";
	echo "Tableau enfant : ".tabToString($tab2)."\n";
	$tabFusion = [];
    foreach ($tab1 as $keyMaitre => $elementMaitre) {
    	foreach ($tab2 as $keyEnfant => $elementEnfant) {
    		$tabFusion[] = $elementMaitre." ".$elementEnfant;
    	}
    }
    echo "résultat de la fusion : ".tabToString($tabFusion)."\n\n";
}

function exercice2(string $string) {
	echo "Chaine d'entrée : ".$string."\n";
	echo "Tableau de sortie : ".tabtoString(explode(" ", $string))."\n\n";
}

function exercice3(Array $tab) {

}

function exercice4(Array $tab) {

}

function exercice5(Array $tab) {

}

function exercice6(Array $tab) {

}

function exercice7(Array $tab) {

}

/* Main code */

echo "Challenge php99"."\n";
echo "Challenger : Vassily Dubois"."\n";

$exitAnswers = ["q", "Q", "quit", "Quit", "QUIT", "quitter", "Quitter", "QUITTER", "fin", "Fin", "FIN", "exit", "Exit", "EXIT"]; // différente réponse possible pour sortir de la boucle principale
$continuer = true;
$question = "Quelle exercice voulez vous tester? (1 à 7, q pour quitter)"."\n";

while ($continuer) {
	echo $question;
	$reponse = trim(fgets(STDIN));
	echo "\n";
	if (is_numeric($reponse)) {
		switch ($reponse) {
			case '1':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						$masterTab = ["t-shirt", "pantalon"];
						$suffixeTab = ["bleu", "rouge", "vert"];
						exercice1($masterTab, $suffixeTab);
						break;
					
					case '2':
						$masterTab = ["poulet", "boeuf", "mouton"];
						$suffixeTab = ["à point", "saignant", "bleu", "bien cuit"];
						exercice1($masterTab, $suffixeTab);
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '2':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						$stringASplit = "un truc de plus à faire";
						exercice2($stringASplit);
						break;
					
					case '2':
						$stringASplit = "horreur fantastique action western thriller comédie drame romance historique";
						exercice2($stringASplit);
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '3':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						# code...
						break;
					
					case '2':
						# code...
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '4':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						# code...
						break;
					
					case '2':
						# code...
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '5':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						# code...
						break;
					
					case '2':
						# code...
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '6':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						# code...
						break;
					
					case '2':
						# code...
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			case '7':
				// Demande le niveau souhaité
				echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q pour revenir au menu principale)"."\n";
				$niveau = trim(fgets(STDIN));
				echo "\n";
				if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
					break;
				}
				while ($niveau < 1 || $niveau > 3) {
					echo "Veuillez entrer un chiffre entre 1 et 3 (q pour revenir au menu principale)"."\n";
					$niveau = trim(fgets(STDIN));
					echo "\n";
					if (is_string($niveau) && in_array($niveau, $exitAnswers)) {
						break;
					}
				}

				switch ($niveau) {
					case '1':
						# code...
						break;
					
					case '2':
						# code...
						break;
					
					case '3':
						# code...
						break;
					
					default:
						# code...
						break;
				}
				break;
			
			default:
				echo "Veuillez entrer un chiffre entre 1 et 7."."\n";
				break;
		}
	}
	elseif (is_string($reponse)) {
		// 
		if (in_array($reponse, $exitAnswers)) {
			// Permet de sortir de la bouclme principale
			$continuer = false;
		}
		else {
			echo "Si vous souhaiter quitter le programme entrez l'une des valeur suivante :"."\n";
			echo '"q", "quit", "quitter", "fin", "exit"'."\n";
		}
	}
	else {
		echo "Veuillez entrer un chiffre entre 1 et 7."."\n";
		echo "Si vous souhaiter quitter le programme entrez l'une des valeur suivante :"."\n";
		echo '"q", "quit", "quitter", "fin", "exit"'."\n";
	}
}


?>