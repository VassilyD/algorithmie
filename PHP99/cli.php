<?php
// inclusion des fonctions (require est moin permissif que include et plante le script en cas d'erreur)
require 'php99.php';


function choixNiveau(Array $exitAnswers) {
	echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q  ou 0 pour revenir au menu principale)"."\n";
	$niveau = strtolower(trim(fgets(STDIN)));
	echo "\n";
	if ((is_numeric($niveau) && $niveau == 0) || (is_string($niveau) && in_array($niveau, $exitAnswers))) {
		return 0;
	}
	while ($niveau < 1 || $niveau > 3) {
		echo "Veuillez entrer un chiffre entre 1 et 3 (q ou 0 pour revenir au menu principale)"."\n";
		$niveau = strtolower(trim(fgets(STDIN)));
		echo "\n";
		if ((is_numeric($niveau) && $niveau == 0) || (is_string($niveau) && in_array($niveau, $exitAnswers))) {
			return 0;
		}
	}
	return $niveau;
}


/* Main code */

echo "Challenge php99"."\n";
echo "Challenger : Vassily Dubois"."\n";

$exitAnswers = ["q","quit", "quitter", "fin", "exit"]; // différente réponse possible pour sortir de la boucle principale
$continuer = true;
$question = "Quelle exercice voulez vous tester? (1 à 7, q ou 0 pour quitter)"."\n";

while ($continuer) {
	echo $question;
	$reponse = strtolower(trim(fgets(STDIN)));
	echo "\n";
	if (is_numeric($reponse)) {
		switch ($reponse) {
			case '0':
				$continuer = false;
				break;

			case '1':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$masterTab = ["t-shirt", "pantalon"];
								$suffixeTab = ["bleu", "rouge", "vert"];
								echo "Tableau maitre : ".tabToString($masterTab)."\n";
								echo "Tableau enfant : ".tabToString($suffixeTab)."\n";
								echo "résultat de la fusion : ".tabToString(exercice1($masterTab, $suffixeTab))."\n\n";
								break;
							
							case '2':
								$masterTab = ["poulet", "boeuf", "mouton"];
								$suffixeTab = ["à point", "saignant", "bleu", "bien cuit"];
								echo "Tableau maitre : ".tabToString($masterTab)."\n";
								echo "Tableau enfant : ".tabToString($suffixeTab)."\n";
								echo "résultat de la fusion : ".tabToString(exercice1($masterTab, $suffixeTab))."\n\n";
								break;
							
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
								break;
							
							default:
								# code...
								break;
						}

					}
				}
				break;
			
			case '2':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$stringASplit = "un truc de plus à faire";
								echo "Chaine d'entrée : ".$string."\n";
								echo "Tableau de sortie : ".tabtoString(exercice2($stringASplit))."\n\n";
								break;
							
							case '2':
								$stringASplit = "horreur fantastique action western thriller comédie drame romance historique";
								echo "Chaine d'entrée : ".$string."\n";
								echo "Tableau de sortie : ".tabtoString(exercice2($stringASplit))."\n\n";
								break;
							
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
								break;
							
							default:
								# code...
								break;
						}
					}
				}
				break;
			
			case '3':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$fruits = ["trois", "deux", "un"];
								echo "Tableau d'entrée : ".tabtoString($fruits)."\n";
								echo "Tableau de sortie : ".tabToString(exercice3($fruits))."\n\n";
								break;
							
							case '2':
								$fruits = ["orange", "banane", "pomme", "fraise", "tomate", "framboise", "noix de coco", "ananas"];
								echo "Tableau d'entrée : ".tabtoString($fruits)."\n";
								echo "Tableau de sortie : ".tabToString(exercice3($fruits))."\n\n";
								break;
							
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							default:
								# code...
								break;
						}
					}
				}
				break;
			
			case '4':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$prenoms = ["gauche", "milieu", "droite"];
								echo "Tableau d'entrée : ".tabtoString($prenoms)."\n";
								echo "Tableau de sortie : ".tabToString(exercice4($prenoms))."\n\n";
								break;
								
							case '2':
								$prenoms = ["Harry", "Hilary", "Harrington", "Hagrid", "Holmes"];
								echo "Tableau d'entrée : ".tabtoString($prenoms)."\n";
								echo "Tableau de sortie : ".tabToString(exercice4($prenoms))."\n\n";
								break;
								
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							default:
								# code...
								break;
						}
					}
				}
				break;
			
			case '5':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$phrase = ["Une petite phrase", "Une pĥrase de batard super mega longue de truc de ouf qu'on en peu plus tellement c'est longuement à rallonge jte raconte pas", "Une phrase moyennement courte mais pas trop"];
								echo "Tableau d'entrée : ".tabtoString($phrase)."\n";
								echo "chaine la plus longue : ".exercice5($phrase)."\n\n";
								break;
								
							case '2':
								$phrase = ["ah...", "encore un beau dimanche", "de perdu", "cloîtré chez", "vous", "à coder", ",mais", " vous avez signé pour ça pas vrai ?", "alors courage !"];
								echo "Tableau d'entrée : ".tabtoString($phrase)."\n";
								echo "chaine la plus longue : ".exercice5($phrase)."\n\n";
								break;
								
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							default:
								# code...
								break;
						}
					}
				}
				break;
			
			case '6':
				while (true) {
					// En attandant l'implémentation de l'exercice
					echo "Désolé cet exercice n'est pas encore implémenté..."."\n\n";
					break;
					
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							case '2':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							default:
								# code...
								break;
						}
					}
				}
				break;
			
			case '7':
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$sadisme = exercice2("miam j'aime marmonner");
								$lettre = 'm';
								echo "Tableau d'entrée : ".tabtoString($sadisme)."\n";
								echo "Nombre d'occurence de la lettre ".$lettre." : ".exercice7($sadisme, $lettre)."\n\n";
								break;
								
							case '2':
								$sadisme = ["haha", "hehe", "j'aime mon travail", "une vraie joie", "je changerai pour rien au monde", "hhhhhhhh", "have fun !"];
								$lettre = 'h';
								echo "Tableau d'entrée : ".tabtoString($sadisme)."\n";
								echo "Nombre d'occurence de la lettre ".$lettre." : ".exercice7($sadisme, $lettre)."\n\n";
								break;
								
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
							default:
								# code...
								break;
						}
					}
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