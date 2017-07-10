<?php
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
	// On complte la liste de façon recursive
	foreach ($listFiles as &$file) {
		if (is_dir($path.'/'.$file)) {
			$file = listFiles($path.'/'.$file);
		}
	}
	return $listFiles;
}

function moveFilesByExtension(String $source, String $cible) {
	if (file_exists($source)) {
		$files = listFiles($source);
	} else return false;
	if (!file_exists($cible)) {
		if (!mkdir($cible, 0755)) {
			return false;
		}
	} else if (!is_dir($cible)) {
		return false;
	}
	print_r($files);
}

moveFilesByExtension('/home/vassily/algorithmie', '/home/vassily/algorithmie')
?>