<?php
class Crepe {
	public function __construct($size = 1, $side = 0) {
		$this->side = $side;
		$this->size = $size;
	}

	public function crepeToString() {
		return "Taille".$this->size." Face : ".$this->side;
	}
	public $side;
	public $size;
}

/*
Prends un tableau en entrée et retourne une chaine de caractère du style ["élément1", "élement2"]
*/
function tabToString(Array $tab) {
	$string = "[";

	foreach ($tab as $key => $value) {
		$string .= '"'.$value->crepeToString().'"';
		if ($key != (count($tab) - 1)) {
			$string .= ', ';
		}
		else {
			$string .= ']';
		}
	}
	return $string;
}

function retourneCrepe(Crepe $crepe) {
	if ($crepe->side == 1) {
		$crepe->side = 0;
	} else {
		$crepe->side = 1;
	}
	return $crepe;
}

function getPositionPlusGrandeCrepe(Array $tasDeCrepes, Int $avancement) {
	$position = 0;
	$plusGrandeCrepe = 0;
	$taille = count($tasDeCrepes);
	for ($key = $avancement; $key < $taille; $key++) {
		if ($tasDeCrepes[$key]->size > $plusGrandeCrepe)	{
			$plusGrandeCrepe = $tasDeCrepes[$key]->size;
			$position = $key;
		}
	}
	return $position;
}

function spatuler(Array $tasDeCrepes, Int $position) {
	
	$taille = count($tasDeCrepes);
	//$temp = new Crepe;

	/*$finTas = array_slice($tasDeCrepes, $position);
	$debTas = array_slice($tasDeCrepes, 0,$position);
	array_reverse($finTas);
	foreach ($finTas as $key => $crepe) {
		$crepe->side = abs($crepe->side -1);
	}
	return array_merge($debTas, $finTas);*/

	for ($i=$position; $i < ($taille + $position)/2 ; $i++) {
		$temp = $tasDeCrepes[$i];
		// $taille - 1 - $i + $position prends le ième dernier élément (le + $position est là car $i commence à $position)
		$tasDeCrepes[$i] = retourneCrepe($tasDeCrepes[$taille - 1 - $i + $position]);
		$tasDeCrepes[$taille - 1 - $i + $position] = retourneCrepe($temp);
	}
	return $tasDeCrepes;
}

function triCrepe(Array $tasDeCrepes) {
	$avancement = 0;
	$taille = count($tasDeCrepes);
	while ($avancement < $taille) {
		$position = getPositionPlusGrandeCrepe($tasDeCrepes, $avancement);
		//echo tabToString($tasDeCrepes)."\n";
		$tasDeCrepes = spatuler($tasDeCrepes, $position);
		//echo ">".tabToString($tasDeCrepes)."\n";
		if ($tasDeCrepes[$taille - 1]->side == 0) {
			$tasDeCrepes = spatuler($tasDeCrepes, $avancement);
			//echo ">>".tabToString($tasDeCrepes)."\n";
		} else {
			$tasDeCrepes = spatuler($tasDeCrepes, $taille - 1);
			//echo ">>".tabToString($tasDeCrepes)."\n";
			$tasDeCrepes = spatuler($tasDeCrepes, $avancement);
			//echo ">>".tabToString($tasDeCrepes)."\n";
		}
		//echo ">>>".tabToString($tasDeCrepes)."\n";
		$avancement++;
	}
	return $tasDeCrepes;
}

$tasDeCrepes = [];

for ($i=0; $i < 10; $i++) { 
	$tasDeCrepes[] = new Crepe(random_int(1, 5), random_int(0, 1));
}
echo tabToString($tasDeCrepes)."\n";
echo tabToString(triCrepe($tasDeCrepes));
?>