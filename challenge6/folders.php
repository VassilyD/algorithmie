<?php
/* Génère une liste des fichiers contenu dans un dossier et ses sous-dossiers.
**
** @Params : $path : chaine de caractère contenant le chemin complet vers le dossier voulu
**
** @Return : un tableau associatif contenant la liste des fichiers du dossier
**				les sous dossiers sont des tableau dont la clé correspond au nom du dossier (les fichiers ont des index normaux)
*/
function listFiles(String $path) {
	$listFiles = [];
	// vérifie que le chemin entrée soit un dossier
	if (is_dir($path)) {
		// vérifie qu'il s'ouvre bien et l'ouvre dans $dh
	    if ($dh = opendir($path)) {
	    	// pour chaque fichier : ...
	        while (($file = readdir($dh)) !== false) {
	        	// Ne prends pas en compte les fichiers cachés
	        	if (!preg_match('#^\.#', $file)) {
	        		// Si c'est un dossier on utilise le nom du dossier comme clé de l'élément
	        		if (is_dir($path.'/'.$file)) {
		        		$listFiles[$file] = $file;
		        	} else if (is_file($path.'/'.$file)) $listFiles[] = $file;
	        	}
	        }
	        closedir($dh);
	    }
	}
	// On complète la liste de façon recursive
	// à faire après car l'on ne peux pas travailler sur plusieur dossier simultanément
	foreach ($listFiles as &$file) {
		if (is_dir($path.'/'.$file)) {
			$file = listFiles($path.'/'.$file);
		}
	}
	return $listFiles;
}

/* Déplace ou copy l'ensemble des fichiers à leurs emplacement respectif (voir moveFilesByExtension).
**	S'appelle elle même pour les sous-dossier
**
** @Params : 
**		$liste : Tableau contenant l'arborescence des fichiers du dossier en cour
**		$cible : Chemin vers le dossier cible de moveFilesByExtension
**		$copy : Booléen indiquant si l'on copie (true) ou déplace (false) les fichers
**		$level : Entier représentant le niveau de profondeur du dossier en cour dans les sous dossier de la source (source/jeu/fourchette/ => $level == 2)
**
** @Return : true si tout c'est bien passé, false sinon
*/
function moveFromListeR(Array $liste, String $source, String $cible, Bool $copy = true, Int $level = 0) {
	foreach ($liste as $key => $value) {
		if (is_array($value)) {
			if(!moveFromListeR($value, $source.'/'.$key, $cible, $copy, ($level+1))) return false;
		} 
		else {
			// Recupère l'extension et prépare la suite du chemin
			if (preg_match('#.*\.([[:alnum:]]+)$#', $value, $filename)) $dossier = '/'.$filename[1];
			else $dossier = '/unknow';

			// créé le dossier correspondant à l'extension s'il n'exite pas
			if (!file_exists($cible.$dossier)) {
				if (!mkdir($cible.$dossier, 0755)) return false;
			}

			// créé les sous-dossier si besoin et rajoute la suite du chemmin
			if ($level != 0) {
				for ($i = 0; $i < $level; $i++) {
					if (preg_match('#.*((/[[:alnum:]-_]+){'.($i + 1).'})(/[[:alnum:]-_]+){'.($level - 1 - $i).'}$#', $source, $temp)) {
						if (!file_exists($cible.$dossier.$temp[1])) {
							if (!mkdir($cible.$dossier.$temp[1], 0755)) return false;
						}
					}
				}
				$dossier .= $temp[1];
			}

			// Déplace ou copie le fichier (en s'assurant une dernière fois que le dossier cible soit bien un dossier)
			if (is_dir($cible.$dossier)) {
				if ($copy) {
					if (!copy($source.'/'.$value, $cible.$dossier.'/'.$value)) return false;
				} else {
					if (!rename($source.'/'.$value, $cible.$dossier.'/'.$value)) return false;
				}
			} else return false;
		}
	}
	return true;
}

/* Range chaque fichier d'un dossier dans des dossier correspondant à l'extension de chaque fichiers (recréé aussi l'arborescence du dossier source dans chaque dossier d'extension si besoin).
**
** @Params : 
**		$source : Chemin vers le dossier source
**		$cible : Chemin vers le dossier cible
**		$copy : Booléen indiquant si l'on copie (true) ou déplace (false) les fichers
**
** @Return : True si tout c'est bien passé, False sinon
*/
function moveFilesByExtension(String $source, String $cible = '', Bool $copy = true) {
	if (file_exists($source)) {
		$files = listFiles($source);
	} else return false;

	if ($cible == '') $cible = $source;

	if (!file_exists($cible)) {
		if (!mkdir($cible, 0755)) {
			return false;
		}
	} else if (!is_dir($cible)) {
		return false;
	}

	if(!moveFromListeR($files, $source, $cible, $copy)) return false;

	return true;
}

echo 'Entrez le chemin du dossier source :'."\n";
$source = trim(fgets(STDIN));
echo 'Entrez le chemin du dossier cible (laisser vide si pareil que la source) :'."\n";
$cible = trim(fgets(STDIN));
echo 'Voulez vous déplacer (0) ou copier (1) les fichiers :'."\n";
$copy = trim(fgets(STDIN));
if ($copy == '0') $copy = false;
else $copy = true;
if(!moveFilesByExtension($source, $cible, $copy)) echo 'Une erreur est survenue'."\n";
else {
	if ($copy) echo 'Copie effectuer avec succès'."\n";
	else  echo 'Déplacement effectuer avec succès'."\n";
}
?>