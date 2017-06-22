<?php

function exercice1(Array $tab1, Array $tab2) {
        foreach ($tab1 as $keyMaitre => $elementMaitre) {
        	foreach ($tab2 as $keyEnfant => $elementEnfant) {
        		# code...
        	}
        }
}

function exercice2(Array $tab) {
        // Votre code ici
}

function exercice3(Array $tab) {
        // Votre code ici
}

function exercice4(Array $tab) {
        // Votre code ici
}

function exercice5(Array $tab) {
        // Votre code ici
}

function exercice6(Array $tab) {
        // Votre code ici
}

function exercice7(Array $tab) {
        // Votre code ici
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