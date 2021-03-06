<?php
// inclusion des fonctions (require est moin permissif que include et plante le script en cas d'erreur)
require 'php99.php';

/*
Permet de choisir le niveau à tester
Demande le niveau choisi tant que la réponse n'est pas valide
*/
function choixNiveau(Array $exitAnswers) {
	// Affichage de la question
	echo "quel niveau souhaitez vous tester? (1, 2 ou 3, q  ou 0 pour revenir au menu principale)"."\n";
	// stocke l'entrée de l'utilisateur dans $niveau
	// fgets(STDIN) permet de récupérer une saisie au clavier de l'utilisateur
	// trim efface les espace en début et fin de chaine
	// strtolower met la chaine de caractère en minuscule (facilite la comparaison qui elle est sensible à la casse)
	$niveau = strtolower(trim(fgets(STDIN)));
	echo "\n";
	// si $niveau est un nombre et qu'il vaut 0, ou bien, si c'est une chaine de caractère et que sa valeur correspond à l'un des élément de $exitAnswers
	if ((is_numeric($niveau) && $niveau == 0) || (is_string($niveau) && in_array($niveau, $exitAnswers))) {
		// Alors on renvoie 0
		return 0;
	}

	// Tant que $niveau est inférieur à 1 ou supérieur à 3
	// équivalent à : Tant que $niveau n'est pas compris entre 1 et 3 (l'ensemble des réponse valide)
	while ($niveau < 1 || $niveau > 3) {
		// On reprécise l'ensemble des réponses attendue
		echo "Veuillez entrer un chiffre entre 1 et 3 (q ou 0 pour revenir au menu principale)"."\n";
		// On refait une saisie au clavier
		$niveau = strtolower(trim(fgets(STDIN)));
		echo "\n";
		// On retest si il n'est pas question de sortir de l'exercice
		if ((is_numeric($niveau) && $niveau == 0) || (is_string($niveau) && in_array($niveau, $exitAnswers))) {
			return 0;
		}
	}
	// on renvoie le niveau choisie
	return $niveau;
}


/* Main code */

echo "Challenge php99"."\n";
echo "Challenger : Vassily Dubois"."\n";

$exitAnswers = ["q","quit", "quitter", "fin", "exit"]; // différente réponse possible pour sortir de la boucle principale
$continuer = true; // booléen servant à savoir quand continuer (true) et quand s'arreter (false)
$question = "Quelle exercice voulez vous tester? (1 à 7, q ou 0 pour quitter)"."\n";

// Tant que $continuer vaut true
while ($continuer) {
	echo $question;
	// stocke l'entrée de l'utilisateur dans $reponse
	// fgets(STDIN) permet de récupérer une saisie au clavier de l'utilisateur
	// trim efface les espace en début et fin de chaine
	// strtolower met la chaine de caractère en minuscule (facilite la comparaison qui elle est sensible à la casse)
	$reponse = strtolower(trim(fgets(STDIN)));
	echo "\n";
	// Si la réponse esyt un nombre
	if (is_numeric($reponse)) {
		switch ($reponse) {
			// Cas où $réponse vaut 0
			case '0':
				// 0 correspont à quitter donc on met $continuer à false ce qui nous sort de la boucle while
				$continuer = false;
				break;

			// Cas où $réponse vaut 1
			case '1':
				// boucle infinie (on en sort avec un break)
				while (true) {
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					// Si on choisie de quitter alors break nous sort de la boucle while
					if ($niveau == 0) {
						break;
					}
					else {
						// En fonctino de la valeur de $niveau, différentes actions sont possible
						switch ($niveau) {
							// Cas où $niveau vaut 1
							case '1':
								$masterTab = ["t-shirt", "pantalon"];
								$suffixeTab = ["bleu", "rouge", "vert"];
								echo "Tableau maitre : ".tabToString($masterTab)."\n";
								echo "Tableau enfant : ".tabToString($suffixeTab)."\n";
								echo "résultat de la fusion : ".tabToString(exercice1($masterTab, $suffixeTab))."\n\n";
								break;
							
							// Cas où $niveau vaut 2
							case '2':
								$masterTab = ["poulet", "boeuf", ""];
								$suffixeTab = ["à point", "saignant", "bleu", "bien cuit"];
								echo "Tableau maitre : ".tabToString($masterTab)."\n";
								echo "Tableau enfant : ".tabToString($suffixeTab)."\n";
								echo "résultat de la fusion : ".tabToString(exercice1($masterTab, $suffixeTab))."\n\n";
								break;
							
							// Cas où $niveau vaut 3
							case '3':
								// En attandant l'implémentation du niveau
								echo "Désolé ce niveau n'est pas encore implémenté..."."\n\n";
								break;
								
								break;
							
							// Cas où $niveau ne vaut aucune des valeur précédentes
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
								echo "Chaine d'entrée : ".$stringASplit."\n";
								echo "Tableau de sortie : ".tabtoString(exercice2($stringASplit))."\n\n";
								break;
							
							case '2':
								$stringASplit = "horreur fantastique action western thriller comédie drame romance historique";
								echo "Chaine d'entrée : ".$stringASplit."\n";
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
					// Demande le niveau souhaité
					$niveau = choixNiveau($exitAnswers);
					if ($niveau == 0) {
						break;
					}
					else {
						switch ($niveau) {
							case '1':
								$portables = ["0612459623", "0645896235", "1678145263", "06478952636541654", "065512"];
								echo "Tableau d'entrée : ".tabtoString($portables)."\n";
								echo "Tableau de sortie : ".tabtoString(exercice6($portables))."\n";
								break;
								
							case '2':
								$portables = ["0612459623", "0645896235", "0678145263", "0654789544", "0652358512"];
								echo "Tableau d'entrée : ".tabtoString($portables)."\n";
								echo "Tableau de sortie : ".tabtoString(exercice6($portables))."\n";
								break;
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